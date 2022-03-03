<?php

namespace Jmalko\Constantcontact;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\Config;
use Jmalko\Constantcontact\Fieldtypes\ConstantContact;

/*
*   Enable php native sessions for use with phpfui/ConstantContact 22.3 and OAuth2 PCKE
*/

session_start();


class ServiceProvider extends AddonServiceProvider
{
    protected $scripts = [
        __DIR__.'/../dist/js/cp.js'
    ];
    protected $fieldtypes = [
        ConstantContact::class,
    ];

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    public function bootAddon()
    {
    }
}
