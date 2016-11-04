<?php

namespace App\Services;

class UsersService extends BaseService
{

    public function getAll(){
        return $this->db->fetchAll("SELECT * FROM user");
         //return $this->db->get('user');

    }


    public function getUser($id_user){
        return $this->db->fetchAll("SELECT * FROM user where id_user=".$id_user);
      
      //return $this->db->get("user", array("id_user" => $id_user)); 
     // $this->db->get('user');
   //  return $this->db->where('id_user', $id_user);

    }

    function create($id_facebook,$prenom,$nom,$email,$id_sex,$age,$description){
        
        $date_registration= date('Y-m-d');

        $data = array(
        'id_user' => 'default',
        'id_facebook' => $id_facebook,
        'id_sex' => $id_sex,
        'prenom' => $prenom,
        'nom' => $nom,
        'email' => $email,
        'age' => $age,
        'description' => $description,
        'date_registration' => $date_registration,
        'super_like' => 0
        );

        $this->db->insert('user', $data);
        return $this->db->lastInsertId();
        
      
    }
     function createSetting($id_user,$look_sex){

        $data = array(
        'id_user' => $id_user,
        'look_sex' => $look_sex,
        'hide_profil' => 0,
        'distance_max' => 15,
        'look_age_max' => 55,
        'look_age_min' => 18
        );
    

        $this->db->insert('setting', $data);
        
        return $data;
      
    }

    

    function update($id_user,$prenom,$nom,$email,$id_sex,$age,$description){

        $data = array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'id_sex' => $id_sex,
        'age' => $age,
        'description' => $description      
        );
        return $this->db->update('user', $data, array('id_user' => $id_user));
    }

    function setSex($id_user,$id_sex) {
        $data = array(
        'id_sex' => $id_sex 
        );
        return $this->db->update('user', $data, array('id_user' => $id_user));
    }

    function setDescription($id_user,$description) {
        $data = array(
        'description' => $description 
        );
            
        return $this->db->update('user', $data, array('id_user' => $id_user));
    }

    function setSuper_like($id_user,$super_like) {
        $data = array(
        'super_like' => $super_like 
        );
            
        return $this->db->update('user', $data, array('id_user' => $id_user));
    }
    
    function delete($id_user){
        $this->db->delete("notes", array("id_user" => $id_user));
        return $this->db->delete("user", array("id_user" => $id_user));
    }

}
