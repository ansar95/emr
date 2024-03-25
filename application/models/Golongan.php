<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Model {
	
	public function full() {
		$this->db->from("golongan");
		$data = $this->db->get();
		return $data->result();
	}

    public function dataasuransi($id) {
        $this->db->from('masuransi')
            ->select('kode_asuransi, nama_asuransi')
            ->where('golongan', $id);
        $data = $this->db->get();
        return $data->result();
    }

    // tambahan
    public function listgolongan() {
	    $this->db->select("golongan");
        $this->db->from("golongan");
        $data = $this->db->get();
        return $data->result();
		}
		
		// public function didactive() {
		// 	$id = $this->input->get("id");
		// 	$status = $this->input->get("status");

		// 	$dataedit = array(
		// 		'is_active' => filter_var($status, FILTER_VALIDATE_BOOLEAN)
		// 	);
		// 	$this->db->where("id", $id);
		// 	$dt = $this->db->update("user_master", $dataedit);
		// 	return $dt;

        // }
    // end of tambahan

}
