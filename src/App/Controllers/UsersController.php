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

    public function create(Request $request){
        
        $id_facebook = $request->request->get("id_facebook");
        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $email = $request->request->get("email");
        $id_sex = $request->request->get("id_sex");
        $age = $request->request->get("age");
        $description = $request->request->get("description");

        //création de la table user
        $result = new JsonResponse(array("id" => $id_user=$this->usersService->create($id_facebook,$prenom,$nom,$email,$id_sex,$age,$description)));
        
        //création de la table setting par defaut quand on creer un user
        if($id_sex=="M"){
            $this->usersService->createSetting($id_user,"F");
        }else{
            $this->usersService->createSetting($id_user,"M");
        }
        
        return $result;

    }
    
    public function setDescription($id_user,Request $request){

        $description = $request->request->get("description");    
        return $this->usersService->setDescription($id_user,$description);

    }
    
    public function setSuper_like($id_user,Request $request){

        $super_like = $request->request->get("super_like");    
        return $this->usersService->setSuper_like($id_user,$super_like);
    }
    
    public function setSex($id_user,Request $request){

        $id_sex = $request->request->get("id_sex");
        return $this->usersService->setSex($id_user,$id_sex);
    }

    public function update($id_user,Request $request){

        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $email = $request->request->get("email");
        $id_sex = $request->request->get("id_sex");
        $age = $request->request->get("age");
        $description = $request->request->get("description");    

        // if (!$request->headers->get("note")) {
        //     return new Response('Missing parameter: note', 400);
        // }
        // if ($new_note <0) {
        //     return new Response('Parametere Negatif: note', 400);
        // }

        return $this->usersService->update( $id_user,$prenom,$nom,$email,$id_sex,$age,$description);
    }

    public function delete($id_user){

        return new JsonResponse($this->usersService->delete($id_user));
    }

}
