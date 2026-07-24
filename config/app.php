<?php

return [

    'disk' => 'public',

    'support' => [
        'phone' => env('SUPPORT_PHONE'),
        'whatsapp' => env('SUPPORT_WHATSAPP'),
        'email' => env('SUPPORT_EMAIL'),
    ],

    /*
    |--------------------------------------------------------------------------
    | SMS Gateway Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for the SMS gateway service used to send text messages
    | such as OTPs and notifications.
    |
    | Supported Keys:
    | - base_url:  The root API endpoint of the SMS gateway
    | - api_key:   Private API key for authentication
    | - sender_id: The sender name/ID displayed in the message
    | - type:      Message format ('text', 'unicode', etc.)
    | - enabled:   Enable or disable SMS sending
    |
    | Example usage:
    | Http::baseUrl(config('app.sms.base_url'))->post('/api/smsapi', [...])
    |
    */
    'sms' => [
        'base_url'  => env('SMS_BASE_URL', 'https://bulksmsbd.net'),
        'api_key'   => env('SMS_API_KEY'),
        'sender_id' => env('SMS_SENDER_ID', 'SENDER'),
        'type'      => env('SMS_TYPE', 'text'),
        'enabled'   => env('SMS_ENABLED', false),
    ],


    /*
    |--------------------------------------------------------------------------
    | Shipping & Tax
    |--------------------------------------------------------------------------
    |
    | Default shipping cost and tax rate applied to orders.
    |
    */
    'tax'      => 0,

    'shipping' => [
        'Dhaka' => 80,
        'Chattogram' => 150,
        'Rajshahi' => 130,
        'Khulna' => 120,
        'Barishal' => 160,
        'Sylhet' => 110,
        'Rangpur' => 120,
        'Mymensingh' => 100,
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
