<?php

namespace Jmalko\Constantcontact;
use Statamic\Facades\YAML;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use PHPFUI\ConstantContact\V3\ContactLists;
use PHPFUI\ConstantContact\V3\Contacts\SignUpForm;
use PHPFUI\ConstantContact\Definition\ContactCreateOrUpdateInput;

class Utils {

    public static function makeClient()
    {
        // make empty client with API credentials

        $client = new \PHPFUI\ConstantContact\Client(
            config('constantcontact.api'),
            config('constantcontact.secret'),
            config('constantcontact.callback_url'),
        );

        // fill client with auth keys
        
        // No data? Authorize and save some keys.

        if (!Storage::disk('local')->exists('constantcontact.yaml'))
        {
            self::saveAccessToken();
        }

        // Load data

        $data = YAML::parse(Storage::disk('local')->get('constantcontact.yaml'));

        // Load tokens into client

        $client->accessToken = $data['access_token'];
        $client->refreshToken = $data['refresh_token'];

        // Check for expired access_keys
        
        $client->expired = (Carbon::createFromTimestamp($data['expires_at'])->isFuture()) ? false : true;

        return $client;

    }

    public static function authorize($client)
    {
        header('Location: '.$client->getAuthorizationURL());
        die();
    }

    public static function refreshTokens($client)
    {
        // Has the token expired?  Fetch a new one.

        if ($client->expired)
        {
            $client->refreshToken();
            self::saveAccessToken($client);
        }

        return $client;

    }

    public static function saveAccessToken($client = null)
    {
        if (!$client) {
            $data = [
                'access_token' => 'Error',
                'refresh_token' => 'Error',
                'expires_at' => Carbon::now()->addHours(1)->timestamp
            ];
        } else {
            $data = [
                'access_token' => $client->accessToken ?: 'Error',
                'refresh_token' => $client->refreshToken ?: 'Error',
                'expires_at' => Carbon::now()->addHours(1)->timestamp
            ];
        }

        Storage::disk('local')->put('constantcontact.yaml', YAML::dump($data));

        return;
    }

    public static function fetchAccount($client)
    {
        $data = new \PHPFUI\ConstantContact\V3\Account\Summary($client);
        return $data->get();

    }

    public static function fetchLists($client)
    {
        $client = self::refreshTokens($client);
        $lists = new ContactLists($client);
        return $lists->get()['lists'];
    }

    public static function createContact($client, $input)
    {
        $client = self::refreshTokens($client);

        $data = new ContactCreateOrUpdateInput();
        $data->email_address = "jon.malko@gmail.com";
        $data->list_memberships = $list_ids;

        $signUpForm = new SignUpForm($client);
        return $signUpForm->post($data);
    }

}