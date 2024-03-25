<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasamedikpersentaseranapmdl extends CI_Model {
    public function get()
    {
        $jt = $this->get_jenis_tindakan();
        
        $this->db->from("jasa_ref_type_jaspel");
        if ($this->input->post('periode')) $this->db->where("periode", $this->input->post('periode'));
        
        $get = $this->db->get();
        $r = $get->result_array();

        $result = array();
        $n = 0;
        foreach ($r as $w)
        {
            $n++;
            $parameter = json_decode($w['parameter'], true);
            $bagian = array();
            foreach ($parameter as $b => $v)
            {
                $deskripsi = $jt[$b];
                $bagian[] = [
                    $deskripsi => $v
                ];
            }

            $result[] = [
                'nomor' => $n,
                'id' => $w['id'],
                'periode' => $w['periode'],
                'type' => $w['type'],
                'jenis' => $w['jenis'],
                'pendapatan' => $w['persentase_pendapatan'],
                'pelayanan' => $w['persentase_pelayanan'],
                'direct' => $w['persentase_direct'],
                'indirect' => $w['persentase_indirect'],
                'reward' => $w['persentase_reward'],
                'op_lebih_dari_dua' => $w['op_lebih_dari_dua'],
                'bagian' => $bagian
            ];
        }

        return $result;
    }

    public function get_by_id($id = null)
    {
        $this->db->from("jasa_ref_type_jaspel");
        if ($id) $this->db->where("id", $id);

        $get = $this->db->get();
        $r = $get->result_array();

        $result = array();
        foreach ($r as $w)
        {
            $parameter = json_decode($w['parameter'], true);

            $result[] = [
                'id' => $w['id'],
                'periode' => $w['periode'],
                'type' => $w['type'],
                'jenis' => $w['jenis'],
                'pendapatan' => $w['persentase_pendapatan'],
                'pelayanan' => $w['persentase_pelayanan'],
                'direct' => $w['persentase_direct'],
                'indirect' => $w['persentase_indirect'],
                'reward' => $w['persentase_reward'],
                'op_lebih_dari_dua' => $w['op_lebih_dari_dua'],
                'bagian' => $parameter
            ];
        }

        return $result;
    }

    public function get_jenis_tindakan()
    {
        $ref_db = $this->db->from("jasa_ref_jenis_tindakan");
        $ref_db = $this->db->select("id,deskripsi");
        $ref_db = $ref_db->where("jenis_rawat","RANAP");
        $ref_jenis = $ref_db->get()->result();
        $result = array();
        foreach ($ref_jenis as $w)
        {
            $result[$w->id] =  $w->deskripsi;
        }
        return $result;
    }

    public function store()
    {
        $type = $this->input->post('type');
        $jenis = $this->input->post('jenis');
        $pendapatan = $this->input->post('pendapatan');
        $pembagian = $this->input->post('pembagian');
        $direct = $this->input->post('direct');
        $indirect = $this->input->post('indirect');
        $reward = $this->input->post('reward');
        $op_lebih_dari_dua = ($this->input->post('op_lebih_dari_satu')) ? $this->input->post('op_lebih_dari_satu') : false;

        $bagians = array();
        if ($this->input->post('bagians'))
        {
            foreach ($this->input->post('bagians') as $key => $val)
            {
                $bagians[$key] = $val;
            }
        }

        $parameter = json_encode($bagians, true);
        // $parameter = str_replace('{','[',$parameter);
        // $parameter = str_replace('}',']',$parameter);
        // $parameter = str_replace('\'','',$parameter);

        $data = array();
        $data['type'] = $type;
        $data['jenis'] = $jenis;
        $data['pendapatan'] = $pendapatan;
        $data['pembagian'] = $pembagian;
        $data['direct'] = $direct;
        $data['indirect'] = $indirect;
        $data['reward'] = $reward;
        $data['op_lebih_dari_dua'] = $op_lebih_dari_dua;
        $data['parameter'] = $parameter;

        

        return $data;

    }

    public function update()
    {
        $type = $this->input->post('type');
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->db->from('jasa_ref_type_jaspel');
        $this->db->where("id", $id);
        $this->db->limit(1);
		$result = $this->db->delete();
		return $result;
    }
}