<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gizimdl extends CI_Model {

//untuk asuhan gizi pasien

public function caripasiengizi() {
	$kode_unit = $this->input->get("kode_unit");
	$date = date_create($this->input->get("tanggal"));
	$tanggal = date_format($date,"Y-m-d");
	
		$this->db->select("pgizi.notransaksi as notransaksi, pgizi.no_rm as no_rm, pgizi.kode_unit as kode_unit, pgizi.kode_kamar as kode_kamar, pgizi.kdbentuk as kdbentuk, pgizi.bentuk as bentuk, pgizi.kdpagi as kdpagi, pgizi.pagi as pagi, pgizi.kdsiang as kdsiang, pgizi.siang as siang, pgizi.kdmalam as kdmalam, pgizi.malam as malam , pasien.nama_pasien as nama_pasien, mkamar.nama_kamar as nama_kamar, mkamar.nama_kelas as nama_kelas,register.golongan as golongan, pgizi.id as id ");
		$this->db->from("pgizi");
		$this->db->join("pasien", "pasien.no_rm = pgizi.no_rm");
		$this->db->join("register", "register.notransaksi = pgizi.notransaksi");
		$this->db->join("mkamar", "mkamar.kode_kamar = pgizi.kode_kamar",'left');
		$this->db->where("pgizi.kode_unit", $kode_unit);
		$this->db->where("pgizi.tanggal", $tanggal);
		$this->db->order_by("pgizi.kode_kamar", "ASC");
		$this->db->order_by("pgizi.no_rm", "ASC");
		$data = $this->db->get();
		return $data->result();
}

public function ambildatasebelumnya() {
	$kode_unit = $this->input->get("kode_unit");
	$kode_unit_cari = $this->input->get("kode_unit");
	$date = date_create($this->input->get("tanggal"));
	$tanggal = date_format($date,"Y-m-d");

	//cari dulu tgl terakhir ada di file pgizi

	$this->db->from("pgizi");
	$this->db->where("pgizi.kode_unit", $kode_unit);
	$this->db->where("pgizi.tanggal <", $tanggal);
	$this->db->order_by("pgizi.tanggal", "DESC");
	$this->db->limit(1);
	$data = $this->db->get();
	$trxdata = $data->row();
	$total = $data->num_rows();
	if ($total > 0) {
		$ada=1;
		$tanggalsebelumnya=date_create($trxdata->tanggal);
		$tanggalnya = date_format($tanggalsebelumnya,"Y-m-d");
	} else {
		$ada=0;
	}

	if ( $ada == 1 ) {
		//ambil data dari pgizi sebelumnya
		$pulang=1;
		$qry19=$this->db->query("SELECT notransaksi, no_rm, kode_unit, kode_kamar, kdbentuk, bentuk, kdpagi, pagi, kdsiang, siang, kdmalam, malam FROM pgizi WHERE tanggal='$tanggalnya' and kode_unit='$kode_unit' ");
		foreach ($qry19->result_array() as $brs19) {
			$notransaksi=$brs19['notransaksi'];
			$no_rm=$brs19['no_rm'];
			$kode_unit=$brs19['kode_unit'];                       
			$kode_kamar=$brs19['kode_kamar'];   
			//cek dulu kode kamarnya sebelum menulis mungkin pindah kamar
			$this->db->from("register_detail");
			$this->db->where("no_rm", $no_rm);
			$this->db->where("kode_unit", $kode_unit);
			$this->db->where("notransaksi", $notransaksi);
			$this->db->where("pindah", 0);
			$this->db->limit(1);
			$datakamar = $this->db->get();
			$adakamar=$datakamar->num_rows();
			if ($adakamar > 0) {
				$qry29=$this->db->query("SELECT kode_kamar,pulang FROM register_detail WHERE no_rm='$no_rm' and kode_unit='$kode_unit' and notransaksi ='$notransaksi' and  pindah=0 ");
				foreach ($qry29->result_array() as $brs29) {
					$kode_kamar=$brs29['kode_kamar']; 
					$pulang=$brs29['pulang']; 
				}
			}

			$kdbentuk=$brs19['kdbentuk'];                       
			$bentuk=$brs19['bentuk'];                       
			$pagi=$brs19['pagi'];                         
			$kdpagi=$brs19['kdpagi'];                       
			$pagi=$brs19['pagi'];                       
			$kdsiang=$brs19['kdsiang'];
			$siang=$brs19['siang'];                       
			$kdmalam=$brs19['kdmalam'];                       
			$malam=$brs19['malam'];          
			//uji dulu pasien sdh pulang atau tidak, jika sudah pulang tidak perlu di catat lagi
			if ( $pulang == 0 ) {
				//uji dulu sebelum masukkan apa sdh ada atau belum
				$this->db->from("pgizi");
				$this->db->where("pgizi.kode_unit", $kode_unit);
				$this->db->where("pgizi.tanggal", $tanggal);
				$this->db->where("pgizi.no_rm", $no_rm);
				$this->db->limit(1);
				$data = $this->db->get();
				$baris=$data->num_rows();
				if ( $baris == 0 ) {
					//masukkan di pgizi tgl sekarang
					$data11 = array('notransaksi'=>$notransaksi,
									'no_rm'=>$no_rm,
									'kode_unit'=>$kode_unit,
									'kode_kamar'=>$kode_kamar,
									'kdbentuk'=>$kdbentuk,
									'bentuk'=>$bentuk,
									'kdpagi'=>$kdpagi,
									'pagi'=>$pagi,
									'kdsiang'=>$kdsiang,
									'siang'=>$siang,
									'kdmalam'=>$kdmalam,
									'malam'=>$malam,
									'tanggal'=>$tanggal,
									'user1'=>$this->session->userdata("nmuser"),
									'user2'=>$this->session->userdata("nmuser"),
									"lastlogin" => date("Y-m-d H:i:s")
								);
					$this->db->insert('pgizi',$data11);
				}
			}
		}	
	} 

	//ambil semua data dari register detail masukkan jika belum ada di pgizi
	$this->db->from("register_detail");
			$this->db->where("kode_unit", $kode_unit_cari);
			$this->db->where("status", 0);
			$data21 = $this->db->get();
			

	if ($data21->num_rows() > 0 ) {
		foreach ($data21->result_array() as $brs20) {
			$notransaksireg=$brs20['notransaksi'];
			$no_rmreg=$brs20['no_rm'];                       
			$kode_unitreg=$brs20['kode_unit'];                       
			$kode_kamarreg=$brs20['kode_kamar'];  

			//uji dulu sebelum masukkan apa sdh ada atau belum
			$this->db->from("pgizi");
			$this->db->where("pgizi.kode_unit", $kode_unitreg);
			$this->db->where("pgizi.tanggal", $tanggal);
			$this->db->where("pgizi.no_rm", $no_rmreg);
			$this->db->limit(1);
			$data2 = $this->db->get();
			$baris=$data2->num_rows();
			if ( $baris == 0 ) {
				//masukkan di pgizi tgl sekarang
				$data3 = array('notransaksi'=>$notransaksireg,
								'no_rm'=>$no_rmreg,
								'kode_unit'=>$kode_unitreg,
								'kode_kamar'=>$kode_kamarreg,
								'kdbentuk'=>'',
								'bentuk'=>'',
								'kdpagi'=>'',
								'pagi'=>'',
								'kdsiang'=>'',
								'siang'=>'',
								'kdmalam'=>'',
								'malam'=>'',
								'tanggal'=>$tanggal,
								'user1'=>$this->session->userdata("nmuser"),
								'user2'=>$this->session->userdata("nmuser"),
								"lastlogin" => date("Y-m-d H:i:s")
							);
				$this->db->insert('pgizi',$data3);
			}		
		}
	}

	//tampilkan kembali
		$this->db->select("pgizi.notransaksi as notransaksi, pgizi.no_rm as no_rm, pgizi.kode_unit as kode_unit, pgizi.kode_kamar as kode_kamar, pgizi.kdbentuk as kdbentuk, pgizi.bentuk as bentuk, pgizi.kdpagi as kdpagi, pgizi.pagi as pagi, pgizi.kdsiang as kdsiang, pgizi.siang as siang, pgizi.kdmalam as kdmalam, pgizi.malam as malam , pasien.nama_pasien as nama_pasien, mkamar.nama_kamar as nama_kamar, mkamar.nama_kelas as nama_kelas,register.golongan as golongan, pgizi.id as id ");
		$this->db->from("pgizi");
		$this->db->join("pasien", "pasien.no_rm = pgizi.no_rm");
		$this->db->join("register", "register.notransaksi = pgizi.notransaksi");
		$this->db->join("mkamar", "mkamar.kode_kamar = pgizi.kode_kamar","left");
		$this->db->where("pgizi.kode_unit", $kode_unit);
		$this->db->where("pgizi.tanggal", $tanggal);
		$this->db->order_by("pgizi.kode_kamar", "ASC");
		$this->db->order_by("pgizi.no_rm", "ASC");
		$data = $this->db->get();
		return $data->result();
}

public function ambildataeditgizi() {
	$id = $this->input->get("id");
	$this->db->from("pgizi");
	$this->db->where("id", $id);
	$data = $this->db->get();
	return $data->row();
}

public function ambildatamakanan() {
	$this->db->select("kode_makanan, nama_makanan");
	$this->db->from("mgizi_makanan");
	$this->db->where("hapus","0");
	$this->db->order_by("urut","ASC");
	$this->db->order_by("id","ASC");
	$data = $this->db->get();
	return $data->result();
}

public function ambildatabentuk() {
	$this->db->select("kode_bentuk, nama_bentuk");
	$this->db->from("mgizi_bentuk");
	$this->db->where("hapus","0");
	$this->db->order_by("urut","ASC");
	$this->db->order_by("id","ASC");
	$data = $this->db->get();
	return $data->result();
}
//untuk master jenis

	public function ambiljenis() {
		$query = $this->db->get("mgizi_makanan");
		return $query->result();
	}

	public function ambilsatuan() {
		$query = $this->db->get("msatuan");
		return $query->result();
	}

	// untuk master jenis
	function count_all_jenis() {
		$query = $this->db->get("mgizi_makanan");
		return $query->num_rows();
	}

	function fetch_details_jenis($limit, $start) {
		$output = '';
		$this->db->from("mgizi_makanan");
		$this->db->order_by("nama_makanan", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="15%">Kode Makanan</th>
			<th>Nama Makanan</th>
			<th width="10%">Action</th>
		</tr>
		';
		$no = $start;
		$id = $this->session->userdata("idx");
		if ($query->num_rows() == 0) {
			$output .= '<tr><td colspan="4">Data Kosong</td></tr>';
		} else {
			foreach($query->result() as $row) {
				if (ceksess("EDIT", $id) == TRUE) {
					$edit = '<button onclick="panggiledit('.$row->id.')" class="btn btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></button>';
				} else {
					$edit = "";
				}
				if (ceksess("DEL", $id) == TRUE) {
					$del = '<button  class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>';
				} else {
					$del = "";
				}
				$output .= '
				<tr>
					<td>'. ++$no .'</td>
					<td>'.$row->kode_makanan.'</td>
					<td>'.$row->nama_makanan.'</td>
					<td class="text-center">
						'.$edit.'
						'.$del.'
					</td>
				</tr>
				';
			}
		}
		$output .= '</table>';
		return $output;
	}

	public function simpandatajenis() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_makanan' => $contentdata["kd"], 
			'nama_makanan' => $contentdata["nm"]
		);

		$dt = $this->db->insert("mgizi_makanan", $datasimpan);
		return $dt;
	}

	public function ambildataedit() {
		$id = $this->input->get("id");
		$this->db->from("mgizi_makanan");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function editdatajenis() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$dataedit = array(
			'kode_makanan' => $contentdata["kd"], 
			'nama_makanan' => $contentdata["nm"]
		);

		$this->db->where("id", $contentdata["id"]);
		$dt = $this->db->update("mgizi_makanan", $dataedit);
		return $dt;
	}
	// ==================

	// untuk master bahan
	function count_all_bahan() {
		$query = $this->db->get("mgizi_bahanbaku");
		return $query->num_rows();
	}

	function fetch_details_bahan($limit, $start) {
		$output = '';
		$this->db->from("mgizi_bahanbaku");
		$this->db->order_by("nama_bahan", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="15%">Kode Bahan</th>
			<th>Nama Bahan</th>
			<th width="10%">Satuan</th>
			<th width="10%">Jenis</th>
			<th width="10%">Action</th>
		</tr>
		';
		$no = $start;
		$id = $this->session->userdata("idx");
		if ($query->num_rows() == 0) {
			$output .= '<tr><td colspan="6">Data Kosong</td></tr>';
		} else {
			foreach($query->result() as $row) {
				if (ceksess("EDIT", $id) == TRUE) {
					$edit = '<button onclick="panggiledit('.$row->id.')" class="btn btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></button>';
				} else {
					$edit = "";
				}
				if (ceksess("DEL", $id) == TRUE) {
					$del = '<button  class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i></button>';
				} else {
					$del = "";
				}
				$output .= '
				<tr>
					<td>'. ++$no .'</td>
					<td>'.$row->kode_bahan.'</td>
					<td>'.$row->nama_bahan.'</td>
					<td>'.$row->satuan.'</td>
					<td>'.$row->jenis.'</td>
					<td class="text-center">
						'.$edit.'
						'.$del.'
					</td>
				</tr>
				';
			}
		}
		$output .= '</table>';
			return $output;
	}

	public function simpandatabahan() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_bahan' => $contentdata["kd"], 
			'nama_bahan' => $contentdata["nm"],
			'satuan' => $contentdata["satuan"],
			'jenis' => $contentdata["jenistext"]
		);

		$dt = $this->db->insert("mgizi_bahanbaku", $datasimpan);
		return $dt;
	}

	public function ambildataeditbahan() {
		$id = $this->input->get("id");
		$this->db->from("mgizi_bahanbaku");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	public function editdatadietpasien() {
		$id = $this->input->get("id");
		$kdbentuk = $this->input->get("kdbentuk");
		$bentuk = $this->input->get("bentuk");
		$kdpagi = $this->input->get("kdpagi");
		$nmpagi = $this->input->get("nmpagi");
		$kdsiang = $this->input->get("kdsiang");
		$nmsiang = $this->input->get("nmsiang");
		$kdmalam = $this->input->get("kdmalam");
		$nmmalam = $this->input->get("nmmalam");
		$dataedit = array(
			'kdbentuk' => $kdbentuk, 
			'bentuk' => $bentuk,
			'kdpagi' => $kdpagi, 
			'pagi' => $nmpagi, 
			'kdsiang' => $kdsiang, 
			'siang' => $nmsiang, 
			'kdmalam' => $kdmalam, 
			'malam' => $nmmalam, 
		);
		$this->db->where("id", $id);
		$dt = $this->db->update("pgizi", $dataedit);
		return $dt;
	}

	public function deletedietpasien() {
		$id = $this->input->get("id");
		$this->db->where('id', $id);
		$dt = $this->db->delete('pgizi');
		return $dt;
	}
	
	// ==================

}
