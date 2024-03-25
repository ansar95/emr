<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Model {
	
	public function full() {
		$this->db->from("munit");
		$data = $this->db->get();
		return $data->result();
	}

	public function unitumum() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$data = $this->db->get();
		return $data->result();
	}

    public function untukmaster() {
        $this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
        $data = $this->db->get();
        return $data->result();
    }

	public function untuktujuanperawatanregis($filter) {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where($filter, "1");
        $this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function untuktujuanperawatanregis2() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("jalan", "1");
		$this->db->or_where("lab", "1");
		$this->db->or_where("rad", "1");
		$this->db->or_where("hem", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function untukmasterruang() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function untuktarikpasien() {
		$ku = $this->input->get("unit");
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("kode_unit !=", $ku);
		$this->db->where("hapus", "0");
		$this->db->where("inap", "1");
		$this->db->or_where("igd", "1");
		$this->db->or_where("ilahir", "1");
		$this->db->order_by("nama_unit", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

	public function untukkelasrawatregis() {
		$id = $this->input->get("un");
		$this->db->select("kode_kelas, nama_kelas");
		$this->db->from("mkelas");
		$this->db->where("kode_unit", $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function untukambilkodekelas() {
		$id = $this->input->get("unit");
		$this->db->select("kode_kelas, nama_kelas");
		$this->db->from("mkelas");
		$this->db->where("kode_unit", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function fulligd() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("IGD", "1");
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function fulligdurj() {
		$data=$this->db->query("select kode_unit, nama_unit from munit where hapus=0 and (IGD=1 or jalan=1) ");
		return $data->result();
	}

	public function fulluri() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function fulluri_unit() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", "1");
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function fullurj() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("jalan", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function full_all() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("jalan", "1");
		$this->db->or_where("inap", "1");
		$this->db->or_where("igd", "1");
		$this->db->order_by("nama_unit");
		$data = $this->db->get();
		return $data->result();
	}

	public function fullurjinst() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("jalan", "1");
		$this->db->or_where("jalan", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function fullbsr() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("ILAHIR", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function fullopr() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("IBS", "1");
		$data = $this->db->get();
		return $data->result();
	}

    public function fulldepo() {
        $this->db->select("kode_unit, nama_unit");
        $this->db->from("munit");
        $this->db->where("apotik", "1");
        $data = $this->db->get();
        return $data->result();
    }

	public function fulloprfix() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("IBS", "1");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function unituntuklaporan() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("inap", "1");
		$this->db->or_where("jalan", "1");
		$this->db->or_where("IGD", "1");
		$this->db->or_where("IBS", "1");
		$this->db->or_where("ILAHIR", "1");
		$this->db->or_where("ILAHIR", "1");
		$this->db->order_by("inap", "DESC");
		$this->db->order_by("nama_unit", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

	public function unitjadwaloperasi() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		// $this->db->where("inap", "1");
		$this->db->or_where("jalan", "1");
		// $this->db->or_where("IGD", "1");
		$this->db->or_where("IBS", "1");
		// $this->db->or_where("ILAHIR", "1");
		$this->db->order_by("kelompok_unit", "DESC");
		$this->db->order_by("nama_unit", "ASC");
		$data = $this->db->get();
		return $data->result();
	}

	public function unitkiriminstalasi() {
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("lab", "1");
		$this->db->or_where("rad", "1");
		// $this->db->or_where("hem", "1");
		$this->db->or_where("IBS", "1");
		// $this->db->or_where("ILAHIR", "1");
		$this->db->or_where("jen", "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function unitpindakamar($filter) {
		$this->db->select("munit.kode_unit as kode_unit, munit.nama_unit as nama_unit, mkelas.kode_kelas as kode_kelas, mkelas.nama_kelas as nama_kelas");
		$this->db->from("munit");
		$this->db->join("mkelas", "mkelas.kode_unit = munit.kode_unit");
		$this->db->where("munit.".$filter, "1");
		$data = $this->db->get();
		return $data->result();
	}

	public function untuktampilanunitigdperuser() {
        $kd = $this->session->userdata("kodeunit");
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("IGD", "1");
		$this->db->where("kode_unit", $kd);
		$data = $this->db->get();
		return $data->result();
	}

	public function unitkamarbersalin() {
        $kd = $this->session->userdata("kodeunit");
		$this->db->select("kode_unit, nama_unit");
		$this->db->from("munit");
		$this->db->where("ILAHIR", "1");
		$data = $this->db->get();
		return $data->result();
	}


	// untuk master data
	function count_all() {
		$ky = $this->input->get("key1");
        $this->db->from("munit");
        // $this->db->where("hapus", "0");
		$this->db->like("nama_unit", $ky, 'both');
		$this->db->or_like("kelompok_unit", $ky, 'both');
		$query = $this->db->get();
		return $query->num_rows();
	}


	function fetch_details($limit, $start) {
		$output = '';
		$ky = $this->input->get("key1");
		$this->db->select("kode_unit, nama_unit, kelompok_unit, idunit,kodepoliSEP,namapoliSEP,hapus");
		$this->db->from("munit");
        // $this->db->where("hapus", "0"); tidak boleh dihapus tapi tampilkan datanya
		// $this->db->order_by("kelompok_unit", "ASC");
		$this->db->limit($limit, $start);
		$this->db->order_by("kelompok_unit", "DESC");
		$this->db->order_by("kode_unit", "ASC");
		$this->db->like("nama_unit", $ky, 'both');
		$this->db->or_like("kelompok_unit", $ky, 'both');
		
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="8%">Kode</th>
			<th>Nama Unit</th>
			<th width="11%">Kelompok</th>
			<th width="8%" style="text-align:center">Kode SEP</th>
			<th width="25%">Nama Poli SEP</th>
			<th width="5%" style="text-align:center">Aktif</th>
			<th width="10%" style="text-align:center">Action</th>
		</tr>
		';
		$no = $start;
        $id = $this->session->userdata("idx");
		foreach($query->result() as $row) {
            if (ceksess("EDIT", $id) == TRUE) {
                $edit = '<a role="button" onclick="panggiledit('.$row->idunit.')" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>';
            } else {
                $edit = "";
            }
            if (ceksess("DEL", $id) == TRUE) {
                $del = '<a role="button" onclick="hapusdata(this, '.$row->idunit.')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>';
            } else {
                $del = "";
            }
            if ($row->hapus =='0'){ $aktif='Aktif'; } else { $aktif='Non Aktif'; }
            $output .= '
            <tr>
                <td>'. ++$no .'</td>
                <td>'.$row->kode_unit.'</td>
                <td>'.$row->nama_unit.'</td>
				<td>'.$row->kelompok_unit.'</td>
				<td style="text-align:center">'.$row->kodepoliSEP.'</td>
				<td>'.$row->namapoliSEP.'</td>
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

	public function simpandataunit() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_unit' => $contentdata["kd"], 
			'nama_unit' => $contentdata["nm"], 
			'kelompok_unit' => $contentdata["kelompok"], 
			'pimpinan' => "", 
			'nip' => "", 
			'pangkat' => "", 
			'bacastatus' => gantiangka($contentdata["stat"]), 
			'nama_dokter' => "", 
			'kelompokfilter' => "0", 
			'IBS' => gantiangka($contentdata["ibs"]), 
			'ILAHIR' => gantiangka($contentdata["ilahir"]), 
			'IGD' => gantiangka($contentdata["igd"]), 
			'penunjang' => gantiangka($contentdata["penunjang"]), 
			'instalasi' => gantiangka($contentdata["instalasi"]), 
			'pendaftaran' => gantiangka($contentdata["pendaftaran"]), 
			'apotik' => gantiangka($contentdata["apotik"]), 
			'adm' => gantiangka($contentdata["adm"]), 
			'jalan' => gantiangka($contentdata["jalan"]), 
			'inap' => gantiangka($contentdata["inap"]), 
			'rujukan' => gantiangka($contentdata["rujuk"]), 
			'lab' => gantiangka($contentdata["lab"]), 
			'rad' => gantiangka($contentdata["rad"]), 
			'hem' => gantiangka($contentdata["hem"]), 
			'jen' => gantiangka($contentdata["jen"]),
			'amb' => gantiangka($contentdata["amb"]), 
			'kodepoliSEP' => $contentdata["kdsep"], 
			'namapoliSEP' => $contentdata["sep"], 
			'hapus' => "0", 
			'lastlogin' => date("Y-m-d H:i:s"), 
			'username' => $this->session->userdata('nmuser')
		);

		$dt = $this->db->insert("munit", $datasimpan);
		return $dt;
	}
	// =================

	// untuk edit dan delete
	public function ambildataedit() {
		$id = $this->input->get("id");
		$this->db->from("munit");
		$this->db->where("idunit", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function editdataunit() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$dataedit = array(
			'kode_unit' => $contentdata["kd"], 
			'nama_unit' => $contentdata["nm"], 
			'kelompok_unit' => $contentdata["kelompok"],
			'bacastatus' => gantiangka($contentdata["stat"]),
			'IBS' => gantiangka($contentdata["ibs"]), 
			'ILAHIR' => gantiangka($contentdata["ilahir"]), 
			'IGD' => gantiangka($contentdata["igd"]), 
			'penunjang' => gantiangka($contentdata["penunjang"]), 
			'instalasi' => gantiangka($contentdata["instalasi"]), 
			'pendaftaran' => gantiangka($contentdata["pendaftaran"]), 
			'apotik' => gantiangka($contentdata["apotik"]), 
			'adm' => gantiangka($contentdata["adm"]), 
			'jalan' => gantiangka($contentdata["jalan"]), 
			'inap' => gantiangka($contentdata["inap"]), 
			'rujukan' => gantiangka($contentdata["rujuk"]), 
			'lab' => gantiangka($contentdata["lab"]), 
			'rad' => gantiangka($contentdata["rad"]), 
			'hem' => gantiangka($contentdata["hem"]), 
			'jen' => gantiangka($contentdata["jen"]),
			'amb' => gantiangka($contentdata["amb"]), 
			'kodepoliSEP' => $contentdata["kdsep"], 
			'namapoliSEP' => $contentdata["sep"],
			'hapus' => $contentdata["stat"],
			'lastlogin' => date("Y-m-d H:i:s"), 
			'username' => $this->session->userdata('nmuser')
		);

		$this->db->where("idunit", $contentdata["id"]);
		$dt = $this->db->update("munit", $dataedit);
		return $dt;
	}

    public function deletedataunit() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'username' => $this->session->userdata('nmuser')
        );

        $this->db->where("idunit", $id);
        $dt = $this->db->update("munit", $data);
        return $dt;
    }
	// ==================

}
