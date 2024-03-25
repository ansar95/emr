<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('uploadfile_model');
    }

    // public function index() {
        // $this->load->view('upload_form'); // Buat view untuk form upload
    // }

    public function do_upload() {
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg|mp4';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
        } else {
            $upload_data = $this->upload->data();
            
            // Data untuk dimasukkan ke database
            $file_data = array(
                // 'jenis' => $this->input->post('jenis'),
                'no_rm' => $this->input->post('no_rm'),
                'notransaksi' => $this->input->post('notransaksi'),
                'namafile' => $upload_data['file_name'], // Nama file yang diupload
                'type' => $upload_data['file_type'], // Tipe file yang diupload
                'keterangan' => $this->input->post('keterangan'),
            );
            
            // Simpan data ke database menggunakan model
            $insert_id = $this->uploadfile_model->insert_file($file_data);
            
            $no_rm=$this->input->post('no_rm');
            $notransaksi=$this->input->post('notransaksi');
			$this->load->model("rmeigdmdl");
            $dtfile = $this->rmeigdmdl->panggilDataUpload($no_rm,$notransaksi);
			$data['dtfile'] = $dtfile;
			$data['dtno_rm'] = $no_rm;
			$data['dtnotransaksi'] = $notransaksi;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/rmeigd/tdlistupload', $data, TRUE);
			echo json_encode($dt);
        }
    }

}


