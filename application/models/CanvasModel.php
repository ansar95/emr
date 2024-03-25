<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CanvasModel extends CI_Model {

    public function saveToDatabase($data, $nolembar) {

        $dataubah = array(
			'gambar' => $data,
		);
        $this->db->where('nolembar', $nolembar);
		$this->db->limit(1);
		$dt2 = $this->db->update('emr_fisio', $dataubah);


        // Contoh pesan atau respons sukses
        // return "Gambar berhasil disimpan ke database.";
        return $dt2;
    }

    public function simpanKeTabelAsmed($data,$no_rm,$notransaksi) {

        $dataubah = array(
			'gambar' => $data,
		);
        $this->db->where('no_rm', $no_rm);
        $this->db->where('notransaksi', $notransaksi);
		$this->db->limit(1);
		$dt2 = $this->db->update('emr_asmedigd', $dataubah);


        // Contoh pesan atau respons sukses
        // return "Gambar berhasil disimpan ke database.";
        return $dt2;
    }
}
?>
