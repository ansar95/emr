<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Canvas_tes extends CI_Controller {

    public function index() {
        $this->load->view('canvas_view');
    }

    public function saveDrawing() {
        // Mengambil data gambar dari POST request
        $imageData = $this->input->post('imageData');

        // Decode data gambar dari format base64
        $decodedImageData = base64_decode($imageData);

        // Menyimpan gambar ke dalam file
        $fileName = 'saved_drawing.png';
        file_put_contents($fileName, $decodedImageData);

        // Memberikan respons bahwa gambar berhasil disimpan
        echo json_encode(array('status' => 'success', 'message' => 'Gambar berhasil disimpan'));
    }
}
