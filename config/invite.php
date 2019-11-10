<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Places Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default options for places. You may change these defaults
    | as required.
    |
    */

    'defaults' => [
        'driver' => 'excel'
    ],

    /*
    |--------------------------------------------------------------------------
    | Place Providers
    |--------------------------------------------------------------------------
    |
    | This defines various providers configurations for place
    | The following providers are currently supported
    |
    | Supported: "excel"
    */

    'providers' => [
        'excel' => [
            'driver' => Maatwebsite\Excel\ExcelServiceProvider::class
        ],
    ],

    'table_names' => [
        'invites' => 'invites',
        'invite_sources' => 'invite_sources',
    ]
];