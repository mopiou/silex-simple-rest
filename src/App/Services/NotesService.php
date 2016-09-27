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

    function update($id, $note)
    {
        return $this->db->update('notes', $note, ['id_note' => $id]);
    }

    function delete($id)
    {
        return $this->db->delete("notes", array("id_note" => $id));
    }

}
