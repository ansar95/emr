<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icddata extends CI_Model {

    public function full($id) {
        $this->db->from("micd1");
        $this->db->where("icd_code", ''.$id.'');
        $data = $this->db->get();
        return $data->row();
    }

    public function ambilicd_tes() {
        $this->db->select("icd_code, jenis_penyakit as jenis_penyakit_local");
        $this->db->from("micd1");
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilicd() {
        $this->db->select("icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilicdfilter_old($q) {
        $this->db->select("icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
        $this->db->like('jenis_penyakit_local', $q);
        $data = $this->db->get();
        return $data->result();
    }

    // public function ambilicdfilter($q) {
    //     $this->db->select("icd_code, jenis_penyakit");
    //     $this->db->from("micd");
    //     $this->db->where("jenis_penyakit is NOT NULL");
    //     $this->db->like('jenis_penyakit', $q);
    //     $this->db->or_like('icd_code', $q);
    //     $data = $this->db->get();
    //     return $data->result();
    // }

    public function ambilicdfilter($q) {
        $this->db->select("icd_code, jenis_penyakit_local");
        $this->db->from("micd1");
        $this->db->where("jenis_penyakit_local is NOT NULL");
        $this->db->like('jenis_penyakit_local', $q);
        $this->db->or_like('icd_code', $q);
        $data = $this->db->get();
        return $data->result();
    }

}
