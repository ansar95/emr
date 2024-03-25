<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokterluar extends CI_Model {

    public function full() {
        $this->db->from("mdokterluar");
        $data = $this->db->get();
        return $data->result();
    }

    // untuk master data
//    function view($num, $offset) {
//        $query = $this->db->get("mdokterluar",$num, $offset);
//        return $query->result();
//    }

    function count_all() {
        $this->db->from("mdokterluar");
        $this->db->where("hapus", "0");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_details($limit, $start) {
        $output = '';
        $this->db->select("kode, nama, spesialis, id");
        $this->db->from("mdokterluar");
        $this->db->where("hapus", "0");
        $this->db->order_by("nama", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="15%">Kode</th>
			<th>Nama Dokter</th>
			<th width="20%">Spesialis</th>
			<th width="10%">Action</th>
		</tr>
		';
        $no = $start;
        $id = $this->session->userdata("idx");
        foreach($query->result() as $row) {
            if (ceksess("EDIT", $id) == TRUE) {
                $edit = '<button onclick="panggiledit('.$row->id.')" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></button>';
            } else {
                $edit = "";
            }
            if (ceksess("DEL", $id) == TRUE) {
                $del = '<button onclick="hapusdata(this, '.$row->id.')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></button>';
            } else {
                $del = "";
            }
            $output .= '
            <tr>
                <td>'. ++$no .'</td>
                <td>'.$row->kode.'</td>
                <td>'.$row->nama.'</td>
                <td>'.$row->spesialis.'</td>
                <td class="text-center">
                    '.$edit.'
                    '.$del.'
                </td>
            </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }

    public function simpandataparamedis() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode' => $contentdata["kd"],
            'nama' => $contentdata["nm"],
            'spesialis' => $contentdata["spe"]
        );

        $dt = $this->db->insert("mdokterluar", $datasimpan);
        return $dt;
    }

    public function ambildataedit() {
        $id = $this->input->get("id");
        $this->db->from("mdokterluar");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdataparamedis() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode' => $contentdata["kd"],
            'nama' => $contentdata["nm"],
            'spesialis' => $contentdata["spe"]
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mdokterluar", $datasimpan);
        return $dt;
    }

    public function deletedokter() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'username' => $this->session->userdata('nmuser')
        );

        $this->db->where("id", $id);
        $dt = $this->db->update("mdokterluar", $data);
        return $dt;
    }

}