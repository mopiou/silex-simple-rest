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
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/notes', "notes.controller:getAll");
        $api->post('/notes', "notes.controller:create");

        $api->put('/notes/{id_note}', "notes.controller:update2");

        $api->put('/notes/{id_note}/{new_note}', "notes.controller:update");
        $api->delete('/notes/{id_note}', "notes.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

