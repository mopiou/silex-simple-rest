<?php

namespace App;

use Silex\Application;

class RoutesLoaderUsers
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['users.controller'] = $this->app->share(function () {
            return new Controllers\UsersController($this->app['users.service']);
        });
    }

    public function bindRoutesToControllersUsers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/users', "users.controller:getAll");
        $api->post('/users', "users.controller:create");
        $api->put('/users/{id_note}', "users.controller:update");
        $api->delete('/users/{id_note}', "users.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

