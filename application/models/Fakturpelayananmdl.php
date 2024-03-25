<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakturpelayananmdl extends CI_Model {

	function unitbydate() {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$bhp = $this->input->get("bhp");
        $this->db->from("ampra");
        $this->db->where("tgl_order", $tgl);
        $this->db->where("bhp", $bhp);
        $data = $this->db->get();
        return $data->result();
	}

    function detailampraunit() {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$idampra = $this->input->get("idampra");
		$this->db->from("ampra_detail");
		$this->db->where("kode_unit", $this->input->get("kode"));
		$this->db->where("tglorder", $tgl);
		$this->db->where("idampra", $idampra);
		$this->db->where("hapus", 0);
        $data = $this->db->get();
        return $data->result();
    }
    
    function detailampraunit_hapus($idampra) {
		$date = date_create($this->input->get("tgl"));
		$tgl = date_format($date,"Y-m-d");
		$idampra = date_create($this->input->get("idampra"));
		$this->db->from("ampra_detail");
		$this->db->where("kode_unit", $this->input->get("kode"));
		$this->db->where("tglorder", $tgl);
		$this->db->where("idampra", $idampra);
		$this->db->where("hapus", 0);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilfakturdetail($idObat) {
        $this->db->select("pfakturdetail.namabarang, pfakturdetail.id, pfakturdetail.kodebarang, pfakturdetail.batch, pfakturdetail.expire, pfakturdetail.qty, pfakturdetail.isisatuan, pfakturdetail.satuan, pfakturdetail.keluar, pfakturheader.pendanaan ");
        $this->db->from("pfakturdetail");
        $this->db->join("pfakturheader", "pfakturdetail.noterima = pfakturheader.noterima");
        $this->db->where("kodebarang", $idObat);
        $data = $this->db->get();
        return $data->result();
    }

	function detailampraunitrow() {
		$this->db->from("ampra_detail");
        $this->db->where("id", $this->input->get("id"));
        $data = $this->db->get();
        return $data->row();
	}

	function ambilfakturdetailharga() {
        list($kd, $id) = explode("_", $this->input->get("id"), 2);
        $this->db->select("pfakturdetail.expire, pfakturdetail.batch, pfakturdetail.harga, pfakturdetail.noterima, pfakturdetail.satuan, pfakturheader.pendanaan");
        $this->db->from("pfakturdetail");
        $this->db->join("pfakturheader", "pfakturdetail.noterima = pfakturheader.noterima");
        $this->db->where("pfakturdetail.id", $id);
        $data = $this->db->get();
        return $data->row();
	}
	
	function simpanupdateampra() {
		$kodeid = $this->input->get("kodedrop");
        $date1 = date_create($this->input->get("tgld"));
        $tgldrop = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("exp"));
        $tglexp = date_format($date2,"Y-m-d");
        list($kd, $id) = explode("_", $this->input->get("barang"), 2);

        $this->db->from("pfakturdetail");
        $this->db->select('pfakturheader.nofak');
        $this->db->join("pfakturheader", "pfakturdetail.noterima = pfakturheader.noterima");
        $this->db->where("pfakturdetail.id", $id);
        $this->db->limit(1);
        $datafak = $this->db->get();
        $f = $datafak->row();
        $fak = $f->nofak;

        $detailampra = array(
            'tgldrop' => $tgldrop,
            'namaobatdrop' => $this->input->get('barangtext'),
            'user1' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'qtydrop' => $this->input->get('qtyd'),
            'batch' => $this->input->get('batch'),
			'expire' => $tglexp,
			'harga' => $this->input->get('harga'),
			'nofak' => $fak,
			'noterima' => $this->input->get('sj'),
			'penggunaan' => $this->input->get('pendanaan'),
            'idfakturdetail' => $id
        );

        $this->db->where("id", $kodeid);
		$dt = $this->db->update("ampra_detail", $detailampra);

		$statusampra = array(
            'status_ampra' => 1
        );
        $this->db->where("id", $id);
		$this->db->update("pfakturdetail", $statusampra);

		return array("sukses" => $dt);
	}
	
    public function cekidamprahapusdetail() {
		$id = $this->input->get("id");
        $this->db->from("ampra_detail");
        $this->db->select('idampra');
        $this->db->where("id", $this->input->get("id"));
        $data = $this->db->get();
        return $data->row();
	}
	public function hapusdetaildropping() {
		$id = $this->input->get("id");
        $this->db->where('id', $id);
		$dt = $this->db->delete('ampra_detail');
		return $dt;
	}
	
    public function hapusdetaildropping_old() {
		$id = $this->input->get("id");
		$hapus = array(
            'hapus' => 1
        );
        $this->db->where("id", $id);
		$dt = $this->db->update("ampra_detail", $hapus);
		return $dt;
	}


	function simpantambahampra() {
		$kodeid = $this->input->get("kodedrop");
		$date = date_create($this->input->get("tgla"));
        $tgl = date_format($date,"Y-m-d");
        $date1 = date_create($this->input->get("tgld"));
        $tgldrop = date_format($date1,"Y-m-d");
        $date2 = date_create($this->input->get("exp"));
        $tglexp = date_format($date2,"Y-m-d");
        list($kd, $id) = explode("_", $this->input->get("barang"), 2);

        $this->db->from("pfakturdetail");
        $this->db->select('pfakturheader.nofak');
        $this->db->join("pfakturheader", "pfakturdetail.noterima = pfakturheader.noterima");
        $this->db->where("pfakturdetail.id", $id);
        $this->db->limit(1);
        $datafak = $this->db->get();
        $f = $datafak->row();
        $fak = $f->nofak;

        $detailampra = array(
			'kode_unit' => $this->input->get('kode'),
			'nama_unit' => $this->input->get('unit'),
			'kodeobat' => $this->input->get('obat'),
            'namaobat' => $this->input->get('obattext'),
            'satuan' => $this->input->get('satuan'),
			'tglorder' => $tgl,
			'qtyampra' =>  $this->input->get('qty'),
			'penggunaan' =>  $this->input->get('guna'),
            'tgldrop' => $tgldrop,
            'namaobatdrop' => $this->input->get('barangtext'),
            'user1' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'qtydrop' => $this->input->get('qtyd'),
            'batch' => $this->input->get('batch'),
			'expire' => $tglexp,
			'harga' => $this->input->get('harga'),
			'nofak' => $fak,
			'noterima' => $this->input->get('sj'),
			'idampra' => $this->input->get('id'),
            'idfakturdetail' => $id
        );

		$this->db->where("id", $kodeid);
		$dt = $this->db->insert("ampra_detail", $detailampra);

		$statusampra = array(
            'status_ampra' => 1
        );
        $this->db->where("id", $id);
		$this->db->update("pfakturdetail", $statusampra);

		return array("sukses" => $dt);
	}

}