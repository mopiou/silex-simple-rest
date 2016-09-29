<?php

namespace App\Services;

class UsersService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM user");
    }

    function create($prenom,$nom,$email,$id_genre,$age,$description,$password,$ville,$date_inscription,$super_like)
    {
        
        $data = array(
        'id_user' => 'default',
        'prenom' => $prenom,
        'nom' => $nom,
        'email' => $email,
        'id_genre' => $id_genre,
        'age' => $age,
        'description' => $description,
        'password' => $password,
        'ville' => $ville,
        'date_inscription' => $date_inscription,
        'super_like' => $super_like
        );

        $this->db->insert('user', $data);
        return $data;
      
    }

    function update($id_note, $note)
    {
     
        $data = array(
        'note' => $note
        );

        return $this->db->update('notes', $data, array('id_note' => $id_note));

    }

    function delete($id_note)
    {
        return $this->db->delete("notes", array("id_note" => $id_note));
    }

}
