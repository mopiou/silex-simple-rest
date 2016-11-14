<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RecommandationController{

    protected $recommandationService;

    public function __construct($service)
    {
        $this->recommandationService = $service;
    }

    public function getRecommandations($id_user,$size) {

        if($size ==null){
            $size==20;
        }

        return new JsonResponse($this->recommandationService->getRecommandations($id_user,$size));

    }
    public function createRecommandation(Request $request){
        
        $id_user = $request->request->get("id_user");
       
        $result = new JsonResponse(array("id" => $id_user=$this->recommandationService->create($id_facebook,$prenom,$nom,$email,$id_sex,$age,$description)));
        

        return $result;

    }
   public function deleteRecommandation($id_recommandation){

        return $this->recommandationService->deleteRecommandation($id_recommandation);
    }
  
}
