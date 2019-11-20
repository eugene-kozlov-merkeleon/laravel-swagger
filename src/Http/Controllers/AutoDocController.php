<?php

namespace EugMerkeleon\Support\AutoDoc\Http\Controllers;

use EugMerkeleon\Support\AutoDoc\Services\SwaggerService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AutoDocController extends BaseController
{
    protected $service;

    public function __construct()
    {
        $this->service = app(SwaggerService::class);
    }

    public function documentation()
    {
        $documentation = $this->service->getDocFileContent();

        return response()->json($documentation);
    }

    public function getFile($file)
    {
        $filePath = base_path("vendor/eugmerkeleon/laravel-swagger/src/Views/swagger/{$file}");

        if (!file_exists($filePath))
        {
            throw new NotFoundHttpException();
        }

        $content = file_get_contents($filePath);

        return response($content);
    }

    public function index()
    {
        return view('auto-doc::documentation');
    }
}