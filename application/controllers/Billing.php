<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

    // untuk billing pelayanan
    public function billingpelayanan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/billing/pelayanan/listbillingpelayanan";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbilling";
            $data['css'] = "pelayanan/billing/cssbilling";
            $this->load->model("billingmdl");
            $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();
            $this->load->model("unit");
            $instalasi = $this->unit->unitkiriminstalasi();
            $data["jumlah"] = $jumlahrekpatutup;
            $data["instalasi"] = $instalasi;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }
    public function cekbillingpelayanan() {
        if ($this->session->userdata("login") == TRUE) {
            $data['include'] = "layanan/pelayanan/billing/pelayanan/listcekbillingpelayanan";
            $data['menusamping'] = "menucekbilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbilling_cek";
            $data['css'] = "pelayanan/billing/cssbilling";
            $this->load->model("billingmdl");
            // $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();
            $jumlahrekpatutup = 0;
            $this->load->model("unit");
            $instalasi = $this->unit->unitkiriminstalasi();
            $data["jumlah"] = $jumlahrekpatutup;
            $data["instalasi"] = $instalasi;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function billingpelayanan2() {
        if ($this->session->userdata("login") == TRUE) {

            $data['include'] = "layanan/pelayanan/billing/pelayanan/listbillingpelayanan2";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbilling";
            $data['css'] = "pelayanan/billing/cssbilling";
            $this->load->model("billingmdl");
            $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();
            $data["jumlah"] = $jumlahrekpatutup;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function billingpelayanan3() {
        if ($this->session->userdata("login") == TRUE) {

            $data['include'] = "layanan/pelayanan/billing/pelayanan/listbillingpelayanan3";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbilling";
            $data['css'] = "pelayanan/billing/cssbilling";
            $this->load->model("billingmdl");
            $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();
            $this->load->model("unit");
            $instalasi = $this->unit->unitkiriminstalasi();
            $data["jumlah"] = $jumlahrekpatutup;
            $data["instalasi"] = $instalasi;
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }


    public function caribillingpasien() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->caridtbilling();
            $data["hasil"] = $dtpasien;
            $this->load->view('layanan/pelayanan/billing/pelayanan/tdbillingpelayanan', $data);
        } else {
            redirect('login');
        }
    }

    public function caribillingpasien_cek() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->caridtbilling();
            $data["hasil"] = $dtpasien;
            $this->load->view('layanan/pelayanan/billing/pelayanan/tdbillingpelayanan_cek', $data);
        } else {
            redirect('login');
        }
    }
    


    public function prosesbilling() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->detcaridtbilling();
            $dtnamadokter=$this->billingmdl->detcaridtbillingdokter($dtpasien->notransaksi);
            // $data['css'] = "pelayanan/billing/cssformbilling";
            $data["hasil"] = $dtpasien;
            $data["dokter"] = $dtnamadokter;
            $this->load->view('layanan/pelayanan/billing/pelayanan/formbilling', $data);
        } else {
            redirect('login');
        }
    }

    public function prosesbilling_cek() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->detcaridtbilling();
            $dtnamadokter=$this->billingmdl->detcaridtbillingdokter($dtpasien->notransaksi);
            // $data['css'] = "pelayanan/billing/cssformbilling";
            $data["hasil"] = $dtpasien;
            $data["dokter"] = $dtnamadokter;
            $this->load->view('layanan/pelayanan/billing/pelayanan/formbilling_cek', $data);
        } else {
            redirect('login');
        }
    }

    public function prosesbayarpelayanan() {

        /**
         * proses ambil data pasien untuk proses bayar di billing
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->berkasbayar();
            $dtbayar = $this->billingmdl->berkasjumlahbayar($dtpasien->notransaksi);
            $data["hasil"] = $dtpasien;
            $data["bayar"] = $dtbayar;
            $this->load->view('layanan/pelayanan/billing/pelayanan/formbayar', $data);
        } else {
            redirect('login');
        }
    }

    
    public function prosesbayarapotik() {

        /**
         * proses ambil data pasien untuk proses bayar di billing
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtapotik = $this->billingmdl->caribayarapotik();
            $dtbayar = $this->billingmdl->jumlahbayarapotik();
            $data["hasil"] = $dtapotik;
            $data["bayar"] = $dtbayar;
            $this->load->view('layanan/pelayanan/billing/pelayanan/formbayarapotik', $data);
        } else {
            redirect('login');
        }
    }

    public function prosesbayarinst() {

        /**
         * proses ambil data pasien untuk proses bayar di billing
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtapotik = $this->billingmdl->caribayarinst();
            $dtbayar = $this->billingmdl->jumlahbayarinst();
            $data["hasil"] = $dtapotik;
            $data["bayar"] = $dtbayar;
            $this->load->view('layanan/pelayanan/billing/pelayanan/formbayarinst', $data);
        } else {
            redirect('login');
        }
    }

    public function aksibayarpelyanan() {

        /**
         * aksi simpan rekap billing untuk pembayaran pelayanan
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtkwitansi = $this->billingmdl->ambilsetupkwitansipelayanan();
            $dtbayar = $this->billingmdl->prosesbayarpelayanan($dtkwitansi);
            $datarekap = $this->billingmdl->ambilrekapbillingpelayanan();
            $datatotal = $this->billingmdl->totaljumlahBayarpelyanan();
            $data["hasil"] = $datarekap;

            $dt["stat"] = $dtbayar;
            $dt["total"] = $datatotal->total;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/billing/pelayanan/tddaftarbilling', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function aksibayarapotik() {

        /**
         * aksi simpan rekap billing untuk pembayaran apotik
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtkwitansi = $this->billingmdl->ambilsetupkwitansipelayanan();
            $dtbayar = $this->billingmdl->prosesbayarapotik($dtkwitansi);
            $datarekap = $this->billingmdl->ambilrekapbillingpelayanan();
            $datatotal = $this->billingmdl->totaljumlahBayarpelyanan();
            $data["hasil"] = $datarekap;

            $dt["stat"] = $dtbayar;
            $dt["total"] = $datatotal->total;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/billing/pelayanan/tddaftarbilling', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function aksibayarinst() {

        /**
         * aksi simpan rekap billing untuk pembayaran apotik
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtkwitansi = $this->billingmdl->ambilsetupkwitansipelayanan();
            $dtbayar = $this->billingmdl->prosesbayarinst($dtkwitansi);
            $datarekap = $this->billingmdl->ambilrekapbillingpelayanan();
            $datatotal = $this->billingmdl->totaljumlahBayarpelyanan();
            $data["hasil"] = $datarekap;

            $dt["stat"] = $dtbayar;
            $dt["total"] = $datatotal->total;
            $dt["dtview"] = $this->load->view('layanan/pelayanan/billing/pelayanan/tddaftarbilling', $data, TRUE);

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function paginationrekapbilling() {

        /**
         * Pagiantion rekap billing
         */

        $this->load->model("billingmdl");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->billingmdl->count_all_billing();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'rekap_table' => $this->billingmdl->fetch_details_rekap_billing($config["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function tutuprekap() {

        /**
         * tutup rekap billing
         */

        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $tutup = $this->billingmdl->tutuprekapbilling();
            $jumlahrekpatutup = $this->billingmdl->cekjumlahrekapinihari();

            $dt["tutup"] = $tutup;
            $dt["jumlah"] = $jumlahrekpatutup;

            echo json_encode($dt);
        } else {
            redirect('login');
        }
    }

    public function prosesbillingposting() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->postingdataproses();
            $data["hasil"] = $dtpasien;
            echo json_encode($data);
        } else {
            redirect('login');
        }
    }

    public function prosesbillingposting_cek() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl_cekbilling");
            $dtpasien = $this->billingmdl_cekbilling->postingdataproses();
            $data["hasil"] = $dtpasien;
            echo json_encode($data);
        } else {
            redirect('login');
        }
    }

    public function cetakpostingbilling($notrx, $norm, $stat) {
        if ($this->session->userdata("login") == TRUE) {
            $logoPath = base_url('/assets/img/kop_billing.jpg');
            $typeFile = pathinfo($logoPath, PATHINFO_EXTENSION);
            $logoFile = file_get_contents($logoPath);
            $data['kop_billing'] = 'data:image/' . $typeFile . ';base64,' . base64_encode($logoFile);
            
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;
            $data["stat"] = $stat;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakpostingbilling".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakpostingbilling', $data);
            $this->pdf->render();
            $this->pdf->output();
            // $this->load->view('laporan/laporanbilling/cetakpostingbilling', $data);

        } else {
            redirect('login');
        }
    }

    public function cetakpostingbilling_teshalaman($notrx, $norm, $stat) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;
            $data["stat"] = $stat;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakpostingbilling".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakpostingbilling', $data);
            $this->pdf->render();
            $canvas = $dompdf->get_canvas();
            $font = Font_Metrics::get_font("helvetica", "bold");
            $canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
            $dompdf->stream("cetakpostingbilling.pdf",array("Attachment"=>0));
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }



    // <?php
    // $dompdf = new DOMPDF();
    // $dompdf->set_paper("A4");
     
    // $dompdf->load_html($html);
    // $dompdf->render();
    // $canvas = $dompdf->get_canvas();
    // $font = Font_Metrics::get_font("helvetica", "bold");
    // $canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
    // $dompdf->stream("contohdompdf.pdf",array("Attachment"=>0));
    


    public function cetakpostingbillingrekap($notrx, $norm, $stat) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;
            $data["stat"] = $stat;

            $this->load->library('pdf');
            $this->pdf->setPaper('F4', 'potrait');
            $this->pdf->filename = "cetakpostingbilling".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakpostingbillingrekap', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function cetakpostingbillingumum($notrx, $norm, $stat) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;
            $data["stat"] = $stat;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakpostingbillingumum".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakpostingbillingumum', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function cetakpostingbillingrekapumum($notrx, $norm, $stat) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;
            $data["stat"] = $stat;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakpostingbillingumum".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakpostingbillingrekapumum', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    // untuk billing apotek
    public function billingapotik() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("unit");

            $data['include'] = "layanan/pelayanan/billing/apotik/listbillingpelayanan";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbillingapotik";
            $data['css'] = "pelayanan/billing/cssbilling";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtdepo"] = $this->unit->fulldepo();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    //dedy coba tambah
    public function billingapotikdifarmasi() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("unit");

            $data['include'] = "layanan/pelayanan/billing/apotik/listbillingpelayanan";
            $data['menusamping'] = "menuapotik";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbillingapotik";
            $data['css'] = "pelayanan/billing/cssbilling";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtdepo"] = $this->unit->fulldepo();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function tessaja() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("bhp");
            $this->load->model("unit");

            $data['include'] = "layanan/pelayanan/billing/apotik/listbillingpelayanan";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $data['js'] = "pelayanan/billing/jsbillingapotik";
            $data['css'] = "pelayanan/billing/cssbilling";
            $data["dtpbf"] = $this->bhp->datapbf();
            $data["dtdepo"] = $this->unit->fulldepo();
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function caribillingpasienapotik() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->caridtbillingapotik();
            $data["hasil"] = $dtpasien;
            $this->load->view('layanan/pelayanan/billing/pelayanan/tdbillingpelayananapotik', $data);
        } else {
            redirect('login');
        }
    }
    
    public function caribillingpasieninst() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->caridtbillinginst();
            $data["hasil"] = $dtpasien;
            $this->load->view('layanan/pelayanan/billing/pelayanan/tdbillingpelayananinst', $data);
        } else {
            redirect('login');
        }
    }

    public function prosesbillingapotik() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->detcaridtbillingapotik();
            $data["hasil"] = $dtpasien;
            $this->load->view('layanan/pelayanan/billing/apotik/formbilling', $data);
        } else {
            redirect('login');
        }
    }

    public function prosesbillingpostingapotik() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->hitungapotikbilling();
            $data["hasil"] = $dtpasien;
            echo json_encode($data);
        } else {
            redirect('login');
        }
    }

    public function bayarbillingpostingapotik() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model("billingmdl");
            $dtpasien = $this->billingmdl->bayarapotikbilling();
            $data["hasil"] = $dtpasien;
            echo json_encode($data);
        } else {
            redirect('login');
        }
    }

    public function cetakpostingbillingapotik($nores, $norm) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $nores;
            $data["norm"] = $norm;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakbillingapotik".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakbillingapotik', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    // Untuk Laporan
    public function formlapbilling() {
        if ($this->session->userdata("login") == TRUE) {
            $this->load->model('user');
            $this->load->model('golongan');
            //$this->load->model('billingmdl');
            $data['us'] = $this->user->listuserbilling();
            $data['gol'] = $this->golongan->listgolongan();
            //$data['rekap'] = $this->billingmdl->ambilrekapbillingpelayanan();
            $data['include'] = "laporan/laporanbilling";
            $data['js'] = "laporan/laporanbilling/lapbilling";
            $data['css'] = "laporan/datepickerselectdua";
            $data['menusamping'] = "menubilling";
            $data['backhome'] = "tiga";
            $this->load->view('templatesidebar/content', $data);
        } else {
            redirect('login');
        }
    }

    public function panggilcetak() {
        if ($this->session->userdata("login") == TRUE) {
            if($this->input->post("cbil") != null) {
                $this->cetakbilling();
            }
        } else {
            redirect('login');
        }
    }

    public function cetakbilling() {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");
            $start_date = $this->input->post('tglmulai');
            $end_date = $this->input->post('tglakhir');
            $dshif = $this->input->post('shif');
            $dshifpilih = $this->input->post('shifpilih');
            $duser = $this->input->post('pengguna');
            $duserpilih = $this->input->post('penggunapilih');

            $dcbayar = $this->input->post('cbayar');
            $dcbayarpilih = $this->input->post('cbayarpilih');

            $data["start_date"] = $start_date;
            $data["end_date"] = $end_date;
            $data["dshif"] = $dshif;
            $data["dshifpilih"] = $dshifpilih;
            $data["duser"] = $duser;
            $data["duserpilih"] = $duserpilih;

            $data["dcbayar"] = $dcbayar;
            $data["dcbayarpilih"] = $dcbayarpilih;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "cetakbilling".$r.".pdf";
            // load_view('laporan/laporanbilling/cetakbilling', $data);
            $this->load->view('laporan/laporanbilling/cetakbilling', $data);

            // $this->pdf->load_view('laporan/laporanbilling/cetakbilling', $data);
            // $this->pdf->render();
            // $this->pdf->output();
        } else {
            redirect('login');
        }
    }

    public function cetakbayarkwitansi($notrx, $norm) {
        if ($this->session->userdata("login") == TRUE) {
            $r = date("Ymd");

            $data["notrx"] = $notrx;
            $data["norm"] = $norm;

            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetakpostingbillingumum".$r.".pdf";
            $this->pdf->load_view('laporan/laporanbilling/cetakbayarkwitansi', $data);
            $this->pdf->render();
            $this->pdf->output();
        } else {
            redirect('login');
        }
    }

   
}
