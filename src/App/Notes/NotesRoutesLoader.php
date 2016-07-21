<?php

namespace App\Notes;

use Silex\Application;

class NotesRoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
       echo "instantiate controller :) <br>";

        $this->app['notes.controller'] = $this->app->share(function () {
            echo "return inst";
            return new App\Notes\NotesController($this->app['notes.service']);
        });
    }

    public function bindRoutesToControllers()
    {


        $api = $this->app["controllers_factory"];

        $api->get('/notes', "notes.controller:getAll");
        $api->post('/notes', "notes.controller:save");
        $api->put('/notes/{id}', "notes.controller:update");
        $api->delete('/notes/{id}', "notes.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

