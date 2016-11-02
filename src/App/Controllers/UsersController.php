<?php

namespace App\Controllers;
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

    public function getUser($id_user)
    {
        return new JsonResponse($this->usersService->getUser($id_user));
    } 

    public function create(Request $request)
    {
        // if (!$request->request->has('note')) {
        // return $app->json('Missing parameter: note', 400);
        // }

        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $email = $request->request->get("email");
        $id_genre = $request->request->get("id_genre");
        $age = $request->request->get("age");
        $description = $request->request->get("description");
        $password = $request->request->get("password");
        $ville = $request->request->get("ville");
        $date_inscription = $request->request->get("date_inscription");
        $super_like = $request->request->get("super_like");
       
        return new JsonResponse(array("id" => $this->usersService->create($prenom,$nom,$email,$id_genre,$age,$description,$password,$ville,$date_inscription,$super_like)));

    }
    
    public function setDescription($id_user,Request $request){

        $description = $request->request->get("description");    

        return $this->usersService->setDescription($id_user,$description);

    }



    public function update($id_user,Request $request)
    {


        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $email = $request->request->get("email");
        $id_genre = $request->request->get("id_genre");
        $age = $request->request->get("age");
        $description = $request->request->get("description");    
        $ville = $request->request->get("ville");


        // if (!$request->headers->get("note")) {
        //     return new Response('Missing parameter: note', 400);
        // }

        // if ($new_note <0) {
        //     return new Response('Parametere Negatif: note', 400);
        // }

   
        return $this->usersService->update( $id_user,$prenom,$nom,$email,$id_genre,$age,$description,$ville);
    
    }

    public function delete($id_user)
    {
        return new JsonResponse($this->usersService->delete($id_user));

    }

    // public function getDataFromRequest(Request $request)
    // {
    //     return $note = array(
    //         "note" => $request->request->get("note")
    //     );
    // }
}
