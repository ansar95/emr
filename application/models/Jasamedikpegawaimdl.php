<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikpegawaimdl extends CI_Model {
    public function get($strwhre = null)
    {
        $whr = array();
        if ($this->input->post('kode_unit'))
            $whr[] = "pgw.kode_unit= '".$this->input->post('kode_unit')."'";
        if ($this->input->post('posisi'))
            $whr[] = "pgw.idposisi= '".$this->input->post('posisi')."'";

        $strwhr = ($whr) ? "WHERE " . implode(' AND ', $whr) : "";
        
        $query = $this->db->query("SELECT pgw.id,pgw.nip,pgw.tmt,pgw.nama,pgw.sex,unt.nama_unit,ktg.kategori as posisi,gol.deskripsi as gol,pgk.deskripsi as pangkat,jab.deskripsi as jabatan,
            pgw.no_rekening,pgw.nama_pemilik_rekening,pdk.pendidikan,pgw.aktip
        FROM (SELECT * FROM jasa_mpegawai $strwhre) pgw
        LEFT JOIN munit unt ON unt.kode_unit=pgw.kode_unit
        LEFT JOIN mkategori ktg ON ktg.id=pgw.idposisi
        LEFT JOIN (SELECT * FROM jasa_mreferensi WHERE aplikasi='1') gol ON gol.id=pgw.idgolongan
        LEFT JOIN (SELECT * FROM jasa_mreferensi WHERE aplikasi='2') pgk ON pgk.id=pgw.idpangkat
        LEFT JOIN (SELECT * FROM jasa_mreferensi WHERE aplikasi='3') jab ON jab.id=pgw.idjabatan
        LEFT JOIN mpendidikan pdk ON pdk.idpendidikan=pgw.idpendidikan
        $strwhr GROUP BY pgw.id");
        
        return $query->result_array();
    }

    public function store()
    {
        $data = array();
        $data['nip'] = $this->input->post('nip');
        $data['nama'] = $this->input->post('nama_pegawai');
        $data['tmt'] = $this->input->post('tmt');
        $data['idpangkat'] = $this->input->post('pangkat');
        $data['idgolongan'] = $this->input->post('gol');
        $data['kode_unit'] = $this->input->post('kode_unit');
        $data['idjabatan'] = $this->input->post('jabatan');
        $data['sex'] = $this->input->post('sex');
        $data['no_rekening'] = $this->input->post('no_rekening');
        $data['nama_pemilik_rekening'] = $this->input->post('nama_pemilik');
        $data['idpendidikan'] = $this->input->post('pendidikan');
        $data['idposisi'] = $this->input->post('posisi');
        $data['aktip'] = ($this->input->post('aktif')) ? $this->input->post('aktif') : false;

        $result = $this->db->insert("jasa_mpegawai", $data);
		return $result;
    }

    public function edit()
    {
        $id = $this->input->post("id");
		$this->db->from("jasa_mpegawai");
        $this->db->select('id,nip,nama,tmt,idpangkat,idgolongan,kode_unit,idjabatan,sex,idpendidikan,idposisi,aktip,no_rekening,nama_pemilik_rekening');
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
        return $data->row();
    }

    public function update()
    {
        $id = $this->input->post("id");

        $data = array();
        $data['nip'] = $this->input->post('nip');
        $data['nama'] = $this->input->post('nama');
        $data['tmt'] = $this->input->post('tmt');
        $data['idpangkat'] = $this->input->post('pangkat');
        $data['idgolongan'] = $this->input->post('gol');
        $data['kode_unit'] = $this->input->post('kode_unit');
        $data['idjabatan'] = $this->input->post('jabatan');
        $data['sex'] = $this->input->post('sex');
        $data['no_rekening'] = $this->input->post('no_rekening');
        $data['nama_pemilik_rekening'] = $this->input->post('nama_pemilik');
        $data['idpendidikan'] = $this->input->post('pendidikan');
        $data['idposisi'] = $this->input->post('posisi');
        $data['aktip'] = ($this->input->post('aktif')) ? $this->input->post('aktif') : false;

        $this->db->from('jasa_mpegawai');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->update("jasa_mpegawai", $data);
		return $result;
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_mpegawai');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }

}