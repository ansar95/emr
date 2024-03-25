<?php
// application/controllers/CanvasController.php
defined('BASEPATH') OR exit('No direct script access allowed');

class CanvasController extends CI_Controller {

    public function index()
    {
        $this->load->view('canvas_view');
    }

    public function saveCanvas()
    {
        $canvasData = $this->input->post('canvasData');
        $notransaksi = $this->input->post('notransaksi');

        // Validasi data jika diperlukan

        $this->load->model('CanvasModel');
        $result = $this->CanvasModel->saveCanvasData($canvasData, $notransaksi);

        // Mengembalikan response ke client, misalnya JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    public function getBackgroundImage()
    {
        $this->load->model('CanvasModel');
        $backgroundImage = $this->CanvasModel->getBackgroundImage();

        // Mengembalikan URL gambar ke client
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('backgroundImage' => $backgroundImage)));
    }
}
