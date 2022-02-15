<?php

//
// CONSTANT CONTACT V3 API
//
// If you wish to have your own rate-limit window, please sign up for your own API key and secret at:
// https://v3.developer.constantcontact.com
//
// Otherwise it is entirely acceptable to use the default API key / secret!
// 
// Access tokens are good for 1-2 hours and Renew tokens are one-time use but do not expire.
// These keys are stored in ./storage/app/constantcontact.yaml
// If you wish to de-authenticate the account, either 'Logout' or delete that key file.
//
//

return [
    'api' => env('CONSTANT_CONTACT_V3_APIKEY') ?: "200469cb-15d7-4bb1-ac21-4d57492e6337",
    'secret' => env('CONSTANT_CONTACT_V3_SECRET') ?: "4nQoR3tbWgSo4GkoYmRsLw",
    'callback_url' => url('/cp/constantcontact/callback/')
];