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
        
        $data = array(
        'id_note' => $id_note,
        'note' => $note
        );

        $this->db->insert('notes', $data);
        return $data;
      
    }

    function update($id_note, $note)
    {
        print_r($id_note);
        print_r($note);

        $data = array(
        'note' => $note
        );



        // $this->db->set('note', $note);
        // $this->db->where('id_note', $id_note);
        // $this->db->update('notes');

        // return $note;
 


        return $this->db->update('notes', $data, array('id_note' => $id_note));


      

        // $this->db->where('id_note', $id_note);
        // $this->db->update('notes', $data);
        // return $data;


        //return $this->db->update('notes', $new_note, "id_note = ".$id_note);


        //return $this->db->update('notes', $data, "id_note = 29");


    }

    function delete($id_note)
    {
        return $this->db->delete("notes", array("id_note" => $id_note));
    }

}
