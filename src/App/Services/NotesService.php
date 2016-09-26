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

        $this->db->set('id_note', $id_note);
        $this->db->set('note', $note);
        $this->db->insert('notes');

        return $note;

        $data = array(
        'id_note' => '$id_note',
        'note' => '$note'
        );


        $result =$this->db->insert($data);
        //$this->db->insert("notes", $id_note,$note);
        //$this->db->insert("notes", $note);
        //$this->db->insert('notes', ['id_note' => $id_note],['note' => $note]);
        return $result;


        //$requete= $this->db->query('INSERT INTO notes VALUES ("'.$id_note.'","'.$note.'")');
        
        //$requete =$requete->fetch();
        //return var_dump($requete);
       // return $requete;

      
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
