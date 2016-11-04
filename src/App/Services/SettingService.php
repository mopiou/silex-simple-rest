<?php

namespace App\Services;

class SettingService extends BaseService
{

    public function getSetting($id_user){
        return $this->db->fetchAll("SELECT * FROM setting where id_user=".$id_user);
    
    }
    //  function create($id_user,$look_sex,$hide_profil,$distance_max,$look_age_max,$look_age_min){

    //     $data = array(
    //     'id_user' => $id_user,
    //     'look_sex' => $look_sex,
    //     'hide_profil' => $hide_profil,
    //     'distance_max' => $distance_max,
    //     'look_age_max' => $look_age_max,
    //     'look_age_min' => $look_age_min
    //     );
    

    //     $this->db->insert('setting', $data);
    //     return $data;
      
    // }

    function setLook_sex($id_user,$look_sex) {
        $data = array(
        'look_sex' => $look_sex 
        );
        return $this->db->update('setting', $data, array('id_user' => $id_user));
    }

    function setDistance_max($id_user,$distance_max) {
        $data = array(
        'distance_max' => $distance_max 
        );
            
        return $this->db->update('setting', $data, array('id_user' => $id_user));
    }

     function setLook_age_max($id_user,$look_age_max) {
        $data = array(
        'look_age_max' => $look_age_max 
        );
            
        return $this->db->update('setting', $data, array('id_user' => $id_user));
    }
     function setLook_age_min($id_user,$look_age_min) {
        $data = array(
        'look_age_min' => $look_age_min 
        );
            
        return $this->db->update('setting', $data, array('id_user' => $id_user));
    }
     function setHide_profil($id_user,$hide_profil) {
        $data = array(
        'hide_profil' => $hide_profil 
        );
            
        return $this->db->update('setting', $data, array('id_user' => $id_user));
    }
   
}
