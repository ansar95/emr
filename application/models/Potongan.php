<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Model {
    public function get()
    {
        $this->db->from("potongan_resep");
		$data = $this->db->get();
		return $data->result();
    }

    public function ambilpotongan($id)
    {
        $this->db->select("resep_potongan.id,resep_potongan.id_potongan,potongan_resep.persentase_potongan");
        $this->db->from("resep_potongan");
        $this->db->where("noresep", $id)
            ->join('potongan_resep', 'resep_potongan.id_potongan = potongan_resep.id');
        $data = $this->db->get();
        return $data->result();
    }

    public function simpan_potongan_resep($dtnotrans)
    {
        if ($this->input->get("potongan"))
        {
            $noresep = ($this->input->get("norep") == "") ? $dtnotrans[2] : $this->input->get("norep");

            $data = array();
            $data['noresep'] = $noresep;
            $data['id_potongan'] = $this->input->get("potongan");
            $this->db->insert("resep_potongan", $data);
        }
    }
    
}