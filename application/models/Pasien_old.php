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
		<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Lengkap</th>
			<th width="10%">No. RM</th>
			<th width="10%">Panggilan</th>
			<th width="20%">Alamat</th>
			<th width="10%">Tlp/HP</th>
			<th width="15%">Golongan</th>
			<th width="15%"><div align="center">Action</div></th>
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
			<td>'.$row->telp.'</td>
			<td>'.$row->golongan.'</td>
			<td class="text-center">
				<a onclick="panggillihat(\''.$row->no_rm.'\');" class="btn-sm btn-success btn-flat"><i class="fa fa-eye"></i></a>
				<a onclick="panggileditpasien(\''.$row->no_rm.'\');" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
				<a onclick="hapuspasien(\''.$row->no_rm.'\')" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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
		$data = $this->db->get();
		return $data->result();
	}

	public function pasiendata() {
		$id = $this->input->get("id");
		$this->db->select("nama_pasien, no_rm, alamat, golongan, asuransi, kelashak, no_askes");
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
        $this->db->select("nama_pasien, no_rm, alamat, golongan, asuransi, kelashak, no_askes");
        $this->db->from("pasien");
        $this->db->where("no_rm", $no_rm);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

	public function ambildataregistrasi() {
		$no = $this->input->get("notrans");
		$this->db->select("no_rm, tgl_masuk, notransaksi, rujukan");
		$this->db->from("register");
		$this->db->where("notransaksi", $no);
		$data = $this->db->get();
		return $data->row();
	}

    public function ambildataregistrasiforpoli() {
        $no = $this->input->get("notrans");
        $this->db->select("register.no_rm as no_rm, register.tgl_masuk as tgl_masuk, register.notransaksi as notransaksi, register.rujukan as rujukan, register.golongan as golongan ");
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
		$this->db->select("register_detail.nama_unit as nama_unit, register.billing as billing");
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

    public function editregisugd($hasilicd) {
        $date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));

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
		$this->db->where('id', $this->input->get("datadetail"));
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
		$this->db->select("register_detail.nama_unit as nama_unit, register.billing as billing, register_detail.id as iddetail");
		$this->db->from("register");
		$this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
		$this->db->where("register.bagian", "INAP");
		// $this->db->or_where("register.bagian", "IGD");
		// $this->db->where("register_detail.pindah", "1");
		$this->db->where("register.billing", "0");
		$this->db->where("register_detail.idasal", "0");
		if (($tglp != "") || ($tglp != null)) {
			$this->db->where("register_detail.tgl_masuk", $tgl);
		}
		if (($nrp != "") || ($nrp != null)) {
			$this->db->like("pasien.no_rm", $nrp, "both");
		}
		// $this->db->group_by("register.notransaksi");
		$this->db->order_by("register_detail.id");
		$data = $this->db->get();
		return $data->result();
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
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk' => $tglm, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'jam_masuk' => $jamm, 
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
		);
		$this->db->where('id', $this->input->get("datadetail"));
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
		$this->db->select("register.bagian as bagian, register.id as id, register.billing as billing");
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
		$this->db->order_by("register_detail.id");
		$data = $this->db->get();
		return $data->result();
	}

	public function simpanregisurj($dtnotrans, $hasilicd) {
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

		if (isset($hasilicd)) {
			$diagawal = $hasilicd->icd_code;
			$ketdiagawal = $hasilicd->jenis_penyakit_local;
		} else {
			$diagawal = "";
			$ketdiagawal = "";
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
            'cara_masuk' => $this->input->get("cm"),
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

		$this->load->model("FilterJalan");
		$this->FilterJalan->filterpindahkamar($idDetail);

		return $dt2;
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

    public function editregisurj($hasilicd) {
        $date = date_create($this->input->get("tglmasuk"));
		$tglm = date_format($date,"Y-m-d");
		$date1 = date_create($this->input->get("tglrujuk"));
		$tglr = date_format($date1,"Y-m-d");
		$tim = date_create($this->input->get("jammasuk"));
		$jamm = date_format($tim,"H:i:s");
		$golc = trim($this->input->get("goltext"));
		
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
			'tgl_masuk_kamar' => $tglm, 
			'tgl_masuk' => $tglm, 
			'user1' => $this->session->userdata("nmuser"), 
			'user2' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y-m-d H:i:s"),
			'jam_masuk' => $jamm, 
            'kode_dokter' => $this->input->get("dokter"),
            'nama_dokter' => $this->input->get("doktertext"),
		);
		$this->db->where('id', $this->input->get("datadetail"));
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
		$this->db->select("register.id as id, pasien.nama_pasien as nama_pasien, pasien.no_rm as no_rm, register.bagian as bagian, register.tgl_masuk as tgl_masuk, register.tgl_keluar as tgl_keluar, register.notransaksi as notransaksi, register.golongan as golongan, register.notransaksi as notraksaksi");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->where("register.no_rm", sprintf("%06d", $id));
		$this->db->order_by("register.tgl_masuk", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Lengkap</th>
			<th width="10%">No. RM</th>
			<th width="10%">Bagian</th>
			<th width="10%">Tgl. Masuk</th>
			<th width="20%">Tgl. Keluar</th>
			<th width="10%">No. Transaksi</th>
			<th width="15%">Golongan</th>
			<th width="15%">Action</th>
		</tr>
		';
		$no = $start;
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->bagian.'</td>
			<td>'.$row->tgl_masuk.'</td>
			<td>'.$row->tgl_keluar.'</td>
			<td>'.$row->notransaksi.'</td>
			<td>'.$row->golongan.'</td>
			<td class="text-center">
				<a onclick="ambildetail(`'.$row->notraksaksi.'`);" class="btn-sm btn-success btn-flat"><i class="fa fa-eye"></i></a>
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
		<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Unit</th>
			<th width="10%">Tgl. Masuk</th>
			<th width="10%">Tgl. Keluar</th>
			<th width="20%">Dokter</th>

		</tr>
		';
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->tgl_masuk_kamar.'</td>
			<td>'.$row->tgl_keluar_kamar.'</td>
			<td>'.$row->nama_dokter.'</td>
		</tr>
		';
		}
		$output .= '</table>';
			return $output;
	}

	/// ======= PENGELOLAAM PASIEN ====================== 

	function count_all_pengelolaan() {
		$this->db->select("register_detail.no_rm");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.no_rm = register.no_rm");
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

	function fetch_pasien_pengelolaan($limit, $start) {
		$output = '';
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.no_rm = register.no_rm");
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
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%"><div align="center">No. RM</div></th>
			<th>Nama Lengkap</th>
			<th width="7%"><div align="center">Masuk RS</div></th>
			<th width="5%"><div align="center">Jam</div></th>
			<th width="7%">Cara Bayar</th>
			<th>Unit Perawatan</th>
			<th width="8%">Kamar</th>
			<th width="9%"><div align="center">Masuk Kamar</div></th>
			<th width="5%"><div align="center">Jam</div></th>
			<th width="18%"><div align="center">Proses</div></th>
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
				<a onclick="panggilpindahkamar(\''.$row->no_transaksi_secondary.'\');" class="btn-sm btn-primary btn-flat">Pindah</a>
				<a onclick="pasienkembali(this, \''.$row->id.'\');" class="btn-sm btn-danger btn-flat">Kembali</a>
				<a onclick="panggillihat(\''.$row->no_rm.'\')" class="btn-sm btn-warning btn-flat">History</a>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
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

	// =================tambahan untuk cek status rm===============
	function count_all_pengelolaan_statusrm() {
		$this->db->select("register_detail.no_rm");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.no_rm = register.no_rm");
		$this->db->where("register_detail.status", 0);
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
	function fetch_pasien_pengelolaan_statusrm($limit, $start) {
		$output = '';
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$tgl=date('Y-m-d');
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk");
		// $this->db->select("register_de.no_rm as no_rm,pasien.nama_pasien as nama_pasien, register.bagian as bagian,  ");	
		$this->db->from("pasien");
		$this->db->join("register", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.no_rm = register.no_rm");
		$this->db->where("register_detail.kode_unitR", 'ALOKET');
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$this->db->where("register.tgl_masuk", $tgl);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="6%"><div align="center">No. RM</div></th>
			<th width="20%">Nama Lengkap</th>
			<th>Alamat</th>
			<th width="7%"><div align="center">Tanggal</div></th>
			<th width="6%"><div align="center">Jam</div></th>
			<th width="20%">Unit Pelayanan</th>
			<th width="10%">Cara Bayar</th>
			<th width="6%"><div align="center">Proses</div></th>
		</tr>
		';
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td><div align="center">'.$row->no_rm.'</div></td>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->alamat.'</td>
			<td><div align="center">'.tanggaldua($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->asuransi.'</td>
			<td class="text-center">
				<a onclick="panggillihat(\''.$row->no_rm.'\')" class="btn-sm btn-warning btn-flat">History</a>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}


	function count_all_pengelolaan_statusrm_new() {
		$this->db->select("register_detail.no_rm");
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$tgl=date('Y-m-d');
		$this->db->from("register");
		$this->db->join("pasien", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register.no_rm = register_detail.no_rm");
		// $this->db->where("register_detail.status", 0);
		$this->db->where("register_detail.kode_unitR", 'ALOKET');
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$this->db->where("register.tgl_masuk", $tgl);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	function fetch_pasien_pengelolaan_statusrm_new($limit, $start) {
		$output = '';
		$nrm = $this->input->get("nrm");
		$kodeunit = $this->input->get("kodeunit");
		$tgl=date('Y-m-d');
		$this->db->select("register_detail.id as id, register_detail.no_transaksi_secondary as no_transaksi_secondary, register_detail.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.tgl_masuk as tgl_masuk, register.jam_masuk as jam_masuk, register.asuransi as asuransi, register_detail.nama_unit as nama_unit, register_detail.nama_kelas as nama_kelas, register_detail.tgl_masuk_kamar as tgl_masuk_kamar , register_detail.jam_masuk as jam_masuk");
		// $this->db->select("register_de.no_rm as no_rm,pasien.nama_pasien as nama_pasien, register.bagian as bagian,  ");	
		$this->db->from("register");
		$this->db->join("pasien", "register.no_rm = pasien.no_rm");
		$this->db->join("register_detail", "register_detail.no_rm = register.no_rm");
		$this->db->where("register_detail.kode_unitR", 'ALOKET');
		if (($nrm != "") || ($nrm != null)) {
			$this->db->where("register_detail.no_rm", $nrm);
		}
		if (($kodeunit != "") || ($kodeunit != null)) {
			$this->db->where("register_detail.kode_unit", $kodeunit);
		}
		$this->db->where("register.tgl_masuk", $tgl);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="6%"><div align="center">No. RM</div></th>
			<th width="20%">Nama Lengkap</th>
			<th>Alamat</th>
			<th width="7%"><div align="center">Tanggal</div></th>
			<th width="6%"><div align="center">Jam</div></th>
			<th width="20%">Unit Pelayanan</th>
			<th width="10%">Cara Bayar</th>
			<th width="6%"><div align="center">Proses</div></th>
		</tr>
		';
		foreach($query->result() as $row) {
		$output .= '
		<tr>
			<td><div align="center">'.$row->no_rm.'</div></td>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->alamat.'</td>
			<td><div align="center">'.tanggaldua($row->tgl_masuk).'</div></td>
			<td><div align="center">'.$row->jam_masuk.'</div></td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->asuransi.'</td>
			<td class="text-center">
				<a onclick="panggillihat(\''.$row->no_rm.'\')" class="btn-sm btn-warning btn-flat">History</a>
			</td>
		</tr>
		';
		}
		$output .= '</table>';
		return $output;
	}


}
