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

        $id = array(
            "id_note" => $request->request->get("note")
        );

        $note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->notesService->create($note,$id)));

    }

    public function update($id, Request $request)
    {
        $note = $this->getDataFromRequest($request);
        $this->notesService->update($id, $note);
        return new JsonResponse($note);

    }

    public function delete($id)
    {

        return new JsonResponse($this->notesService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $note = array(
            "note" => $request->request->get("note")
        );
    }
}
