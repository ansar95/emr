<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Model {
	
	public function full() {
		$this->db->from("mtindakan");
		$data = $this->db->get();
		return $data->result();
	}

    public function fullfilter_old($kode) {
        $this->db->from("mtindakan");
        $this->db->where($kode, "1");
        $data = $this->db->get();
        return $data->result();
	}
	
	public function fullfilter($kode) {
        $this->db->from("mtindakan");
        $this->db->where($kode, "1");
		$this->db->where("hapus", "0");
        $data = $this->db->get();
        return $data->result();
	}

	public function fullfilterunit($kode, $unit) {
        $this->db->from("mtindakan");
		$this->db->where($kode, "1");
		$this->db->where("kode_unit", "$unit");
		$this->db->where("hapus", "0");
        $data = $this->db->get();
        return $data->result();
	}


	public function fullfilterunitjoin($kode, $unit) {
        $this->db->from("mtindakan");
		$this->db->where($kode, "1");
		$this->db->where("kode_unit", $unit);
		$this->db->where("hapus", "0");
        $data = $this->db->get();
        return $data->result();
    }	

	public function jenistindakan() {
		$this->db->select("id, jenis");
		$this->db->from("mjenistindakan");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatatindakan() {
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatatindakanrad() {
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", "RDGL");
		$this->db->or_where("kode_unit", "RDLG");
		$this->db->where("hapus", "0");
		$this->db->order_by("tindakan", 'asc');
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatatindakanlab() {
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", "LABS");
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatatindakanhem() {
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", "HMDL");
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatatindakanjen() {
		$kdunit = $this->input->get("kdunit");
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", $kdunit);
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}


	public function ambildatatindakanopr() {
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$this->db->where("kode_unit", "IBSS");
		$this->db->where("hapus", "0");
		$data = $this->db->get();
		return $data->result();
	}

	public function ambildatajasatindakan() {
		$id = $this->input->get("kodetind");
		$this->db->select("kode_tindakan, tindakan, jasas");
		$this->db->from("mtindakan");
		$data = $this->db->get();
		return $data->row();
	}

	public function pilihtindakansatuan() {
		$kd = $this->input->get("kdt");
		$this->db->select("kode_tindakan, tindakan, jasas, type");
		$this->db->from("mtindakan");
		$this->db->where("kode_tindakan", $kd);
		$this->db->limit(1);
		$data = $this->db->get();
		return $data->row();
	}

	// untuk master data
//	function view($num, $offset) {
//		$query = $this->db->get("mtindakan",$num, $offset);
//		return $query->result();
//	}

	function count_all() {
		$ky = $this->input->get("key1");
        $this->db->from("mtindakan");
        // $this->db->where("hapus", "0");
		$this->db->like("tindakan", $ky, 'both');
		$this->db->or_like("kode_unit", $ky, 'both');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$output = '';
		$ky = $this->input->get("key1");
		$this->db->select("kode_tindakan, kode_unit, tindakan, type, jasas, hapus, id");
		$this->db->from("mtindakan");
        // $this->db->where("hapus", "0");
		$this->db->like("tindakan", $ky, 'both');
		$this->db->or_like("kode_unit", $ky, 'both');
		$this->db->order_by("kode_unit", "ASC");
		$this->db->order_by("tindakan", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="7%" style="text-align:center">Kode</th>
			<th width="10%"style="text-align:center">Kode Unit</th>
			<th>Nama Tindakan</th>
			<th width="12%">Jenis Tindakan</th>
			<th width="10%" style="text-align:right">Harga</th>
            <th width="7%" style="text-align:center">Aktif</th>
            <th width="10%" style="text-align:center">Action</th>
		</tr>
		';
		$no = $start;
        $id = $this->session->userdata("idx");
		foreach($query->result() as $row) {
            if (ceksess("EDIT", $id) == TRUE) {
                $edit = '<a role="button" onclick="panggiledit('.$row->id.')" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>';
            } else {
                $edit = "";
            }
            if (ceksess("DEL", $id) == TRUE) {
                $del = '<a role="button" onclick="hapusdata(this, '.$row->id.')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>';
            } else {
                $del = "";
            }
			if ($row->hapus =='0'){ $aktif='Aktif'; } else { $aktif='Non Aktif'; }
            $output .= '
            <tr>
                <td>'. ++$no .'</td>
                <td class="text-center">'.$row->kode_tindakan.'</td>
				<td class="text-center">'.$row->kode_unit.'</td>
                <td>'.$row->tindakan.'</td>
				<td>'.$row->type.'</td>
				<td align="right">'.groupangka($row->jasas).'</td>
				<td align="center">'.$aktif.'</td>
                <td class="text-center">
                    '.$edit.'
                    '.$del.'
                </td>
            </tr>
            ';
		}
		$output .= '</table>';
			return $output;
	}

	public function simpandatatindakan() {
		foreach($_GET as $key => $value){
			$isi[$key] = $this->input->get($key);
		}

		$contentdata = $isi;

		$datasimpan = array(
			'kode_unit' => $contentdata["unit"], 
			'nama_unit' => $contentdata["unittext"], 
			'kode_tindakan' => $contentdata["kd"], 
			'tindakan' => $contentdata["nm"], 
			'type' => $contentdata["jenistext"], 
			'jasas' => $contentdata["jasas"], 
			'jasap' => $contentdata["jasap"],
			'jasam' => $contentdata["jasam"], 
			'jasams' => $contentdata["jasams"], 
			'user1' => $this->session->userdata("nmuser"), 
			'lastlogin' => date("Y:m:d H:i:s"),  
			'kodetarif' => "2", 
			'jalan' => gantiangka($contentdata["jalan"]), 
			'inap' => gantiangka($contentdata["inap"]), 
			'instalasi' => gantiangka($contentdata["instalasi"]), 
			'lahir' => gantiangka($contentdata["lahir"]), 
			'operasi' => gantiangka($contentdata["operasi"]), 
			'darah' => gantiangka($contentdata["darah"]), 
			'hd' => gantiangka($contentdata["hd"]), 
			'hapus' => ""
		);

		$dt = $this->db->insert("mtindakan", $datasimpan);
		return $dt;
		// return $contentdata;
	}

	public function ambildataedit() {
        $id = $this->input->get("id");
        $this->db->from("mtindakan");
        $this->db->where("id", $id);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function editdatatindakan() {
        foreach($_GET as $key => $value){
            $isi[$key] = $this->input->get($key);
        }

        $contentdata = $isi;

        $datasimpan = array(
            'kode_unit' => $contentdata["unit"],
            'nama_unit' => $contentdata["unittext"],
            'kode_tindakan' => $contentdata["kd"],
            'tindakan' => $contentdata["nm"],
            'type' => $contentdata["jenistext"],
            'jasas' => $contentdata["jasas"],
            'jasap' => $contentdata["jasap"],
            'jasam' => $contentdata["jasam"],
            'jasams' => $contentdata["jasams"],
            'user1' => $this->session->userdata("nmuser"),
            'lastlogin' => date("Y:m:d H:i:s"),
            'jalan' => gantiangka($contentdata["jalan"]),
            'inap' => gantiangka($contentdata["inap"]),
            'instalasi' => gantiangka($contentdata["instalasi"]),
            'lahir' => gantiangka($contentdata["lahir"]),
            'operasi' => gantiangka($contentdata["operasi"]),
            'darah' => gantiangka($contentdata["darah"]),
            'hd' => gantiangka($contentdata["hd"]),
        );

        $this->db->where("id", $contentdata["id"]);
        $dt = $this->db->update("mtindakan", $datasimpan);
        return $dt;
        // return $contentdata;
    }

    public function deletetindakan() {
        $id = $this->input->get("id");

        $data = array(
            'hapus' => "1",
            'lastlogin' => date("Y-m-d H:i:s"),
            'user1' => $this->session->userdata('nmuser')
        );

        $this->db->where("id", $id);
        $dt = $this->db->update("mtindakan", $data);
        return $dt;
    }


	public function fullsampel() {
		$this->db->from("msampel");
		$data = $this->db->get();
		return $data->result();
	}
}
