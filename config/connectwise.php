<?php

return [
    'auth' => [
        'company_id' => env('CW_COMPANY_ID'),
        'private_key' => env('CW_PRIVATEKEY'),
        'public_key' => env('CW_PUBLICKEY'),
        'client_id' => env('CW_CLIENT_ID'),

    ],
    'base_uri' => env('CW_API_VERSION_BASEURL'),
    'location_name' => env('CW_HOMEOFFICE_LOCATION')
];
