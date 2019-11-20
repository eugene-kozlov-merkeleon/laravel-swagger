<?php

namespace EugMerkeleon\Support\AutoDoc\DataCollectors;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use EugMerkeleon\Support\Interfaces\DataCollectorInterface;
use EugMerkeleon\Support\DataCollectors\Exceptions\MissedProductionFilePathException;

class CacheDataCollector implements DataCollectorInterface
{
    public $prodFilePath;
    public $keyName;

    public function __construct()
    {
        $this->prodFilePath = config('auto-doc.production_path');
        $this->keyName = config('auto-doc.cache_collector_name') ?: 'auto_doc' . Str::random();

        if (empty($this->prodFilePath))
        {
            throw new MissedProductionFilePathException();
        }
    }

    public function saveTmpData($tempData)
    {
        Cache::forever($this->keyName, $tempData);
    }

    public function getTmpData()
    {
        return Cache::get($this->keyName, []);
    }

    public function saveData()
    {
        $data = Cache::get($this->keyName, []);
        $content = json_encode($data);

        file_put_contents($this->prodFilePath, $content);

        Cache::forget($this->keyName);
        unset($data);

    }

    public function getDocumentation()
    {
        if (!file_exists($this->prodFilePath))
        {
            throw new FileNotFoundException();
        }

        $fileContent = file_get_contents($this->prodFilePath);

        return json_decode($fileContent);
    }

}
