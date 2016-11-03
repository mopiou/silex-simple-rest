<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SettingController
{

    protected $settingService;

    public function __construct($service)
    {
        $this->settingService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->settingService->getAll());
    }

    public function create(Request $request)
    {
        if (!$request->request->has('note')) {
        return $app->json('Missing parameter: note', 400);
        }

        $id = $request->request->get("id_note");
        $id_user = $request->request->get("id_user");
        $note = $request->request->get("note");

        //$note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->settingService->create($id,$id_user,$note)));

    }

    public function update($id_note,Request $request)
    {
        $new_note = $request->request->get("note");

        if (!$request->request->get("note")) {
            return new Response('Missing parameter: note', 400);
        }

        if ($new_note <0) {
            return new Response('Parametere Negatif: note', 400);
        }

        print_r($id_note);
        print_r('note=');
        print_r($new_note);
   
        return $this->settingService->update($id_note,$new_note);
    
    }

    public function delete($id_note)
    {
    
        return new JsonResponse($this->settingService->delete($id_note));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
