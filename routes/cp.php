<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jmalko\Constantcontact\Utils;

Route::prefix('constantcontact')->group(function() {

    Route::get('/', function() {
        $client = Utils::makeClient();
        $account = Utils::fetchAccount($client) ?: [];
        return view('constantcontact::index', [
            'access_token' => $client->accessToken,
            'account' => $account
        ]);
    });

    Route::get('/auth', function(Request $request) {
        Utils::authorize(Utils::makeClient());
    });

    Route::get('/lists', function() {

        $lists = collect(Utils::fetchLists(Utils::makeClient()))->mapWithKeys(function($item, $key) {
            return [$item['list_id'] => __($item['name'])];
        })->toArray();

        dd($lists);
    });

    Route::get('/callback', function(Request $request) {
        $client = Utils::makeClient();
        $client->acquireAccessToken($request->get('code'));
        Utils::saveAccessToken($client);
        return redirect('/cp/constantcontact/');
    });

    Route::get('/logout', function(Request $request) {
        Utils::saveAccessToken();
        return redirect('/cp/constantcontact');
    });

});