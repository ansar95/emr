<?php 
class Uploadfile_model extends CI_Model {
    public function insert_file($data) {
        $this->db->insert('uploadfile', $data);
        return $this->db->insert_id();
    }
}

