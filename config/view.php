<?php
// File: config/view.php

return [

    /*
    |--------------------------------------------------------------------------
    | View Paths
    |--------------------------------------------------------------------------
    |
    | The directories where the template files live
    |
    */

    'path' => realpath(__DIR__ . '/../resources/views'),

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | The directory where view engine will write the “compiled” PHP versions
    | of the templates.
    | 
    | NOTE: This directory must be writable by the web server
    |
    */

    'cache' => realpath(__DIR__ . '/../storage/cache'),

    /*
    |--------------------------------------------------------------------------
    | File Extension
    |--------------------------------------------------------------------------
    |
    | The file extension the templates files will use. 
    |
    */

    'extension' => 'view.php',

];
