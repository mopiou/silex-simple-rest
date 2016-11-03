<?php

namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {

        $this->app['users.service'] = $this->app->share(function () {
            return new Services\UsersService($this->app["db"]);
        });

        $this->app['notes.service'] = $this->app->share(function () {
            return new Services\NotesService($this->app["db"]);
        });

        $this->app['setting.service'] = $this->app->share(function () {
            return new Services\SettingService($this->app["db"]);
        });

    }


}

