<?php

return [

    /**
     * Google key for authentication
     */
    'api_key' => env('GOOGLE_TRANSLATE_APIKEY', false),

    /**
     * Url to translation REST service
     */
    'translate_url' => 'https://translation.googleapis.com/language/translate/v2',

    /**
     * Url to language detection REST service
     */
    'detect_url' => 'https://translation.googleapis.com/language/translate/v2/detect'
];
