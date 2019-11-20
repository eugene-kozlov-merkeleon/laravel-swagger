<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Autodoc Master Switch
    |--------------------------------------------------------------------------
    |
    | Turning write documentation on and off when starting tests.
    | For example, turn it off during CI tests
    */

    'enabled' => env('AUTODOC_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Documentation Route
    |--------------------------------------------------------------------------
    |
    | Route which will return documentation
    */

    'route' => 'api/v2',

    /*
    |--------------------------------------------------------------------------
    | Production file Path
    |--------------------------------------------------------------------------
    |
    | Path which will return production file
    */

    'production_path' => env('AUTODOC_PROD_PATH', base_path('auto-doc.yaml')),

    /*
    |--------------------------------------------------------------------------
    | Info block
    |--------------------------------------------------------------------------
    |
    | Information fields
    */

    'info' => [

        /*
        |--------------------------------------------------------------------------
        | Documentation Template
        |--------------------------------------------------------------------------
        |
        | You can use your custom documentation view
        */

        'description'    => 'swagger-description',
        'version'        => '1.0.0',
        'title'          => 'Name of Your Application',
        'termsOfService' => '',
        'contact'        => [
            'email' => 'your@email.com',
        ],
        'license'        => [
            'name' => '',
            'url'  => '',
        ],
    ],
    'swagger' => [
        'version' => '2.0',
    ],

    /*
    |--------------------------------------------------------------------------
    | Base API path
    |--------------------------------------------------------------------------
    |
    | Base path for API routes. If config is set, all routes which starts from
    | this value will be grouped.
    */

    'basePath'    => 'api',
    'schemes'     => [],
    'definitions' => [],

    /*
    |--------------------------------------------------------------------------
    | Security Library
    |--------------------------------------------------------------------------
    |
    | Library name, which used to secure the project.
    | Available values: "jwt", "laravel", "null"
    */

    'security' => '',
    'defaults' => [

        /*
        |--------------------------------------------------------------------------
        | Default descriptions of code statuses
        |--------------------------------------------------------------------------
        */

        'code-descriptions' => [
            '200' => 'Operation successfully done',
            '201' => 'Operation creating successfully done',
            '204' => 'Operation deleting successfully done',
            '401' => 'Authentication is required and has failed or has not yet been provided.',
            '403' => 'The request contained valid data, but the server is refusing action. 
            May be you not having the necessary permissions for a resource',
            '404' => 'This entity not found',
            '422' => 'Validation error',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Collector Class
    |--------------------------------------------------------------------------
    |
    | Class of data collector, which will collect and save documentation
    | It can be your own data collector class which should be inherited from
    | EugMerkeleon\Support\AutoDoc\Interfaces\DataCollectorInterface interface
    |
    | WARNING! If you start your test in isolation, you must use FileDataCollector::class.
    | Every request will be save in file directly (without cache).
    | A new test run will combine old documentation and new data.
    */

    'data_collector' => \EugMerkeleon\Support\AutoDoc\DataCollectors\FileDataCollector::class,
];
