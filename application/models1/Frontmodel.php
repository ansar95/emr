<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontmodel extends CI_Model {

    function count_all_pasien() {
        $this->db->select("register.no_rm as no_rm");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->where("register_detail.status", "0");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_details_pasien($limit, $start) {
        $output = '';
        $bag = array('INAP','IGD');
        $this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.golongan as golongan, register_detail.kode_kamar as kode_kamar, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk as tgl_masuk, register_detail.tgl_masuk_kamar as tgl_masuk_kamar");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        $this->db->where("register_detail.status", "0");
        $this->db->where_in("register.bagian", $bag);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="6%">No. RM</th>
			<th >Nama Lengkap</th>
			<th>Alamat</th>
			<th width="7%">Golongan</th>
			<th width="7%">Kamar</th>
			<th >Unit</th>
			<th width="10%">Masuk RS</th>
			<th width="10%">Masuk Kamar</th>
		</tr>
		';
        foreach($query->result() as $row) {
            $output .= '
		<tr>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->golongan.'</td>
			<td>'.$row->kode_kamar.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.tanggaltiga($row->tgl_masuk).'</td>
			<td>'.tanggaltiga($row->tgl_masuk_kamar).'</td>			
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    function cari_count_all_pasien() {
        $nm = $this->input->get("nama");
        $al = $this->input->get("alamat");
        $this->db->select("register.no_rm as no_rm");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        if (($nm != "") || ($nm != null)) {
            $this->db->like("pasien.nama_pasien", $nm, "both");
        }
        if (($al != "") || ($al != null)) {
            $this->db->like("pasien.alamat", $al, "both");
        }
        $this->db->where("register_detail.status", "0");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cari_fetch_details_pasien($limit, $start) {
        $output = '';
        $nm = $this->input->get("nama");
        $al = $this->input->get("alamat");
        $this->db->select("register.no_rm as no_rm, pasien.nama_pasien as nama_pasien, pasien.alamat as alamat, register.golongan as golongan, register_detail.kode_kamar as kode_kamar, register_detail.nama_unit as nama_unit, register_detail.tgl_masuk as tgl_masuk, register_detail.tgl_masuk_kamar as tgl_masuk_kamar");
        $this->db->from("register");
        $this->db->join("pasien", "pasien.no_rm = register.no_rm");
        $this->db->join("register_detail", "register_detail.notransaksi = register.notransaksi");
        if (($nm != "") || ($nm != null)) {
            $this->db->like("pasien.nama_pasien", $nm, "both");
        }
        if (($al != "") || ($al != null)) {
            $this->db->like("pasien.alamat", $al, "both");
        }
        $this->db->where("register_detail.status", "0");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No. RM</th>
			<th>Nama Lengkap</th>
			<th width="20%">Alamat</th>
			<th width="10%">Golongan</th>
			<th width="10%">Kamar Perawatan</th>
			<th width="10%">Unit</th>
			<th width="10%">Tgl. Masuk</th>
			<th width="10%">Tgl. Keluar</th>
		</tr>
		';
        foreach($query->result() as $row) {
            $output .= '
		<tr>
			<td>'.$row->no_rm.'</td>
			<td>'.$row->nama_pasien.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->golongan.'</td>
			<td>'.$row->kode_kamar.'</td>
			<td>'.$row->nama_unit.'</td>
			<td>'.$row->tgl_masuk.'</td>
			<td>'.$row->tgl_masuk_kamar.'</td>			
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    function count_all_tempat() {
        $qry2=$this->db->query("SELECT count(no_rm) as xterpakai,kode_kamar from register_detail where status=0 group by kode_kamar order by kode_kamar ");
        foreach ($qry2->result_array() as $brs9) {
            $terpakai=$brs9['xterpakai'];
            $kode_kamar=$brs9['kode_kamar'];
            $qry1=$this->db->query("update mkamar set terpakai=".$terpakai."  where kode_kamar='$kode_kamar' limit 1");        
        }
        $ky = $this->input->get("key1");
        $this->db->select("id");
        $this->db->from("mkamar");
        // $this->db->where("nama_kelas",$ky);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_details_tempat($limit, $start) {
        $output = '';
        $ky = $this->input->get("key1");
        $this->db->select("kode_kamar, nama_kamar, nama_kelas, t4tidur, terpakai");
        $this->db->from("mkamar");
        // $this->db->where("nama_kelas",$ky);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="10%">Kode Kamar</th>
			<th>Kelas Perawatan</th>
			<th width="30%">Nama Kamar</th>
			<th width="10%">Jumlah TT</th>
			<th width="10%">Terpakai</th>
			<th width="10%">Sisa</th>
		</tr>
		';
        foreach($query->result() as $row) {
            $r = $row->t4tidur - $row->terpakai;
            $output .= '
		<tr>
			<td>'.$row->kode_kamar.'</td>
			<td>'.$row->nama_kelas.'</td>
			<td>'.$row->nama_kamar.'</td>
			<td>'.$row->t4tidur.'</td>
			<td>'.$row->terpakai.'</td>
			<td>'.$r.'</td>			
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    function refreshkamar() {
        /* Hitung ketersediaan t4 tidur */
        $qry2=$this->db->query("SELECT count(no_rm) as xterpakai,kode_kamar from register_detail where status=0 group by kode_kamar order by kode_kamar ");
        foreach ($qry2->result_array() as $brs9) {
            $terpakai=$brs9['xterpakai'];
            $kode_kamar=$brs9['kode_kamar'];
            $qry1=$this->db->query("update mkamar set terpakai=".$terpakai."  where kode_kamar='$kode_kamar' limit 1");        
        }
        return $qry1;
    }

}