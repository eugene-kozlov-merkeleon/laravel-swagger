<?php

namespace EugMerkeleon\Support\AutoDoc\DataCollectors;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use EugMerkeleon\Support\AutoDoc\Interfaces\DataCollectorInterface;
use EugMerkeleon\Support\AutoDoc\Exceptions\MissedProductionFilePathException;

class FileDataCollector implements DataCollectorInterface
{
    public $prodFilePath;

    public function __construct()
    {
        $this->prodFilePath = config('auto-doc.production_path');
        if (empty($this->prodFilePath))
        {
            throw new MissedProductionFilePathException();
        }
        if (!file_exists($this->prodFilePath))
        {
            file_put_contents($this->prodFilePath, '');
        }
    }

    public function saveTmpData($tempData)
    {
        $content = json_decode(file_get_contents($this->prodFilePath), true) ?? [];
        $content = $tempData;
        file_put_contents($this->prodFilePath, json_encode($content));
        unset($content);
    }

    public function getTmpData()
    {
        return json_decode(file_get_contents($this->prodFilePath), true) ?? [];
    }

    public function saveData()
    {
        //If your tests runing in isolation, then this method is not needed. Each request will save to a file.
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
