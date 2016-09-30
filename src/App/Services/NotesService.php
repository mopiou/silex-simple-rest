<?php

namespace App\Services;

class NotesService extends BaseService
{

    public function getAll()
    {
        return $this->db->fetchAll("SELECT * FROM notes");
    }

    function create($id_note,$id_user,$note)
    {
        
        $data = array(
        'id_note' => $id_note,
        'id_user' => $id_user,
        'note' => $note
        );

        $this->db->insert('notes', $data);
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
