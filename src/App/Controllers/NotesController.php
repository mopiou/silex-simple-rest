<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class NotesController
{

    protected $notesService;

    public function __construct($service)
    {
        $this->notesService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->notesService->getAll());
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
        return new JsonResponse(array("id" => $this->notesService->create($id,$id_user,$note)));

    }

    public function update($id_note,Request $request)
    {

        return var_dump($request);
        
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
   
        return $this->notesService->update($id_note,$new_note);
    
    }

    public function delete($id_note)
    {
    
        return new JsonResponse($this->notesService->delete($id_note));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
