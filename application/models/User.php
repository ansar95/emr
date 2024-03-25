<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function full() {
		$this->db->select("id, nama, username, last_login, last_ip, PL, INFO, BO, ADM, REGIS, FO, LP, UGD, RJ, RI, RINS, SEP, AMP, RM, APT, FARM, RT, GIZI, MD, NEW, EDIT, DEL, PIL, LAB, RAD, HEM, JEN, AMB, USR, IBS, KMB");
		$this->db->from("user_master");
		$data = $this->db->get();
		return $data->result();
	}

	public function isUserRegistered($username)
	{
		$this->db->select('id');
		$this->db->from('user_master');
		$this->db->where('username',$username);
		$result = $this->db->get()->result();
		return !empty($result);
	}

	public function getSelect($fields)
	{
		if(!$fields){
			return;
		}
		if (is_array($fields)) {
			$fields = implode(",",$fields);
		}
		$this->db->select($fields);
		$this->db->from('user_master');
		return $this->db->get()->result();
	}

	public function top() {
		$this->db->from("user_top_role");
		$data = $this->db->get();
		return $data->result();
	}

	public function pelayanan() {
		$this->db->from("user_pelayanan_role");
		$data = $this->db->get();
		return $data->result();
	}

	public function subpelayanan($id) {
		$this->db->from("user_subpelayanan_role");
		$this->db->where("id_pelayanan_role", $id);
		$data = $this->db->get();
		return $data->result();
	}

	public function backoffice() {
		$this->db->from("user_bo_role");
		$data = $this->db->get();
		return $data->result();
	}

	public function informasi() {
		$this->db->from("user_info_role");
		$data = $this->db->get();
		return $data->result();
	}

	public function administrasi() {
		$this->db->from("user_adm_role");
		$data = $this->db->get();
		return $data->result();
	}

	// untuk administrasi
	function count_all() {
		$filters = $this->input->get();
		$this->db->select("id");
		$this->db->from("user_master");
		if (isset($filters['nama_user'])) {
			$this->db->where("(nama like '%{$filters['nama_user']}%' OR username like '%{$filters['nama_user']}%')");
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	function fetch_details($limit, $start) {
		$filters = $this->input->get();
		// var_dump($filters);
		$output = '';
		$this->db->select("id, nama, username, last_login, last_ip, is_active");
		$this->db->from("user_master");
		$this->db->order_by("id", "ASC");
		$this->db->limit($limit, $start);
		if (isset($filters['nama_user'])) {
			$this->db->where("(nama like '%{$filters['nama_user']}%' OR username like '%{$filters['nama_user']}%')");
		}
		
		$query = $this->db->get();
		$output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="20%">Nama</th>
			<th>Username</th>
			<th width="30%">Last Login</th>
			<th width="10%">Last IP</th>
			<th width="10%">Action</th>
			<th width="10%">Active</th>
		</tr>
		';
		$no = $start;
		foreach($query->result() as $row) {
			if ($row->is_active) {
				$lock = '<button onclick="nonactivate('.$row->id.')" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-lock"></i></button>';
			} else {
				$lock = '<button onclick="activate('.$row->id.')" class="btn btn-sm btn-success btn-flat"><i class="fa fa-unlock"></i></button>';
			}
		$output .= '
		<tr>
			<td>'. ++$no .'</td>
			<td>'.$row->nama.'</td>
			<td>'.$row->username.'</td>
			<td>'.tanggalsatu($row->last_login).'</td>
			<td>'.$row->last_ip.'</td>
			<td class="text-center">
				<button onclick="ambiledit('.$row->id.')" class="btn btn-sm btn-info btn-flat"><i class="fa fa-edit"></i></button>
			</td>
			<td class="text-center">
				'.$lock.'
			</td>
		</tr>
		';
		}
		$output .= '</table>';
			return $output;
	}

	public function ambildatauser() {
		$id = $this->input->get("id");
		$this->db->select("id, nama, username, kode_unit, last_login, last_ip, PL, INFO, BO, ADM, REGIS, FO, LP, UGD, RJ, RI, RINS, SEP, AMP, RM, APT, FARM, RT, GIZI, MD, NEW, EDIT, DEL, PIL, LAB, RAD, HEM, JEN, AMB, USR, IBS, KMB");
		$this->db->from("user_master");
		$this->db->where("id", $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function usersimpan() {
		// foreach($_POST as $key => $value){
		// 	$dt[$key] = $this->input->post($key);
		// }
		$datasimpan = array(
			'nama' => $this->input->get("nm"), 
			'username' => $this->input->get("us"), 
			'password' => md5($this->input->get("ps")), 
			'last_login' => date("Y-m-d H:i:s") , 
			'last_ip' => "", 
			'kode_unit' => $this->input->get("units"), 
			'PL' => gantiangka($this->input->get("toppelayanan")), 
			'INFO' => gantiangka($this->input->get("info")), 
			'BO' => gantiangka($this->input->get("bo")), 
			'ADM' => gantiangka($this->input->get("adm")), 
			'REGIS' => gantiangka($this->input->get("reg")), 
			'FO' => gantiangka($this->input->get("fo")), 
			'LP' => gantiangka($this->input->get("loket")), 
			'UGD' => gantiangka($this->input->get("ugd")), 
			'RJ' => gantiangka($this->input->get("jalan")), 
			'RI' => gantiangka($this->input->get("inap")), 
			'RINS' => gantiangka($this->input->get("instalasi")), 
			'SEP' => gantiangka($this->input->get("sep")), 
			'AMP' => gantiangka($this->input->get("amp")), 
			'RM' => gantiangka($this->input->get("rm")), 
			'APT' => gantiangka($this->input->get("apotik")), 
			'FARM' => gantiangka($this->input->get("farmasi")), 
			'RT' => gantiangka($this->input->get("rt")), 
			'GIZI' => gantiangka($this->input->get("gizi")), 
			'MD' => gantiangka($this->input->get("master")), 
			'NEW' => gantiangka($this->input->get("neww")), 
			'EDIT' => gantiangka($this->input->get("edit")), 
			'DEL' => gantiangka($this->input->get("del")), 
			'PIL' => gantiangka($this->input->get("pil")), 
			'LAB' => gantiangka($this->input->get("lab")), 
			'RAD' => gantiangka($this->input->get("rad")), 
			'HEM' => gantiangka($this->input->get("hem")), 
			'JEN' => gantiangka($this->input->get("jen")), 
			'AMB' => gantiangka($this->input->get("amb")), 
			'USR' => gantiangka($this->input->get("user")), 
			'IBS' => gantiangka($this->input->get("ibs")), 
			'KMB' => gantiangka($this->input->get("kmb"))
		);
		$dt = $this->db->insert("user_master", $datasimpan);
		return $dt;
	}

	public function useredit() {
		$id = $this->input->get("id");
        if ($this->input->get("ps") == "") {
            $dataedit = array(
                'nama' => $this->input->get("nm"),
                'username' => $this->input->get("us"),
                'last_login' => date("Y-m-d H:i:s") ,
                'kode_unit' => $this->input->get("units"),
                'PL' => gantiangka($this->input->get("toppelayanan")),
                'INFO' => gantiangka($this->input->get("info")),
                'BO' => gantiangka($this->input->get("bo")),
                'ADM' => gantiangka($this->input->get("adm")),
                'REGIS' => gantiangka($this->input->get("reg")),
                'FO' => gantiangka($this->input->get("fo")),
                'LP' => gantiangka($this->input->get("loket")),
                'UGD' => gantiangka($this->input->get("ugd")),
                'RJ' => gantiangka($this->input->get("jalan")),
                'RI' => gantiangka($this->input->get("inap")),
                'RINS' => gantiangka($this->input->get("instalasi")),
                'SEP' => gantiangka($this->input->get("sep")),
                'AMP' => gantiangka($this->input->get("amp")),
                'RM' => gantiangka($this->input->get("rm")),
                'APT' => gantiangka($this->input->get("apotik")),
                'FARM' => gantiangka($this->input->get("farmasi")),
                'RT' => gantiangka($this->input->get("rt")),
                'GIZI' => gantiangka($this->input->get("gizi")),
                'MD' => gantiangka($this->input->get("master")),
                'NEW' => gantiangka($this->input->get("neww")),
                'EDIT' => gantiangka($this->input->get("edit")),
                'DEL' => gantiangka($this->input->get("del")),
                'PIL' => gantiangka($this->input->get("pil")),
                'LAB' => gantiangka($this->input->get("lab")),
                'RAD' => gantiangka($this->input->get("rad")),
                'HEM' => gantiangka($this->input->get("hem")),
                'JEN' => gantiangka($this->input->get("jen")),
                'AMB' => gantiangka($this->input->get("amb")),
                'USR' => gantiangka($this->input->get("user")),
                'IBS' => gantiangka($this->input->get("ibs")),
                'KMB' => gantiangka($this->input->get("kmb"))
            );
        } else {
            $dataedit = array(
                'nama' => $this->input->get("nm"),
                'username' => $this->input->get("us"),
                'password' => md5($this->input->get("ps")),
                'last_login' => date("Y-m-d H:i:s") ,
                'kode_unit' => $this->input->get("units"),
                'PL' => gantiangka($this->input->get("toppelayanan")),
                'INFO' => gantiangka($this->input->get("info")),
                'BO' => gantiangka($this->input->get("bo")),
                'ADM' => gantiangka($this->input->get("adm")),
                'REGIS' => gantiangka($this->input->get("reg")),
                'FO' => gantiangka($this->input->get("fo")),
                'LP' => gantiangka($this->input->get("loket")),
                'UGD' => gantiangka($this->input->get("ugd")),
                'RJ' => gantiangka($this->input->get("jalan")),
                'RI' => gantiangka($this->input->get("inap")),
                'RINS' => gantiangka($this->input->get("instalasi")),
                'SEP' => gantiangka($this->input->get("sep")),
                'AMP' => gantiangka($this->input->get("amp")),
                'RM' => gantiangka($this->input->get("rm")),
                'APT' => gantiangka($this->input->get("apotik")),
                'FARM' => gantiangka($this->input->get("farmasi")),
                'RT' => gantiangka($this->input->get("rt")),
                'GIZI' => gantiangka($this->input->get("gizi")),
                'MD' => gantiangka($this->input->get("master")),
                'NEW' => gantiangka($this->input->get("neww")),
                'EDIT' => gantiangka($this->input->get("edit")),
                'DEL' => gantiangka($this->input->get("del")),
                'PIL' => gantiangka($this->input->get("pil")),
                'LAB' => gantiangka($this->input->get("lab")),
                'RAD' => gantiangka($this->input->get("rad")),
                'HEM' => gantiangka($this->input->get("hem")),
                'JEN' => gantiangka($this->input->get("jen")),
                'AMB' => gantiangka($this->input->get("amb")),
                'USR' => gantiangka($this->input->get("user")),
                'IBS' => gantiangka($this->input->get("ibs")),
                'KMB' => gantiangka($this->input->get("kmb"))
            );
        }
		$this->db->where("id", $id);
		$dt = $this->db->update("user_master", $dataedit);
		return $dt;
	}

	public function ubahpass() {
        $id = $this->session->userdata("idx");

        $this->db->select("id");
        $this->db->from("user_master");
        $this->db->where("id", $id);
        $this->db->where("password", md5($this->input->post("pl")));
        $data = $this->db->get();
        if (count($data->result()) == 0) {
            return "n";
        }

        $dataedit = array(
            'password' => md5($this->input->post("pb"))
        );
        $this->db->where("id", $id);
        $dt = $this->db->update("user_master", $dataedit);
        return $dt;
    }

    public function listuser() {
	    $this->db->select("username");
        $this->db->from("user_master");
        $data = $this->db->get();
        return $data->result();
		}
	
	public function listuserbilling() {
			$this->db->select("username");
			$this->db->from("user_master");
			$this->db->where("LP", 1);
			$data = $this->db->get();
			return $data->result();
			}

	public function didactive() {
			$id = $this->input->get("id");
			$status = $this->input->get("status");

			$dataedit = array(
				'is_active' => filter_var($status, FILTER_VALIDATE_BOOLEAN)
			);
			$this->db->where("id", $id);
			$dt = $this->db->update("user_master", $dataedit);
			return $dt;

		}
	
}
