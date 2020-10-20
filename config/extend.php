<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | The Extend API key to use for authentication requests.
    | You can find your API key at:
    | https://merchants.extend.com/dashboard/settings
    |
    */

    'api_key' => env('EXTEND_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Store ID
    |--------------------------------------------------------------------------
    |
    | Set the default store ID for all API calls.
    | If you have multiple stores, you can switch between stores using
    | the setStoreId() method.
    |
    */

    'store_id' => env('EXTEND_STORE_ID'),

    /*
    |--------------------------------------------------------------------------
    | Sandbox Mode
    |--------------------------------------------------------------------------
    |
    | Configure the client to use the Extend sandbox.
    |
    */

    'sandbox' => env('EXTEND_SANDBOX', false),

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | Changing this will allow you to use an older API version
    | This is not recommended, but can be useful to assist when migrating to
    | a newer API version.
    |
    */

    'api_version' => env('EXTEND_API_VERSION', '2020-08-01'),

];
