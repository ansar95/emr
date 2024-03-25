<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitbmdl extends CI_Model {

    public function pasientb() {
        $pelayanan = $this->input->get("pelayanan");
		$date1 = date_create($this->input->get("tglmulai"));
		$tglmulai = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("tglselese"));
		$tglselesai = date_format($date2,"Y-m-d");
        $sl="SELECT pdiagnosa.notransaksi as notransaksi, pdiagnosa.tgl_masuk as tgl_masuk, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, pdiagnosa.type as type, pdiagnosa.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat as alamat, register_detail.nama_unit as keluarpada, pdiagnosa.diagnosa as diagnosa, pdiagnosa.nodaftar as icd, register.golongan as golongan, register.tgl_keluar as tgl_keluar, pasien.nositb as nositb FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai' ORDER BY pdiagnosa.tgl_masuk ASC";
        $data = $this->db->query($sl);
        // $qryrow = $data->row(); 
        return $data->result();
    }

    public function pasientb_rm() {
        $pelayanan = $this->input->get("pelayanan");
        $norm = $this->input->get("rm");
		$date1 = date_create($this->input->get("tglmulai"));
		$tglmulai = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("tglselese"));
		$tglselesai = date_format($date2,"Y-m-d");
        $sl="SELECT pdiagnosa.notransaksi as notransaksi, pdiagnosa.tgl_masuk as tgl_masuk, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, pdiagnosa.type as type, pdiagnosa.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat as alamat, register_detail.nama_unit as keluarpada, pdiagnosa.diagnosa as diagnosa, pdiagnosa.nodaftar as icd, register.golongan as golongan, register.tgl_keluar as tgl_keluar, pasien.nositb as nositb FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai' and pdiagnosa.no_rm='$norm' ORDER BY pdiagnosa.tgl_masuk ASC";
        $data = $this->db->query($sl);
        // $qryrow = $data->row(); 
        return $data->result();
    }

    public function hasilposting() {
        $pelayanan = $this->input->get("pelayanan");
		$date1 = date_create($this->input->get("tglmulai"));
		$tglmulai = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("tglselese"));
		$tglselesai = date_format($date2,"Y-m-d");
        $sl="SELECT pdiagnosa.flag, pdiagnosa.notransaksi as notransaksi, pdiagnosa.id as id, pdiagnosa.tgl_masuk as tgl_masuk, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, pdiagnosa.type as type, pdiagnosa.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat as alamat, register_detail.nama_unit as keluarpada, pdiagnosa.diagnosa as diagnosa, pdiagnosa.nodaftar as icd, register.golongan as golongan, register.tgl_keluar as tgl_keluar, pasien.nositb as nositb FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai' ORDER BY pdiagnosa.tgl_masuk ASC";
        $data = $this->db->query($sl);
        // $qryrow = $data->row(); 
        return $data->result();
    }

    public function hasilposting_rekap() {
        $pelayanan = $this->input->get("pelayanan");
		$date1 = date_create($this->input->get("tglmulai"));
		$tglmulai = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("tglselese"));
		$tglselesai = date_format($date2,"Y-m-d");
        $sl="SELECT count(pdiagnosa.notransaksi) as jumlah, register_detail.nama_unit as nama_unit FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai'  GROUP BY register_detail.kode_unit ORDER BY register_detail.kode_unit ";
        $data = $this->db->query($sl);
        // $qryrow = $data->row(); 
        return $data->result();
    }

    public function ambilunit() {
        $pelayanan = $this->input->get("pelayanan");
		$date1 = date_create($this->input->get("tglmulai"));
		$tglmulai = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("tglselese"));
		$tglselesai = date_format($date2,"Y-m-d");
        $sl="SELECT register_detail.kode_unit as kode_unit WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai'  GROUP BY register_detail.kode_unit ORDER BY register_detail.kode_unit ";
        $data = $this->db->query($sl);
        // $qryrow = $data->row(); 
        return $data->result();
    }

    public function isiflag() {
        $id = $this->input->get("idpdiag");
        $sl="UPDATE pdiagnosa set flag=1 where id='$id' limit 1";
        $this->db->query($sl);
    }

    public function datalaporan() {
        $tglmulai = $this->input->post('tglmulai');
		$tglselesai = $this->input->post('tglselese');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

        $p1="Select register_detail.kode_unit as unit, register_detail.nama_unit as nama_unit ";
        $p2="FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai' ";
		if ($dUnit == "pilih") {
			$filterunit=" and register_detail.kode_unit = '$dUnitPilih' ";
		} else {
			$filterunit=" ";
        }
		if ($dGol == "pilih") {
			$filterunit=" and register.golongan = '$dGolPilih' ";
		} else {
            $filtergolongan=" ";
        }
		if ($dKunjung == "0") {
			$filterkunjung=" and register.barulama = '$dKunjung' ";
		} else if ($dKunjung == "1") {
			$filterkunjung=" and register.barulama = '$dKunjung' ";
		} else {
            $filterkunjung=" ";
        }
        $grup="GROUP BY register_detail.kode_unit ORDER BY register_detail.kode_unit ";
        $sl=$p1.$p2.$filterunit.$filterunit.$filterkunjung.$grup;

        $data = $this->db->query($sl);
        return $data->result();
    }

    public function ambildatalaporan($d) {
		$tglmulai = $this->input->post('tglmulai');
		$tglselesai = $this->input->post('tglselese');
		$dUnit = $this->input->post('unit');
		$dUnitPilih = $this->input->post('unitpilih');
		$dGol = $this->input->post('golongan');
		$dGolPilih = $this->input->post('golpilih');
		$dKunjung = $this->input->post('kunjungan');

		$p1="SELECT pdiagnosa.flag, pdiagnosa.notransaksi as notransaksi, pdiagnosa.id as id, pdiagnosa.tgl_masuk as tgl_masuk, register_detail.tgl_keluar_kamar as tgl_keluar_kamar, pdiagnosa.type as type, pdiagnosa.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.sex as sex, pasien.alamat as alamat, register_detail.nama_unit as keluarpada, pdiagnosa.diagnosa as diagnosa, pdiagnosa.nodaftar as icd, register.golongan as golongan, register.tgl_keluar as tgl_keluar, register.tgl_masuk as tgl_masuk, pasien.nositb as nositb, register.barulama as barulama, pasien.tgl_daftar as tgl_daftar ";
        $p2="FROM pdiagnosa,pasien,register_detail,register WHERE pdiagnosa.no_rm=pasien.no_rm and pdiagnosa.notransaksi=register_detail.notransaksi and pdiagnosa.notransaksi=register.notransaksi and type=1 and (pdiagnosa.nodaftar LIKE '%A15%' or pdiagnosa.nodaftar LIKE '%A16%' or pdiagnosa.nodaftar LIKE '%A17%' or pdiagnosa.nodaftar LIKE '%A18%' or pdiagnosa.nodaftar LIKE '%A19%' or pdiagnosa.nodaftar LIKE '%B90%') and register_detail.kamarkeluar=1 and pdiagnosa.tgl_masuk >='$tglmulai' and pdiagnosa.tgl_masuk <='$tglselesai' ";

		$filterunit=" and register_detail.kode_unit = '$d' ";

		if ($dGol == "pilih") {
			$filterunit=" and register.golongan = '$dGolPilih' ";
		} else {
            $filtergolongan=" ";
        }
		if ($dKunjung == "0") {
			$filterkunjung=" and register.barulama = '$dKunjung' ";
		} else if ($dKunjung == "1") {
			$filterkunjung=" and register.barulama = '$dKunjung' ";
		} else {
            $filterkunjung=" ";
        }
        $grup="ORDER BY register_detail.kode_unit ";
        $sl=$p1.$p2.$filterunit.$filterunit.$filterkunjung.$grup;
        $data = $this->db->query($sl);
		return $data->result();
	}
}



