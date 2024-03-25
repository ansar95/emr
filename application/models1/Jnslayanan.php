<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jnslayanan extends CI_Model {

    public function full() {
        $this->db->from("mjenislayanan");
        $data = $this->db->get();
        return $data->result();
    }

}
