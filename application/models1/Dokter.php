<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Model {
	
	public function full() {
		$this->db->from("mdokter");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokter() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$this->db->where("hapus", 0);
		$data = $this->db->get();
		return $data->result();
	}

	public function dokterPoli($kodePoli)
	{
		$data =  $this->db->query("SELECT kode_dokter, nama_dokter FROM `mdokter` WHERE bagian = '".$kodePoli."' OR CONCAT(',', kode_unit_urj, ',') like '%,".$kodePoli.",%' AND kategori = 'DOKTER' AND status = 1");
		// $this->db->select("kode_dokter, nama_dokter");
		// $this->db->from("mdokter");
		// $this->db->where("kategori", "DOKTER");
		// $this->db->where("bagian", $kodePoli);
		// $data = $this->db->get();
		return $data->result();
	}

	public function datadokterugd_old() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$this->db->where("kode_unit", "IGDD");
		$this->db->or_where("kode_unit", "IGDP");
		$this->db->or_where("kode_unit", "KMBS");
		$data = $this->db->get();
		return $data->result();
	}
	
	public function datadokterugd() {
		$data=$this->db->query("SELECT kode_dokter, nama_dokter FROM mdokter where kategori='DOKTER' and (kode_unit='IGDD' or kode_unit='IGDP' or kode_unit='KMBS' or kode_unit='KDGN') ");
		return $data->result();
	}

	public function datadokterunit() {
		$kd = $this->input->get("unit");
		if ($kd == 'VCTT'){ $kd = 'DLAM';}
		if ($kd == 'HMDL'){ $kd = 'DLAM';}
		if ($kd == 'MDRO'){ $kd = 'PARU';}
		if ($kd == 'NRKB'){ $kd = 'FRSK';}
		if ($kd == 'NARKO'){ $kd = 'FRSK';}
		if ($kd == 'ANST'){ $kd = 'IBSS';}
		if ($kd == 'VISUM'){ $kd = 'FRSK';}
		// if ($kd == 'REME'){ $kd = 'DLAM';}
		$result = $this->findDokterByKodeUnit($kd);
		if ($result) {
			return $result;
		}
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$this->db->where("kode_unit", $kd);
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterunitregistrasi($kd) {
		$kd1=$kd;
		if ($kd == 'VCTT'){ $kd1 = 'DLAM';}
		if ($kd == 'HMDL'){ $kd1 = 'DLAM';}
		if ($kd == 'MDRO'){ $kd1 = 'PARU';}
		if ($kd == 'NRKB'){ $kd1 = 'FRSK';}
		if ($kd == 'NARKO'){ $kd1 = 'FRSK';}
		if ($kd == 'ANST'){ $kd1 = 'IBSS';}
		if ($kd == 'VISUM'){ $kd1 = 'FRSK';}
		// if ($kd == 'REME'){ $kd1 = 'DLAM';}

		
		$result = $this->findDokterByKodeUnit($kd1);
		if ($result) {
			return $result;
		}

		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$this->db->where("kode_unit", $kd1);
		$data = $this->db->get();
		return $data->result();
	}

	// car
	public function findDokterByKodeUnit($kodeUnit){
		$result =  $this->db->query("SELECT kode_dokter, nama_dokter FROM `mdokter` WHERE CONCAT(',', kode_unit_urj, ',') like '%,".$kodeUnit.",%'");
		if ($result->num_rows()<1) {
			return;
		}
		return $result->result();
	}

	public function datadokterpemberi() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemeriksa() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemeriksahem() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		//$this->db->where("kode_unit", "0314 ");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemeriksalab() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		// $this->db->where("kode_unit", "0301 ");
		$this->db->where("kode_unit", "LABS ");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpemeriksarad() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kode_unit", "RDLG ");
        $this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datadokterpilihunit($kdunitnya) {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$this->db->where("kode_unit", $kdunitnya);
		$data = $this->db->get();
		return $data->result();
	}


	public function dataanalis() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kode_unit", "LABS ");
		$this->db->where("kategori", "LAINNYA");
		$data = $this->db->get();
		return $data->result();
	}

	public function dataradiografer() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
        $this->db->where("kualifikasi", "RADIOGRAFER");
		$data = $this->db->get();
		return $data->result();
	}

	public function datahemodialis() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
        $this->db->where("kode_unit", "HMDL ");
		$data = $this->db->get();
		return $data->result();
	}

	public function datakategori() {
		$this->db->from("mkategori");
		$data = $this->db->get();
		return $data->result();
	}

	public function datakualifikasi() {
		$this->db->from("mklasifikasi");
		$data = $this->db->get();
		return $data->result();
	}

	public function filterdokter() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "DOKTER");
		$data = $this->db->get();
		return $data->result();
	}

	public function filterdokterasisten() {
		// $where = "kategori='DOKTER' OR (kategori='PERAWAT' AND kode_unit='IBSS')";
		$where = "kategori='DOKTER' OR kualifikasi='Asisten Operasi'";
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where($where);
		// $this->db->where("kategori", "DOKTER");
		// $this->db->where("kategori", "PERAWAT");
		// $this->db->where("kategori", "PERAWAT");
		$data = $this->db->get();
		return $data->result();
	}

	public function filterpenata() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kualifikasi", "Penata Anastesi");
		$data = $this->db->get();
		return $data->result();
	}

    public function filterperawat() {
        $this->db->select("kode_dokter, nama_dokter");
        $this->db->from("mdokter");
        $this->db->where("kategori", "PERAWAT");
        $data = $this->db->get();
        return $data->result();
    }

	public function filterperawatdanbidan() {
        $this->db->select("kode_dokter, nama_dokter");
        $this->db->from("mdokter");
        $this->db->where("kategori", "PERAWAT");
        $this->db->or_where("kategori", "BIDAN");
        $data = $this->db->get();
        return $data->result();
    }

	public function filterperawatopr() {
        $this->db->select("kode_dokter, nama_dokter");
        $this->db->from("mdokter");
        $this->db->where("kategori !=", "DOKTER");
		$this->db->where("kode_unit", "IBSS");
        $data = $this->db->get();
        return $data->result();
    }

	public function filterbidan() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "BIDAN");
		$data = $this->db->get();
		return $data->result();
	}

	public function dataperawat_old() {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
        $this->db->where("kategori", "PERAWAT");
		$data = $this->db->get();
		return $data->result();
	}

	public function dataperawat() {
		$data=$this->db->query("SELECT kode_dokter, nama_dokter FROM mdokter where kategori='PERAWAT' or kategori='BIDAN' or kategori='NUTRISIONIS' ");
		return $data->result();
	}

	public function dataperawatpilihunit($kdunitnya) {
		$this->db->select("kode_dokter, nama_dokter");
		$this->db->from("mdokter");
		$this->db->where("kategori", "PERAWAT");
		$this->db->where("kode_unit", $kdunitnya);
		$data = $this->db->get();
		return $data->result();
	}

	public function tandatangan() {
		$this->db->select("kode_dokter, nama_dokter, nip");
		$this->db->from("mdokter");
        $this->db->where("ttdfarmasi", 1);
		$data = $this->db->get();
		return $data->result();
	}

	function count_all() {
		$ky = $this->input->get("key1");
        // $this->db->from("mdokter");
		$this->db->select("mdokter.kode_dokter,mdokter.nama_dokter, mdokter.kualifikasi, mdokter.kategori, mdokter.id, mdokter.bagian, mdokter.kode_unit, munit.nama_unit, mdokter.hapus ");
		$this->db->from("mdokter");
		$this->db->join("munit", "munit.kode_unit = mdokter.kode_unit");
        // $this->db->where("hapus", "0");
		$this->db->like("mdokter.nama_dokter", $ky, 'both');
		$this->db->or_like("mdokter.kategori", $ky, 'both');
		$this->db->or_like("munit.nama_unit", $ky, 'both');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$output = '';
		$ky = $this->input->get("key1");
		$this->db->select("mdokter.kode_dokter,mdokter.nama_dokter, mdokter.kualifikasi, mdokter.kategori, mdokter.id, mdokter.bagian, mdokter.kode_unit, munit.nama_unit, mdokter.hapus ");
		$this->db->from("mdokter");
		// $this->db->join("munit", "munit.kode_unit = mdokter.kode_unit");
		$this->db->join("munit", "munit.kode_unit = mdokter.kode_unit", "left");
        // $this->db->where("munit.hapus", "0");
		$this->db->like("mdokter.nama_dokter", $ky, 'both');
		$this->db->or_like("mdokter.kategori", $ky, 'both');
		$this->db->or_like("munit.nama_unit", $ky, 'both');
		$this->db->order_by("mdokter.kategori", "ASC");
		$this->db->order_by("mdokter.nama_dokter", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="3%">No.</th>
			<th width="5%" style="text-align:center">Kode</th>
			<th>Nama</th>
			<th width="15%">Unit Tugas</th>
			<th width="12%">Kualifikasi</th>
			<th width="12%">Kategori</th>
			<th width="7%" style="text-align:center">Aktif</th>
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
                <td style="text-align:center">'.$row->kode_dokter.'</td>
				<td>'.$row->nama_dokter.'</td>
				<td>'.$row->nama_unit.'</td>
                <td>'.$row->kualifikasi.'</td>
                <td>'.$row->kategori.'</td>
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

	public function simpandataparamedis() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_dokter' => $contentdata["kd"],
			'nama_dokter' => $contentdata["nm"],
			'alamat' => $contentdata["alamat"],
			'hp' => $contentdata["hp"],
			'bagian' => $contentdata["bagian"],
			'status' => $contentdata["stat"],
			'ahli' => "0",
			'kualifikasi' => $contentdata["klasifikasitext"],
			'idkualifikasi' => $contentdata["klasifikasi"],
			'spesialis' => "0",
			'kategori' => $contentdata["kategoritext"],
			'igd_tindakan' => "0",
			'igd_asuhanb' => "0",
			'RJ_tindakan' => "0",
			'RJ_asuhanb' => "0",
			'RI_tindakan' => "0",
			'RI_asuhanB' => "0",
			'OK_tindakan' => "0",
			'OK_asuhanb' => "0",
			'radiologi' => "0",
			'laboratorium' => "0",
			'kmb_asuhanB' => "0",
			'kmb_tindakan' => "0",
			'RI_asuhanB_p' => "0",
			'IGD_asuhanB_p' => "0",
			'KMB_asuhanB_p' => "0",
			'kode_unit' => $contentdata["bagian"],
			'user1' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s")
		);

		$dt = $this->db->insert("mdokter", $datasimpan);
		return $dt;
	}

    public function ambildataedit() {
        $id = $this->input->get("id");
        $this->db->from("mdokter");
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
            'kode_dokter' => $contentdata["kd"],
            'nama_dokter' => $contentdata["nm"],
            'alamat' => $contentdata["alamat"],
            'hp' => $contentdata["hp"],
            'bagian' => $contentdata["bagian"],
            'status' => $contentdata["stat"],
            'kualifikasi' => $contentdata["klasifikasitext"],
            'idkualifikasi' => $contentdata["klasifikasi"],
            'kategori' => $contentdata["kategoritext"],
			'kode_unit' => $contentdata["bagian"],
            'status' => $contentdata["stat"],
            'user1' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mdokter", $datasimpan);
        return $dt;
    }

    public function deletedokter() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'user1' => $this->session->userdata('nmuser')
        );

        $this->db->where("id", $id);
        $dt = $this->db->update("mdokter", $data);
        return $dt;
    }

}
