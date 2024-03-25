<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasipasien extends CI_Controller
{

	// Registrasi Pasien 
	public function index()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listpasien";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/lihatdatapasien";
			$data['css'] = "pelayanan/registrasi/lihatdatapasien";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function inputpasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("wilayah");
			$this->load->model("agama");
			$this->load->model("asuransi");
			$this->load->model("kelashak");
			$this->load->model("golongan");
			$this->load->model("pasien");
			$this->load->model("pendidikan");
			$this->load->model("suku");
			$this->load->model("goldarah");
			$data['prov'] = $this->wilayah->ambilprovinsi();
			$data['agama'] = $this->agama->full();
			$data['asuransi'] = $this->asuransi->full();
			$data['kelashak'] = $this->kelashak->full();
			$data['golongan'] = $this->golongan->full();
			$data['negara'] = $this->pasien->datanegara();
			$data['status'] = $this->pasien->statuspasien();
			$data['pendidikan'] = $this->pendidikan->full();
			$data['suku'] = $this->suku->full();
			$data['goldarah'] = $this->goldarah->full();
			$this->load->view('layanan/pelayanan/registrasi/formpasien', $data);
		} else {
			redirect('login');
		}
	}

	public function simpanpasien_old()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$temprm = $this->pasien->ambilsetuprmtaken();
			if ($temprm == 'ada') {
				$data['dtsukses'] = false;
				$data['norm'] = "No. RM sudah terdaftar";

				echo json_encode($data);
			} else if ($temprm == '0') {
				$dtrm = $this->pasien->ambilsetuprm();
				if ($dtrm == 'ada') {
					$data['dtsukses'] = false;
					$data['norm'] = "No. RM sudah terdaftar";

					echo json_encode($data);
				} else {
					$stat = $this->pasien->simpannewpasien($dtrm);
					if ($stat == 'true') {
						$data['dtsukses'] = $stat;
						$data['norm'] = $dtrm->no_rm;

						echo json_encode($data);
					} else if ($stat == 'foto') {
						$data['dtsukses'] = 'false';
						$data['norm'] = "Terjadi Kesalahan upload";

						echo json_encode($data);
					} else {
						$data['dtsukses'] = $stat;
						$data['norm'] = "Terjadi Kesalahan";

						echo json_encode($data);
					}
				}
			} else {
				$stat = $this->pasien->simpannewpasien($temprm);
				if ($stat == 'true') {
					$data['dtsukses'] = $stat;
					$data['norm'] = $temprm->no_rm;
					$this->pasien->hapustemprm($temprm->no_rm);

					echo json_encode($data);
				} else if ($stat == 'foto') {
					$data['dtsukses'] = 'false';
					$data['norm'] = "Terjadi Kesalahan upload 3";

					echo json_encode($data);
				} else {
					$data['dtsukses'] = $stat;
					$data['norm'] = "Terjadi Kesalahan 4";

					echo json_encode($data);
				}
			}
		} else {
			redirect('login');
		}
	}


	public function simpanpasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$temprm = $this->pasien->ambilsetuprmtaken();
			if ($temprm == 'ada') {
				$data['dtsukses'] = false;
				$data['norm'] = "No. RM sudah terdaftar";

				echo json_encode($data);
			} else if ($temprm == '0') {

				$dtrm = $this->pasien->ambilsetuprm();
				if ($dtrm == 'ada') {
					$data['dtsukses'] = false;
					$data['norm'] = "No. RM sudah terdaftar";

					echo json_encode($data);
				} else {
					$stat = $this->pasien->simpannewpasien($dtrm);
					if ($stat == 'true') {
						$data['dtsukses'] = $stat;
						$data['norm'] = $dtrm->no_rm;

						echo json_encode($data);
					} else if ($stat == 'foto') {
						$data['dtsukses'] = 'false';
						$data['norm'] = "Terjadi Kesalahan upload";

						echo json_encode($data);
					} else {
						$data['dtsukses'] = $stat;
						$data['norm'] = "Terjadi Kesalahan";

						echo json_encode($data);
					}
				}
			} else {
				$stat = $this->pasien->simpannewpasien($temprm);
				if ($stat == 'true') {
					$data['dtsukses'] = $stat;
					$data['norm'] = $temprm;
					$this->pasien->hapustemprm($temprm);

					echo json_encode($data);
				} else if ($stat == 'foto') {
					$data['dtsukses'] = 'false';
					$data['norm'] = "Terjadi Kesalahan upload 3";

					echo json_encode($data);
				} else {
					$data['dtsukses'] = $stat;
					$data['norm'] = "Terjadi Kesalahan 4";
					echo json_encode($data);
				}
			}
		} else {
			redirect('login');
		}
	}


	public function formubahpasien()
	{

		/**
		 * panggil form ubah pasien
		 */

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("wilayah");
			$this->load->model("agama");
			$this->load->model("asuransi");
			$this->load->model("kelashak");
			$this->load->model("golongan");
			$this->load->model("pasien");
			$this->load->model("pendidikan");
			$this->load->model("suku");
			$this->load->model("goldarah");
			$data['prov'] = $this->wilayah->ambilprovinsi();
			$data['agama'] = $this->agama->full();
			$data['asuransi'] = $this->asuransi->full();
			$data['kelashak'] = $this->kelashak->full();
			$data['golongan'] = $this->golongan->full();
			$data['negara'] = $this->pasien->datanegara();
			$data['status'] = $this->pasien->statuspasien();
			$data['pasien'] = $this->pasien->getfullpasien();
			$data['pendidikan'] = $this->pendidikan->full();
			$data['suku'] = $this->suku->full();
			$data['goldarah'] = $this->goldarah->full();
			$this->load->view('layanan/pelayanan/registrasi/formpasienedit', $data);
		} else {
			redirect('login');
		}
	}

	public function formubahpasienfoto()
	{

		/**
		 * panggil form ubah foto pasien
		 */

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");

			$data['pasien'] = $this->pasien->getfotopasien();

			$this->load->view('layanan/pelayanan/registrasi/formpasieneditfoto', $data);
		} else {
			redirect('login');
		}
	}

	public function prosesubahpasien()
	{

		/**
		 * Proses Ubah data pasien
		 */

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$stat = $this->pasien->updatepasien();
			if ($stat == 'true') {
				$data['dtsukses'] = $stat;
				$data['norm'] = "Sukses Update Data";

				echo json_encode($data);
			} else {
				$data['dtsukses'] = $stat;
				$data['norm'] = "Terjadi Kesalahan";

				echo json_encode($data);
			}
		} else {
			redirect('login');
		}
	}

	public function prosesubahpasienfoto()
	{

		/**
		 * Proses Ubah data pasien
		 */

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$stat = $this->pasien->updatepasienfoto();
			if ($stat["foto"] == 'true') {
				$data['dtsukses'] = $stat["foto"];
				$data['norm'] = "Sukses Update Data";

				echo json_encode($data);
			} else if ($stat["foto"] == 'foto') {
				$data['dtsukses'] = 'false';
				$data['norm'] = $stat["err"];

				echo json_encode($data);
			} else {
				$data['dtsukses'] = $stat["foto"];
				$data['norm'] = "Terjadi Kesalahan / Foto kosong";

				echo json_encode($data);
			}
		} else {
			redirect('login');
		}
	}

	public function prosesdeletedatapasien()
	{

		/**
		 *
		 */

		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$stat = $this->pasien->hapusdatapasien();
			echo json_encode($stat);
		} else {
			redirect('login');
		}
	}

	public function caripasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasien();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasien', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationpasien()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_details($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function paginationpasien_pasien_resep()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_details_pasien_resep($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function lihatdatapasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->view('layanan/pelayanan/registrasi/viewdatapasien');
		} else {
			redirect('login');
		}
	}

	public function paginationhistorypasien()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->pasien_all();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="hist">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function lihatdetailregis($id)
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$kirim = $this->pasien->fetch_pasien_detail($id);
			$output = array(
				'pasien' => $kirim
			);
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}
	// ===================

	// lihat data register UGD
	public function dataregistrasiugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregisugd";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/datapasienugd";
			$data['css'] = "pelayanan/registrasi/datapasienugd";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function dataregistrasibaruugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregispasienugd";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/dataregisugd";
			$data['css'] = "pelayanan/registrasi/dataregisugd";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasienugd();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienugd', $data);
		} else {
			redirect('login');
		}
	}
	// ===================

	// Register baru UGD
	public function caripasienregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasien();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienregisugd', $data);
		} else {
			redirect('login');
		}
	}

	public function inputregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtperawatan = $this->unit->untuktujuanperawatanregis("IGD");
			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtpasien = $this->pasien->pasiendata();
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "IGD");
			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			$this->load->model("Icddata");
			$dticd = $this->Icddata->ambilicd();
			$this->load->model("dokter");
			// $dtdokter = $this->dokter->datadokter();
			$dtdokter = $this->dokter->datadokterugd();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();

			$data["tujuanperawatan"] = $dtperawatan;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			$data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			$data["dtdokter"] = $dtdokter;
			$data["dtdokterluar"] = $dtdokterluar;
			$data["formpilih"] = 0;
			$data["dtfaskes"] = $dtfaskes;
			$this->load->view('layanan/pelayanan/registrasi/formregisugd', $data);
		} else {
			redirect('login');
		}
	}

	public function ambilkelasdariunit()
	{
		$this->load->model("kamarrawat");
		$data = $this->kamarrawat->kamar();
		echo json_encode($data);
	}

	public function simpanregisugd_dengan_icdawal()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtnotrans = $this->pasien->ambilnotrans();
			$dtsimpan = $this->pasien->simpanregisugd($dtnotrans, $hasilicd);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function simpanregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtnotrans = $this->pasien->ambilnotrans();
			$editkelas = $this->pasien->editkelas();
			$dtsimpan = $this->pasien->simpanregisugd($dtnotrans, $hasilicd);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtcek = $this->pasien->regishapusugd();
			$detail = $this->pasien->carinamapasienugd();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtcek;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienugd', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function editregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtperawatan = $this->unit->untuktujuanperawatanregis("IGD");
			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "IGD");
			$dtregis = $this->pasien->ambildataregisugd();
			$dtregisdetail = $this->pasien->ambildataregisdetailugd($dtregis->notransaksi);
			$dtkdunitdetail = $this->pasien->ambildataregisdetail_atas($dtregis->notransaksi);
			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			$this->load->model("Icddata");
			$dticd = $this->Icddata->ambilicd();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokter();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();

			$data["tujuanperawatan"] = $dtperawatan;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			$data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			$data["dtdokter"] = $dtdokter;
			$data["formpilih"] = 1;
			$data["regis"] = $dtregis;
			$data["regisdetail"] = $dtregisdetail;
			$data["dtkdunitdetail"] = $dtkdunitdetail;
			$data["kode_unit_regisdetail"] = $dtregisdetail;
			$data["dtfaskes"] = $dtfaskes;
			$data["dtdokterluar"] = $dtdokterluar;
			$this->load->view('layanan/pelayanan/registrasi/formregisugd', $data);
		} else {
			redirect('login');
		}
	}

	public function prosesubahregisugd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtedit = $this->pasien->editregisugd($hasilicd);
			$detail = $this->pasien->carinamapasienugd();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtedit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienugd', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	// ===================

	// lihat data register INAP
	public function dataregistrasiuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregisuri";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/datapasienuri";
			$data['css'] = "pelayanan/registrasi/datapasienuri";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function dataregistrasibaruuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregispasienuri";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/dataregisuri";
			$data['css'] = "pelayanan/registrasi/dataregisuri";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasienuri();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienuri', $data);
		} else {
			redirect('login');
		}
	}
	// ===================

	// Register baru INAP
	public function caripasienregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasien();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienregisuri', $data);
		} else {
			redirect('login');
		}
	}

	public function inputregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtperawatan = $this->unit->untuktujuanperawatanregis("inap");
			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtpasien = $this->pasien->pasiendata();
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "INAP");
			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			$this->load->model("Icddata");
			$dticd = $this->Icddata->ambilicd();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokter();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();

			$data["tujuanperawatan"] = $dtperawatan;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			$data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			$data["dtdokter"] = $dtdokter;
			$data["dtdokterluar"] = $dtdokterluar;
			$data["formpilih"] = 0;
			$data["dtfaskes"] = $dtfaskes;
			$this->load->view('layanan/pelayanan/registrasi/formregisuri', $data);
		} else {
			redirect('login');
		}
	}

	public function simpanregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtnotrans = $this->pasien->ambilnotrans();
			$dtsimpan = $this->pasien->simpanregisuri($dtnotrans, $hasilicd);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtcek = $this->pasien->regishapusuri();
			$detail = $this->pasien->carinamapasienuri();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtcek;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienuri', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function editregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtperawatan = $this->unit->untuktujuanperawatanregis("inap");

			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "INAP");
			$dtregis = $this->pasien->ambildataregisuri();
			$dtregisdetail = $this->pasien->ambildataregisdetailuri($dtregis->notransaksi);
			
			$dtkdunitdetail = $this->pasien->ambildataregisdetail_atas($dtregis->notransaksi);

			$this->load->model("kamarrawat");
			$dtkamar = $this->kamarrawat->pilih_kamar_untuk_edit($dtkdunitdetail->kode_unit);


			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			$this->load->model("Icddata");
			$dticd = $this->Icddata->ambilicd();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokter();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();

			$data["tujuanperawatan"] = $dtperawatan;
			$data["kamar"] = $dtkamar;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			$data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			$data["dtdokter"] = $dtdokter;
			$data["formpilih"] = 1;
			$data["regis"] = $dtregis;
			$data["regisdetail"] = $dtregisdetail;
			$data["kode_unit_regisdetail"] = $dtkdunitdetail;
			$data["dtkamar"] = $dtkamar;
			$data["dtfaskes"] = $dtfaskes;
			$data["dtdokterluar"] = $dtdokterluar;
			$this->load->view('layanan/pelayanan/registrasi/formregisuri', $data);
		} else {
			redirect('login');
		}
	}

	public function prosesubahregisuri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtedit = $this->pasien->editregisuri($hasilicd);
			$detail = $this->pasien->carinamapasienuri();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtedit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienuri', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}
	// ===================

	// lihat data register JALAN
	public function dataregistrasiurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregisurj";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/datapasienurj";
			$data['css'] = "pelayanan/registrasi/datapasienurj";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function dataregistrasibaruurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$data['include'] = "layanan/pelayanan/registrasi/listregispasienurj";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/dataregisurj";
			$data['css'] = "pelayanan/registrasi/dataregisurj";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function caripasienurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasienurj();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienurj', $data);
		} else {
			redirect('login');
		}
	}
	// ===================

	// Register baru JALAN
	public function caripasienregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtpasien = $this->pasien->carinamapasien();
			$data["hasil"] = $dtpasien;
			$this->load->view('layanan/pelayanan/registrasi/tddatapasienregisurj', $data);
		} else {
			redirect('login');
		}
	}


	public function inputregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			// $dtperawatan = $this->unit->untuktujuanperawatanregis("jalan");
			$this->load->model("ceksetup");
			$dtcek_antrian = $this->ceksetup->full();
			$dtperawatan = $this->unit->untuktujuanperawatanregis2();
			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtpasien = $this->pasien->pasiendata();
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "JALAN");
			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			// $this->load->model("Icddata");
			// $dticd = $this->Icddata->ambilicd();
			// $this->load->model("dokter");
			// $dtdokter = $this->dokter->datadokter();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();
			// echo json_encode($dtpasien);
			$data["cek_antrian"] = $dtcek_antrian;
			$data["tujuanperawatan"] = $dtperawatan;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			// $data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			// $data["dtdokter"] = $dtdokter;
			$data["dtdokterluar"] = $dtdokterluar;
			$data["dtfaskes"] = $dtfaskes;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/registrasi/formregisurj', $data);
		} else {
			redirect('login');
		}
	}

	public function caridokter($id)
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("dokter");
			$dataasuransi = $this->dokter->datadokterunitregistrasi($id);
			$options = array();
			foreach ($dataasuransi as $arrayForEach) {
				$options += array($arrayForEach->kode_dokter => $arrayForEach->nama_dokter);
			}
			echo json_encode($options);
		} else {
			redirect('login');
		}
	}

	public function cariasuransi($id)
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("golongan");
			$dataasuransi = $this->golongan->dataasuransi($id);
			$options = array();
			foreach ($dataasuransi as $arrayForEach) {
				$options += array($arrayForEach->nama_asuransi => $arrayForEach->nama_asuransi);
			}
			echo json_encode($options);
		} else {
			redirect('login');
		}
	}

	public function cariicd()
	{
		if ($this->session->userdata("login") == TRUE) {
			$param = $this->input->get("search", TRUE);
			$this->load->model("Icddata");
			$dataasuransi = $this->Icddata->ambilicdfilter($param);
			$options = array();
			foreach ($dataasuransi as $arrayForEach) {
				$o = [
					"id" => $arrayForEach->icd_code,
					"text" => $arrayForEach->icd_code . " - " . $arrayForEach->jenis_penyakit_local
				];
				array_push($options, $o);
			}
			echo json_encode(['items' => $options]);
		} else {
			redirect('login');
		}
	}

	public function caripoli()
	{
		if ($this->session->userdata("login") == TRUE) {
			$param = $this->input->get("search", TRUE);
			$param = 'Ins';
			$this->load->model("Bpjsmodel");
			$datapoli = $this->Bpjsmodel->referensipoli($param);
			$res=json_decode($datapoli,true);
			$responnya=trim($res["response"]);
			$ss=stringDecrypt($responnya);
			$cc=decompress($ss);
			// echo $cc;
			$ccdecode=json_decode($cc,true);
			$options = array();
			foreach ($ccdecode["poli"] as $arrayForEach) {
				$cek=$arrayForEach['nama'];
				// if (strpos($cek,$param1) !== false) {
				$o = [
					"id" => $arrayForEach['kode'],
					"text" => $arrayForEach['nama']
				];
				array_push($options, $o);
				// }
			}
		echo json_encode(['items' => $options]);
		}
	}	

	public function simpanregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			// $kdpoli = $this->input->get("tp");
			$kode_dokter = $this->input->get("dokter");
			$noantrianloket = $this->input->get("noantrianloket");
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			$dtantrian_poli = $this->pasien->ambil_antrian_poli($kode_dokter);
			$dtnotrans = $this->pasien->ambilnotrans();
			$dtnokodebooking = $this->pasien->ambilkodebooking();
			$dtnokodebookingnya = $dtnokodebooking[2];
			$dtsimpan = $this->pasien->simpanregisurj($dtnotrans, $hasilicd, $dtantrian_poli, $dtnokodebookingnya, $dtnokodebooking);
			$dt["stat"] = $dtsimpan;
			$dt["dtnotrans"] = $dtnotrans[2];
			$dt["dtnokodebooking"] = $dtnokodebooking[2];
			$dt["dtantrian_poli"] = $dtantrian_poli;
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function hapusregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtcek = $this->pasien->regishapusurj();
			$detail = $this->pasien->carinamapasienurj();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtcek;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienurj', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}

	public function editregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			// $dtperawatan = $this->unit->untuktujuanperawatanregis("jalan");
			$dtperawatan = $this->unit->untuktujuanperawatanregis2();
			$this->load->model("rujukan");
			$dtrujukan = $this->rujukan->full();
			$this->load->model("golongan");
			$dtgolongan = $this->golongan->full();
			$this->load->model("pasien");

			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "JALAN");
			$dtregis = $this->pasien->ambildataregisurj();
			$dtregisdetail = $this->pasien->ambildataregisdetailurj($dtregis->notransaksi);
			$dtkdunitdetail = $this->pasien->ambildataregisdetail_atas($dtregis->notransaksi);
			$dtnoantrianlama = $this->pasien->ambildatanoantrianurj($dtregis->notransaksi);
			$this->load->model("jnslayanan");
			$jnspelayanan = $this->jnslayanan->full();
			$this->load->model("Icddata");
			$dticd = $this->Icddata->ambilicd();
			$this->load->model("dokter");
			$dtdokter = $this->dokter->datadokter();
			$this->load->model("faskes");
			$dtfaskes = $this->faskes->full();
			$this->load->model("dokterluar");
			$dtdokterluar = $this->dokterluar->full();

			$data["tujuanperawatan"] = $dtperawatan;
			$data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			$data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			$data["dticd"] = $dticd;
			$data["jnspelayanan"] = $jnspelayanan;
			$data["dtdokter"] = $dtdokter;
			$data["formpilih"] = 1;
			$data["regis"] = $dtregis;
			$data["regisdetail"] = $dtregisdetail;
			$data["kode_unit_regisdetail"] = $dtregisdetail;
			$data["dtfaskes"] = $dtfaskes;
			$data["dtdokterluar"] = $dtdokterluar;
			$data["dtnoantrianlama"] = $dtnoantrianlama;
			$this->load->view('layanan/pelayanan/registrasi/formregisurj', $data);
		} else {
			redirect('login');
		}
	}

	public function prosesubahregisurj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$kode_dokter = $this->input->get("dokter");
			$kdpoli = trim($this->input->get("tp"));
			$kdpolilama = trim($this->input->get("tplama"));
			$noantrianloket = $this->input->get("noantrianloket");
			$noantrianpolilama = $this->input->get("noantrianpolilama");
			$this->load->model("pasien");
			$this->load->model("Icddata");
			$kodeicd = $this->input->get("icd");
			$hasilicd = $this->Icddata->full($kodeicd);
			// $dtantrian_poli = $this->pasien->ambil_antrian_poli($kdpoli);
			if ($kdpoli == $kdpolilama ) {
				$dtantrian_poli = $noantrianpolilama;
			} else {
				$dtantrian_poli = $this->pasien->ambil_antrian_poli($kode_dokter);
			}
			$dtedit = $this->pasien->editregisurj($hasilicd, $dtantrian_poli);
			$detail = $this->pasien->carinamapasienurj();
			$data["hasil"] = $detail;
			$dt["stat"] = $dtedit;
			$dt["dtview"] = $this->load->view('layanan/pelayanan/registrasi/tddatapasienurj', $data, TRUE);
			echo json_encode($dt);
		} else {
			redirect('login');
		}
	}


	// ===================

	// Pelayanan Pasien
	public function pengelolaanpasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->full();

			$data['include'] = "layanan/pelayanan/registrasi/pengelolaan/listpasien";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien";
			$data['css'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$data['dtunit'] = $dtunit;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}


	public function paginationpengelolaanpasien()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all_pengelolaan();
		$config["per_page"] = 500;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien_pengelolaan($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function paginationpengelolaanpasien_only_rm()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all_pengelolaan_only_rm();
		$config["per_page"] = 500;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien_pengelolaan_only_rm($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function pengelolaanpindahkamar()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->unitpindakamar("inap");
			$data["dtunit"] = $dtunit;
			$data["id"] = $this->input->get("id");

			$this->load->view('layanan/pelayanan/registrasi/pengelolaan/formpindahkamar', $data);
		} else {
			redirect('login');
		}
	}

	public function ambilpindahkamar()
	{
		$this->load->model("ugdmdl");
		$data = $this->ugdmdl->ambilkamarpindah();
		echo json_encode($data);
	}

	public function layananpindahkamar()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtregis = $this->pasien->ambildatapindah();
			$dtsimpan = $this->pasien->simpanpindahkamar($dtregis);
			echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	public function layanankerawatinap()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtregisdetail = $this->pasien->ambildatapregisdetail();
			$dtregis = $this->pasien->ambildatapregis();
			$dtnotrans = $this->pasien->ambilnotrans();
			$dtsimpan = $this->pasien->polikerawatinap($dtregisdetail,$dtregis,$dtnotrans);
			echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	

	public function pengelolaankerawatinap()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$this->load->model("pasien");
			$dtunit = $this->unit->unitpindakamar("inap");
			$dtnotrx=$this->input->get("id");
			$pulang = $this->pasien->cekpulang($dtnotrx);
			$data["dtunit"] = $dtunit;
			$data["pulang"] = $pulang;
			$data["id"] = $this->input->get("id");

			$this->load->view('layanan/pelayanan/registrasi/pengelolaan/formkerawatinap', $data);
		} else {
			redirect('login');
		}
	}

	public function pengelolaanpulangpasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("unit");
			// $dtunit = $this->unit->unitpindakamar("inap");
			// $data["dtunit"] = $dtunit;
			$data["id"] = $this->input->get("id");

			$this->load->view('layanan/pelayanan/registrasi/pengelolaan/formpulangkan', $data);
		} else {
			redirect('login');
		}
	}
	
//pulangkan pasien

	public function layananpulangkanpasien()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtregis = $this->pasien->ambildatapulangkan();
			$dtsimpan = $this->pasien->simpanpulangkanpasien($dtregis);
			
			echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	

	// ============================status RM==============================

	public function statusrm()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->full();

			$data['include'] = "layanan/pelayanan/registrasi/pengelolaan/listpasienstatusrm";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien_statusrm";
			$data['css'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien_statusrm";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$data['dtunit'] = $dtunit;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}

	public function paginationpengelolaanstatusrm()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all_pengelolaan_statusrm();
		$config["per_page"] = 500;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien_pengelolaan_statusrm($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function paginationpengelolaanstatusrm_all()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all_pasien_pengelolaan_statusrm_all();
		$config["per_page"] = 500;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link_all' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien_pengelolaan_statusrm_all($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	// ========================= BATALKAN pASIEN PULANG ===================
	public function pengelolaanpasienpulang()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->full();

			$data['include'] = "layanan/pelayanan/registrasi/pengelolaan/listpasienpulang";
			// $data['menu'] = $menu;
			$data['js'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien_pulang";
			$data['css'] = "pelayanan/registrasi/pengelolaan/lihatdatapasien";
			$data['menusamping'] = "menuregistrasi";
			$data['backhome'] = "tiga";
			$data['dtunit'] = $dtunit;
			$this->load->view('templatesidebar/content', $data);
		} else {
			redirect('login');
		}
	}


	public function paginationpengelolaanpasienpulang()
	{
		$this->load->model("pasien");
		$config = array();
		$config["base_url"] = "#";
		$config["total_rows"] = $this->pasien->count_all_pengelolaanpulang();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination" id="dtpasien">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$config['data_page_attr'] = "class='page-link' data-ci-pagination-page";
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];

		$output = array(
			'pagination_link' => $this->pagination->create_links(),
			'pasien' => $this->pasien->fetch_pasien_pengelolaanpulang($config["per_page"], $start)
		);
		echo json_encode($output);
	}

	public function pengelolaanpindahkamarbatal()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("unit");
			$dtunit = $this->unit->unitpindakamar("inap");
			$data["dtunit"] = $dtunit;
			$data["id"] = $this->input->get("id");

			$this->load->view('layanan/pelayanan/registrasi/pengelolaan/formpindahkamar', $data);
		} else {
			redirect('login');
		}
	}

	public function ambilpindahkamarbatal()
	{
		$this->load->model("ugdmdl");
		$data = $this->ugdmdl->ambilkamarpindah();
		echo json_encode($data);
	}

	public function layananpindahkamarbatal()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtregis = $this->pasien->ambildatapindah();
			$dtsimpan = $this->pasien->simpanpindahkamar($dtregis);
			echo json_encode($dtsimpan);
		} else {
			redirect('login');
		}
	}

	// sampai sini sdh cek jumlah ada atau tidak
	public function cekdataada()
	{
		$id = $this->input->get('id');
		$this->load->model("pasien");
		$pasiennya = $this->pasien->ceknorm($id);
		$ini = $this->pasien->cekdataregister($pasiennya->no_rm);
		echo json_encode($ini);
	}

	public function caridatanoantrian()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$ini = $this->pasien->pencariannoantrian();
			echo json_encode($ini);
		} else {
			redirect('login');
		}
	}

	public function tracerstatusrm_old($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "tracerjalan".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/tracerjalan', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function tracerstatusrm($id) {
		if ($this->session->userdata("login") == TRUE) {
			$r = date("Ymd");
			$this->load->library('pdf');
			// $this->pdf->setPaper('A4', 'potrait');
			$this->pdf->setPaper('tracer', 'potrait');
			$this->pdf->filename = "antrianpoli".$r.".pdf";
			$data["id"] = $id;
			$this->pdf->load_view('laporan/sampul/cetakantrianpoli', $data);
			$this->pdf->render();
			$this->pdf->output();
        } else {
            redirect('login');
        }
	}

	public function kirimberkas() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtunit = $this->pasien->kodekirimberkas();
			// $data["dtunit"] = $dtunit;
			// $data["id"] = $this->input->get("id");

			// $this->load->view('layanan/pelayanan/registrasi/listpasien');
		} else {
			redirect('login');
		}
	}

	public function tidakadaberkas() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtunit = $this->pasien->kodetidakadaberkas();
		} else {
			redirect('login');
		}
	}

	public function kerawatinap() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtunit = $this->pasien->kodekerawatinap();
		} else {
			redirect('login');
		}
	}

	public function kembaliberkas() {
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtunit = $this->pasien->kodekembaliberkas();
		} else {
			redirect('login');
		}
	}



	// ================= vclaim ===========
	public function formsepigd()
	{
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("unit");
			// $dtperawatan = $this->unit->untuktujuanperawatanregis("IGD");
			// $this->load->model("rujukan");
			// $dtrujukan = $this->rujukan->full();
			// $this->load->model("golongan");
			// $dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$hp=$dtpasien->hp;
			$no_askes=$dtpasien->no_askes;
			$kelashak=$dtpasien->kelashak;
			if ($kelashak=='KELAS I') {
				$nokelas='1';
			} else if ($kelashak=='KELAS II')  {
				$nokelas='2';
			} else {
				$nokelas='3';
			}
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "IGD");
			$dtregis = $this->pasien->ambildataregisugd();
			$notransaksi=$dtregis->notransaksi;
			$dtregisdetail = $this->pasien->ambildataregisdetailugd($dtregis->notransaksi);
			$dtkdunitdetail = $this->pasien->ambildataregisdetail_atas($dtregis->notransaksi);

			// $this->load->model("jnslayanan");
			// $jnspelayanan = $this->jnslayanan->full();
			// $this->load->model("Icddata");
			// $dticd = $this->Icddata->ambilicd();
			// $this->load->model("dokter");
			// $dtdokter = $this->dokter->datadokter();
			// $this->load->model("faskes");
			// $dtfaskes = $this->faskes->full();
			// $this->load->model("dokterluar");
			// $dtdokterluar = $this->dokterluar->full();

			// $data["tujuanperawatan"] = $dtperawatan;
			// $data["golongan"] = $dtgolongan;
			$data["dtpasien"] = $dtpasien;
			// $data["rujukan"] = $dtrujukan;
			$data["dthistory"] = $dthistory;
			// $data["dticd"] = $dticd;
			// $data["jnspelayanan"] = $jnspelayanan;
			// $data["dtdokter"] = $dtdokter;
			$data["formpilih"] = 0;
			$data["regis"] = $dtregis;
			$data["regisdetail"] = $dtregisdetail;
			$data["dtkdunitdetail"] = $dtkdunitdetail;
			$data["kode_unit_regisdetail"] = $dtregisdetail;
			// $data["dtfaskes"] = $dtfaskes;
			// $data["dtdokterluar"] = $dtdokterluar;
			$data["txtTanggal"] = date('Y-m-d');
			$data["txtno_rm"] = $dtnorm;
			$data["notelp"] = $hp;
			$data["no_askes"] = $no_askes;
			$data["nokelas"] = $nokelas;
			$data["notransaksi"] = $notransaksi;
			
			$this->load->view('layanan/pelayanan/bpjs/form/formsep', $data);
		} else {
			redirect('login');
		}
	}

	public function ceksep(){
		$dtnotransaksi="TR23052200003";
		$this->load->model("bpjsmodel");
		$dtsep=$this->bpjsmodel->ambildatasep($dtnotransaksi);
		var_dump($dtsep);
	}

	public function formsepigdedit()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambildataregistrx();
			$dtnotransaksi = $dtnorm->notransaksi;

			$this->load->model("bpjsmodel");
			$dtsep=$this->bpjsmodel->ambildatasep($dtnotransaksi);

			$kelashak=$dtsep->peserta_hak_kelas;
			if ($kelashak=='KELAS I') {
				$nokelas='1';
			} else if ($kelashak=='KELAS II')  {
				$nokelas='2';
			} else {
				$nokelas='3';
			}

			$data["dtsep"] = $dtsep;
			// $data["txtno_rm"] = $dtnorm;
			$data["nokelas"] = $nokelas;
			// $data["notransaksi"] = $notransaksi;
			$data["formpilih"] = 1;
			$this->load->view('layanan/pelayanan/bpjs/form/formsep', $data);
		} else {
			redirect('login');
		}
	}

	public function formsepirj()
	{
		if ($this->session->userdata("login") == TRUE) {
			// $dtregis = $this->pasien->ambildataregisugd();
			// $notransaksi=$dtregis->notransaksi;

			$this->load->model("pasien");
			$dtregis = $this->pasien->ambildataregisugd();
			$notransaksi=$dtregis->notransaksi;
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$hp=$dtpasien->hp;
			// $dtrujukan = $this->pasien->ambilnorujukan();
			// $norujukan=$dtrujukan->norujukan;
			$norujukan='180111040423P000001';
			$this->load->model("bpjsmodel");
			$dtrujukan = $this->bpjsmodel->ambilrujukan($norujukan);
			$a=$dtrujukan[1]; 
			$timestampSEP=$a['x-timestamp'];
			$res=json_decode($dtrujukan[0],true);
			// $res=json_decode($dtrujukan,true);

			// alertWindow('1   '.$res);

			$code=$res["metaData"]["code"];
			$message=$res["metaData"]["message"];
			// $resp1=$res["response"];
			// alertWindow('2    '.$code.' '.$message.'  '.$resp1);
			if ($code == 200 ){
				$responnya=trim($res["response"]);
				// $ss=stringDecrypt($responnya);
				$ss=stringDecrypt_SEP($responnya,$timestampSEP);

				$cc=decompress($ss);
			// alertWindow('3    '.$cc);
				$isirujukan=json_decode($cc,true);
			// alertWindow('4   '.$code.' '.$message.' '.$isirujukan);
				$data["dtpasien"] = $dtpasien;
				$data["rujukan"] = $isirujukan;
				$data["txtTanggal"] = date('Y-m-d');
				$data["txtno_rm"] = $dtnorm;
				$data["notelp"] =  $hp;
				$data["formpilih"] = 0;
				$data["notransaksi"] = $notransaksi;
				$this->load->view('layanan/pelayanan/bpjs/form/formsep_irj', $data);
			} else {
				$output = [
					'stat' => false,
					'code' => $code,
					'message' => $message
				];
				echo json_encode($output);  //kirim kembali ke pemanggil SEP IRJ
			}
		} else {
			redirect('login');
		}
	}

	public function formsepirjedit()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambildataregistrx();
			if ($dtnorm!= 'kosong') {
				$dtnotransaksi = $dtnorm->notransaksi;
				$this->load->model("bpjsmodel");
				$dtsep=$this->bpjsmodel->ambildatasep($dtnotransaksi);

				$kelashak=$dtsep->peserta_hak_kelas;
				if ($kelashak=='KELAS I') {
					$nokelas='1';
				} else if ($kelashak=='KELAS II')  {
					$nokelas='2';
				} else {
					$nokelas='3';
				}

				$data["dtsep"] = $dtsep;
				// $data["txtno_rm"] = $dtnorm;
				$data["nokelas"] = $nokelas;
				// $data["notransaksi"] = $notransaksi;
				$data["formpilih"] = 1;
				$this->load->view('layanan/pelayanan/bpjs/form/formsep_irj', $data);
			} else {
				alertWindow('SEP belum Terbit');
			}	
		} else {
			redirect('login');
		}
	}

	public function formhapusirj()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambildataregistrx();
			if ($dtnorm!= 'kosong') {
				$dtnotransaksi = $dtnorm->notransaksi;

				$this->load->model("bpjsmodel");
				$dtsep=$this->bpjsmodel->ambildatasep($dtnotransaksi);

				$kelashak=$dtsep->peserta_hak_kelas;
				if ($kelashak=='KELAS I') {
					$nokelas='1';
				} else if ($kelashak=='KELAS II')  {
					$nokelas='2';
				} else {
					$nokelas='3';
				}

				$data["dtsep"] = $dtsep;
				// $data["txtno_rm"] = $dtnorm;
				$data["nokelas"] = $nokelas;
				// $data["notransaksi"] = $notransaksi;
				$data["formpilih"] = 2;
				$this->load->view('layanan/pelayanan/bpjs/form/formsep_irj', $data);
			} else {
				alertWindow('SEP belum Terbit');
			}
		} else {
			redirect('login');
		}
	}

	public function formsepiri()
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$hp=$dtpasien->hp;
			$no_askes=$dtpasien->no_askes;
			$kelashak=$dtpasien->kelashak;
			if ($kelashak=='KELAS I') {
				$nokelas='1';
			} else if ($kelashak=='KELAS II')  {
				$nokelas='2';
			} else {
				$nokelas='3';
			}
			$dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "IGD");
			$dtregis = $this->pasien->ambildataregisugd();
			$notransaksi=$dtregis->notransaksi;
			$dtregisdetail = $this->pasien->ambildataregisdetailugd($dtregis->notransaksi);
			$dtkdunitdetail = $this->pasien->ambildataregisdetail_atas($dtregis->notransaksi);
			$this->load->model("bpjsmodel");
			$dtspri=$this->bpjsmodel->ambildataspri($dtregis->notransaksi);
			$data["dtpasien"] = $dtpasien;
			$data["dthistory"] = $dthistory;

			$data["formpilih"] = 0;
			$data["regis"] = $dtregis;
			$data["regisdetail"] = $dtregisdetail;
			$data["dtkdunitdetail"] = $dtkdunitdetail;
			$data["kode_unit_regisdetail"] = $dtregisdetail;

			$data["txtTanggal"] = date('Y-m-d');
			$data["txtno_rm"] = $dtnorm;
			$data["notelp"] = $hp;
			$data["no_askes"] = $no_askes;
			$data["nokelas"] = $nokelas;
			$data["notransaksi"] = $notransaksi;
			$data["dtspri"] = $dtspri;
			$this->load->view('layanan/pelayanan/bpjs/form/formsep_iri', $data);
		} else {
			redirect('login');
		}
	}

	public function formsepiriedit()  
	{
		if ($this->session->userdata("login") == TRUE) {
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambildataregistrx();
			if ($dtnorm!= 'kosong') {
				$dtnotransaksi = $dtnorm->notransaksi;
				$this->load->model("bpjsmodel");
				$dtsep=$this->bpjsmodel->ambildatasep($dtnotransaksi);  
				// ini seharusnya bukan nomor transaksi tapi nomor sep krn notransaksi bisa ada 2 krn sep igd dan rinap

				$kelashak=$dtsep->peserta_hak_kelas;
				if ($kelashak=='KELAS I') {
					$nokelas='1';
				} else if ($kelashak=='KELAS II')  {
					$nokelas='2';
				} else {
					$nokelas='3';
				}

				$data["dtsep"] = $dtsep;
				// $data["txtno_rm"] = $dtnorm;
				$data["nokelas"] = $nokelas;
				// $data["notransaksi"] = $notransaksi;
				$data["formpilih"] = 1;
				$this->load->view('layanan/pelayanan/bpjs/form/formsep_irj', $data);
			} else {
				alertWindow('SEP belum Terbit');
			}	
		} else {
			redirect('login');
		}
	}

	public function formspri()
	{
		if ($this->session->userdata("login") == TRUE) {
			// $this->load->model("unit");
			// $dtperawatan = $this->unit->untuktujuanperawatanregis("IGD");
			// $this->load->model("rujukan");
			// $dtrujukan = $this->rujukan->full();
			// $this->load->model("golongan");
			// $dtgolongan = $this->golongan->full();
			$this->load->model("pasien");
			$dtnorm = $this->pasien->ambilpasiendariregis();
			$dtpasien = $this->pasien->pasiendatarm($dtnorm);
			$hp=$dtpasien->hp;
			$no_askes=$dtpasien->no_askes;
			// $dthistory = $this->pasien->ambilhistoryregistrasi($dtpasien->no_rm, "IGD");
			$dtregis = $this->pasien->ambildataregisugd();
			$notransaksi=$dtregis->notransaksi;
			$data["txtTanggal"] = date('Y-m-d');
			$data["txtno_rm"] = $dtnorm;
			$data["no_askes"] = $no_askes;
			$data["notransaksi"] = $notransaksi;
			$data["formpilih"] = 0;
			$this->load->view('layanan/pelayanan/bpjs/form/formspri', $data);
		} else {
			redirect('login');
		}
	}
}


