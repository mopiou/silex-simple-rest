<?php

namespace App\Services;

class UsersService extends BaseService
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
