<?php

namespace App\Services;

class NotesService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM user");
    }

    function create($note,$id_note)
    {
        // $this->db->insert("notes", $id_note);
        // $this->db->insert("note  s", $note);
        
        // return $note;


        $requete= $this->db->query('INSERT INTO notes VALUES ('$id_note','$note')');
        //$requete->execute(array($id_note,$note));
        $requete =$requete->fetch();
       
        return $requete;
        //return $this->db->lastInsertId();

        // $query = $this->db->query('
        //         INSERT INTO   
        //         notes VALUES
        //         id_notes="'.$id.'" , note="'.$note.'" 
        //     ');

        //     $promotion = $query->fetch();
            
        //     return $promotion;
    }

    function update($id, $note)
    {
        return $this->db->update('notes', $note, ['id' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("notes", array("id" => $id));
    }

}
