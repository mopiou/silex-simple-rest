<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['notes.controller'] = $this->app->share(function () {
            return new Controllers\NotesController($this->app['notes.service']);
        });

        $this->app['users.controller'] = $this->app->share(function () {
            return new Controllers\UsersController($this->app['users.service']);
        });
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

//notes
        $api->get('/notes', "notes.controller:getAll");
        $api->post('/notes', "notes.controller:create");
        $api->put('/notes/{id_note}', "notes.controller:update");
        $api->delete('/notes/{id_note}', "notes.controller:delete");
//fin notes

//users
        $api->get('/users', "users.controller:getAll");
        $api->get('/users/{id_user}', "users.controller:getUser");
        $api->post('/users', "users.controller:create");
        $api->put('/users/{id_user}', "users.controller:update");
        $api->delete('/users/{id_user}', "users.controller:delete");

//Fin users

//

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

