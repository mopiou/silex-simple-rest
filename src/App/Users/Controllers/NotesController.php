<?php

namespace App\Users\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UsersController
{

    protected $usersService;

    public function __construct($service)
    {
        $this->usersService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->usersService->getAll());
    } 

    public function create(Request $request)
    {
        if (!$request->request->has('note')) {
        return $app->json('Missing parameter: note', 400);
        }

        $id = $request->request->get("id_note");
        $note = $request->request->get("note");

        //$note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->usersService->create($note,$id)));

    }

    public function update($id_note,Request $request)
    {
        $new_note = $request->headers->get("note");

        if (!$request->headers->get("note")) {
            return new Response('Missing parameter: note', 400);
        }

        if ($new_note <0) {
            return new Response('Parametere Negatif: note', 400);
        }

        print_r($id_note);
        print_r('note=');
        print_r($new_note);
   
        return $this->usersService->update($id_note,$new_note);
    
    }

    public function delete($id_note)
    {
        return new JsonResponse($this->usersService->delete($id_note));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
