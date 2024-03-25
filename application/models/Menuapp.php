<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuapp extends CI_Model {
	
	public function depan() {
		$this->db->from("user_top_role")->order_by('urut');
		$this->db->order_by('urut');
		$data = $this->db->get();
		return $data->result();
	}

	public function pelayanan() {
		$this->db->from("user_pelayanan_role");
		$this->db->order_by('urut');
		$data = $this->db->get();
		return $data->result();
	}

	public function administrasi() {
		$this->db->from("user_adm_role");
		$this->db->order_by('urut');
		$data = $this->db->get();
		return $data->result();
	}

    public function backoffice() {
        $this->db->from("user_bo_role");
        $this->db->order_by('urut');
        $data = $this->db->get();
        return $data->result();
    }

	public function subpelayanan($d) {
		$this->db->from("user_subpelayanan_role");
		$this->db->where('id_pelayanan_role', $d);
		$this->db->order_by('urut');
		$data = $this->db->get();
		return $data->result();
	}

}
