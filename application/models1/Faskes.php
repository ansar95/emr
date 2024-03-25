<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faskes extends CI_Model {

    public function full() {
        $this->db->from("mfaskes");
        $data = $this->db->get();
        return $data->result();
    }

   

}