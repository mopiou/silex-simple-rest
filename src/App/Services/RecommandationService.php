<?php

namespace App\Services;

class RecommandationService extends BaseService
{

    public function getRecommandations($id_user){
        return $this->db->fetchAll("SELECT * FROM recommandation where id_user=".$id_user." limit".$size);
    
    }
     function create($id_user){

        $date_registration= date('Y-m-d');

        $data = array(
        'id_user' => $id_user,
        'id_recommandation' => null,
        'id_cible' => $id_cible,
        'datefinish' => $date_registration
        );
    

        $this->db->insert('recommandation', $data);
        return $data;
      
    }

    function delete($id_recommandation){
        return $this->db->delete("recommandation", array("id_recommandation" => $id_recommandation));
    }
   
}
