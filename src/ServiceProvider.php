<?php

namespace Jmalko\Constantcontact;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Facades\Config;
use Jmalko\Constantcontact\Fieldtypes\ConstantContact;

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
