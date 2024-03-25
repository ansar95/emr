<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangrawat extends CI_Model {

	public function untukcombo_old() {
		$this->db->select("kode_kelas, nama_kelas");
		$this->db->from("mkelas");
		$this->db->order_by("nama_kelas", "ASC");
		$data = $this->db->get();
		return $data->result();
	}
	
	public function untukcombo() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", 1);
		$this->db->order_by("nama_unit", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

	public function untukcombo_gizi() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", 1);
		$this->db->or_where("kode_unit", 'KMBS');
		$this->db->order_by("nama_unit", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

	// untuk master data
//	function view($num, $offset) {
//		$query = $this->db->get("mkelas",$num, $offset);
//		return $query->result();
//	}

public function untukcombo_masterkamar() {
	$this->db->select("kode_kelas, nama_kelas");
	$this->db->from("mkelas");
	$this->db->order_by("nama_kelas", "ASC");
	$data = $this->db->get();
	return $data->result();
}


	function count_all() {
		$ky = $this->input->get("key1");
        $this->db->from("mkelas");
        // $this->db->where("hapus", "0");
		$this->db->like("nama_kelas", $ky, 'both');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$output = '';
		$ky = $this->input->get("key1");
		$this->db->select("kode_kelas, nama_kelas, kode_unit, hapus,id");
		$this->db->from("mkelas");
        // $this->db->where("hapus", "0");
		$this->db->like("nama_kelas", $ky, 'both');
		$this->db->order_by("nama_kelas", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="15%">Kode Kelas</th>
			<th>Nama Kelas</th>
			<th width="10%" style="text-align:center">Kode unit</th>
			<th width="10%" style="text-align:center">Aktif</th>
			<th width="10%" style="text-align:center">Action</th>
		</tr>
		';
        $id = $this->session->userdata("idx");
		$no = $start;
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
                <td>'.$row->kode_kelas.'</td>
                <td>'.$row->nama_kelas.'</td>
				<td style="text-align:center">'.$row->kode_unit.'</td>
				<td style="text-align:center">'.$aktif.'</td>
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

	public function simpandatarawat() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_kelas' => $contentdata["kd"], 
			'nama_kelas' => $contentdata["nm"], 
			'kode_unit' => $contentdata["unit"], 
			't4tidur' => "0", 
			'vis' => $contentdata["vis"], 
			'kds' => $contentdata["kds"], 
			'kdu' => $contentdata["kdu"], 
			'kdi' => $contentdata["kdi"], 
			'kdc' => $contentdata["kdc"],
			'kdss' => $contentdata["kdss"], 
			'makanan' => $contentdata["mk"], 
			'tanggungaskes' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'jasasm' => "0", 
			'jasapm' => "0", 
			'jasamm' => "0", 
			'jasas' => "0", 
			'jasap' => "0", 
			'jasam' => "0", 		
			'kelasnomor' => "0", 
			'konsulsubspesialis' => "0", 
			'konsulumum' => "0", 
			'kodetarif' => "", 
			'jumlahkamar' => "0", 
			'terisi' => "0", 
			'kelastarif' => "", 
			'namatarif' => "", 
			'dipakai' => "0", 
			'pria_ada' => "0", 
			'wanita_ada' => "0", 
			'pria_pakai' => "0",
			'wanita_pakai' => "0", 
			'idunit' => "0"
		);

		$dt = $this->db->insert("mkelas", $datasimpan);
		return $dt;
		// return $contentdata;
	}
	// =================

    public function ambildataedit() {
        $id = $this->input->get("id");
        $this->db->from("mkelas");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdatarawat() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode_kelas' => $contentdata["kd"],
            'nama_kelas' => $contentdata["nm"],
            'kode_unit' => $contentdata["unit"],
            'vis' => $contentdata["vis"],
            'kds' => $contentdata["kds"],
            'kdu' => $contentdata["kdu"],
            'kdi' => $contentdata["kdi"],
			'kdc' => $contentdata["kdc"],
			'kdss' => $contentdata["kdss"],
            'makanan' => $contentdata["mk"],
            'user1' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mkelas", $datasimpan);
        return $dt;
    }

    public function deletedatarawat() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'username' => $this->session->userdata('nmuser')
        );

        $this->db->where("id", $id);
        $dt = $this->db->update("mkelas", $data);
        return $dt;
    }

}
