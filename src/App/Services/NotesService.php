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

        // $this->db->set('id_note', $id_note);
        // $this->db->set('note', $note);
        // $this->db->insert('notes');

        // return $note;
        var_dump($note);

        //SOLUTION mais renvoie null et ajout null en argument en base

        $data = array(
        'id_note' => '$id_note',
        'note' => '$note'
        );

        $this->db->insert('notes', $data);
        return ;

        //fin solution

        $result =$this->db->insert_batch($data);
        //$this->db->insert("notes", $id_note,$note);
        //$this->db->insert("notes", $note);
        //$this->db->insert('notes', ['id_note' => $id_note],['note' => $note]);
        return $result;


        //marche mais c'est de la merde

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
