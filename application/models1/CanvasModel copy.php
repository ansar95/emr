<?php
// application/models/CanvasModel.php
// application/models/CanvasModel.php
defined('BASEPATH') OR exit('No direct script access allowed');

class CanvasModel extends CI_Model {

    public function saveCanvasData($canvasData, $notransaksi)
    {
        $data = array(
            'image_data' => $canvasData,
            'notransaksi' => $notransaksi,
        );

        // Simpan data ke tabel database
        $this->db->insert('emr_canvas_data', $data);

        return array('status' => 'success');
    }

    public function getBackgroundImage()
    {
        // Ambil data gambar terakhir dari tabel emr_canvas_data
        $query = $this->db->select('image_data')->from('emr_canvas_data')->order_by('id', 'DESC')->limit(1)->get();

        // Kembalikan URL gambar
        $result = $query->row();
        return $result ? $this->convertBlobToBase64($result->image_data) : '';
    }

    // Fungsi untuk mengonversi mediumblob menjadi base64
    private function convertBlobToBase64($blobData)
    {
        return 'data:image/png;base64,' . base64_encode($blobData);
    }
}


?>