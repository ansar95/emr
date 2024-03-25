<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilterJalan extends CI_Model {

  public function filterpindahkamar($id, $id_parent = 0) {
    $this->db->where('id_source', $id);
    $this->db->delete('filter_jalan');
    ///
    $simpan = array(
      "id_source" => $id,
      "id_parent" => $id_parent
    );
    $hasil = $this->db->insert('filter_jalan', $simpan);

    return $hasil;
  }

  public function hapusfilterbyidsource($id) {
    $this->db->where('id_source', $id);
    $hasil = $this->db->delete('filter_jalan');
    return $hasil;
  }

  public function getidparent($id) {
    $this->db->select("id_parent");
    $this->db->from("filter_jalan");
    $this->db->where("id_source", $id);
    $result = $this->db->get();
    return $result->row();
  }

}