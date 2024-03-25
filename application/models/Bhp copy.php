<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bhp extends CI_Model {
	
	public function full() {
		$this->db->from("mobat");
		$data = $this->db->get();
		return $data->result();
    }
    
    public function halffull() {
        $this->db->select("kodeobat, namaobat, id");
		$this->db->from("mobat");
		$data = $this->db->get();
		return $data->result();
	}

    public function obatdanbhporder() {
        $this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
        $this->db->order_by("bhp", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

    public function obatbhpsatuan() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargapakai");
        $this->db->from("mobat");
        $this->db->order_by("bhp", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

    public function obatbhpkartustok() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargapakai, bhp");
        $this->db->from("mobat");
        $this->db->order_by("bhp", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihbhp_old() {
		$this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
        $this->db->where("bhp", "1");
		$data = $this->db->get();
		return $data->result();
	}

    public function pilihbhp() {
		$this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
		$data = $this->db->get();
		return $data->result();
    }
    
	public function pilihbhpsatuan() {
		list($kdobat, $idobat) = explode("_", $this->input->get("bhp"), 2);
		$this->db->select("satuanpakai, hargapakai");
		$this->db->from("mobat");
		$this->db->where("kodeobat", $kdobat);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

    public function pilihobat() {
        $this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihobatbhp() {
        $this->db->select("kodeobat, namaobat, id");
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihobatbhp_all() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargastok");
        $this->db->from("mobat");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihobatsaja() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargastok");
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $data = $this->db->get();
        return $data->result();
    }

    public function pilihbhpsaja() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargastok");
        $this->db->from("mobat");
        $this->db->where("bhp", "1");
        $data = $this->db->get();
        return $data->result();
    }

    public function untukapotik() {
        list($kdobat, $idobat) = explode("_", $this->input->get("produk"), 2);
        $this->db->select("satuanpakai, hargapakai, kodeobat");
        $this->db->from("mobat");
        $this->db->where("kodeobat", $kdobat);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function obatjenis($d) {
	    $this->db->from("mobatjns");
        $this->db->where("ktg", $d);
        $data = $this->db->get();
        return $data->result();
    }

    public function obatsatuan() {
        $this->db->from("msatuan");
        $data = $this->db->get();
        return $data->result();
    }

    public function merk() {
        $this->db->from("mmerk");
        $data = $this->db->get();
        return $data->result();
    }

    public function datapbf() {
        $this->db->select("id, nama");
        $this->db->from("mpbf");
        $data = $this->db->get();
        return $data->result();
    }

    public function datapbfkode() {
        $this->db->select("kode, nama");
        $this->db->from("mpbf");
        $data = $this->db->get();
        return $data->result();
    }

    // master obat
    function count_allxx() {
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $ky = $this->input->get("key1");
        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $this->db->where("hapus", "0");
        $this->db->like("namaobat", $ky, 'both');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_details($limit, $start) {
        $output = '';
        $ky = $this->input->get("key1");
        // $this->db->select("kodeobat, namaobat, jenisobat, satuanpakai, hargapakai, qtysatuan, satuanstok, hargastok, hargadasar, harga_baru, id");

        $this->db->select("kodeobat, namaobat, jenisobat, satuanpakai, hargapakai, qtysatuan, satuanstok, hargastok, hargadasar, harga_baru, saldomin, sawal_gudang,beli_gudang,jual_gudang, retur_masuk_gudang, retur_keluar_gudang,id");

        $this->db->from("mobat");
        $this->db->where("bhp", "0");
        $this->db->where("hapus", "0");
        $this->db->order_by("namaobat", "ASC");
        $this->db->like("namaobat", $ky, 'both');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="3%">No.</th>
			<th width="5%">Kode</th>
			<th>Nama Produk</th>
			<th width="5%">Jenis</th>
			<th width="5%">Satuan Stok</th>
			<th width="5%">Isi Satuan</th>
			<th width="5%">Satuan Pakai</th>
			<th width="5%">Min.Saldo</th>
			<th width="5%">Sisa Stok</th>
			<th width="8%"><div align="right">Harga Jual</div></th>
			<th width="8%"><div align="right">Harga Dasar</div></th>
			<th width="8%"><div align="right">Harga baru</div></th>
			<th width="15%">Action</th>
		</tr>
		';
        $no = $start;
        foreach($query->result() as $row) {
            $sisa=$row->sawal_gudang+$row->beli_gudang-$row->jual_gudang+$row->retur_masuk_gudang-$row->retur_keluar_gudang;
            $saldomin=$row->saldomin;
            if ($sisa < $saldomin+($saldomin*0.25)) {
                $warna='red';
            } else {
                $warna='black';
            }
            // if ($row->hargapakai != $row->harga_baru) {
            //     $warnalatar='dark';
            // } else {
            //     $warnalatar='';
            // }
            $output .= '
		<tr>
			<td style="color: '.$warna.'">'. ++$no .'</td>
			<td style="color: '.$warna.'">'.$row->kodeobat.'</td>
			<td style="color: '.$warna.'">'.$row->namaobat.'</td>
			<td style="color: '.$warna.'">'.$row->jenisobat.'</td>
			<td style="color: '.$warna.'">'.$row->satuanstok.'</td>
			<td style="color: '.$warna.'">'.$row->qtysatuan.'</td>
			<td style="color: '.$warna.'">'.$row->satuanpakai.'</td>
			<td style="color: '.$warna.'">'.$row->saldomin.'</td>
			<td style="color: '.$warna.'">'.$sisa.'</td>
			<td style="color: '.$warna.'"><div align="right">'. formatuang($row->hargapakai).'</div></td>
			<td style="color: '.$warna.'"<div align="right">'. formatuang($row->hargadasar).'</div></td>
			<td style="color: '.$warna.'"<div align="right">'. formatuang($row->harga_baru).'</div></td>
			<td class="text-center">
				<a onclick="rubahharga('.$row->id.')" class="btn-sm btn-primary btn-flat">Rubah Harga</a>
				<a onclick="panggiledit('.$row->id.')" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
				<a onclick="panggilhapus('.$row->id.')" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    public function simpandataobat() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kodeobat' => $contentdata["kd"],
            'namaobat' => $contentdata["nm"],
            'bhp' => "0",
            'jenisobat' => "OBAT",
            'satuanpakai' => $contentdata["satuanpakaitext"],
            'hargapakai' => $contentdata["hrgumum"],
            'qtysatuan' => $contentdata["isipakai"],
            'satuanstok' => $contentdata["satuanstoktext"],
            'hargastok' => $contentdata["hrgdasar"],
            'hargadasar' => $contentdata["hrgdasar"],
            'tgl_hargadasar' => date("Y-m-d"),
            'kemasan' => $contentdata["kemasan"],
            'klasifikasi' => $contentdata["klatext"],
            'golongan' => $contentdata["goltext"],
            'komposisi' => $contentdata["komposisi"],
            'vendor' => $contentdata["pbftext"],
            'generik' => $contentdata["gentext"],
            'merk' => $contentdata["merktext"],
            'idgolongan' => $contentdata["gol"],
            'idklasifikasi' => $contentdata["kla"],
            'idgenerik' => $contentdata["gen"],
            'idvendor' => $contentdata["pbf"],
            'user1' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'sawal' => "0",
            'opname' => "0",
            'beli' => "0",
            'jual' => "0",
            'return_m' => "0",
            'return_k' => "0",
            'tglopname' => "0000-00-00",
            'saldomin' => $contentdata["saldo"],
            'periode' => "201601",
            'tupper' => "0000-00-00",
            'idgrupobat' => "0",
            'kodegrupobat' => "",
            'namagrupobat' => "",
            'gudang' => "0",
            'rinap' => "0",
            'rjalan' => "0",
            'umum' => "0",
            'ird' => "0",
            'ibs' => "0",
            'sawaljkd' => "0",
            'belijkd' => "0",
            'jualjkd' => "0",
            'return_mjkd' => "0",
            'return_kjkd' => "0",
            'opnamejkd' => "0",
            'distribusi' => "",
            'apbd' => "",
            'blud' => "",
            'harga' => "0",
            'sawallain' => "0",
            'belilain' => "0",
            'juallain' => "0",
            'return_mlain' => "0",
            'return_klain' => "0",
            'opnamelain' => "0",
            'revisi' => "0",
            'revisijkd' => "0",
            'revisilain' => "0",
            'fakturcek' => "0",
            'ampracek' => "0",
            'return_mcek' => "0",
            'return_kcek' => "0",
            'revisicek' => "0",
            'sawalum' => "0",
            'opnameum' => "0",
            'revisium' => "0",
            'belium' => "0",
            'jualum' => "0",
            'return_kum' => "0",
            'return_mum' => "0",
            'sawaltj' => "0",
            'opnametj' => "0",
            'revisitj' => "0",
            'belitj' => "0",
            'jualtj' => "0",
            'return_ktj' => "0",
            'return_mtj' => "0",
            'periodeapt' => "201601",
            'tglopnameapt' => "0000-00-00"
        );

        $dt = $this->db->insert("mobat", $datasimpan);
        return $dt;
    }
    // =================

    // untuk edit dan delete
    public function ambilobatedit() {
        $id = $this->input->get("id");
        $this->db->from("mobat");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdataobat() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $dataedit = array(
            'kodeobat' => $contentdata["kd"],
            'namaobat' => $contentdata["nm"],
            'bhp' => "0",
            'jenisobat' => "OBAT",
            'satuanpakai' => $contentdata["satuanpakaitext"],
            'hargapakai' => $contentdata["hrgumum"],
            'qtysatuan' => $contentdata["isipakai"],
            'satuanstok' => $contentdata["satuanstoktext"],
            'hargastok' => $contentdata["hrgdasar"],
            'hargadasar' => $contentdata["hrgdasar"],
            'tgl_hargadasar' => date("Y-m-d"),
            'kemasan' => $contentdata["kemasan"],
            'klasifikasi' => $contentdata["klatext"],
            'golongan' => $contentdata["goltext"],
            'komposisi' => $contentdata["komposisi"],
            'vendor' => $contentdata["pbftext"],
            'generik' => $contentdata["gentext"],
            'merk' => $contentdata["merktext"],
            'idgolongan' => $contentdata["gol"],
            'idklasifikasi' => $contentdata["kla"],
            'idgenerik' => $contentdata["gen"],
            'idvendor' => $contentdata["pbf"],
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'saldomin' => $contentdata["saldo"]
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mobat", $dataedit);
        return $dt;
    }

    public function hapusdataobat() {
        $id = $this->input->get("id");
        $dataedit = array(
            'hapus' => "1",
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );

        $this->db->where("id", $id);
        $this->db->limit(1);
        $dt = $this->db->update("mobat", $dataedit);
        return $dt;
    }

    public function edithargaobat() {
        $id = $this->input->get("id");

        // $perr1="UPDATE mobat set hargastok=harga_baru, hargapakai=harga_baru+(harga_baru*0.25) where id='$id' limit 1";
        $perr1="UPDATE mobat set hargapakai=harga_baru, hargastok=hargadasar_baru, hargadasar=hargadasar_baru where id='$id' limit 1";
        $dt=$this->db->query($perr1);
        // $dt = $this->db->update("mobat", $dataedit);
        return $dt;
    }
    // ==================

    // master bhp
    function count_all_bhpxx() {
        $this->db->from("mobat");
        $this->db->where("bhp", "1");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_bhp() {
        $ky = $this->input->get("key1");
        $this->db->from("mobat");
        $this->db->where("bhp", "1");
        $this->db->where("hapus", "0");
        $this->db->like("namaobat", $ky, 'both');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    
    function fetch_details_bhp($limit, $start) {
        $output = '';
        $ky = $this->input->get("key1");
        // $this->db->select("kodeobat, namaobat, jenisobat, satuanpakai, hargapakai, qtysatuan, satuanstok, hargastok, hargadasar, id");
        $this->db->select("kodeobat, namaobat, jenisobat, satuanpakai, hargapakai, qtysatuan, satuanstok, hargastok, hargadasar, harga_baru, saldomin, sawal_gudang,beli_gudang,jual_gudang, retur_masuk_gudang, retur_keluar_gudang,id");

        $this->db->from("mobat");
        $this->db->where("bhp", "1");
        $this->db->where("hapus", "0");
        $this->db->like("namaobat", $ky, 'both');
        $this->db->order_by("namaobat", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="3%">No.</th>
			<th width="5%">Kode</th>
			<th>Nama Produk</th>
			<th width="5%">Jenis</th>
			<th width="5%">Satuan Stok</th>
			<th width="5%">Isi Satuan</th>
			<th width="5%">Satuan Pakai</th>
			<th width="5%">Min.Saldo</th>
			<th width="5%">Sisa Stok</th>
			<th width="8%"><div align="right">Harga Jual</div></th>
			<th width="8%"><div align="right">Harga Dasar</div></th>
			<th width="8%"><div align="right">Harga baru</div></th>
			<th width="15%">Action</th>
		</tr>
		';
        $no = $start;
        foreach($query->result() as $row) {
            $sisa=$row->sawal_gudang+$row->beli_gudang-$row->jual_gudang+$row->retur_masuk_gudang-$row->retur_keluar_gudang;
            $saldomin=$row->saldomin;
            if ($sisa < $saldomin+($saldomin*0.25)) {
                $warna='red';
            } else {
                $warna='black';
            }
            $output .= '
		<tr>
            <td style="color: '.$warna.'">'. ++$no .'</td>
            <td style="color: '.$warna.'">'.$row->kodeobat.'</td>
            <td style="color: '.$warna.'">'.$row->namaobat.'</td>
            <td style="color: '.$warna.'">'.$row->jenisobat.'</td>
            <td style="color: '.$warna.'">'.$row->satuanstok.'</td>
            <td style="color: '.$warna.'">'.$row->qtysatuan.'</td>
            <td style="color: '.$warna.'">'.$row->satuanpakai.'</td>
            <td style="color: '.$warna.'">'.$row->saldomin.'</td>
            <td style="color: '.$warna.'">'.$sisa.'</td>
            <td style="color: '.$warna.'"><div align="right">'. formatuang($row->hargapakai).'</div></td>
            <td style="color: '.$warna.'"<div align="right">'. formatuang($row->hargadasar).'</div></td>
            <td style="color: '.$warna.'"<div align="right">'. formatuang($row->harga_baru).'</div></td>
            <td class="text-center">
                <a onclick="rubahharga('.$row->id.')" class="btn-sm btn-primary btn-flat">Rubah Harga</a>
                <a onclick="panggiledit('.$row->id.')" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
                <a onclick="panggilhapus('.$row->id.')" class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
            </td>
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    public function simpandatabhp() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kodeobat' => $contentdata["kd"],
            'namaobat' => $contentdata["nm"],
            'bhp' => "1",
            'jenisobat' => "BHP",
            'satuanpakai' => $contentdata["satuanpakaitext"],
            'hargapakai' => $contentdata["hrgumum"],
            'qtysatuan' => $contentdata["isipakai"],
            'satuanstok' => $contentdata["satuanstoktext"],
            'hargastok' => $contentdata["hrgdasar"],
            'hargadasar' => $contentdata["hrgdasar"],
            'tgl_hargadasar' => date("Y-m-d"),
            'kemasan' => $contentdata["kemasan"],
            'klasifikasi' => $contentdata["klatext"],
            'golongan' => $contentdata["goltext"],
            'komposisi' => $contentdata["komposisi"],
            'vendor' => $contentdata["pbftext"],
            'generik' => $contentdata["gentext"],
            'merk' => $contentdata["merktext"],
            'idgolongan' => $contentdata["gol"],
            'idklasifikasi' => $contentdata["kla"],
            'idgenerik' => $contentdata["gen"],
            'idvendor' => $contentdata["pbf"],
            'user1' => $this->session->userdata("nmuser"),
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'sawal' => "0",
            'opname' => "0",
            'beli' => "0",
            'jual' => "0",
            'return_m' => "0",
            'return_k' => "0",
            'tglopname' => "0000-00-00",
            'saldomin' => $contentdata["saldo"],
            'periode' => "201601",
            'tupper' => "0000-00-00",
            'idgrupobat' => "0",
            'kodegrupobat' => "",
            'namagrupobat' => "",
            'gudang' => "0",
            'rinap' => "0",
            'rjalan' => "0",
            'umum' => "0",
            'ird' => "0",
            'ibs' => "0",
            'sawaljkd' => "0",
            'belijkd' => "0",
            'jualjkd' => "0",
            'return_mjkd' => "0",
            'return_kjkd' => "0",
            'opnamejkd' => "0",
            'distribusi' => "",
            'apbd' => "",
            'blud' => "",
            'harga' => "0",
            'sawallain' => "0",
            'belilain' => "0",
            'juallain' => "0",
            'return_mlain' => "0",
            'return_klain' => "0",
            'opnamelain' => "0",
            'revisi' => "0",
            'revisijkd' => "0",
            'revisilain' => "0",
            'fakturcek' => "0",
            'ampracek' => "0",
            'return_mcek' => "0",
            'return_kcek' => "0",
            'revisicek' => "0",
            'sawalum' => "0",
            'opnameum' => "0",
            'revisium' => "0",
            'belium' => "0",
            'jualum' => "0",
            'return_kum' => "0",
            'return_mum' => "0",
            'sawaltj' => "0",
            'opnametj' => "0",
            'revisitj' => "0",
            'belitj' => "0",
            'jualtj' => "0",
            'return_ktj' => "0",
            'return_mtj' => "0",
            'periodeapt' => "201601",
            'tglopnameapt' => "0000-00-00"
        );

        $dt = $this->db->insert("mobat", $datasimpan);
        return $dt;
    }
    // =================

    // untuk edit dan delete
    public function ambilbhpedit() {
        $id = $this->input->get("id");
        $this->db->from("mobat");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdatabhp() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $dataedit = array(
            'kodeobat' => $contentdata["kd"],
            'namaobat' => $contentdata["nm"],
            'bhp' => "1",
            'jenisobat' => "BHP",
            'satuanpakai' => $contentdata["satuanpakaitext"],
            'hargapakai' => $contentdata["hrgumum"],
            'qtysatuan' => $contentdata["isipakai"],
            'satuanstok' => $contentdata["satuanstoktext"],
            'hargastok' => $contentdata["hrgdasar"],
            'hargadasar' => $contentdata["hrgdasar"],
            'tgl_hargadasar' => date("Y-m-d"),
            'kemasan' => $contentdata["kemasan"],
            'klasifikasi' => $contentdata["klatext"],
            'golongan' => $contentdata["goltext"],
            'komposisi' => $contentdata["komposisi"],
            'vendor' => $contentdata["pbftext"],
            'generik' => $contentdata["gentext"],
            'merk' => $contentdata["merktext"],
            'idgolongan' => $contentdata["gol"],
            'idklasifikasi' => $contentdata["kla"],
            'idgenerik' => $contentdata["gen"],
            'idvendor' => $contentdata["pbf"],
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s"),
            'saldomin' => $contentdata["saldo"]
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mobat", $dataedit);
        return $dt;
    }

    public function hapusdatabhp() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $dataedit = array(
            'hapus' => "1",
            'user2' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y-m-d H:i:s")
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mobat", $dataedit);
        return $dt;
    }

    // ==========

    // master pbf
    function count_all_pbfxx() {
        $this->db->from("mpbf");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_pbf() {
        $ky = $this->input->get("key1");
        $this->db->from("mpbf");
        $this->db->like("nama", $ky, 'both');
        $query = $this->db->get();
        return $query->num_rows();
    }
    

    function fetch_details_pbf($limit, $start) {
        $output = '';
        $ky = $this->input->get("key1");
        $this->db->select("kode, nama, alamat, hp, kontak, jenis, id");
        $this->db->from("mpbf");
        $this->db->order_by("nama", "ASC");
        $this->db->like("nama", $ky, 'both');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="10%">Kode</th>
			<th>Nama PBF</th>
			<th width="20%">Alamat</th>
			<th width="10%">Telp.</th>
			<th width="15%">Nama Kontak</th>
			<th width="5%">Jenis</th>
			<th width="10%">Action</th>
		</tr>
		';
        $no = $start;
        foreach($query->result() as $row) {
            $output .= '
		<tr>
			<td>'. ++$no .'</td>
			<td>'.$row->kode.'</td>
			<td>'.$row->nama.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->hp.'</td>
			<td>'.$row->kontak.'</td>
			<td>'.$row->jenis.'</td>
			<td class="text-center">
				<a onclick="panggiledit('.$row->id.')" class="btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></a>
				<a  class="btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		';
        }
        $output .= '</table>';
        return $output;
    }

    public function simpandatapbf() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode' => $contentdata["kd"],
            'nama' => $contentdata["nm"],
            'alamat' => $contentdata["al"],
            'hp' => $contentdata["telp"],
            'kontak' => $contentdata["kontak"],
            'jenis' => $contentdata["jenistext"]
        );

        $dt = $this->db->insert("mpbf", $datasimpan);
        return $dt;
    }
    // =================

    // untuk edit dan delete
    public function ambilpbfedit() {
        $id = $this->input->get("id");
        $this->db->from("mpbf");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdatapbf() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $dataedit = array(
            'kode' => $contentdata["kd"],
            'nama' => $contentdata["nm"],
            'alamat' => $contentdata["al"],
            'hp' => $contentdata["telp"],
            'kontak' => $contentdata["kontak"],
            'jenis' => $contentdata["jenistext"]
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mpbf", $dataedit);
        return $dt;
    }
    // ==========

    //kartustok
    public function obatbhpsatuan_rt() {
        $this->db->select("kodeobat, namaobat, id, satuanpakai, hargapakai");
        $this->db->from("maset");
        $this->db->order_by("bhp", "ASC");
        $data = $this->db->get();
        return $data->result();
    }

}
