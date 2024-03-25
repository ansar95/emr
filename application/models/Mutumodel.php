<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutumodel extends CI_Model 
{
    public function store($data)
    {
        return $this->db->insert('indikator_mutu', $data);
    }

    public function find($limit, $start)
    {
        $output = '';
        $this->db->from('indikator_mutu');
        $this->db->limit($limit, $start);
        $data = $this->db->get();

        $output .= '
		<table class="table table-bordered table-striped">
		<tr>
			<th width="5%">No.</th>
			<th width="8%">Kode</th>
			<th>Jenis</th>
			<th width="11%">Indikator</th>
			<th width="18%" style="text-align:center">Penilaian Mutu</th>
			<th width="25%" class="text-center">Standar</th>
			<th width="5%" style="text-align:center">Ukuran</th>
			<th width="10%" style="text-align:center">Action</th>
		</tr>
		';

        $no = $start;


        foreach($data->result() as $item) {
            $edit = '<a role="button" onclick="panggiledit('.$item->id.')" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>';
            $del = '<a role="button" onclick="hapusdata(this, '.$item->id.')" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>';
            $output .= '
                <tr>
                    <td> '. ++$no .'</td>
                    <td> '. $item->kode .'</td>
                    <td> '. $item->jenis .'</td>
                    <td> '. $item->indikator .'</td>
                    <td> '. $item->indikator_penilaian .'</td>
                    <td class="text-center"> '. $item->nilai .'</td>
                    <td class="text-center"> '. $item->ukuran .'</td>
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

    public function count()
    {
        $this->db->from('indikator_mutu');
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('indikator_mutu');
    }

    public function detail($id)
    {
        $query = $this->db->get_where('indikator_mutu', array('id' => $id));

        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('indikator_mutu', $data);
    }

    public function findByPelaksana($id) 
    {
        $this->db->from('indikator_mutu');
        $this->db->like('pelaksana', $id);
        $data = $this->db->get();

        return $data->result();
    }
}