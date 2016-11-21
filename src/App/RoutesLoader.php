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

        $this->app['setting.controller'] = $this->app->share(function () {
            return new Controllers\SettingController($this->app['setting.service']);
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
        $api->get('/user', "users.controller:getAll");
        $api->get('/user/{id_user}', "users.controller:getUser");
        $api->post('/user', "users.controller:create");
        $api->put('/user/{id_user}', "users.controller:update");
        $api->put('/user/{id_user}/description', "users.controller:setDescription");
        $api->put('/user/{id_user}/setsex', "users.controller:setSex");
        $api->put('/user/{id_user}/super_like', "users.controller:setSuper_like");
        $api->delete('/user/{id_user}', "users.controller:delete");

//Fin users

//Setting

        $api->get('/setting/{id_user}', "setting.controller:getSetting");
        $api->put('/setting/{id_user}', "setting.controller:setSetting");

        $api->put('/setting/{id_user}/look_sex', "setting.controller:setLook_sex");
        $api->put('/setting/{id_user}/distance_max', "setting.controller:setDistance_max");
        $api->put('/setting/{id_user}/look_age_max', "setting.controller:setLook_age_max");
        $api->put('/setting/{id_user}/look_age_min', "setting.controller:setLook_age_min");
        $api->put('/setting/{id_user}/hide_profil', "setting.controller:setHide_profil");

//fin Setting

//Recommandation

        $api->get('/recommandation/{id_user},{size}', "recommandation.controller:getRecommandations");
        $api->post('/recommandation', "recommandation.controller:createRecommandation");
        $api->delete('/recommandation/{id_recommandation}', "recommandation.controller:deleteRecommandation");
    
//fin Recommandation


        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

