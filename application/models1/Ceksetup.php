<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ceksetup extends CI_Model {
	
	public function full() {
		$this->db->from("setup");
		$data = $this->db->get();
		return $data->result();
	}

    public function cekantrian() {
        $this->db->from('setup')
            ->select('cekantrol');
        $data = $this->db->get();
        return $data->result();
    }

}
