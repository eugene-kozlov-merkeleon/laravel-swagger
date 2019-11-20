<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Documentation Route
    |--------------------------------------------------------------------------
    |
    | Route which will return documentation
    */

    'route' => '/',

    /*
    |--------------------------------------------------------------------------
    | Production file Path
    |--------------------------------------------------------------------------
    |
    | Path which will return production file
    */

    'production_path' => env('LOCAL_DATA_COLLECTOR_PROD_PATH'),

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

        'description' => 'swagger-description',
        'version' => '0.0.0',
        'title' => 'Name of Your Application',
        'termsOfService' => '',
        'contact' => [
            'email' => 'your@email.com'
        ],
        'license' => [
            'name' => '',
            'url' => ''
        ]
    ],
    'swagger' => [
        'version' => '2.0'
    ],

    /*
    |--------------------------------------------------------------------------
    | Base API path
    |--------------------------------------------------------------------------
    |
    | Base path for API routes. If config is set, all routes which starts from
    | this value will be grouped.
    */

    'basePath' => '/',
    'schemes' => [],
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
            '204' => 'Operation successfully done',
            '401' => 'Authentication is required and has failed or has not yet been provided.',
            '403' => 'The request contained valid data, but the server is refusing action. 
            May be you not having the necessary permissions for a resource',
            '404' => 'This entity not found',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Collector Class
    |--------------------------------------------------------------------------
    |
    | Class of data collector, which will collect and save documentation
    | It can be your own data collector class which should be inherited from
    | RonasIT\Support\AutoDoc\Interfaces\DataCollectorInterface interface,
    | or our data collectors from next packages:
    |
    | ronasit/local-data-collector
    | ronasit/laravel-remote-data-collector
    |
    | If config not set, will be using ronasit/local-data-collector
    */

    'data_collector' => \RonasIT\Support\AutoDoc\DataCollectors\LocalDataCollector::class,

    /*
    |--------------------------------------------------------------------------
    | Data Collector Class
    |--------------------------------------------------------------------------
    |
    |
    */
    'cache_collector_name' => '',
];
