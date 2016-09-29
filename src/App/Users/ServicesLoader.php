<?php

namespace App;

use Silex\Application;

class ServicesLoaderUsers
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainerUsers()
    {
        $this->app['users.service'] = $this->app->share(function () {
            return new Services\UsersService($this->app["db"]);
        });
    }
}

