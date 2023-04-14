<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Firmware Upload Token
    |--------------------------------------------------------------------------
    |
    | This value is the token to upload a new firmware version.
    |
    */

    'token' => env('FIRMWARE_UPLOAD_TOKEN'),
];
