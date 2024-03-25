<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapinstalasi extends CI_Model {

	public function ambilunittindakan() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('ptindakan_instalasi.nama_unit as unit, ptindakan_instalasi.kode_unit as kode_unit');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		// $this->db->where('ptindakan_instalasi.kode_unit', ''.$dUnitPilih.'');
		$this->db->where('register_instalasi.kode_unit', $dUnitPilih);

		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', ''.$dGolPilih.'');
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', ''.$dRujukPilih.'');
		}
		$this->db->group_by('ptindakan_instalasi.nama_unit, ptindakan_instalasi.kode_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambiltindakan($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('register_instalasi.notransaksi_IN as notransaksi_IN, register_instalasi.no_rm as no_rm, register_instalasi.tanggal as tanggal, register_instalasi.nama_pasien as pasien, register_instalasi.nama_dokter as kirim, register_instalasi.nama_dokter_periksa as periksa, register_instalasi.notransaksi as notransaksi, register.golongan as golongan ');
		$this->db->from('register_instalasi');
		$this->db->join('register', 'register_instalasi.notransaksi = register.notransaksi');
		$this->db->where('register_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->where('register_instalasi.kode_unit', $d);
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register.rujukan', $dRujukPilih);
		}
		$this->db->order_by('register_instalasi.tanggal, register_instalasi.no_rm');
		$data = $this->db->get();
		return $data->result();
	}

    public function ambiltindakan_old($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('ptindakan_instalasi.tanggal as tgl, register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as pasien, mtindakan.tindakan as tindakan, ptindakan_instalasi.qty as qty, ptindakan_instalasi.jasas as jasas, register_instalasi.nama_dokter as kirim, register_instalasi.nama_dokter_periksa as periksa, register_instalasi.kode_unit as kode_unitnya,ptindakan_instalasi.notransaksi_IN as notransaksi_IN, ptindakan_instalasi.notransaksi as notransaksi, register.golongan as golongan ');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		// $this->db->join('register', 'register.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakan_instalasi.tindakan');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->where('register_instalasi.kode_unit', $d);
		if ($dGol == "pilih") {
			$this->db->where('register.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register.rujukan', $dRujukPilih);
		}
		$this->db->where('ptindakan_instalasi.kode_unit', $d);
		$this->db->order_by('register_instalasi.tanggal, register_instalasi.no_rm');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilrekaptindakan() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('mtindakan.kode_tindakan as kode_tindakan');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakan_instalasi.tindakan');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->group_by('mtindakan.kode_tindakan, ptindakan_instalasi.qty');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilrekaptindakansum($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakan_instalasi.qty as qty');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakan_instalasi.tindakan');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->order_by('register_instalasi.golongan, mtindakan.tindakan, ptindakan_instalasi.qty');
		$this->db->where('mtindakan.kode_tindakan', $d);
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilrekapkunjungan() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('register_instalasi.golongan as golongan');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->group_by('register_instalasi.golongan');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilrekapkunjungansum($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('sum(ptindakan_instalasi.qty) as qty');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->where('register_instalasi.golongan', $d);
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilpemeriksa() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('register_instalasi.nama_dokter_periksa as dokter, register_instalasi.kode_dokter_periksa as kode');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->group_by('register_instalasi.nama_dokter_periksa, register_instalasi.kode_dokter_periksa');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilpemeriksafull($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('ptindakan_instalasi.tanggal as tgl, register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as pasien, register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakan_instalasi.qty as qty, ptindakan_instalasi.jasas as jasas, register_instalasi.nama_dokter as kirim, ptindakan_instalasi.nama_unit as unit');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->join('mtindakan', 'ptindakan_instalasi.tindakan = mtindakan.kode_tindakan');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->where('register_instalasi.kode_dokter_periksa', $d);
		// $this->db->order_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilpengirim() {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('register_instalasi.nama_dokter as dokter, register_instalasi.kode_dokter as kode');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->group_by('register_instalasi.nama_dokter, register_instalasi.kode_dokter');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambilpengirimfull($d) {
		$start_date = $this->input->post('tglmulai');
		$end_date = $this->input->post('tglakhir');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dRujuk = $this->input->post('rujuk');
		$dRujukPilih = $this->input->post('rujukpilih');

		$this->db->select('ptindakan_instalasi.tanggal as tgl, register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as pasien, register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakan_instalasi.qty as qty, ptindakan_instalasi.jasas as jasas, register_instalasi.nama_dokter_periksa as periksa, ptindakan_instalasi.nama_unit as unit');
		$this->db->from('ptindakan_instalasi');
		$this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
		$this->db->join('mtindakan', 'ptindakan_instalasi.tindakan = mtindakan.kode_tindakan');
		$this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		if ($dUnit == "pilih") {
			$this->db->where('ptindakan_instalasi.kode_unit', $dUnitPilih);
		}
		if ($dGol == "pilih") {
			$this->db->where('register_instalasi.golongan', $dGolPilih);
		}
		if ($dRujuk == "pilih") {
			$this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
		}
		$this->db->where('register_instalasi.kode_dokter', $d);
		// $this->db->order_by('register_detail.nama_unit');
		$data = $this->db->get();
		return $data->result();
	}

    public function ambilunittindakanopr() {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('ptindakanopr.nama_unit as unit, ptindakanopr.kode_unit as kode_unit');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $this->db->where('ptindakanopr.kode_unit', ''.$dUnitPilih.'');
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', ''.$dGolPilih.'');
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', ''.$dRujukPilih.'');
        }
        $this->db->group_by('ptindakanopr.nama_unit, ptindakanopr.kode_unit');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambiltindakanopr($d) {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('ptindakanopr.tanggal as tgl, ptindakanopr.no_rm as no_rm, ptindakanopr.nama_pasien as pasien, ptindakanopr.golongan as golongan, ptindakanopr.tindakan as tindakan, ptindakanopr.qty as qty, ptindakanopr.jasas as jasas, register_instalasi.nama_dokter as kirim, register_instalasi.nama_dokter_periksa as periksa');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakan_instalasi.tindakan');
        $this->db->where('ptindakan_instalasi.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->where('ptindakanopr.kode_unit', $d);
        // $this->db->order_by('register_detail.nama_unit');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilrekaptindakanopr() {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('mtindakan.kode_tindakan as kode_tindakan');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakanopr.tindakan');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->group_by('mtindakan.kode_tindakan, ptindakanopr.qty');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilrekaptindakansumopr($d) {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakan_instalasi.qty as qty');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
        $this->db->join('mtindakan', 'mtindakan.kode_tindakan = ptindakanopr.tindakan');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->order_by('register_instalasi.golongan, mtindakan.tindakan, ptindakanopr.qty');
        $this->db->where('mtindakan.kode_tindakan', $d);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilrekapkunjunganopr() {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('register_instalasi.golongan as golongan');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->group_by('register_instalasi.golongan');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilrekapkunjungansumopr($d) {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('sum(ptindakanopr.qty) as qty');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->where('register_instalasi.golongan', $d);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilpemeriksaopr() {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('register_instalasi.nama_dokter_periksa as dokter, register_instalasi.kode_dokter_periksa as kode');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->group_by('register_instalasi.nama_dokter_periksa, register_instalasi.kode_dokter_periksa');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilpemeriksafullopr($d) {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('ptindakanopr.tanggal as tgl, register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as pasien, register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakanopr.qty as qty, ptindakanopr.jasas as jasas, register_instalasi.nama_dokter as kirim, ptindakanopr.nama_unit as unit');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
        $this->db->join('mtindakan', 'ptindakanopr.tindakan = mtindakan.kode_tindakan');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->where('register_instalasi.kode_dokter_periksa', $d);
        // $this->db->order_by('register_detail.nama_unit');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilpengirimopr() {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('register_instalasi.nama_dokter as dokter, register_instalasi.kode_dokter as kode');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakanopr.notransaksi');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->group_by('register_instalasi.nama_dokter, register_instalasi.kode_dokter');
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilpengirimfullopr($d) {
        $start_date = $this->input->post('tglmulai');
        $end_date = $this->input->post('tglakhir');
        $dUnit = $this->input->post('unit');
        $dUnitPilih = $this->input->post('unitpilih');
        $dGol = $this->input->post('golongan');
        $dGolPilih = $this->input->post('golpilih');
        $dRujuk = $this->input->post('rujuk');
        $dRujukPilih = $this->input->post('rujukpilih');

        $this->db->select('ptindakanopr.tanggal as tgl, register_instalasi.no_rm as no_rm, register_instalasi.nama_pasien as pasien, register_instalasi.golongan as golongan, mtindakan.tindakan as tindakan, ptindakanopr.qty as qty, ptindakanopr.jasas as jasas, register_instalasi.nama_dokter_periksa as periksa, ptindakanopr.nama_unit as unit');
        $this->db->from('ptindakanopr');
        $this->db->join('register_instalasi', 'register_instalasi.notransaksi = ptindakan_instalasi.notransaksi');
        $this->db->join('mtindakan', 'ptindakanopr.tindakan = mtindakan.kode_tindakan');
        $this->db->where('ptindakanopr.tanggal BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        if ($dUnit == "pilih") {
            $this->db->where('ptindakanopr.kode_unit', $dUnitPilih);
        }
        if ($dGol == "pilih") {
            $this->db->where('register_instalasi.golongan', $dGolPilih);
        }
        if ($dRujuk == "pilih") {
            $this->db->where('register_instalasi.nama_unitR', $dRujukPilih);
        }
        $this->db->where('register_instalasi.kode_dokter', $d);
        // $this->db->order_by('register_detail.nama_unit');
        $data = $this->db->get();
        return $data->result();
    }
}
