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

    public function save(Request $request)
    {

        $note = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->notesService->save($note)));

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

     public function teste_connection(Request $request){

        //$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        //var_dump($request->get('id_user'));
        $email =$request->request->get("email");
        $password =$request->request->get("password");
        //$request->request->get('form_name')['name'];

        //var_dump($request->request);
            //die(var_dump($request->request->get('name')));


        return new JsonResponse($this->notesService->teste_connection($email,$password));

       // return new JsonResponse(array("id" => $this->notesService->save($note)));

    }

    // public function teste_connection($email,$password){

    //    return new JsonResponse($this->notesService->teste_connection($email,$password));
        
    // }


}
