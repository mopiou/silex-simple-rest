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



        // $this->db->set('field', 'field+1');
        // $this->db->where('id', 2);
        // $this->db->update('mytable');




      

        // $this->db->where('id_note', $id_note);
        // $this->db->update('notes', $data);
        // return $data;


        //return $this->db->update('notes', $new_note, "id_note = ".$id_note);


        return $this->db->update('notes', $data, "id_note = 29");

        //return $this->db->update('notes', $new_note, array('id_note' => $id_note));

    }

    function delete($id_note)
    {
        return $this->db->delete("notes", array("id_note" => $id_note));
    }

}
