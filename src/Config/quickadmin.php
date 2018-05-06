<?php
/**
 * Laraveldaily/Quickadmin package configuration file.
 */
return [

    /**
     * Datepicker configuration:
     */
    'date_format'        => 'Y-m-d',
    'date_format_jquery' => 'yy-mm-dd',
    'time_format'        => 'H:i:s',
    'time_format_jquery' => 'HH:mm:ss',

    /**
     * Quickadmin settings
     */
    // Default route
    'route'              => 'admin',
    // Default home route
    'homeRoute'          => 'admin',

    //Default home action
    // 'homeAction' => '\App\Http\Controllers\MyOwnController@index',
    // Default role to access users and CRUD
    'defaultRole'        => 1,
    'systemcommnad' => [
        'cache:clear' => 'Application Cache',
        'view:clear' => 'Clear all compiled view filese',
        'config:clear' => 'Configuration Cache',
        'clear-compiled' => 'Remove the compiled class file',
        'down' => 'Put the application into maintenance mode',
        'up' => 'Bring the application out of maintenance mode',
        'route:cache' => 'Create a route cache file for faster route registration',
        'route:clear' => 'Remove the route cache file',
    ]
];