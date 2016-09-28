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
        $note = $request->request->get("note");

        //$note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->notesService->create($note,$id)));

    }

    public function update($id_note,$new_note ,Request $request)
    {
   
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

    public function update2($id_note,Request $request)
    {

        print_r($id_note);
        print_r('note=');

        $new_note = $request->headers->get("note");
        print_r($new_note);
   
        return $this->notesService->update($id_note,$new_note);
    

    }
}
