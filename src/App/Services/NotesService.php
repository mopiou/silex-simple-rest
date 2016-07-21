<?php

namespace App\Services;

class NotesService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM user");
    }

    function save($note)
    {
        $this->db->insert("notes", $note);
        return $this->db->lastInsertId();
    }

    function update($id, $note)
    {
        return $this->db->update('notes', $note, ['id' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("notes", array("id" => $id));
    }


    public function teste_connection($email,$password){

            $prepare = $this->db->prepare('
                SELECT 
                    *
                FROM 
                    user
                WHERE 
                    email= :email
                AND
                    password= :password
            ');
            $prepare->bindValue('email',$email);
            $prepare->bindValue('password',$password);
            $prepare->execute();

            $user = $prepare->fetch();
            return $user;
        }

}
