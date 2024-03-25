<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamarrawat extends CI_Model {

	public function pilihkamar() {
		$id = $this->input->get("dtunit");
		$this->db->select("kode_kelas, nama_kelas");
		$this->db->from("mkelas");
        $this->db->where("kode_unit", $id);
        $this->db->order_by("kode_kelas", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

    public function kamar() {
        $id = $this->input->get("unit");
        $this->db->select("mkamar.kode_kamar, mkamar.nama_kamar");
        $this->db->from("mkamar");
        $this->db->join("mkelas", "mkelas.kode_kelas = mkamar.kode_kelas");
        $this->db->where("mkelas.kode_unit", $id);
        $this->db->order_by("mkamar.nama_kamar", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilih_kamar_untuk_edit($id) {
        $this->db->select("mkamar.kode_kamar, mkamar.nama_kamar");
        $this->db->from("mkamar");
        $this->db->join("mkelas", "mkelas.kode_kelas = mkamar.kode_kelas");
        $this->db->where("mkelas.kode_unit", $id);
        $this->db->order_by("mkamar.nama_kamar", "ASC");
        $data = $this->db->get();
        return $data->result();
    }
	// untuk master data
//	function view($num, $offset) {
//		$query = $this->db->get("mkamar",$num, $offset);
//		return $query->result();
//	}

	function count_all() {
        $ky = $this->input->get("key1");
        $this->db->from("mkamar");
        // $this->db->where("hapus", "0");
        $this->db->like("nama_kamar", $ky, 'both');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$output = '';
        $ky = $this->input->get("key1");
		$this->db->select("kode_kamar, nama_kamar, kode_kelas, nama_kelas, id, harga, t4tidur, hapus");
		$this->db->from("mkamar");
        // $this->db->where("hapus", "0");
        $this->db->like("nama_kamar", $ky, 'both');
		$this->db->order_by("nama_kamar", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="10%">Kode Kamar</th>
			<th>Nama Kamar</th>
            <th width="8%" style="text-align:right">Harga</th>
            <th width="25%">Ruangan</th>
            <th width="10%">Jml T.Tidur</th>
            <th width="5%" style="text-align:center">Aktif</th>
            <th width="10%" style="text-align:center">Action</th>
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
            if ($row->hapus =='0'){ $aktif='Aktif'; } else { $aktif='Non Aktif'; }
            $output .= '
            <tr>
                <td>'. ++$no .'</td>
                <td>'.$row->kode_kamar.'</td>
                <td>'.$row->nama_kamar.'</td>
                <td align="right">'.groupangka($row->harga).'</td>
                <td>'.$row->nama_kelas.'</td>
                <td align="center">'.$row->t4tidur.'</td>
                <td align="center">'.$aktif.'</td>
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

	public function simpandatakamar() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_kamar' => $contentdata["kd"], 
			'nama_kamar' => $contentdata["nm"], 
			'kode_kelas' => $contentdata["kelas"], 
			'nama_kelas' => $contentdata["kelastext"],
            'harga' => $contentdata["hrg"],
            't4tidur' => $contentdata["jtt"],
			'terpakai' => "0",
			'sex' => ""
		);

		$dt = $this->db->insert("mkamar", $datasimpan);
		return $dt;
		// return $contentdata;
	}
	// =================

    public function ambildataedit() {
        $id = $this->input->get("id");
        $this->db->from("mkamar");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdatakamar() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode_kamar' => $contentdata["kd"],
            'nama_kamar' => $contentdata["nm"],
            'kode_kelas' => $contentdata["kelas"],
            'nama_kelas' => $contentdata["kelastext"],
            't4tidur' => $contentdata["jtt"],
            'harga' => $contentdata["hrg"],
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mkamar", $datasimpan);
        return $dt;
    }

    public function deletedatakamar() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'username' => $this->session->userdata('nmuser')
        );

        $this->db->where("id", $id);
        $dt = $this->db->update("mkamar", $data);
        return $dt;
    }

}
