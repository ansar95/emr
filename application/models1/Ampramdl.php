<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ampramdl extends CI_Model {

    public function ambiltanggalorder($bhp) {
        // $bhp=$this->input->get("bhp");
        $date = str_replace(' ', '-', $this->input->get("period"));
        $d = date_create($date);
        $t = date_format($d,"Y-m");
        list($tahun, $bulan) = explode("-", $t, 2);

        $this->db->select("tgl_order");
        $this->db->from("ampra");
        $this->db->where("kode_unit", $this->input->get("unit"));
        $this->db->where("YEAR(tgl_order)", $tahun);
        $this->db->where("MONTH(tgl_order)", $bulan);
        $this->db->where("bhp", $bhp);
        $this->db->order_by("tgl_order", "asc");
        $data = $this->db->get();
        return $data->result();
    }

    
    public function ambildetailamprabhp($tglorder) {
        $unit=$this->input->get("unit");
        $bhp=$this->input->get("bhp");
        $this->db->from("ampra_detail");
        // $this->db->select('ampra_detail.tglorder, ampra_detail.namaobat, ampra_detail.qtyampra, ampra_detail.qtydrop');
        $this->db->select('ampra_detail.*');
        $this->db->join("ampra", "ampra_detail.idampra= ampra.id");
        $this->db->where("ampra_detail.tglorder", $tglorder);
        $this->db->where("ampra_detail.kode_unit", $unit);
        $this->db->where("ampra.bhp", $bhp);
        $data = $this->db->get();
        return $data->result();
    }

    public function ambildetaileditamprabhp() {
        $this->db->from("ampra_detail");
        $this->db->where("id", $this->input->get("id"));
        $this->db->where("qtydrop", 0);
        $data = $this->db->get();
        return $data->row();
    }

    public function ambilfakturdetail() {
        $this->db->select("namabarang, id, kodebarang");
        $this->db->from("pfakturdetail");
        $data = $this->db->get();
        return $data->result();
    }

    public function ambilfakturdetailharga() {
        list($kd, $id) = explode("_", $this->input->get("id"), 2);
        $this->db->select("expire, batch, harga");
        $this->db->from("pfakturdetail");
        $this->db->where("id", $id);
        $data = $this->db->get();
        return $data->row();
    }

    public function simpanamprabhp() {
        $date = date_create($this->input->get("tgl"));
        $tglorder = date_format($date,"Y-m-d");
        // $date1 = date_create($this->input->get("tgld"));
        // $tgldrop = date_format($date1,"Y-m-d");
        // $date2 = date_create($this->input->get("exp"));
        // $tglexp = date_format($date2,"Y-m-d");
        list($kd, $id) = explode("_", $this->input->get("barang"), 2);

        // $this->db->from("pfakturdetail");
        // $this->db->select('pfakturheader.nofak');
        // $this->db->join("pfakturheader", "pfakturdetail.noterima = pfakturheader.noterima");
        // $this->db->where("pfakturdetail.id", $id);
        // $this->db->limit(1);
        // $datafak = $this->db->get();
        // $f = $datafak->row();
        // $fak = $f->nofak;
        $kode_unit= $this->input->get('unit');
        $kodebhp= $this->input->get('kodebhp');

        $this->db->from("ampra");
        $this->db->select('id');
        $this->db->where("tgl_order", $tglorder);
        $this->db->where("kode_unit", $kode_unit);
        $this->db->where("bhp", $kodebhp);
        $this->db->limit(1);
        $data = $this->db->get();

        if ($data->result() == NULL) {
            $headeampra = array(
                'kode_unit' => $this->input->get('unit'),
                'nama_unit' => $this->input->get('unittext'),
                'user1' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'tgl_order' => $tglorder,
                'bhp' => $this->input->get('kodebhp')
            );
            $this->db->insert("ampra", $headeampra);
            $insert_id = $this->db->insert_id();

            $detailampra = array(
                'kode_unit' => $this->input->get('unit'),
                'nama_unit' => $this->input->get('unittext'),
                'satuan' => $this->input->get('satuan'),
                'kodeobat' => $kd,
                'namaobat' => $this->input->get('barangtext'),
                'harga' => "0",
                'user1' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'qtyampra' => $this->input->get('qtya'),
                'tglorder' => $tglorder,
                'penggunaan' => $this->input->get('guna'),
                // 'qtydrop' => $this->input->get('qtyd'),
                // 'tgldrop' => $tgldrop,
                // 'batch' => $this->input->get('batch'),
                // 'expire' => $tglexp,
                // 'nofak' => $fak,
                'idampra' => $insert_id
            );
            $dt = $this->db->insert("ampra_detail", $detailampra);

            return array("sukses" => $dt);
        } else {
            $hasil = $data->row();
            $id = $hasil->id;
            $detailampra = array(
                'kode_unit' => $this->input->get('unit'),
                'nama_unit' => $this->input->get('unittext'),
                'satuan' => $this->input->get('satuan'),
                'kodeobat' => $kd,
                'namaobat' => $this->input->get('barangtext'),
                'harga' => "0",
                'user1' => $this->session->userdata("nmuser"),
                'user2' => $this->session->userdata("nmuser"),
                'lastlogin' => date("Y-m-d H:i:s"),
                'qtyampra' => $this->input->get('qtya'),
                'tglorder' => $tglorder,
                'penggunaan' => $this->input->get('guna'),
                // 'qtydrop' => $this->input->get('qtyd'),
                // 'tgldrop' => $tgldrop,
                // 'batch' => $this->input->get('batch'),
                // 'expire' => $tglexp,
                // 'nofak' => $fak,
                'idampra' => $id
            );
            $dt = $this->db->insert("ampra_detail", $detailampra);

            return array("sukses" => $dt);
        }

    }

    public function ubahamprabhp() {
        $date = date_create($this->input->get("tgl"));
        $tglorder = date_format($date,"Y-m-d");
        list($kd, $idbarang) = explode("_", $this->input->get("barang"), 2);

        $detailampra = array(
            'kodeobat' => $kd,
            'namaobat' => $this->input->get('barangtext'),
            'satuan' => $this->input->get('satuan'),
            'user1' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'qtyampra' => $this->input->get('qtya'),
            'tglorder' => $tglorder,
            'penggunaan' => $this->input->get('guna'),
        );

        $this->db->where("id", $this->input->get('id'));
        $dt = $this->db->update("ampra_detail", $detailampra);

        return array("sukses" => $dt);
    }

    public function hapusdetailamprabhp() {
        $detail = $this->ambildetaileditamprabhp();
        if ($detail == null) {
            return false;
        } else {
            $id = $this->input->get("id");
            $this->db->where('id', $id);
            $dt = $this->db->delete('ampra_detail');
            return $dt;
        }
    }

}
