<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuanganmdl extends CI_Model {
	
	public function pbf() {
		$this->db->from("mpbf");
		$this->db->select('kode, nama');
		$data = $this->db->get();
		return $data->result();
	}

    public function koderek() {
        $this->db->from("mkoderek");
        $this->db->select('id, koderekening');
        $data = $this->db->get();
        return $data->result();
    }

    public function rekakuntansi() {
        $this->db->from("mrekening");
        $this->db->select('kode, rekening');
        $data = $this->db->get();
        return $data->result();
    }

    public function reklra() {
        $this->db->from("mrekening");
        $this->db->select('kodeanggaran, namaanggaran');
        $data = $this->db->get();
        return $data->result();
    }

    // Master Rekening
    function count_rekening() {
        $query = $this->db->get("mrekening");
        return $query->num_rows();
    }

    function fetch_rek($limit, $start) {
        $output = '';
        $this->db->select("kode, rekening, dk, induk, is1, sawaltahun, sawalanggaran, subkelompok, kelompok, tglbuat, idrek");
        $this->db->from("mrekening");
        $this->db->order_by("rekening", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th>No. Rekening</th>
            <th>Nama Rekening</th>
            <th>Debit / Kredit</th>
            <th>Induk / Sub</th>
            <th>Rekening Induk</th>
            <th>Saldo Awal Rekening</th>
            <th>Saldo Awal Anggaran</th>
            <th>Sub Kelompok Neraca</th>
            <th>Kelompok</th>
            <th>Tgl. Buat</th>
            <th>Proses</th>
		</tr>
		';
        $no = $start;
        $id = $this->session->userdata("idx");
        foreach($query->result() as $row) {
            if (ceksess("EDIT", $id) == TRUE) {
                $edit = '<a onclick="panggiledit('.$row->idrek.')" >Ubah Data</a>';
            } else {
                $edit = "";
            }
            if (ceksess("DEL", $id) == TRUE) {
                $del = '<a >Hapus</a>';
            } else {
                $del = "";
            }
            $output .= '
            <tr>
                <td>'.$row->kode .'</td>
                <td>'.$row->rekening.'</td>
                <td>'.$row->dk.'</td>
                <td>'.$row->is1.'</td>
                <td>'.$row->induk.'</td>
                <td>'.$row->sawaltahun .'</td>
                <td>'.$row->sawalanggaran.'</td>
                <td>'.$row->subkelompok.'</td>
                <td>'.$row->kelompok.'</td>
                <td>'.$row->tglbuat.'</td>
                <td class="text-center" width="10%">
                <div class="btn-group">
                  
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <button type="button" class="btn btn-info">Aksi</button>
                  <ul class="dropdown-menu" role="menu">
                    <li>'.$edit.'</li>
                    <li>'.$del.'</li>
                    <li class="divider"></li>
                    <li><a onclick="panggilanggaran('.$row->idrek.')">Anggaran</a></li>
                  </ul>
                </div>
                </td>
            </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }

    function carianggaran() {
        $this->db->from("mrekening");
        $this->db->select('kodeanggaran, namaanggaran');
        $this->db->where("idrek", $this->input->get('id'));
        $data = $this->db->get();
        return $data->row();
    }

    public function ubahanggaranrek() {
        $dtEdit = array(
            'kodeanggaran' => $this->input->get("kd"),
            'namaanggaran' => $this->input->get("nm")
        );
        $this->db->where("idrek", $this->input->get("id"));
        $dt = $this->db->update('mrekening', $dtEdit);
        return $dt;
    }

}
