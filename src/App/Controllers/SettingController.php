<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController{

    protected $settingService;

    public function __construct($service)
    {
        $this->settingService = $service;
    }

    public function getSetting($id_user) {
        return new JsonResponse($this->settingService->getSetting($id_user));

    }

    public function setSetting($id_user,Request $request) {
        
        $look_sex = $request->request->get("look_sex");    
        $distance_max = $request->request->get("distance_max");    
        $look_age_max = $request->request->get("look_age_max");    
        $look_age_min = $request->request->get("look_age_min");    
        $hide_profil = $request->request->get("hide_profil");    


        return $this->settingService->setSetting($id_user,$look_sex,$distance_max,$look_age_max,$look_age_min,$hide_profil);

    }

    public function setLook_sex($id_user,Request $request){

        $look_sex = $request->request->get("look_sex");    
        return $this->settingService->setLook_sex($id_user,$look_sex);
    }
    public function setDistance_max($id_user,Request $request){

        $distance_max = $request->request->get("distance_max");    
        return $this->settingService->setDistance_max($id_user,$distance_max);
    }
    public function setLook_age_max($id_user,Request $request){

        $look_age_max = $request->request->get("look_age_max");    
        return $this->settingService->setLook_age_max($id_user,$look_age_max);
    }
    public function setLook_age_min($id_user,Request $request){

        $look_age_min = $request->request->get("look_age_min");    
        return $this->settingService->setLook_age_min($id_user,$look_age_min);
    }

    public function setHide_profil($id_user,Request $request){

        $hide_profil = $request->request->get("hide_profil");    
        return $this->settingService->setHide_profil($id_user,$hide_profil);
    }

}
