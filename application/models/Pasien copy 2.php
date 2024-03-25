<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pasien extends CI_Model {

    public function statuspasien() {
        $this->db->from("status");
        $data = $this->db->get();
        return $data->result();
    }

    function count_all() {
		$this->db->select("id");
		$np = $this->input->get("np");
		$pp = $this->input->get("pp");
		$nap = $this->input->get("nap");
		$nrp = $this->input->get("nrp");
        $date1 = date_create($this->input->get("tgl"));
        $tgl = date_format($date1,"Y-m-d");
        $kartu = $this->input->get("kartu");
        $nik = $this->input->get("nik");
		// $this->db->select("nama_pasien, no_rm, nama_pgl, alamat, telp, hp, golongan, id");
		$this->db->select("id");
		$this->db->from("pasien");
		if (($np != "") || ($np != null)) {
			$this->db->like("nama_pasien", $np, "both");
		}
		if (($pp != "") || ($pp != null)) {
			$this->db->like("nama_pgl", $pp, "both");
		}
		if (($nap != "") || ($nap != null)) {
			$this->db->like("alamat", $nap, "both");
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("no_rm", $nrp, "both");
		}
        if (($this->input->get("tgl") != "") || ($this->input->get("tgl") != null)) {
            $this->db->like("tgl_lahir", $tgl, "both");
        }
        if (($kartu != "") || ($kartu != null)) {
            $this->db->like("no_askes", $kartu, "both");
        }
        if (($nik != "") || ($nik != null)) {
            $this->db->like("nik", $nik, "both");
        }
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$output = '';
		$np = $this->input->get("np");
		$pp = $this->input->get("pp");
		$nap = $this->input->get("nap");
		$nrp = $this->input->get("nrp");
        $date1 = date_create($this->input->get("tgl"));
        $tgl = date_format($date1,"Y-m-d");
        $kartu = $this->input->get("kartu");
        $nik = $this->input->get("nik");
		$this->db->select("nama_pasien, no_rm, nama_pgl, alamat, telp, hp, golongan, no_askes, nik, id");
		$this->db->from("pasien");
		if (($np != "") || ($np != null)) {
			$this->db->like("nama_pasien", $np, "both");
		}
		if (($pp != "") || ($pp != null)) {
			$this->db->like("nama_pgl", $pp, "both");
		}
		if (($nap != "") || ($nap != null)) {
			$this->db->like("alamat", $nap, "both");
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("no_rm", $nrp, "both");
		}
        if (($this->input->get("tgl") != "") || ($this->input->get("tgl") != null)) {
            $this->db->like("tgl_lahir", $tgl, "both");
        }
        if (($kartu != "") || ($kartu != null)) {
            $this->db->like("no_askes", $kartu, "both");
        }
        if (($nik != "") || ($nik != null)) {
            $this->db->like("nik", $nik, "both");
        }
		$this->db->order_by("nama_pasien", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-hover">
		<tr>
			<th>Nama Lengkap</th>
			<th width="8%">No. RM</th>
			<th width="10%">Panggilan</th>
			<th width="15%">Alamat</th>
			<th width="8%">Tlp/HP</th>
			<th width="8%">Golongan</th>
			<th width="10%">NIK</th>
			<th width="10%">No.Kartu</th>
			<th width="15%"><div align="center">Proses</div></th>
		</tr>
		';
		$no = $start;
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->nama_pgl.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->hp.'</td>
			<td>'.$row->golongan.'</td>
			<td>'.$row->nik.'</td>
			<td>'.$row->no_askes.'</td>
			<td class="text-center">
				<button onclick="panggillihat(\''.$row->no_rm.'\');" class="btn btn-sm btn-success "><i class="far fa-eye"></i></button>
				<button onclick="panggileditpasien(\''.$row->no_rm.'\');" class="btn btn-sm btn-info "><i class="far fa-edit"></i></button>
				<button onclick="hapuspasien(\''.$row->no_rm.'\')" class="btn btn-sm btn-danger "><i class="far fa-trash-alt"></i></button>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}
	
	function fetch_details_pasien_resep($limit, $start) {
		$output = '';
		$np = $this->input->get("np");
		$pp = $this->input->get("pp");
		$nap = $this->input->get("nap");
		$nrp = $this->input->get("nrp");
        $date1 = date_create($this->input->get("tgl"));
        $tgl = date_format($date1,"Y-m-d");
        $kartu = $this->input->get("kartu");
        $nik = $this->input->get("nik");
		$this->db->select("nama_pasien, no_rm, nama_pgl, alamat, telp, hp, golongan, id");
		$this->db->from("pasien");
		if (($np != "") || ($np != null)) {
			$this->db->like("nama_pasien", $np, "both");
		}
		if (($pp != "") || ($pp != null)) {
			$this->db->like("nama_pgl", $pp, "both");
		}
		if (($nap != "") || ($nap != null)) {
			$this->db->like("alamat", $nap, "both");
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("no_rm", $nrp, "both");
		}
        if (($this->input->get("tgl") != "") || ($this->input->get("tgl") != null)) {
            $this->db->like("tgl_lahir", $tgl, "both");
        }
        if (($kartu != "") || ($kartu != null)) {
            $this->db->like("no_askes", $kartu, "both");
        }
        if (($nik != "") || ($nik != null)) {
            $this->db->like("nik", $nik, "both");
        }
		$this->db->order_by("nama_pasien", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-hover">
		<tr>
			<th>Nama Lengkap</th>
			<th width="10%">No. RM</th>
			<th width="10%">Panggilan</th>
			<th width="20%">Alamat</th>
			<th width="10%">Tlp/HP</th>
			<th width="15%">Golongan</th>
			<th width="5%"><div align="center">Proses</div></th>
		</tr>
		';
		$no = $start;
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->nama_pgl.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->hp.'</td>
			<td>'.$row->golongan.'</td>
			<td class="text-center">
				<button onclick="panggillihat(\''.$row->no_rm.'\');" class="btn-sm btn-success btn"><i class="fa fa-eye"></i></button>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}

	public function carinamapasien() {
		$np = $this->input->get("np");
		$pp = $this->input->get("pp");
		$nap = $this->input->get("nap");
		$nrp = $this->input->get("nrp");
        $date1 = date_create($this->input->get("tgl"));
        $tgl = date_format($date1,"Y-m-d");
        $kartu = $this->input->get("kartu");
        $nik = $this->input->get("nik");
		$this->db->select("nama_pasien, no_rm, nama_pgl, alamat, telp, hp, golongan, no_askes, nik, id");
		$this->db->from("pasien");
		if (($np != "") || ($np != null)) {
			$this->db->like("nama_pasien", $np, "both");
		}
		if (($pp != "") || ($pp != null)) {
			$this->db->like("nama_pgl", $pp, "both");
		}
		if (($nap != "") || ($nap != null)) {
			$this->db->like("alamat", $nap, "both");
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("no_rm", $nrp, "both");
		}
        if (($this->input->get("tgl") != "") || ($this->input->get("tgl") != null)) {
            $this->db->like("tgl_lahir", $tgl, "both");
        }
        if (($kartu != "") || ($kartu != null)) {
            $this->db->like("no_askes", $kartu, "both");
        }
        if (($nik != "") || ($nik != null)) {
            $this->db->like("nik", $nik, "both");
        }

		$data = $this->db->get();
		return $data->result();
	}

	public function pasiendata() {
		$id = $this->input->get("id");
		$this->db->select("nama_pasien, no_rm, alamat, golongan, asuransi, kelashak, no_askes, nik ");
		$this->db->from("pasien");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambilpasiendariregis() {
        $id = $this->input->get("id");
        $this->db->from('register');
        $this->db->select('no_rm');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no->no_rm;
    }

	public function ambilnorujukan() {
        $id = $this->input->get("id");
        $this->db->from('register');
        $this->db->select('norujukan');
        $this->db->where('id', $id);
        $data = $this->db->get();
		$no = $data->row();
        return $no->norujukan;
    }

	public function ambildataregistrx() {
        $id = $this->input->get("id");
        $this->db->from('register');
        $this->db->select('no_rm, notransaksi, nosep');
        $this->db->where('id', $id);
        $datano = $this->db->get();

		// $data = $this->db->get();
		$hasil = $datano->result();
		if (count($hasil) == 0) {
			$no = $datano->row();
			return $no;
		} else {
			return 'kosong';
		}

       
    }


    public function getfullpasien() {
        $no_rm = $this->input->get("dataid");
        $this->db->from("pasien");
        $this->db->where("no_rm", $no_rm);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
	}
	
	public function getfotopasien() {
		$no_rm = $this->input->get("dataid");
		$this->db->select("id, foto");
        $this->db->from("pasien");
        $this->db->where("no_rm", $no_rm);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function pasiendatarm($no_rm) {
        $this->db->select("nama_pasien, no_rm, alamat, golongan, asuransi, kelashak, no_askes, nik, hp, kelashak ");
        $this->db->from("pasien");
        $this->db->where("no_rm", $no_rm);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

	public function ambildataregistrasi() {
		$no = $this->input->get("notrans");
		$this->db->select("no_rm, tgl_masuk, notransaksi, rujukan, norujukan");
		$this->db->from("register");
		$this->db->where("notransaksi", $no);
		$data = $this->db->get();
		return $data->row();
	}

    public function ambildataregistrasiforpoli() {
        $no = $this->input->get("notrans");
        $this->db->select("register.no_rm as no_rm, register.tgl_masuk as tgl_masuk, register.notransaksi as notransaksi, register.rujukan as rujukan, register.golongan as golongan, register.noantrianloket as noantrianloket, register.norujukan as norujukan ");
        $this->db->from("register");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->where("register_detail.no_transaksi_secondary", $no);
        $data = $this->db->get();
        return $data->row();
    }

	public function ambilsetuprm() {
        $stat = $this->input->post("otomatis");
        $rm = $this->input->post("rm");
        if ($stat == 'true') {
            $this->db->select("id, no_rm");
            $this->db->from("setup");
            $data = $this->db->get();
            return $data->row();
        } else {
            $this->db->select("id");
            $this->db->from("pasien");
            $this->db->where("no_rm", $rm);
            $data = $this->db->get();
            $hasil = $data->result();
            if (count($hasil) == 0) {
                return $rm;
            } else {
                return 'ada';
            }
        }
	}

    public function ambilsetuprmtaken() {
        $stat = $this->input->post("otomatis");
        $rm = $this->input->post("rm");
        if ($stat == 'true') {
            $this->db->select("id, no as no_rm");
            $this->db->from("temp_rm_taken");
            $data = $this->db->get();
            $rm1 = $data->result();

            if (count($rm1) == 0) {
                return "0";
            } else {
                $ambil = $rm1[0];
                return $ambil;
            }
        } else {
            $this->db->select("id, no as no_rm");
            $this->db->from("temp_rm_taken");
            $this->db->where("no", $rm);
            $data = $this->db->get();
            $rm1 = $data->result();
            if (count($rm1) == 0) {
                $this->db->select("id");
                $this->db->from("pasien");
                $this->db->where("no_rm", $rm);
                $data = $this->db->get();
                $hasil = $data->result();
                if (count($hasil) == 0) {
					// return $rm;
					return $rm;
                } else {
                    return 'ada';
                }
            } else {
				$ambil = $rm;
                return $ambil;
            }
        }
    }

    public function hapustemprm($rm) {
        $this->db->delete('temp_rm_taken', array('no' => $rm));
    }

	public function datanegara() {
		$this->db->select("negara");
		$this->db->from("negara");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilhistoryregistrasi($rm, $bagian) {
		$no = $this->input->get("notrans");
		$this->db->from("register");
		$this->db->where("no_rm", $rm);
		$this->db->where("bagian", $bagian);
		$data = $this->db->get();
		return $data->result();
	}

	public function simpannewpasien($dtrm) {
		$date = date_create($this->input->post("daftar"));
		$tgldaftar = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->post("lahir"));
		$tgllahir = date_format($date1,"Y-m-d");
        $stat = $this->input->post("otomatis");
        if ($stat == 'true') {
            if ($dtrm->no_rm != null) {
                $no_rm = $dtrm->no_rm;
            } else {
                $no_rm = sprintf("%06d", $dtrm->no_rm + 1);
            }
        } else {
            $no_rm = $dtrm;
		}
		
		$datasimpan = array(
			'no_rm' => $no_rm,
			'title' => $this->input->post("title"),
			'nama_pasien' => $this->input->post("nmpas"),
			'nama_pgl' => $this->input->post("nmp"), 
			'tgl_lahir' => $tgllahir,
			'umur' => hitungumur($tgllahir), 
			'pendidikan' => $this->input->post("pendidikan"), 
			'pekerjaan' => $this->input->post("pekerjaan"), 
			'nama_ortu' => $this->input->post("nmortu"), 
			'alamat' => $this->input->post("alamat"), 
			'provinsi' => $this->input->post("provtext"),
			'kota' => $this->input->post("kabtext"),
			'kecamatan' => $this->input->post("kectext"),
			'desa' => $this->input->post("keltext"), 
			'telp' => $this->input->post("telp"), 
			'hp' => $this->input->post("hp"),
			'telppj' => $this->input->post("telppj"),
			'status' => $this->input->post("stat"),
			'nama_png' => $this->input->post("pj"), 
			'nama_klg' => $this->input->post("nmk"), 
			'alamat_klg' => $this->input->post("ak"), 
			'agama' => $this->input->post("ag"),
			'suku' => $this->input->post("suku"),
			'goldarah' => $this->input->post("goldarah"), 
			'sex' => $this->input->post("jk"), 
			'golongan' => $this->input->post("gol"), 
			'no_askes' => $this->input->post("nokartu"), 
			'no_jps' => "", 
			'asuransi' => $this->input->post("asp"), 
			'kondisi' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'last_login' => date("Y-m-d H:i:s"), 
			'tgl_daftar' => $tgldaftar,
			'region' => "0", 
			'kelashak' => $this->input->post("kh"), 
			'status_input' => "0", 
			'kota1' => "", 
			'username' => "", 
			'hapus' => "0",
			'foto' => "",
			'negara' => $this->input->post("negara"),
			'nik' => $this->input->post("nik7"),
			'tempat_lahir' => $this->input->post("t4lahir"),
			'pekerjaan_ayahibu' => $this->input->post("pkrortu"),
			'pekerjaan_suamiistri' => $this->input->post("pkrsi")
		);

		$dt = $this->db->insert('pasien', $datasimpan);

		if ($stat == 'true') {
			$ubahrm = array(
				'no_rm' => (int)$dtrm->no_rm + 1
			);

			$this->db->where('id', $dtrm->id);
			$this->db->update('setup', $ubahrm);
		}

		return $dt;

	}

    public function updatepasien() {

        $date = date_create($this->input->post("daftar"));
        $tgldaftar = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->post("lahir"));
        $tgllahir = date_format($date1,"Y-m-d");

		$updatepasien = array(
			'title' => $this->input->post("title"),
			'nama_pasien' => $this->input->post("nmpas"),
			'nama_pgl' => $this->input->post("nmp"),
			'tgl_lahir' => $tgllahir,
			'umur' => hitungumur($tgllahir),
			'pendidikan' => $this->input->post("pendidikan"),
			'pekerjaan' => $this->input->post("pekerjaan"),
			'nama_ortu' => $this->input->post("nmortu"),
			'alamat' => $this->input->post("alamat"),
			'provinsi' => $this->input->post("provtext"),
			'kota' => $this->input->post("kabtext"),
			'kecamatan' => $this->input->post("kectext"),
			'desa' => $this->input->post("keltext"),
			'telp' => $this->input->post("telp"),
			'hp' => $this->input->post("hp"),
			'telppj' => $this->input->post("telppj"),
			'status' => $this->input->post("stat"),
			'nama_png' => $this->input->post("pj"),
			'nama_klg' => $this->input->post("nmk"),
			'alamat_klg' => $this->input->post("ak"),
			'agama' => $this->input->post("ag"),
			'sex' => $this->input->post("jk"),
			'suku' => $this->input->post("suku"),
			'goldarah' => $this->input->post("goldarah"), 
			'golongan' => $this->input->post("gol"),
			'no_askes' => $this->input->post("nokartu"),
			'asuransi' => $this->input->post("asp"),
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'last_login' => date("Y-m-d H:i:s"),
			'tgl_daftar' => $tgldaftar,
			'kelashak' => $this->input->post("kh"),
			'foto' => "",
			'negara' => $this->input->post("negara"),
			'nik' => $this->input->post("nik"),
			'tempat_lahir' => $this->input->post("t4lahir"),
			'pekerjaan_ayahibu' => $this->input->post("pkrortu"),
			'pekerjaan_suamiistri' => $this->input->post("pkrsi")
		);

		$this->db->where('id', $this->input->post("id"));
		$dt = $this->db->update('pasien', $updatepasien);
		return $dt;
	}
	
	public function updatepasienfoto() {

		if (empty($_FILES['filedata']['name'])) {
			return array(
				'foto' => false,
				'err' => ""
			);
			// return false;
		} else {
			$config['upload_path']          = './assets/upload/pasien/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 1920;
			$config['max_height']           = 1080;
	
			$this->load->library('upload', $config);
	
			if ( !$this->upload->do_upload('filedata')) {
				return array(
					'foto' => "foto",
					'err' => $this->upload->display_errors()
				);
				// return "foto";
			} else {
				$data = $this->upload->data();
				$updatepasien = array(
					'foto' => $data['file_name'],
				);
	
				$this->db->where('id', $this->input->post("id"));
				$dt = $this->db->update('pasien', $updatepasien);
				return array(
					'foto' => $dt,
					'err' => ""
				);
			}
		}
    }

    public function hapusdatapasien() {

        /**
         * ambil data pasien kemudian delete
         */

        $id = $this->input->get("id");

        $this->db->select("no_rm");
        $this->db->from("pasien");
        $this->db->where("no_rm", $id);
        $datarm = $this->db->get();
		$rm = $datarm->row();
		
		$this->db->select("id");
		$this->db->from("register");
		$this->db->where('no_rm', $rm->no_rm);
		$datapasien = $this->db->count_all_results();

		if ($datapasien == 0) {
			if ($rm == null) {
				return false;
			} else {
				// $insertrm = array(
				// 	"no" => $rm->no_rm,
				// 	"created_at" => date("Y-m-d")
				// );
				// $this->db->insert('temp_rm_taken', $insertrm);
			}
	
			$dt = $this->db->delete('pasien', array('no_rm' => $id));
			return $dt;
		} else {
			return false;
		}
    }

	//untuk regis UGD
	public function carinamapasienugd() {
		$tglp = $this->input->get("tglp");
		$date = date_create($tglp);
		$tgl = date_format($date,"Y-m-d");
		$nrp = $this->input->get("nrp");
		// $this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, register.bagian as bagian, register.id as id, register_detail.nama_unit as nama_unit, register.billing as billing");
		$this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas, register.tgl_masuk as tgl_masuk");
		$this->db->select("register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, register.bagian as bagian, register.id as id");
		$this->db->select("register_detail.nama_unit as nama_unit, register.billing as billing, pasien.title as title");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.bagian", "IGD");
		$this->db->where("register.billing", "0");
		$this->db->where("register_detail.idasal", "0");
		if (($tglp != "") || ($tglp != null)) {
			$this->db->where("register.tgl_masuk", $tgl);
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("pasien.no_rm", $nrp, "both");
		}
		// $this->db->group_by("register.notransaksi");
		$this->db->order_by("register_detail.id");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilnotrans() {
		$tgl = date("Y-m-d");
		$this->db->from("mtransaksi");
		$this->db->where("tgltransaksi", $tgl);
		$this->db->limit(1);
		$data = $this->db->get();
		if ($data->result() == NULL) {
			$numstart = 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%05d", $numstart);
			$numgabung = "TR" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		} else {
			$t = $data->row();
			$numstart = $t->nomor + 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%05d", $numstart);
			$numgabung = "TR" . substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function ambilkodebooking() {
		$tgl = date("Y-m-d");
		$this->db->from("mkodebooking");
		$this->db->where("tgltransaksi", $tgl);
		$this->db->limit(1);
		$data = $this->db->get();
		if ($data->result() == NULL) {
			$numstart = 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%04d", $numstart);
			// $numgabung = substr($numdate, 2) . $numend;
			$numgabung = '20'.substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		} else {
			$t = $data->row();
			$numstart = $t->nomor + 1;
			$numdate = str_replace("-", "", $tgl);
			$numend = sprintf("%04d", $numstart);
			// $numgabung = substr($numdate, 2) . $numend;
			$numgabung = '20'.substr($numdate, 2) . $numend;
			return array($tgl, $numstart, $numgabung);
		}
	}

	public function ambil_antrian_poli($kode_dokter) {
		$this->db->from('munit_rj');
		$this->db->where('kode_dokter',$kode_dokter);
		$this->db->limit(1);
		$query_rj = $this->db->get();
		$unit_rj = $query_rj->result();
		$kdpoli = $unit_rj[0]->kode_poli;

		$tgl = date("Y-m-d");
		$this->db->from("mtransaksi_poli");
		$this->db->where("tgltransaksi", $tgl);
		$this->db->where("kode_poli", $kdpoli);
		$this->db->limit(1);
		$data = $this->db->get();
		if ($data->result() == NULL) {
			$numstart = 1;
			//save di transaksi_poli
			$dataubah = array(
					"tgltransaksi" => $tgl,
					"kode_poli" => $kdpoli,
					"nomor" => $numstart
				);
				$this->db->insert('mtransaksi_poli', $dataubah);
			// return array($tgl, $numstart, $kdpoli);
			return $numstart;
		} else {
			$t = $data->row();
			$numstart = $t->nomor + 1;
			$dataubah = array(
				"nomor" => $numstart
			);
			$this->db->where("tgltransaksi", $tgl);
			$this->db->where("kode_poli", $kdpoli);
			$this->db->update('mtransaksi_poli', $dataubah);
			// return array($tgl, $numstart, $kdpoli);
			return $numstart;
		}
	}

	
	public function simpanregisugd($dtnotrans, $hasilicd) {

        $this->db->select("id");
        $this->db->from("register_detail");
        $this->db->where("status", "0");
        $this->db->where("no_rm", $this->input->get("rm"));
        $query = $this->db->get();
        $hasil = $query->num_rows();
        if ($hasil != 0) {
            return "ada";
        }
		if (isset($hasilicd->icd_code) || isset($hasilicd->jenis_penyakit_local)){
			$codediagawal=$hasilicd->icd_code;
			$ketdiagawal=$hasilicd->jenis_penyakit_local;
		} else {
			$codediagawal="";
			$ketdiagawal="";			
		}

		$date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));
		$simpanregister = array(
			'no_rm' => $this->input->get("rm"), 
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'cara' => "", 
			'kirim' => "", 
			'kirim_ket' => "", 
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
			'bagian' => "IGD", 
			'status' => "0", 
			'tgl_keluar' => "0000-00-00", 
			'jam_keluar' => "00:00:00",
            'diag' => "",
            'nodaftar' => "",
            'nodtd' => "",
			'kondisi_keluar' => "", 
			'cara_keluar' => "", 
			'ket_keluar' => "", 
			'saat_keluar' => "", 
			'totalbayar' => "0", 
			'selisih' => "0", 
			'kelashak' => "", 
			'diagbpjs' => "",
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'barulama' => $this->input->get("kunjungan"), 
			'notransaksi' => $dtnotrans[2], 
			'nosep' => $this->input->get("sep"),
			'tglsep' => "", 
			'tglkunjungan' => "0000-00-00", 
			'tglrujukan' => $tglr, 
			'norujukan' => "", 
			'ppkrujukan' => "", 
			'nmppkrujukan' => "", 
			'ppkpelayanan' => "", 
			'nmppkpelayanan' => "", 
			'jnspelayanan' => "0",
            'catatan' => $this->input->get("cat"),
			'diagawal' => $codediagawal,
			'ketdiagawal' => $ketdiagawal,
			'politujuan' => "", 
			'nmpolitujuan' => "", 
			'kdklsrawat' => "",
			'usersep' => "", 
			'nik' => "", 
			'pisa' => "", 
			'jk' => "", 
			'tgllahir' => "", 
			'nmprovider' => "", 
			'nmcabang' => "", 
			'kdcabang' => "", 
			'jenispeserta' => "", 
			'kdjenispeserta' => "", 
			'nmkelas' => "", 
			'kdkelas' => "", 
			'beratlahir' => "0", 
			'tarifbilling' => "0", 
			'nilaibpjs' => "0", 
			'kodeinacbg' => "", 
			'type_inacbg' => "0", 
			'nosjp' => "0", 
			'namapasiensep' => "", 
			'keluarpada' => "", 
			'tglsetor' => "0000-00-00", 
			'waktusetor' => "0", 
			'lengkap' => "0", 
			'identitastfrs' => "0", 
			'laporanpenting' => "0", 
			'autentifikasi' => "0", 
			'pencatatanbaik' => "0", 
			'diagnosautama' => "0", 
			'resume' => "0", 
			'operasi' => "0", 
			'laporanoperasi' => "0", 
			'laporananastesi' => "0", 
			'persetujuanoperasi' => "0",
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'jamdaftar' => date("H:i:s"), 
			'jamselesai' => "", 
			'selesaidaftar' => "0", 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'diagnosaawal' => "", 
			'kode_keluarpada' => "", 
			'kondisistatus' => "0", 
			'ceknamadokter' => "0", 
			'cekttddokter' => "0",
			'carabayar' => "0", 
			'klinik' => "0", 
			'keterangan' => "", 
			'prosesugd' => "0", 
			'pisat' => "", 
			'rujukan' => $this->input->get("rujukantext"), 
			'verifikasi' => "", 
			'kdStatSep' => "", 
			'disetujui' => "0", 
			'kondisibrm' => "", 
			'pulang' => "0", 
			'tarifrsinacbg' => "0",
            'jenislayanan' => $this->input->get("jp"),
            'keluhanawal' => $this->input->get("keluhan"),
			'hapus' => "0",
            'billing' => "0",
            'icd_code_estimasi' => "",
            'diag_estimasi' => "",
            'tarif_estimasi' => "0",
            'status_billing' => "0",
            'cara_masuk' => $this->input->get("cm")	
		);

		$simpanregisdetail = array(
			'no_rm' => $this->input->get("rm"), 
			'kode_kelas' => "",
			'nama_kelas' => "",
			'kode_unit' => $this->input->get("tp"),
			'nama_unit' => $this->input->get("tptext"),
			'tgl_masuk_kamar' => $tglm, 
			'tgl_keluar_kamar' => "0000-00-00", 
			'tgl_masuk' => $tglm, 
			'status' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'rujukandetail' => "0", 
			'kode_unitR' => "ALOKET", 
			'nama_unitR' => "LOKET PEMBAYARAN",  
			'statuskeluar' => "0", 
			'nokamar' => "", 
			'kamarkeluar' => "0", 
			'notransaksi' => $dtnotrans[2], 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'jam_masuk' => $jamm, 
			'jam_keluar' => "", 
			'ruanganaktif' => "", 
			'pulang' => "0", 
			'kode_kamar' => "",
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'hapus' => "0", 
			'idasal' => "0", 
			'pindah' => "0"
		);

		if ($dtnotrans[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->insert('mtransaksi', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->where("tgltransaksi", $dtnotrans[0]);
			$this->db->update('mtransaksi', $dataubah);
		}

		$dt1 = $this->db->insert('register', $simpanregister);
		$dt2 = $this->db->insert('register_detail', $simpanregisdetail);
		$idDetail = $this->db->insert_id();

		$this->load->model("FilterUgd");
		$this->FilterUgd->filterpindahkamar($idDetail);

		return $dt2;
	}

    public function regishapusugd() {
        $id = $this->input->get('id');

        $this->db->from('register');
        $this->db->select('notransaksi');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();

        $this->db->from('ptindakan');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datatind = $this->db->get();
        $tindakan = $datatind->num_rows();

		$this->db->from('ptindakanperawat');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datatindper = $this->db->get();
		$tindakanper = $datatindper->num_rows();

		$this->db->from('register_instalasi');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datareg_inst = $this->db->get();
        $reg_inst = $datareg_inst->num_rows();

        $this->db->from('pbhp');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $bhp = $databhp->num_rows();

        $this->db->from('po2');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $odua = $databhp->num_rows();

        $this->db->from('resep_header');
        $this->db->select('idnoresep');
        $this->db->where('notraksaksi', $no->notransaksi);
        $dataresep = $this->db->get();
        $resep = $dataresep->num_rows();

		
        if (($tindakan == 0) && ($tindakanper == 0) && ($reg_inst == 0) && ($bhp == 0) && ($resep == 0) && ($odua == 0)) {
            $this->db->where('id', $id);
            $dt = $this->db->delete('register');
            $this->db->where('no_transaksi_secondary', $no->notransaksi);
            $dt1 = $this->db->delete('register_detail');
            return $dt1;
        } else {
            return false;
        }

    }

    public function ambildataregisugd() {
        $id = $this->input->get('id');
        $this->db->from('register');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function ambildataregisdetailugd($no) {
        $this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        $this->db->where('status', 0);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

	public function ambildataregisdetail_atas($no) {
        $this->db->select('kode_unit');
		$this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        // $this->db->where('status', 0);
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

	public function ambildatakamar_sebelumnya($no) {
        $this->db->select('kode_kamar');
		$this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        // $this->db->where('status', 0);
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function editregisugd($hasilicd) {
        $date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));

		
		//cari data id record pertama pada register_detail
		$no_rm=$this->input->get("rm");
		 $qry24 = $this->db->query("SELECT notransaksi from register WHERE no_rm='$no_rm' and bagian='IGD' and status=0  LIMIT 1");
		 $qry24row = $qry24->row();
		 $notransaksi = $qry24row->notransaksi;
		
		 $qry25 = $this->db->query("SELECT id from register_detail WHERE no_rm='$no_rm' and notransaksi='$notransaksi'  order by id ASC LIMIT 1");
		 $qry25row = $qry25->row();
		 $id_detail_awal= $qry25row->id;
		
        $simpanregister = array(
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'barulama' => $this->input->get("kunjungan"), 
			'tglrujukan' => $tglr, 
			'ppkrujukan' => $this->input->get("faskes"), 
			'nmppkrujukan' => $this->input->get("faskestext"), 
			'catatan' => $this->input->get("cat"),
			'nosep' => $this->input->get("sep"),
            'diagawal' => $hasilicd->icd_code,
            'ketdiagawal' => $hasilicd->jenis_penyakit_local,
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'rujukan' => $this->input->get("rujukantext"), 
            'jenislayanan' => $this->input->get("jp"),
            'keluhanawal' => $this->input->get("keluhan"),
            'cara_masuk' => $this->input->get("cm")
        );
        $this->db->where('id', $this->input->get("id"));
		$this->db->update('register', $simpanregister);
		
		$simpanregisdetail = array(
			'kode_unit' => $this->input->get("tp"), 
			'nama_unit' => $this->input->get("tptext"), 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk' => $tglm, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'jam_masuk' => $jamm, 
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
		);
		// $this->db->where('id', $this->input->get("datadetail"));
		$this->db->where('id', $id_detail_awal);
		$dt = $this->db->update('register_detail', $simpanregisdetail);

        return $dt;
    }
	///=================

	//untuk regis INAP


	// public function carinamapasienuri() {
	// 	$tglp = $this->input->get("tglp");
	// 	$date = date_create($tglp);
	// 	$tgl = date_format($date,"Y-m-d");
	// 	$nrp = $this->input->get("nrp");
	// 	$this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, register.bagian as bagian, register.id as id");
	// 	$this->db->from("register");
	// 	$this->db->join("pasien", "pasien.no_rm = register.no_rm");
    //     $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
    //     $this->db->join("munit", "munit.kode_unit = register_detail.kode_unit");
	// 	$this->db->where("munit.inap", "1");
    //     $this->db->where("register.billing", "0");
	// 	if (($tglp != "") || ($tglp != null)) {
	// 		$this->db->where("register_detail.tgl_masuk_kamar", $tgl);
	// 	}
	// 	if (($nrp != "") || ($nrp != null)) {
	// 		$this->db->like("pasien.no_rm", $nrp, "both");
	// 	}
	// 	$data = $this->db->get();
	// 	return $data->result();
	// } DIGANTI KARENA TAMPIL JUGA YG BUKAN REGISTER

	public function carinamapasienuri() {
		$tglp = $this->input->get("tglp");
		$date = date_create($tglp);
		$tgl = date_format($date,"Y-m-d");
		$nrp = $this->input->get("nrp");
		$this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas, register.tgl_masuk as tgl_masuk");
		$this->db->select("register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, register.bagian as bagian, register.id as id");
		$this->db->select("register_detail.nama_unit as nama_unit, register.billing as billing, register_detail.id as iddetail, pasien.title as title");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");

		$this->db->where("register.billing", "0");
		// $this->db->where("register_detail.idasal", "0");
		if (($tglp != "") || ($tglp != null)) {
			$this->db->where("register_detail.tgl_masuk", $tgl);
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("pasien.no_rm", $nrp, "both");
		}

		// $this->db->where('register.bagian !=', 'JALAN');

		$this->db->group_start();			
			$this->db->group_start();			
				$this->db->where("register.bagian", "IGD");
				$this->db->where("register.kode_keluarpada !=", "IGDD");
				$this->db->where("register.kode_keluarpada !=", "IGDP");
				// $this->db->where("register.kode_keluarpada !=", "");
				$this->db->where('register_detail.kode_unitR', 'IGDD');
				$this->db->or_where('register_detail.kode_unitR', 'IGDP');
			$this->db->group_end();
				// $this->db->or_where("register.bagian", "INAP");		
				$this->db->or_where("register.bagian", "INAP");		
		$this->db->group_end();

		// $this->db->group_by("register.notransaksi");
		$this->db->order_by("register_detail.id");
		$data = $this->db->get();
		return $data->result();
	}



	public function xxxxx($totalbilling, $asuransi) {
		
        $qry1 = $this->db->query("SELECT `persen_kamar`, `persen_obat` FROM `masuransi` WHERE `nama_asuransi`='".$asuransi."' LIMIT 1 ");
        $qry1row = $qry1->row();
        if ($qry1row == null) { 
            return 0;
        } else {
            $temp = ($totalbilling * $qry1->persen_obat) / 100;
            return ($totalbilling - $temp);
        }
    }

	

	public function simpanregisuri($dtnotrans, $hasilicd) {
        $this->db->select("id");
        $this->db->from("register_detail");
        $this->db->where("status", "0");
        $this->db->where("no_rm", $this->input->get("rm"));
        $query = $this->db->get();
        $hasil = $query->num_rows();
        if ($hasil != 0) {
            return "ada";
        }
		//cari dulu kelas sesuai kamar yg ada
		$xkode_kamar=$this->input->get("kp");
		$qry1 = $this->db->query("SELECT kode_kelas, nama_kelas FROM mkamar WHERE kode_kamar='".$xkode_kamar."' LIMIT 1 ");
        $qry1row = $qry1->row();
		$kode_kelas=$qry1row->kode_kelas;
		$nama_kelas=$qry1row->nama_kelas;

		$date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));

		$simpanregister = array(
			'no_rm' => $this->input->get("rm"), 
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'cara' => "", 
			'kirim' => "", 
			'kirim_ket' => "", 
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
			'bagian' => "INAP", 
			'status' => "0", 
			'tgl_keluar' => "0000-00-00", 
			'jam_keluar' => "00:00:00", 
			'diag' => "",
			'nodaftar' => "",
			'nodtd' => "",
			'kondisi_keluar' => "", 
			'cara_keluar' => "", 
			'ket_keluar' => "", 
			'saat_keluar' => "", 
			'totalbayar' => "0", 
			'selisih' => "0", 
			'kelashak' => "", 
			'diagbpjs' => "",
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
			'kode_dokter' => $this->input->get("dokter"),
			'nama_dokter' => $this->input->get("doktertext"),
			'barulama' => $this->input->get("kunjungan"), 
			'notransaksi' => $dtnotrans[2], 
			'nosep' => $this->input->get("sep"),
			'tglsep' => "", 
			'tglkunjungan' => "0000-00-00", 
			'tglrujukan' => $tglr, 
			'norujukan' => "", 
			'ppkrujukan' => "", 
			'nmppkrujukan' => "", 
			'ppkpelayanan' => "", 
			'nmppkpelayanan' => "", 
			'jnspelayanan' => "0", 
			'catatan' => $this->input->get("cat"),
            'diagawal' => $hasilicd->icd_code,
            'ketdiagawal' => $hasilicd->jenis_penyakit_local,
			'politujuan' => "", 
			'nmpolitujuan' => "", 
			'kdklsrawat' => "",
			'usersep' => "", 
			'nik' => "", 
			'pisa' => "", 
			'jk' => "", 
			'tgllahir' => "", 
			'nmprovider' => "", 
			'nmcabang' => "", 
			'kdcabang' => "", 
			'jenispeserta' => "", 
			'kdjenispeserta' => "", 
			'nmkelas' => "", 
			'kdkelas' => "", 
			'beratlahir' => "0", 
			'tarifbilling' => "0", 
			'nilaibpjs' => "0", 
			'kodeinacbg' => "", 
			'type_inacbg' => "0", 
			'nosjp' => "0", 
			'namapasiensep' => "", 
			'keluarpada' => "", 
			'tglsetor' => "0000-00-00", 
			'waktusetor' => "0", 
			'lengkap' => "0", 
			'identitastfrs' => "0", 
			'laporanpenting' => "0", 
			'autentifikasi' => "0", 
			'pencatatanbaik' => "0", 
			'diagnosautama' => "0", 
			'resume' => "0", 
			'operasi' => "0", 
			'laporanoperasi' => "0", 
			'laporananastesi' => "0", 
			'persetujuanoperasi' => "0", 
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'jamdaftar' => date("H:i:s"), 
			'jamselesai' => "", 
			'selesaidaftar' => "0", 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'diagnosaawal' => "", 
			'kode_keluarpada' => "", 
			'kondisistatus' => "0", 
			'ceknamadokter' => "0", 
			'cekttddokter' => "0",
			'carabayar' => "0", 
			'klinik' => "0", 
			'keterangan' => "", 
			'prosesugd' => "0", 
			'pisat' => "", 
			'rujukan' => $this->input->get("rujukantext"), 
			'verifikasi' => "", 
			'kdStatSep' => "", 
			'disetujui' => "0", 
			'kondisibrm' => "", 
			'pulang' => "0", 
			'tarifrsinacbg' => "0",
            'jenislayanan' => $this->input->get("jp"),
			'keluhanawal' => $this->input->get("keluhan"),
			'hapus' => "0",
            'billing' => "0",
            'icd_code_estimasi' => "",
            'diag_estimasi' => "",
            'tarif_estimasi' => "0",
            'status_billing' => "0",
            'cara_masuk' => $this->input->get("cm")
		);

		$simpanregisdetail = array(
			'no_rm' => $this->input->get("rm"), 
			'kode_kelas' => $kode_kelas,
			'nama_kelas' => $nama_kelas,
			'kode_unit' => $this->input->get("tp"), 
			'nama_unit' => $this->input->get("tptext"), 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_keluar_kamar' => "0000-00-00", 
			'tgl_masuk' => $tglm, 
			'status' => "0", 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'rujukandetail' => "0", 
			'kode_unitR' => "ALOKET", 
			'nama_unitR' => "LOKET PEMBAYARAN",  
			'statuskeluar' => "0", 
			'nokamar' => "", 
			'kamarkeluar' => "0", 
			'notransaksi' => $dtnotrans[2], 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'jam_masuk' => $jamm, 
			'jam_keluar' => "", 
			'ruanganaktif' => "", 
			'pulang' => "0", 
			'kode_kamar' => $this->input->get("kp"),
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'hapus' => "0", 
			'idasal' => "0", 
			'pindah' => "0"
		);

		if ($dtnotrans[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->insert('mtransaksi', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->where("tgltransaksi", $dtnotrans[0]);
			$this->db->update('mtransaksi', $dataubah);
		}

		$dt1 = $this->db->insert('register', $simpanregister);
		$dt2 = $this->db->insert('register_detail', $simpanregisdetail);
		$idDetail = $this->db->insert_id();

		$this->load->model("FilterInap");
		$this->FilterInap->filterpindahkamar($idDetail);

		return $dt2;
	}

    public function regishapusuri() {
        $id = $this->input->get('id');

        $this->db->from('register');
        $this->db->select('notransaksi');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();

        $this->db->from('ptindakan');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datatind = $this->db->get();
		$tindakan = $datatind->num_rows();
		
		$this->db->from('ptindakanperawat');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datatindper = $this->db->get();
		$tindakanper = $datatindper->num_rows();
		
		$this->db->from('register_instalasi');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datareg_inst = $this->db->get();
        $reg_inst = $datareg_inst->num_rows();

        $this->db->from('pbhp');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $bhp = $databhp->num_rows();

        $this->db->from('po2');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $odua = $databhp->num_rows();

        $this->db->from('resep_header');
        $this->db->select('idnoresep');
        $this->db->where('notraksaksi', $no->notransaksi);
        $dataresep = $this->db->get();
        $resep = $dataresep->num_rows();

        if (($tindakan == 0) && ($tindakanper == 0) && ($reg_inst == 0) && ($bhp == 0) && ($resep == 0) && ($odua == 0)) {
            $this->db->where('id', $id);
            $dt = $this->db->delete('register');
            $this->db->where('no_transaksi_secondary', $no->notransaksi);
            $dt1 = $this->db->delete('register_detail');
            return $dt1;
        } else {
            return false;
        }
    }

    public function ambildataregisuri() {
        $id = $this->input->get('id');
        $this->db->from('register');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function ambildataregisdetailuri($no) {
        $this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        $this->db->where('status', 0);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function editregisuri($hasilicd) {
        $date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));

		//cari dulu kelas sesuai kamar yg ada
		$xkode_kamar=$this->input->get("kp");
		$qry1 = $this->db->query("SELECT kode_kelas, nama_kelas FROM mkamar WHERE kode_kamar='".$xkode_kamar."' LIMIT 1 ");
        $qry1row = $qry1->row();
		$kode_kelas=$qry1row->kode_kelas;
		$nama_kelas=$qry1row->nama_kelas;

			//cari data id record pertama pada register_detail
			$no_rm=$this->input->get("rm");
			$qry24 = $this->db->query("SELECT notransaksi from register WHERE no_rm='$no_rm' and (bagian='INAP' or bagian='IGD') and status=0  LIMIT 1");
			$qry24row = $qry24->row();
			$notransaksi = $qry24row->notransaksi;
		   
			$qry25 = $this->db->query("SELECT id from register_detail WHERE no_rm='$no_rm' and notransaksi='$notransaksi'  order by id ASC LIMIT 1");
			$qry25row = $qry25->row();
			$id_detail_awal= $qry25row->id;

        $simpanregister = array(
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'barulama' => $this->input->get("kunjungan"), 
			'tglrujukan' => $tglr, 
			'ppkrujukan' => $this->input->get("faskes"), 
			'nmppkrujukan' => $this->input->get("faskestext"), 
            'catatan' => $this->input->get("cat"),
            'diagawal' => $hasilicd->icd_code,
            'ketdiagawal' => $hasilicd->jenis_penyakit_local,
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'rujukan' => $this->input->get("rujukantext"), 
            'jenislayanan' => $this->input->get("jp"),
            'keluhanawal' => $this->input->get("keluhan"),
            'cara_masuk' => $this->input->get("cm")
        );
        $this->db->where('id', $this->input->get("id"));
		$this->db->update('register', $simpanregister);
		
		$simpanregisdetail = array(
			'kode_unit' => $this->input->get("tp"), 
			'nama_unit' => $this->input->get("tptext"), 
			'kode_kelas' => $kode_kelas, 
			'nama_kelas' => $nama_kelas, 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk' => $tglm, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'jam_masuk' => $jamm, 
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
            'kode_kamar' => $this->input->get("kp"),
			
		);
		// $this->db->where('id', $this->input->get("datadetail"));
		$this->db->where('id', $id_detail_awal);
		$dt = $this->db->update('register_detail', $simpanregisdetail);

        return $dt;
    }

	///=================

	//untuk regis JALAN
	public function carinamapasienurj() {
		$tglp = $this->input->get("tglp");
		$date = date_create($tglp);
		$tgl = date_format($date,"Y-m-d");
		$nrp = $this->input->get("nrp");
		// $this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas,register_detail.nama_unit as nama_unit, register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi, register.bagian as bagian, register.id as id, register.billing as billing");
		$this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.nmkelas as nmkelas,register_detail.nama_unit as nama_unit");
		$this->db->select("register.tgl_masuk as tgl_masuk, register.rujukan as rujukan, register.golongan as golongan, register.notransaksi as notransaksi");
		$this->db->select("register.bagian as bagian, register.id as id, register.billing as billing, pasien.title as title,register.user2 as user2");
		$this->db->from("register");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
		$this->db->where("register.bagian", "JALAN");
		$this->db->where("register.billing", "0");
		$this->db->where("register_detail.idasal", "0");
		if (($tglp != "") || ($tglp != null)) {
			$this->db->where("register.tgl_masuk", $tgl);
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("pasien.no_rm", $nrp, "both");
		}
		// $this->db->group_by("register.notransaksi");
		$this->db->order_by("register_detail.id desc");
		$data = $this->db->get();
		return $data->result();
	}
// =================DISINI OTOMATIS RADIOLOGI ========
	public function simpanregisurj($dtnotrans, $hasilicd, $dtantrian_poli, $dtnokodebookingnya, $dtnokodebooking) {
		// $this->load->model("Bpjsantrolmodel");
		// $request_headers = $this->Bpjsantrolmodel->ambilheader();
		// console.log($request_headers);

		//cek sebagai barulama
		$date = date_create($this->input->get("tglmasuk"));
		$thn = date_format($date,"Y");
		$rm=$this->input->get("rm");
		// $qry2=$this->db->query("select noresep from resep_header where notraksaksi='$notrxnya' and kode_unit='$kode_unitnya' limit 1 ");
		$qry2 = $this->db->query("SELECT id from register WHERE no_rm='$rm' and YEAR(tgl_masuk)='$thn' ");
		// $qry2 = $this->db->query("SELECT id from register WHERE no_rm='301360' and YEAR(tgl_masuk)='2022' ");
		$ada=$qry2->num_rows();
		if ($ada == 0 ){
	        $barulama=1;
		} else {
	        $barulama=2;
		}	

		
		$no_askes=$this->input->get("nokartu");
		$nik=$this->input->get("nik");
		$ceknokartu = gantiangka($this->input->get("ceknokartu"));
		$ceknik = gantiangka($this->input->get("ceknik"));

		$kodepoli='';
		$namapoli='';
		$huruppoli='';
		$kode_unitpilih=$this->input->get("tp");

		$caripolisepnya=$this->caripolisep($kode_unitpilih);
		foreach($caripolisepnya as $row) {
			$kodepoli=$row->kodepoliSEP;
			$namapoli=$row->namapoliSEP;
			$huruppoli=$row->huruppoli;
		}		

		$noantrianloket= $this->input->get("noantrianloket");
	    $this->db->select("id");
	    $this->db->from("register_detail");
	    $this->db->where("status", "0");
        $this->db->where("no_rm", $this->input->get("rm"));
	    $query = $this->db->get();
	    $hasil = $query->num_rows();
	    if ($hasil != 0) {
	        return "ada";
        }
		$date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));
		if($golc=="BPJS") {
			$jenispasien='JKN';
		} else {
			$jenispasien='NON JKN';
		}
		$nomorkartu=$no_askes;
		$nohp='';
		$tgl_daftar='';
		$no_rm_cari=$this->input->get("rm");	
		$datapasiennya=$this->carikartu($no_rm_cari);
		foreach($datapasiennya as $row) {
			// $nomorkartu=$row->no_askes;
			// $nik=$row->nik;
			$nohp=$row->hp;
			$tgl_daftar=$row->tgl_daftar;
		}
		if ($nohp == "") { $nohp ="-"; }
		$tglhariini=date("Y-m-d");
		if($tgl_daftar==$tglm){
			$pasienbaru=1;
		} else {
			$pasienbaru=0;
		}
		
		// 1 (Rujukan FKTP), 2 (Rujukan Internal), 3(Kontrol), 4 (Rujukan Antar RS)},
		$rujukanmasuk=$this->input->get("rujukantext");
		if($rujukanmasuk=="PUSKESMAS" || $rujukanmasuk=="DOKTER PRAKTEK" || $rujukanmasuk=="KLINIK"){
			$jeniskunjungan=1;
		} elseif ($rujukanmasuk=="RS PEMERINTAH" || $rujukanmasuk=="RS SWASTA"){
			$jeniskunjungan=4;
		} elseif ($rujukanmasuk=="RUJUKAN INTERNAL" ){
			$jeniskunjungan=2;
		} else{
			$jeniskunjungan=3;
		}
		$nomorreferensi=$this->input->get("norujukan");
		$nomorantrean=$noantrianloket;
		
		$angkaantrean=trim(substr($nomorantrean,1));


		$dtnomorantrian_poli=$huruppoli.$dtantrian_poli;

		// $jenispasien='NON JKN'; / $jenispasien='JKN';
		$nopasien=(int)$angkaantrean;
		$kodedokter="--";
		$namadokter="--";
		$jampraktek="--";
		$estimasidilayani="";
		$sisakuotajkn=0;
		$kuotajkn=0;
		$sisakuotanonjkn=0;
		$kuotanonjkn=0;
		$kode_dokter_simrs=$this->input->get("dokter");
		$kodebpjsdokter=$this->carikodebpjsdokter($kode_dokter_simrs);
		foreach($kodebpjsdokter as $row) {
			$kodedokter=$row->kodebpjs;
		}			
		$jammulai="08:00";
		//cari data lainnya di hfis
		$datahfis=$this->caridatahafis($kodedokter,$tglm);
		foreach($datahfis as $row) {
			// $kodedokter=$row->kodebpjs;
			$namadokter=$row->namadokter;
			$jampraktek=$row->jadwal;
			$jammulai=substr($jampraktek,0,5);
			if ($jenispasien=='JKN') {
				$kuotajkn=$row->kapasitaspasien;
				$sisakuotajkn=$kuotajkn-$row->pasienjkn-1;
				$kuotanonjkn=40;
				$sisakuotanonjkn=$kuotanonjkn-$row->pasiennonjkn;
				$this->db->query("update y_jadwaldokter set pasienjkn=pasienjkn+1 where kodedokter=$kodedokter and tanggal='$tglm' LIMIT 1");        
			} else {
				$kuotanonjkn=40;
				$sisakuotanonjkn=$kuotanonjkn-$row->pasiennonjkn-1;
				$kuotajkn=$row->kapasitaspasien;
				$sisakuotajkn=$kuotajkn-$row->pasienjkn;
				$this->db->query("update y_jadwaldokter set pasiennonjkn=pasiennonjkn+1 where kodedokter=$kodedokter and tanggal='$tglm' LIMIT 1");        
			}
		}	
		//ambil jam ambilestimasi
		$ts0=$this->ambilestimasi($tglm,$jammulai,$nopasien);
		$estimasidilayani=$ts0.'000';			
		$keterangan="Pendaftaran di loket RS";
		
		$kode_booking=$dtnokodebookingnya;

		// $nomor_antriannya=$dtantrian_poli->
		if (isset($hasilicd)) {
			$diagawal = $hasilicd->icd_code;
			$ketdiagawal = $hasilicd->jenis_penyakit_local;
		} else {
			$diagawal = "";
			$ketdiagawal = "";
		}
		if ($kode_unitpilih=='LABS' || $kode_unitpilih=='RDLG') { 
			$statusnya="1";
			$tgl_keluarnya=$tglm;
			$jam_keluarnya='18:00:00';
			$pulangnya="1";
			$kode_keluarpadanya=$kode_unitpilih;
			if ($kode_unitpilih=='LABS'){$keluarpadanya='LABORATORIUM';} else {$keluarpadanya='RADIOLOGI';}
			$statuskeluarnya="1";
			$kamarkeluarnya="1";
		} else {
			$statusnya="";
			$tgl_keluarnya="0000-00-00";
			$jam_keluarnya='00:00:00';
			$pulangnya="0";
			$kode_keluarpadanya="";
			$keluarpadanya="";
			$statuskeluarnya="";
			$kamarkeluarnya="0";
		}

		//ambil waktu antrian taskid 1 dan taskid 2
		date_default_timezone_set('Asia/Makassar');
		$waktunya=$this->ambilwaktu($nomorantrean,$angkaantrean);
		foreach($waktunya as $row) {
			$jam_ambilnomor=$row->jam_ambilnomer;
			$jam_panggil=$row->jam_panggil;
		}			

		//simpan taskid
		if (trim($noantrianloket) !='') {
		$simpantaskid1 = array(
			'kodebooking' => $dtnokodebookingnya,
			'taskid' => 1,
			'waktu' => $jam_ambilnomor,
			'flag' => 0
		);

		$simpantaskid2 = array(
			'kodebooking' => $dtnokodebookingnya,
			'taskid' => 2,
			'waktu' => $jam_panggil,
			'flag' => 0
		);
		// date_default_timezone_set('Asia/Makassar');
		$waktusekarang=date("Y-m-d h:i:sa");
		$simpantaskid3 = array(
			'kodebooking' => $dtnokodebookingnya,
			'taskid' => 3,
			'waktu' => $waktusekarang,
			'flag' => 0
		);


		$simpanregissend = array(
			'kode_booking' => $dtnokodebookingnya,
			'jenispasien' => $jenispasien,
			'nomorkartu' => $nomorkartu,
			'nik' => $nik,
			'nohp' => $nohp,
			'kodepoli' => $kodepoli,
			'namapoli' => $namapoli,
			'pasienbaru' => $pasienbaru,
			'norm' => $this->input->get("rm"),
			'tanggalperiksa' => $tglm,
			'kodedokter' => $kodedokter,
			'namadokter' => $namadokter,
			'jampraktek' => $jampraktek,
			'jeniskunjungan' => $jeniskunjungan,
			'nomorreferensi' => $nomorreferensi,
			'nomorantrean' => $dtnomorantrian_poli,
			'angkaantrean' => $dtantrian_poli,
			'estimasidilayani' => $estimasidilayani,
			'sisakuotajkn' => $sisakuotajkn,
			'kuotajkn' => $kuotajkn,
			'sisakuotanonjkn' => $sisakuotanonjkn,
			'kuotanonjkn' => $kuotanonjkn,
			'keterangan' => $keterangan,
			'flag' => 0,
			'pesan' =>""
		);

	}
		$simpanregister = array(
			'no_rm' => $this->input->get("rm"), 
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'cara' => "", 
			'kirim' => "", 
			'kirim_ket' => "", 
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
			'bagian' => "JALAN", 
			'status' => $statusnya, 
			'tgl_keluar' => $tgl_keluarnya, 
			'jam_keluar' => $jam_keluarnya,
            'diag' => "",
            'nodaftar' => "",
            'nodtd' => "",
			'kondisi_keluar' => "", 
			'cara_keluar' => "", 
			'ket_keluar' => "", 
			'saat_keluar' => "", 
			'totalbayar' => "0", 
			'selisih' => "0", 
			'kelashak' => "", 
			'diagbpjs' => "",
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			// 'barulama' => $this->input->get("kunjungan"), 
			'barulama' => $barulama, 
			'notransaksi' => $dtnotrans[2], 
			'nosep' => $this->input->get("sep"),
			'tglsep' => "", 
			'tglkunjungan' => "0000-00-00", 
			'tglrujukan' => $tglr, 
			'norujukan' => $this->input->get("norujukan"), 
			'ppkrujukan' => $this->input->get("faskes"), 
			'nmppkrujukan' => $this->input->get("faskestext"), 
			'ppkpelayanan' => "", 
			'nmppkpelayanan' => "", 
			'jnspelayanan' => "0",
            'catatan' => $this->input->get("cat"),
            'diagawal' => $diagawal,
			'ketdiagawal' => $diagawal,
			'politujuan' => "", 
			'nmpolitujuan' => "", 
			'kdklsrawat' => "",
			'usersep' => "", 
			'nik' => "", 
			'pisa' => "", 
			'jk' => "", 
			'tgllahir' => "", 
			'nmprovider' => "", 
			'nmcabang' => "", 
			'kdcabang' => "", 
			'jenispeserta' => "", 
			'kdjenispeserta' => "", 
			'nmkelas' => "", 
			'kdkelas' => "", 
			'beratlahir' => "0", 
			'tarifbilling' => "0", 
			'nilaibpjs' => "0", 
			'kodeinacbg' => "", 
			'type_inacbg' => "0", 
			'nosjp' => "0", 
			'namapasiensep' => "", 
			'keluarpada' => "", 
			'tglsetor' => "0000-00-00", 
			'waktusetor' => "0", 
			'lengkap' => "0", 
			'identitastfrs' => "0", 
			'laporanpenting' => "0", 
			'autentifikasi' => "0", 
			'pencatatanbaik' => "0", 
			'diagnosautama' => "0", 
			'resume' => "0", 
			'operasi' => "0", 
			'laporanoperasi' => "0", 
			'laporananastesi' => "0", 
			'persetujuanoperasi' => "0", 
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'jamdaftar' => date("H:i:s"), 
			'jamselesai' => "", 
			'selesaidaftar' => "0", 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'diagnosaawal' => "", 
			'kode_keluarpada' => $kode_keluarpadanya, 
			'kondisistatus' => "0", 
			'ceknamadokter' => "0", 
			'cekttddokter' => "0",
			'carabayar' => "0", 
			'klinik' => "0", 
			'keterangan' => "", 
			'prosesugd' => "0", 
			'pisat' => "", 
			'rujukan' => $this->input->get("rujukantext"), 
			'verifikasi' => "", 
			'kdStatSep' => "", 
			'disetujui' => "0", 
			'kondisibrm' => "", 
			'pulang' => $pulangnya, 
			'tarifrsinacbg' => "0",
            'jenislayanan' => $this->input->get("jp"),
            'keluhanawal' => $this->input->get("keluhan"),
            'hapus' => "0",
            'billing' => "0",
            'icd_code_estimasi' => "",
            'diag_estimasi' => "",
            'tarif_estimasi' => "0",
            'status_billing' => "0",
            'cara_masuk' => $this->input->get("cm"),
			'keluarpada' => $keluarpadanya,
			'kode_booking' => $dtnokodebookingnya,
			'noantrianloket' => $noantrianloket
		);

		$simpanregisdetail = array(
			'no_rm' => $this->input->get("rm"), 
			'kode_kelas' => "",
			'nama_kelas' => "",
			'kode_unit' => $this->input->get("tp"), 
			'nama_unit' => $this->input->get("tptext"), 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_keluar_kamar' => $tgl_keluarnya, 
			'tgl_masuk' => $tglm, 
			'status' => $statusnya, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'rujukandetail' => "0", 
			'kode_unitR' => "ALOKET", 
			'nama_unitR' => "LOKET PEMBAYARAN",  
			'statuskeluar' => $statuskeluarnya, 
			'nokamar' => "", 
			'kamarkeluar' => $kamarkeluarnya, 
			'notransaksi' => $dtnotrans[2], 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'jam_masuk' => $jamm, 
			'jam_keluar' => $jam_keluarnya, 
			'ruanganaktif' => "", 
			'pulang' => $pulangnya, 
			'kode_kamar' => "",
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'hapus' => "0", 
			'idasal' => "0", 
			'pindah' => "0",
			'kode_booking' => $dtnokodebookingnya,
			'no_antrian' => $dtantrian_poli
		);

	
	
		if ($dtnotrans[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->insert('mtransaksi', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->where("tgltransaksi", $dtnotrans[0]);
			$this->db->update('mtransaksi', $dataubah);
		}

		// ======CARI DISIBI UNTUK IPDATE KODE BOOKING=======================
		if ($dtnokodebooking[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnokodebooking[0],
				"nomor" => $dtnokodebooking[1]
			);
			$this->db->insert('mkodebooking', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnokodebooking[0],
				"nomor" => $dtnokodebooking[1]
			);
			$this->db->where("tgltransaksi", $dtnokodebooking[0]);
			$this->db->update('mkodebooking', $dataubah);
		}

		// if (isset($noantrianloket)) {
		if (trim($noantrianloket) !='') {

			$this->db->insert('y_register_send', $simpanregissend);

			$this->db->insert('y_updatewaktu', $simpantaskid1);
			$this->db->insert('y_updatewaktu', $simpantaskid2);
			$this->db->insert('y_updatewaktu', $simpantaskid3);
		}

		

		$dt1 = $this->db->insert('register', $simpanregister);
		$dt2 = $this->db->insert('register_detail', $simpanregisdetail);
		

		$idDetail = $this->db->insert_id();
		$this->load->model("FilterJalan");
		$this->FilterJalan->filterpindahkamar($idDetail);

		if ($ceknokartu==1 || $ceknik==1){
			$simpannik = array(
				'no_askes' => $no_askes,
				'nik' => $nik
			);	
			$this->db->where('no_rm', $no_rm_cari);
			$this->db->update('pasien', $simpannik);
			$this->db->limit(1);
		}

		return $dt2;
	}

	public function carikodebpjsdokter($kodenya) {
		$this->db->select('kodebpjs');
		$this->db->from('mdokter');
		$this->db->where('kode_dokter', $kodenya);
		$datanya = $this->db->get();
		$hasil = $datanya->result();
		return $hasil;
	}

	public function caridatahafis($kodedokter,$tglm) {
		$this->db->from('y_jadwaldokter');
		$this->db->where('kodedokter', $kodedokter);
		$this->db->where('tanggal', $tglm);
		$this->db->limit(1);
		$datanya = $this->db->get();
		$hasil = $datanya->result();
		return $hasil;
	}

	public function ambilestimasi($tglp,$jammulai,$nomorantrian)
	{
		$tglpesan=$tglp;
		// $variabel=$tglpesan.' 08:00'; 
		$variabel=$tglpesan.' '.$jammulai; 
		$selisihmenit=10;

		$jrecord=$nomorantrian;
		if ($jrecord <= 1) {
			$d1=$variabel;
		} 
		else {
			$n=$jrecord*$selisihmenit;
			$selisihnya='+'.$n.' minute';
			$d1=date('Y-m-d, H:i', strtotime($selisihnya, strtotime( $variabel ))); //
		}
		$timenya=strtotime($d1);

		return $timenya;
	}

	public function carikartu($norm) {
		$this->db->select('nik,no_askes,telp,hp,tgl_daftar');
		$this->db->from('pasien');
		$this->db->where('no_rm', $norm);
		$datanya = $this->db->get();
		$hasil = $datanya->result();
		return $hasil;
	}

	public function caripolisep($kode_unitpilih) {
		$this->db->select('kodepoliSEP,namapoliSEP,huruppoli');
		$this->db->from('munit');
		$this->db->where('kode_unit', $kode_unitpilih);
		$datanya = $this->db->get();
		$hasil = $datanya->result();
		return $hasil;
	}

	public function ambilwaktu($nomorantrean,$angkaantrean) {
		$loketnya=strtoupper(substr($nomorantrean,0,1));
		$this->db->select('jam_ambilnomer,jam_panggil');
		$this->db->from('y_noantrian');
		$this->db->where('loket', $loketnya);
		$this->db->where('nomor', $angkaantrean);
		$datanya = $this->db->get();
		$hasil = $datanya->result();
		return $hasil;
	}

	public function regishapusurj() {
	    $id = $this->input->get('id');

	    $this->db->from('register');
	    $this->db->select('notransaksi');
	    $this->db->where('id', $id);
	    $datano = $this->db->get();
	    $no = $datano->row();

        $this->db->from('ptindakan');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datatind = $this->db->get();
        $tindakan = $datatind->num_rows();

		$this->db->from('register_instalasi');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $datareg_inst = $this->db->get();
		$reg_inst = $datareg_inst->num_rows();
		
        $this->db->from('pbhp');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $bhp = $databhp->num_rows();

        $this->db->from('po2');
        $this->db->select('id');
        $this->db->where('notransaksi', $no->notransaksi);
        $databhp = $this->db->get();
        $odua = $databhp->num_rows();

        $this->db->from('resep_header');
        $this->db->select('idnoresep');
        $this->db->where('notraksaksi', $no->notransaksi);
        $dataresep = $this->db->get();
        $resep = $dataresep->num_rows();

        if (($tindakan == 0) && ($bhp == 0) && ($reg_inst == 0) && ($resep == 0) && ($odua == 0)) {
            $this->db->where('id', $id);
            $dt = $this->db->delete('register');
            $this->db->where('no_transaksi_secondary', $no->notransaksi);
            $dt1 = $this->db->delete('register_detail');
            return $dt1;
        } else {
            return false;
        }

    }

    public function ambildataregisurj() {
        $id = $this->input->get('id');
        $this->db->from('register');
        $this->db->where('id', $id);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function ambildataregisdetailurj($no) {
        $this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        // $this->db->where('status', 0);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }
	
	public function ambildatanoantrianurj($no) {
        $this->db->select('no_antrian');
        $this->db->from('register_detail');
        $this->db->where('notransaksi', $no);
        // $this->db->where('status', 0);
		$this->db->order_by("register_detail.id");
		$this->db->limit(1);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no;
    }

    public function editregisurj($hasilicd,$dtantrian_poli) {
		$kode_unit_editnya=$this->input->get("tp");
		$kode_unit_lama=$this->input->get("tplama");
		$noantrianloket=$this->input->get("noantrianloket");
		$no_askes=$this->input->get("nokartu");
		$nik=$this->input->get("nik");
		$ceknokartu = gantiangka($this->input->get("ceknokartu"));
		$ceknik = gantiangka($this->input->get("ceknik"));

        $date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));
		
		//cari data id record pertama pada register_detail
		if (($kode_unit_editnya == 'RDLG') || ($kode_unit_editnya == 'LABS') ) {
			$id_editnya=$this->input->get("id");
			$qry24 = $this->db->query("SELECT notransaksi,no_rm from register WHERE id=$id_editnya LIMIT 1");
			$qry24row = $qry24->row();
			$notransaksi = $qry24row->notransaksi;
			$no_rm = $qry24row->no_rm;
			$qry25 = $this->db->query("SELECT id from register_detail WHERE no_rm='$no_rm' and notransaksi='$notransaksi'  order by id ASC LIMIT 1");
			$qry25row = $qry25->row();
			$id_detail_awal= $qry25row->id;
		} else {
			$no_rm=$this->input->get("rm");
			$qry24 = $this->db->query("SELECT notransaksi from register WHERE no_rm='$no_rm' and bagian='JALAN' and status=0  LIMIT 1");
			$qry24row = $qry24->row();
			$notransaksi = $qry24row->notransaksi;

			$qry25 = $this->db->query("SELECT id from register_detail WHERE no_rm='$no_rm' and notransaksi='$notransaksi'  order by id ASC LIMIT 1");
			$qry25row = $qry25->row();
			$id_detail_awal= $qry25row->id;
		}
        $simpanregister = array(
			'noantrianloket' => $noantrianloket,
			'golongan' => $golc,
            'asuransi' => $this->input->get("goldettext"),
			'tgl_masuk' => $tglm, 
			'jam_masuk' => $jamm, 
            'kode_dokter_luar' => $this->input->get("dokterluar"),
            'dokter_luar' => $this->input->get("dokterluartext"),
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			// 'barulama' => $this->input->get("kunjungan"), 
			'tglrujukan' => $tglr, 
			'norujukan' => $this->input->get("norujukan"), 
			'ppkrujukan' => $this->input->get("faskes"), 
			'nmppkrujukan' => $this->input->get("faskestext"), 
            'catatan' => $this->input->get("cat"),
            'diagawal' => $hasilicd->icd_code,
            'ketdiagawal' => $hasilicd->jenis_penyakit_local,
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'rujukan' => $this->input->get("rujukantext"), 
            'jenislayanan' => $this->input->get("jp"),
            'keluhanawal' => $this->input->get("keluhan"),
            'cara_masuk' => $this->input->get("cm")
        );
        $this->db->where('id', $this->input->get("id"));
		$this->db->update('register', $simpanregister);
		
		$simpanregisdetail = array(
			'kode_unit' => $this->input->get("tp"), 
			'nama_unit' => $this->input->get("tptext"), 
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk' => $tglm, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'jam_masuk' => $jamm, 
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
			'no_antrian' => $dtantrian_poli
		);
		// $this->db->where('id', $this->input->get("datadetail"));
		$this->db->where('id', $id_detail_awal);
		$dt = $this->db->update('register_detail', $simpanregisdetail);

        return $dt;
    }
	///=================

	function pasien_all() {
		$id = $this->input->get("id");
		$this->db->select("register.id as id");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->where("register.no_rm", sprintf("%06d", $id));
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_pasien($limit, $start) {
		$output = '';
		$id = $this->input->get("id");
		$this->db->select("register.id as id, pasien.nama_pasien as nama_pasien, pasien.no_rm as no_rm, register.bagian as bagian, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, register.notransaksi as notransaksi, register.golongan as golongan, register.notransaksi as notraksaksi, register.nama_dokter as nama_dokter,register.keluarpada as keluarpada, berkas ");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		// $this->db->where("register.no_rm", sprintf("%06d", $id)); ditutup karena masalah dgn 6 digit
		$this->db->where("register.no_rm", $id);
		$this->db->order_by("register.tgl_masuk", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-hover">
		<tr>
			<th>Nama Lengkap</th>
			<th width="7%">No. RM</th>
			<th width="7%">Bagian</th>
			<th width="8%">Tgl. Masuk</th>
			<th width="8%">Tgl. Keluar</th>
			<th width="9%">Unit Keluar</th>
			<th width="17%">DPJP</th>
			<th width="10%">No. Transaksi</th>
			<th width="7%">Asuransi</th>
			<th width="5%">Berkas</th>
			<th width="5%">Cek</th>
		</tr>
		';
		$no = $start;
		foreach($query->result() as $row) {
		if ($row->berkas==4) {
			$berkas="Ranap";
		} elseif ($row->berkas==1 || $row->berkas==2) {
			$berkas="Poli";
		} elseif ($row->berkas==3) {
			$berkas="Hilang";
		} else {
			$berkas="Ada";
		} 
		$output .= '
		<tr>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->bagian.'</td>
			<td>'.$row->tgl_masuk.'</td>
			<td>'.$row->tgl_keluar.'</td>
			<td>'.$row->keluarpada.'</td>
			<td>'.$row->nama_dokter.'</td>
			<td>'.$row->notransaksi.'</td>
			<td>'.$row->golongan.'</td>
			<td>'.$berkas.'</td>
			<td class="text-center">
				<button onclick="ambildetail(`'.$row->notraksaksi.'`);" class="btn-sm btn-success btn"><i class="fa fa-eye"></i></button>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
			return $output;
	}

	function fetch_pasien_detail($data) {
		$output = '';
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $data);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-hover">
		<tr>
			<th>Nama Unit</th>
			<th width="9%">Tgl Masuk</th>
			<th width="9%">Jam Masuk</th>
			<th width="9%">Tgl Keluar</th>
			<th width="9%">Jam Keluar</th>
			<th width="19%">DPJP</th>
			<th width="6%">User-1</th>
			<th width="6%">User-2</th>
			<th width="11%">LastLogin</th>
			<th width="10%">No.Transaksi</th>
		</tr>
		';
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->tgl_masuk_kamar.'</td>
			<td>'.$row->jam_masuk.'</td>
			<td>'.$row->tgl_keluar_kamar.'</td>
			<td>'.$row->jam_keluar.'</td>
			<td>'.$row->nama_dokter.'</td>
			<td>'.$row->user1.'</td>
			<td>'.$row->user2.'</td>
			<td>'.$row->lastlogin.'</td>
			<td>'.$row->notransaksi.'</td>
		</tr>
		';
		}
		$output .= '</table>';
			return $output;
	}

	/// ======= PENGELOLAAN PASIEN ====================== 

	function count_all_pengelolaan() {
		$this->db->select("register_detail.no_rm");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.status", 0);
		$this->db->where("register_detail.status", 0);
		$this->db->where("register_detail.pulang", 0);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all_pengelolaan_only_rm() {
		$this->db->select("register_detail.no_rm");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		// $this->db->where("register.status", 0);
		// $this->db->where("register_detail.status", 0);
		// $this->db->where("register_detail.pulang", 0);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		// if (($kodeunit != "") || ($kodeunit != null)) {
		// 	$this->db->where("register_detail.kode_unit", $kodeunit);
		// }
		$this->db->order_by("register_detail.id desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_pasien_pengelolaan($limit, $start) {
		$output = '';
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register.id as idreg, register_detail.notransaksi as notransaksi, register.bagian as bagian, register.status as statuspulang, register.pulang as pulang ");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.status", 0);
		$this->db->where("register_detail.status", 0);
		$this->db->where("register_detail.pulang", 0);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by("register.tgl_masuk","DESC");
		$query = $this->db->get();
		$output .= '
		<table class="table table-responsive table-bordered table-hover">
		<tr>
			<th width="5%"><div align="center">No. RM</div></th>
			<th>Nama Lengkap</th>
			<th width="7%"><div align="center">Masuk RS</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="7%">Cara Bayar</th>
			<th width="18%">Unit Perawatan</th>
			<th width="18%">Kamar</th>
			<th width="7%"><div align="center">Msk Kamar</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="5%"><div align="center">No.Register</div></th>
		</tr>
		';
		$cek=0;
		foreach($query->result() as $row) {
		$cek++;

		$output .= '
		<tr>
		<td>
				<div class="btn-group">
					<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row->no_rm.'</button>

					<div class="dropdown-menu p-2 bg-light">
						<a class="dropdown-item" href="javascript:panggillihat(\''.$row->no_rm.'\')">History</a>
						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="javascript:pulangkan(\''.$row->notransaksi.'\')">Pulangkan Pasien</a>
						<a class="dropdown-item" href="javascript:pasienkembali(\''.$row->id.'\')">Kembali Unit asal</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:kerawatinap(\''.$row->notransaksi.'\')">Poli ke Rawat Inap</a>
						<a class="dropdown-item" href="javascript:cetakregisranap(\''.$row->id.'\')">Cetak Register</a>
						<a class="dropdown-item" href="javascript:panggilpindahkamar(\''.$row->notransaksi.'\')">Transfer Pasien(IGD/RI)</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:cetakgelangbayi(\''.$row->idreg.'\')">Gelang Bayi</a>
					</div>
				</div>
			</td>
			<td>'.$row->nama_pasien.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->asuransi.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->nama_kelas.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td><div align="center">'.$row->notransaksi.'</div></td>
		</tr>
		';
		}

		
		if ($cek <= 8) {;
		$output .= '<tr style="height:300px"><td colspan="10">&nbsp;</td></table>';
		} else {
		$output .= '</table>';
		}
		return $output;
	}

	function fetch_pasien_pengelolaan_only_rm_old_xxx($limit, $start) {
		$output = '';
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register.id as idreg, register_detail.notransaksi as notransaksi, register.bagian as bagian, register_detail.pulang as pulang, register.bagian as bagian , register.pulang as pulangkanpasien");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		// $this->db->where("register.status", 0);
		// $this->db->where("register_detail.status", 0);
		// $this->db->where("register_detail.pulang", 0);

		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		// if (($kodeunit != "") || ($kodeunit != null)) {
		// 	$this->db->where("register_detail.kode_unit", $kodeunit);
		// }
		// $this->db->limit($limit, $start);
		$this->db->limit(1);
		$this->db->order_by("register_detail.id","DESC");
		$query = $this->db->get();
		$output .= '
		<table class="table table-responsive table-bordered table-hover">
		<tr>
			<th width="5%"><div align="center">No. RM</div></th>
			<th>Nama Lengkap</th>
			<th width="7%"><div align="center">Masuk RS</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="7%">Cara Bayar</th>
			<th width="18%">Unit Perawatan</th>
			<th width="18%">Kamar</th>
			<th width="7%"><div align="center">Msk Kamar</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="5%"><div align="center">No.Register</div></th>
			<th width="5%"><div align="center">Kondisi</div></th>
		</tr>
		';
		$cek=0;
		foreach($query->result() as $row) {
		$cek++;

		if ($row->pulangkanpasien == 0) {
			$output .= '
			<tr>
			<td>
					<div class="btn-group">
						<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row->no_rm.'</button>

						<div class="dropdown-menu p-2 bg-light">
							<a class="dropdown-item" href="javascript:panggillihat(\''.$row->no_rm.'\')">History</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item disabled" href="javascript:pulangkan(\''.$row->notransaksi.'\')">Pulangkan Pasien</a>
							<a class="dropdown-item" href="javascript:pasienkembali(\''.$row->id.'\')">Kembali Unit asal</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:kerawatinap(\''.$row->notransaksi.'\')">Poli ke Rawat Inap</a>
							<a class="dropdown-item" href="javascript:cetakregisranap(\''.$row->id.'\')">Cetak Register</a>
							<a class="dropdown-item" href="javascript:panggilpindahkamar(\''.$row->notransaksi.'\')">Transfer Pasien(IGD/RI)</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:cetakgelangbayi(\''.$row->idreg.'\')">Gelang Bayi</a>
						</div>
					</div>
				</td>
				<td>'.$row->nama_pasien.'</td>
				<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
				<td><div align="center">'.$row->jam_masuk.'</div></td>
				<td>'.$row->asuransi.'</td>
				<td>'.$row->nama_unit.'</td>
				<td>'.$row->nama_kelas.'</td>
				<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
				<td><div align="center">'.$row->jam_masuk.'</div></td>
				<td><div align="center">'.$row->notransaksi.'</div></td>
				<td><div align="center">'.($row->pulangpasien==1 ? "Pulang" : "Ada").'</div></td>
			</tr>
			';
		} else {
			$output .= '
			<tr>
			<td>
					<div class="btn-group">
						<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row->no_rm.'</button>

						<div class="dropdown-menu p-2 bg-light">
							<a class="dropdown-item" href="javascript:panggillihat(\''.$row->no_rm.'\')">History</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:pasienkembali(\''.$row->id.'\')">Kembali Unit asal</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:kerawatinap(\''.$row->notransaksi.'\')">Poli ke Rawat Inap</a>
							<a class="dropdown-item" href="javascript:cetakregisranap(\''.$row->id.'\')">Cetak Register</a>
							<a class="dropdown-item" href="javascript:panggilpindahkamar(\''.$row->notransaksi.'\')">Transfer Pasien(IGD/RI)</a>

							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="javascript:cetakgelangbayi(\''.$row->idreg.'\')">Gelang Bayi</a>
						</div>
					</div>
				</td>
				<td>'.$row->nama_pasien.'</td>
				<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
				<td><div align="center">'.$row->jam_masuk.'</div></td>
				<td>'.$row->asuransi.'</td>
				<td>'.$row->nama_unit.'</td>
				<td>'.$row->nama_kelas.'</td>
				<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
				<td><div align="center">'.$row->jam_masuk.'</div></td>
				<td><div align="center">'.$row->notransaksi.'</div></td>
				<td><div align="center">'.($row->pulangpasien==1 ? "Pulang" : "Ada").'</div></td>
			</tr>
			';
		}
		}

		
		if ($cek <= 8) {;
		$output .= '<tr style="height:300px"><td colspan="10">&nbsp;</td></table>';
		} else {
		$output .= '</table>';
		}
		return $output;
	}

//ada backup di bagian atas
	function fetch_pasien_pengelolaan_only_rm($limit, $start) {
		// $output = '';
		$output = '';
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register.id as idreg, register_detail.notransaksi as notransaksi, register.bagian as bagian,register.pulang as tandapulangpasien");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		// $this->db->where("register.status", 0);
		// $this->db->where("register_detail.status", 0);
		// $this->db->where("register_detail.pulang", 0);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		// if (($kodeunit != "") || ($kodeunit != null)) {
		// 	$this->db->where("register_detail.kode_unit", $kodeunit);
		// }
		// $this->db->limit($limit, $start);
		$this->db->limit(1);
		$this->db->order_by("register_detail.id","DESC");
		$query = $this->db->get();
		$output .= '
		<table class="table table-responsive table-bordered table-hover">
		<tr>
			<th width="5%"><div align="center">No. RM</div></th>
			<th>Nama Lengkap</th>
			<th width="7%"><div align="center">Masuk RS</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="7%">Cara Bayar</th>
			<th width="18%">Unit Perawatan</th>
			<th width="18%">Kamar</th>
			<th width="7%"><div align="center">Msk Kamar</div></th>
			<th width="4%"><div align="center">Jam</div></th>
			<th width="5%"><div align="center">No.Register</div></th>
			<th width="5%"><div align="center">Kondisi</div></th>
		</tr>
		';
		$cek=0;
		foreach($query->result() as $row) {
		$cek++;
			if ($row->tandapulangpasien == 0) {
			$output .= '
			<tr>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row->no_rm.'</button>

					<div class="dropdown-menu p-2 bg-light">
						<a class="dropdown-item" href="javascript:panggillihat(\''.$row->no_rm.'\')">History</a>
						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="javascript:pulangkan(\''.$row->notransaksi.'\')">Pulangkan Pasien</a>
						<a class="dropdown-item" href="javascript:pasienkembali(\''.$row->id.'\')">Kembali Unit asal</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:kerawatinap(\''.$row->notransaksi.'\')">Poli ke Rawat Inap</a>
						<a class="dropdown-item" href="javascript:cetakregisranap(\''.$row->id.'\')">Cetak Register</a>
						<a class="dropdown-item" href="javascript:panggilpindahkamar(\''.$row->notransaksi.'\')">Transfer Pasien(IGD/RI)</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:cetakgelangbayi(\''.$row->idreg.'\')">Gelang Bayi</a>
					</div>
				</div>
			</td>
			<td>'.$row->nama_pasien.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->asuransi.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->nama_kelas.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td><div align="center">'.$row->notransaksi.'</div></td>
			<td><div align="center">'.($row->tandapulangpasien==1 ? "Pulang" : "Ada").'</div></td>
			</tr>
			';
			} else {
				$output .= '
			<tr>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$row->no_rm.'</button>

					<div class="dropdown-menu p-2 bg-light">
						<a class="dropdown-item" href="javascript:panggillihat(\''.$row->no_rm.'\')">History</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:pasienkembali(\''.$row->id.'\')">Kembali Unit asal</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:kerawatinap(\''.$row->notransaksi.'\')">Poli ke Rawat Inap</a>
						<a class="dropdown-item" href="javascript:cetakregisranap(\''.$row->id.'\')">Cetak Register</a>
						<a class="dropdown-item" href="javascript:panggilpindahkamar(\''.$row->notransaksi.'\')">Transfer Pasien(IGD/RI)</a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:cetakgelangbayi(\''.$row->idreg.'\')">Gelang Bayi</a>
					</div>
				</div>
			</td>
			<td>'.$row->nama_pasien.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->asuransi.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->nama_kelas.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td><div align="center">'.$row->notransaksi.'</div></td>
			<td><div align="center">'.($row->tandapulangpasien==1 ? "Pulang" : "Ada").'</div></td>
			</tr>
			';
			}
		}

		
		if ($cek <= 8) {;
		$output .= '<tr style="height:300px"><td colspan="10">&nbsp;</td></table>';
		} else {
		$output .= '</table>';
		}
		return $output;
	}

	public function ambildatapindah() {
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatapregisdetail() {
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatapregis() {
		$no = $this->input->get("notrans");
		$this->db->from("register");
		$this->db->where("notransaksi", $no);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function ambildatapulangkan() {
		$no = $this->input->get("notrans");
		$this->db->from("register_detail");
		$this->db->where("notransaksi", $no);
		$this->db->order_by("id desc");
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function simpanpindahkamar($dtregis) {
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim,"H:i:s");
		list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);

		$datasimpan = array(
			'no_rm' => $dtregis->no_rm,
			'kode_kelas' => $kdkelas,
			'nama_kelas' => $this->input->get("pkunittext"),
			'kode_unit' => $kdunit,
			'nama_unit' => $nmunit,
			'tgl_masuk_kamar' => $tgl,
			'tgl_keluar_kamar' => "0000-00-00",
			'tgl_masuk' => $dtregis->tgl_masuk,
			'status' => "0",
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'rujukandetail' => $dtregis->rujukandetail,
			'kode_unitR' => $dtregis->kode_unit,
			'nama_unitR' => $dtregis->nama_unit,
			'statuskeluar' => $dtregis->statuskeluar,
			'nokamar' => $dtregis->nokamar,
			'kamarkeluar' => $dtregis->kamarkeluar,
			'notransaksi' => $dtregis->notransaksi,
			'nama_pasien_sjp' => $dtregis->nama_pasien_sjp,
			'prosesdaftar' => $dtregis->prosesdaftar,
			'jam_masuk' => $jam,
			'jam_keluar' => "",
			'ruanganaktif' => $dtregis->ruanganaktif,
			'pulang' => $dtregis->pulang,
			'kode_kamar' => $this->input->get("kamar"),
			'hapus' => $dtregis->hapus,
			'idasal' => $dtregis->id,
			'pindah'  => "0"
		);

		$dts = $this->db->insert('register_detail', $datasimpan);
		$idInsert = $this->db->insert_id();

		$dataubah = array(
			'status' => "1",
			'tgl_keluar_kamar' => $tgl,
			'jam_keluar' => $jam,
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'pindah' => "1"
		);

		$this->db->where('id', $dtregis->id);
		$dt = $this->db->update('register_detail', $dataubah);

		$this->load->model("FilterInap");
		$idParent = $this->FilterInap->getidparent($dtregis->id);
		if ($idParent == null) {
			$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
		} else {
			if ($idParent->id_parent == 0) {
				$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
			} else {
				$this->FilterInap->filterpindahkamar($idInsert, $idParent->id_parent);
			}
		}
		return $dt;
	}

	public function polikerawatinap($dtregisdetail,$dtregis,$dtnotrans) {
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim,"H:i:s");
		list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);
		
		$simpanregister = array(
			'no_rm' => $dtregis->no_rm, 
			'golongan' => $dtregis->golongan,
            'asuransi' => $dtregis->asuransi,
			'cara' => "", 
			'kirim' => "", 
			'kirim_ket' => "", 
			'tgl_masuk' => $tgl, 
			'jam_masuk' => $jam, 
			'bagian' => "INAP", 
			'status' => "0", 
			'tgl_keluar' => "0000-00-00", 
			'jam_keluar' => "00:00:00", 
			'diag' => "",
			'nodaftar' => "",
			'nodtd' => "",
			'kondisi_keluar' => "", 
			'cara_keluar' => "", 
			'ket_keluar' => "", 
			'saat_keluar' => "", 
			'totalbayar' => "0", 
			'selisih' => "0", 
			'kelashak' => "", 
			'diagbpjs' => "",
            'kode_dokter_luar' => "",
            'dokter_luar' => "",
			'kode_dokter' => "",
			'nama_dokter' => "",
			'barulama' => "2", 
			'notransaksi' => $dtnotrans[2], 
			'nosep' => "",
			'tglsep' => "", 
			'tglkunjungan' => "0000-00-00", 
			'tglrujukan' => "0000-00-00", 
			'norujukan' => "", 
			'ppkrujukan' => "", 
			'nmppkrujukan' => "", 
			'ppkpelayanan' => "", 
			'nmppkpelayanan' => "", 
			'jnspelayanan' => "0", 
			'catatan' => "",
            'diagawal' => "",
            'ketdiagawal' => "",
			'politujuan' => "", 
			'nmpolitujuan' => "", 
			'kdklsrawat' => "",
			'usersep' => "", 
			'nik' => "", 
			'pisa' => "", 
			'jk' => "", 
			'tgllahir' => "", 
			'nmprovider' => "", 
			'nmcabang' => "", 
			'kdcabang' => "", 
			'jenispeserta' => "", 
			'kdjenispeserta' => "", 
			'nmkelas' => "", 
			'kdkelas' => "", 
			'beratlahir' => "0", 
			'tarifbilling' => "0", 
			'nilaibpjs' => "0", 
			'kodeinacbg' => "", 
			'type_inacbg' => "0", 
			'nosjp' => "0", 
			'namapasiensep' => "", 
			'keluarpada' => "", 
			'tglsetor' => "0000-00-00", 
			'waktusetor' => "0", 
			'lengkap' => "0", 
			'identitastfrs' => "0", 
			'laporanpenting' => "0", 
			'autentifikasi' => "0", 
			'pencatatanbaik' => "0", 
			'diagnosautama' => "0", 
			'resume' => "0", 
			'operasi' => "0", 
			'laporanoperasi' => "0", 
			'laporananastesi' => "0", 
			'persetujuanoperasi' => "0", 
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'jamdaftar' => date("H:i:s"), 
			'jamselesai' => "", 
			'selesaidaftar' => "0", 
			'nama_pasien_sjp' => "", 
			'prosesdaftar' => "0", 
			'diagnosaawal' => "", 
			'kode_keluarpada' => "", 
			'kondisistatus' => "0", 
			'ceknamadokter' => "0", 
			'cekttddokter' => "0",
			'carabayar' => "0", 
			'klinik' => "0", 
			'keterangan' => "", 
			'prosesugd' => "0", 
			'pisat' => "", 
			'rujukan' => "", 
			'verifikasi' => "", 
			'kdStatSep' => "", 
			'disetujui' => "0", 
			'kondisibrm' => "", 
			'pulang' => "0", 
			'tarifrsinacbg' => "0",
            'jenislayanan' => $dtregis->jnspelayanan,
			'keluhanawal' => "",
			'hapus' => "0",
            'billing' => "0",
            'icd_code_estimasi' => "",
            'diag_estimasi' => "",
            'tarif_estimasi' => "0",
            'status_billing' => "0",
            'cara_masuk' => "POLI"
		);

		if ($dtnotrans[1] == 1) {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->insert('mtransaksi', $dataubah);
		} else {
			$dataubah = array(
				"tgltransaksi" => $dtnotrans[0],
				"nomor" => $dtnotrans[1]
			);
			$this->db->where("tgltransaksi", $dtnotrans[0]);
			$this->db->update('mtransaksi', $dataubah);
		}

		$dt1 = $this->db->insert('register', $simpanregister);

		$datasimpan = array(
			'no_rm' => $dtregisdetail->no_rm,
			'kode_kelas' => $kdkelas,
			'nama_kelas' => $this->input->get("pkunittext"),
			'kode_unit' => $kdunit,
			'nama_unit' => $nmunit,
			'tgl_masuk_kamar' => $tgl,
			'tgl_keluar_kamar' => "0000-00-00",
			'tgl_masuk' => $dtregisdetail->tgl_masuk,
			'status' => "0",
			'user1' => $this->session->userdata("nmuser"),
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'rujukandetail' => $dtregisdetail->rujukandetail,
			'kode_unitR' => $dtregisdetail->kode_unit,
			'nama_unitR' => $dtregisdetail->nama_unit,
			'statuskeluar' => "0",
			'nokamar' => "",
			'kamarkeluar' => "",
			'notransaksi' => $dtnotrans[2],
			'nama_pasien_sjp' => $dtregisdetail->nama_pasien_sjp,
			'prosesdaftar' => $dtregisdetail->prosesdaftar,
			'jam_masuk' => $jam,
			'jam_keluar' => "",
			'ruanganaktif' => "1",
			'pulang' => "0",
			'kode_kamar' => $this->input->get("kamar"),
			'hapus' => $dtregisdetail->hapus,
			'idasal' => "0",
			'pindah'  => "0"
		);

		$dts = $this->db->insert('register_detail', $datasimpan);
		$idInsert = $this->db->insert_id();

		$dataubah = array(
			'status' => "1",
			'tgl_keluar_kamar' => $tgl,
			'jam_keluar' => $jam,
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'pindah' => "1"
		);

		$this->db->where('id', $dtregis->id);
		$dt = $this->db->update('register_detail', $dataubah);

		$this->load->model("FilterInap");
		$idParent = $this->FilterInap->getidparent($dtregis->id);
		if ($idParent == null) {
			$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
		} else {
			if ($idParent->id_parent == 0) {
				$this->FilterInap->filterpindahkamar($idInsert, $dtregis->id);
			} else {
				$this->FilterInap->filterpindahkamar($idInsert, $idParent->id_parent);
			}
		}
		return $dt;
	}


	public function simpanpulangkanpasien_old($dtregis) {
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim,"H:i:s");
		list($kdunit, $kdkelas, $nmunit) = explode("_", $this->input->get("pkunit"), 3);
		$dataubah = array(
			'status' => "1",
			'tgl_keluar_kamar' => $tgl,
			'jam_keluar' => $jam,
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"),
			'pulang' => "1"
		);
		$this->db->where('id', $dtregis->id);
		$dt = $this->db->update('register_detail', $dataubah);
		return $dt;
	}

	public function simpanpulangkanpasien($dtregis) {
		$date = date_create($this->input->get("pktgl"));
		$tgl = date_format($date,"Y-m-d");
		$tim = date_create($this->input->get("pkjam"));
		$jam = date_format($tim,"H:i:s");
		// $kk = $this->input->get("kk");
		// $ck = $this->input->get("ck");
		// $rm = $this->input->get("rm");
		$kk = "SEMBUH";
		$ck = "Diijinkan";
		$rm = "RESUME TERISI";
		$waktunya=$tgl.' '.$jam;
		$ubahregister = array(
			'status' => "1", 
			'tgl_keluar' => $tgl, 
			'jam_keluar' => $jam, 
			'kondisi_keluar' => $kk, 
			'kondisibrm' => $rm, 
			'cara_keluar' => $ck, 
			'keluarpada' => $dtregis->nama_unit, 
			'kode_keluarpada' => $dtregis->kode_unit, 
			'user2' => $this->session->userdata("nmuser"),
			'lastlogin' => date("Y-m-d H:i:s"), 
			'pulang' => "1",
			'taskid4' => "1",
			'jam_selesai' => $waktunya

		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dts = $this->db->update('register', $ubahregister);

		//cari kodebooking di register
		$kodebooking=$dtregis->kode_booking;
		date_default_timezone_set('Asia/Makassar');
		$waktusekarang=date("Y-m-d h:i:sa");
		$simpantaskid5 = array(
			'kodebooking' => $kodebooking,
			'taskid' => 5,
			'waktu' => $waktusekarang,
			'flag' => 0
		);
		// $this->db->insert('y_updatewaktu', $simpantaskid5);

		$ubahpulang = array(
			'pulang' => "1",
			'status' => "1"
		);
		$this->db->where('notransaksi', $dtregis->notransaksi);
		$dtu = $this->db->update('register_detail', $ubahpulang);

		$ubahregisdetail = array(
			'tgl_keluar_kamar' =>$tgl, 
			'status' => "1", 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'statuskeluar' => "1", 
			'jam_keluar' => date("H:i:s"), 
			'pulang' => "1", 
			'kamarkeluar' => "1"
		);
		$no = $this->input->get("id");
		$this->db->where('id', $no);
		$dt = $this->db->update('register_detail', $ubahregisdetail);

		return $dt;
	}

	// ================= tambahan untuk cek status rm ===============

	function count_all_pengelolaan_statusrm() {
		$output = '';
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$tgl=date('Y-m-d');
		$this->db->select("register_detail.no_rm");
		$this->db->from("register");
		$this->db->join("pasien", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register.notransaksi = register_detail.notransaksi");
		// $this->db->where("register_detail.status", 0);
		$this->db->where("register.tgl_masuk", $tgl);

		if (($nrm != "") || ($nrm != null)) {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register_detail.no_rm", $nrm);
		}

		if ($kodeunit = "JALAN") {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register_detail.pindah", '0');
			$this->db->where("register.bagian", "JALAN");
		}
		
		if ($kodeunit == "INAP") {
			$this->db->group_start();			
			$this->db->group_start();	
			$this->db->where("register.bagian", "IGD");
			$this->db->where("register_detail.kode_unitR", "IGDD");
			$this->db->group_end();
			$this->db->or_where("register.bagian", "INAP");
			$this->db->group_end();
		}

		if ($kodeunit == "IGD") {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register.bagian", "IGD");
		}
		$this->db->where("register.tgl_masuk", $tgl);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	function count_all_pasien_pengelolaan_statusrm_all() {
		$output = '';
		$nrm = $this->input->get("nrm");
		// $this->db->select("register_detail.no_rm");
		$this->db->from("pasien");
		if (($nrm != "") || ($nrm != null)) {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("pasien.no_rm", $nrm);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_pasien_pengelolaan_statusrm($limit, $start) {
		$output = '';
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$tgl=date('Y-m-d');
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register_detail.pindah as pindah, register.berkas as berkas, register.barulama as barulama, pasien.tgl_daftar as tgl_daftar, register.id as idregister, register_detail.pulang as pulang");
		$this->db->from("register");
		$this->db->join("pasien", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.tgl_masuk", $tgl);

		if (($nrm != "") || ($nrm != null)) {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if ($kodeunit == "JALAN") {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register_detail.pindah", '0');
			$this->db->where("register.bagian", "JALAN");
		}

		if ($kodeunit == "INAP") {
			$this->db->group_start();			
			$this->db->group_start();	
			$this->db->where("register.bagian", "IGD");
			$this->db->where("register_detail.kode_unitR", "IGDD");
			$this->db->group_end();
			$this->db->or_where("register.bagian", "INAP");
			$this->db->group_end();
		}

		if ($kodeunit == "IGD") {
			$this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("register.bagian", "IGD");
		}
		$this->db->order_by("register_detail.jam_masuk", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '		
		<table class="table table-bordered table-hover">
		<tr>
			<th width="6%"><div align="center">No. RM</div></th>
			<th width="17%">Nama Lengkap</th>
			<th>Alamat</th>
			<th width="7%"><div align="center">Tanggal</div></th>
			<th width="6%"><div align="center">Jam</div></th>
			<th width="17%">Unit Pelayanan</th>
			<th width="8%">Cara Bayar</th>
			<th width="4%">Konsul</th>
			<th width="6%"><div align="center">Proses</div></th>
			<th width="10%"><div align="center">Berkas</div></th>

		</tr>
		';
		foreach($query->result() as $row) {
			if ( $row->berkas==1 ){
				$warna='#80ff00';
			} elseif ( $row->berkas==2 ){
				$warna='#ccfff5';
			} elseif ( $row->berkas==3 ){
				$warna='#ff6666';
			} elseif ( $row->berkas==4 ){
				$warna='#ffbb33';
			} elseif ( $row->berkas==5 ){
				$warna='#e6e600';
			} elseif ( $row->berkas==6 ){
				$warna='#bfbfbf';
			}else {
				$warna='#ffffff';
			}
			if ( $row->tgl_daftar==$row->tgl_masuk ){$warnaproses="#FFFFFF";} else {$warnaproses="#ffff80";}
		
			if ($row->berkas==0) {
				$output .= '
				<tr>
					<td bgcolor='.$warnaproses.'><div align="center">'.$row->no_rm.'</div></td>
					<td bgcolor='.$warnaproses.'>'.$row->nama_pasien.'</td>
					<td bgcolor='.$warna.'>'.$row->alamat.'</td>
					<td bgcolor='.$warna.'><div align="center">'.tanggaldua($row->tgl_masuk).'</div></td>
					<td bgcolor='.$warna.'><div align="center">'.$row->jam_masuk.'</div></td>
					<td bgcolor='.$warna.'>'.$row->nama_unit.'</td>
					<td bgcolor='.$warna.'>'.$row->asuransi.'</td>
					<td bgcolor='.$warna.'><div align="center">'.$row->pindah.'</div></td>
					<td class="text-center">
						<button onclick="panggillihat(\''.$row->no_rm.'\')" class="btn btn-sm btn-warning">History</button>
					</td>
					<td class="text-center">
						<button onclick="tracer(\''.$row->idregister.'\')" class="btn-sm btn-primary btn" data-toggle="tooltip" data-placement="top" title="Cetak Tracer">T</button>
						<button onclick="kirim(\''.$row->idregister.'\')" class="btn-sm btn-success btn" data-toggle="tooltip" data-placement="top" title="Kirim Berkas">K</button>
						<button onclick="tidakada(\''.$row->idregister.'\')" class="btn-sm btn-danger btn" data-toggle="tooltip" data-placement="top" title="Berkas tidak ada">X</button>
						<button onclick="rinap(\''.$row->idregister.'\')" class="btn-sm btn-info btn" data-toggle="tooltip" data-placement="top" title="Rawat Inap">R</button>
					</td>
				</tr>
				';
			} elseif ($row->berkas==6) {
				$output .= '
				<tr>
					<td bgcolor='.$warnaproses.'><div align="center">'.$row->no_rm.'</div></td>
					<td bgcolor='.$warnaproses.'>'.$row->nama_pasien.'</td>
					<td bgcolor='.$warna.'>'.$row->alamat.'</td>
					<td bgcolor='.$warna.'><div align="center">'.tanggaldua($row->tgl_masuk).'</div></td>
					<td bgcolor='.$warna.'><div align="center">'.$row->jam_masuk.'</div></td>
					<td bgcolor='.$warna.'>'.$row->nama_unit.'</td>
					<td bgcolor='.$warna.'>'.$row->asuransi.'</td>
					<td bgcolor='.$warna.'><div align="center">'.$row->pindah.'</div></td>
					<td class="text-center">
						<button onclick="panggillihat(\''.$row->no_rm.'\')" class="btn btn-sm btn-warning">History</button>
					</td>
					<td class="text-center">
					</td>
				</tr>
				'; 
			}else {
				$output .= '
				<tr>
					<td bgcolor='.$warnaproses.'><div align="center">'.$row->no_rm.'</div></td>
					<td bgcolor='.$warnaproses.'>'.$row->nama_pasien.'</td>
					<td bgcolor='.$warna.'>'.$row->alamat.'</td>
					<td bgcolor='.$warna.'><div align="center">'.tanggaldua($row->tgl_masuk).'</div></td>
					<td bgcolor='.$warna.'><div align="center">'.$row->jam_masuk.'</div></td>
					<td bgcolor='.$warna.'>'.$row->nama_unit.'</td>
					<td bgcolor='.$warna.'>'.$row->asuransi.'</td>
					<td bgcolor='.$warna.'><div align="center">'.$row->pindah.'</div></td>
					<td class="text-center">
						<button onclick="panggillihat(\''.$row->no_rm.'\')" class="btn-sm btn-warning btn">History</button>
					</td>
					<td class="text-center">
						<button onclick="kembali(\''.$row->idregister.'\')" class="btn-sm btn-light btn" data-toggle="tooltip" data-placement="top" title="Berkas Kembali">B</button>
						<button onclick="permintaan(\''.$row->idregister.'\')" class="btn-sm btn-success btn" data-toggle="tooltip" data-placement="top" title="Permintaan">M</button>
						<button onclick="tidakada(\''.$row->idregister.'\')" class="btn-sm btn-danger btn" data-toggle="tooltip" data-placement="top" title="Berkas tidak ada">X</button>
						<button onclick="rinap(\''.$row->idregister.'\')" class="btn-sm btn-info btn" data-toggle="tooltip" data-placement="top" title="Rawat Inap">R</button>
					</td>
				</tr>
				';
			}
		}

		// echo "<tr><td bgcolor='$warna'>".$row->no_rm."</td>";

		$output .= '</table>';
		return $output;
	}

	function fetch_pasien_pengelolaan_statusrm_all($limit, $start) {
		$output = '';
		$nrm = $this->input->get("nrm");
		// $this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register_detail.pindah as pindah, register.berkas as berkas, register.barulama as barulama, pasien.tgl_daftar as tgl_daftar, register.id as idregister");
		$this->db->from("pasien");
		if (($nrm != "") || ($nrm != null)) {
			// $this->db->where("register_detail.kode_unitR", 'ALOKET');
			$this->db->where("no_rm", $nrm);
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '		
		<table class="table table-bordered table-hover">
		<tr>
			<th width="6%">No. RM</th>
			<th>Nama Lengkap</th>
			<th width="30%">Alamat</th>
			<th width="12%">Nik</th>
			<th width="10%">Asuransi</th>
			<th width="12%">No. Kartu</th>
			<th width="6%"><div align="center">Proses</div></th>
		</tr>
		';
		foreach($query->result() as $row) {		
				$output .= '
				<tr>
					<td>'.$row->no_rm.'</td>
					<td>'.$row->nama_pasien.'</td>
					<td>'.$row->alamat.'</td>
					<td>'.$row->nik.'</td>
					<td>'.$row->asuransi.'</td>
					<td>'.$row->no_askes.'</td>
					<td class="text-center">
						<button onclick="panggillihat(\''.$row->no_rm.'\')" class="btn btn-sm btn-warning">History</button>
					</td>
				</tr>
				';

		}

		// echo "<tr><td bgcolor='$warna'>".$row->no_rm."</td>";

		$output .= '</table>';
		return $output;
	}

	// ================= pasien batal pulang ===================
	function count_all_pengelolaanpulang() {
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->select("register_detail.no_rm");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.status", 1);
		$this->db->where("register.pulang", 1);
		$this->db->where("register_detail.kamarkeluar", 1);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_pasien_pengelolaanpulang($limit, $start) {
		$output = '';
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk, register.id as idreg");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.status", 1);
		$this->db->where("register.pulang", 1);
		$this->db->where("register_detail.kamarkeluar", 1);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$this->db->order_by("register.tgl_masuk", "ASC");
		$this->db->order_by("register.no_rm", "ASC");
		$this->db->order_by("register.id", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-hover">
		<tr>
			<th width="5%"><div align="center">No. RM</div></th>
			<th>Nama Lengkap</th>
			<th width="10%"><div align="center">Masuk RS</div></th>
			<th width="5%"><div align="center">Jam</div></th>
			<th width="7%">Cara Bayar</th>
			<th>Unit Perawatan</th>
			<th width="8%">Kamar</th>
			<th width="9%"><div align="center">Masuk Kamar</div></th>
			<th width="5%"><div align="center">Jam</div></th>
			<th width="18%"><div align="center">Proses</div></th>
			<th width="4%"><div align="center">id</div></th>
		</tr>
		';
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td><div align="center">'.$row->no_rm.'</div></td>
			<td>'.$row->nama_pasien.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->asuransi.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->nama_kelas.'</td>
			<td><div align="center">'.tanggaltiga($row->tgl_masuk_kamar).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td class="text-center">
				<button onclick="panggillihat(\''.$row->no_rm.'\')" class="btn-sm btn-warning btn">History</button>
				<button onclick="batalpulang(this, \''.$row->id.'\');" class="btn-sm btn-danger btn">BATAL PULANG</button>
			</td>
			<td class="text-center">'.$row->id.'</td>
			
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}

	
	public function ceknorm($id) {
		// $id = $this->input->get("$id");
		$this->db->from("pasien");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function cekdataregister($norm) {
		$this->db->select("no_askes, nik, kelashak, golongan, asuransi");
		$this->db->from("pasien");
		$this->db->where("no_rm", $norm);
		$this->db->limit(1);
		$query = $this->db->get();
		$datanya=$query->row();
		if ($datanya->nik == null) {
			$ada=3;
		} else { 
			$this->db->from("register_detail");
			$this->db->where("no_rm", $norm);
			$this->db->where("status", 0);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$ada=1;
			} else { 
				 $ada=0;
			}
		}
		return $ada;
	}

    public function pencariannoantrian() {
        $noantrianloket = $this->input->get("noantrianloket");
        $no_rm = $this->input->get("rm");
		$loketnya=strtoupper(substr($noantrianloket,0,1));
		$nomortxt=trim(substr($noantrianloket,1,3));
		$nomornya=(int)$nomortxt;
		$date = date_create($this->input->get("tglmasuk"));
		$tglmasuknya = date_format($date,"Y-m-d");
        $this->db->from("y_noantrian");
        $this->db->where("tglpelayanan", $tglmasuknya);
        $this->db->where("nomor", $nomornya);
        $this->db->where("loket", $loketnya);
        $data = $this->db->get();
		if ($data->num_rows() > 0) {
			$ada=1;
			//cek kembali apakah nomor ini sudah dipakai 
			$this->db->select("noantrianloket");
			$this->db->from("register");
        	$this->db->where("tgl_masuk", $tglmasuknya);
        	$this->db->where("noantrianloket", $noantrianloket);
        	$this->db->where("no_rm <>", $no_rm);
			$data = $this->db->get();
			if ($data->num_rows() > 0) {
				$ada=0;
			}	
		} else { 
		 	$ada=0;
		}
		return $ada;
    }

    public function kodekirimberkas() {
        // $idnya = $this->input->get("id");
        $idnya = $this->input->get("id");
		var_dump($idnya);
		date_default_timezone_set('Asia/Makassar');
		$jam_sekarang=date('Y-m-d h:i:s');
		$this->db->query("UPDATE register set berkas=1, jam_kirim='$jam_sekarang' where id='$idnya' LIMIT 1");
	}

	public function kodetidakadaberkas() {
        // $idnya = $this->input->get("id");
        $idnya = $this->input->get("id");
		var_dump($idnya);
		date_default_timezone_set('Asia/Makassar');
		$jam_sekarang=date('Y-m-d h:i:s');
		$this->db->query("UPDATE register set berkas=3, jam_hilang='$jam_sekarang' where id='$idnya' LIMIT 1");
	}

	public function kodekerawatinap() {
        // $idnya = $this->input->get("id");
        $idnya = $this->input->get("id");
		var_dump($idnya);
		date_default_timezone_set('Asia/Makassar');
		$jam_sekarang=date('Y-m-d h:i:s');
		$this->db->query("UPDATE register set berkas=4, jam_ranap='$jam_sekarang' where id='$idnya' LIMIT 1");
	}

	public function kodekembaliberkas() {
        // $idnya = $this->input->get("id");
        $idnya = $this->input->get("id");
		var_dump($idnya);
		date_default_timezone_set('Asia/Makassar');
		$jam_sekarang=date('Y-m-d h:i:s');
		$this->db->query("UPDATE register set berkas=6,jam_kembali='$jam_sekarang' where id='$idnya' LIMIT 1");
	}


	public function cekpulang($dtnotrx) {
        $this->db->from('register');
        $this->db->select('status');
        $this->db->where('notransaksi', $dtnotrx);
        $datano = $this->db->get();
        $no = $datano->row();
        return $no->status;
    }

	public function editkelas() {
        $kelashak = $this->input->get("kelashak");
        $rm = $this->input->get("rm");
		$this->db->query("UPDATE pasien set kelashak='$kelashak' where no_rm='$rm' LIMIT 1");
	}

}
