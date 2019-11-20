<?php

namespace EugMerkeleon\Support\AutoDoc\Http\Middleware;

use Closure;
use EugMerkeleon\Support\AutoDoc\Services\SwaggerService;

/**
 * @property SwaggerService $service
 */
class AutoDocMiddleware
{
    public static $skipped = false;
    protected     $service;

    public function __construct()
    {
        $this->service = app(SwaggerService::class);
    }

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ((config('app.env') == 'testing') && !self::$skipped && config('auto-doc.enabled'))
        {
            $this->service->addData($request, $response);
        }

        self::$skipped = false;

        return $response;
    }
}
