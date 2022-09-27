<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_Kategori', 'kategori');
        // $this->load->model('M_Potensi', 'potensi');
        // $this->load->model('M_Galeri', 'galeri');
        // $this->load->model('M_Berita', 'berita');
        // $this->load->model('M_KritikSaran', 'kritiksaran');
    }

    public function index()
    {
        // $data['title'] = 'DISPUS TOUR';
        // $data['potensi'] = $this->potensi->get_data_db();
        // $data['kategori'] = $this->kategori->tampilData();
        // $data['wilayah'] = $this->wilayah->get_data_db();
        // $data['galeri'] = $this->galeri->get_data_db();
        // $data['berita'] = $this->berita->get_data_db();

        // $this->load->view('template/admin/header', $data);
        // $this->load->view('pengunjung/index', $data);
        // $this->load->view('template/admin/footer', $data);
        $this->load->view('template/pengunjung/header');
        $this->load->view('pengunjung/index');
        $this->load->view('pengunjung/about');
        $this->load->view('pengunjung/gallery');
        $this->load->view('pengunjung/berita');
        $this->load->view('pengunjung/kritiksaran');
        $this->load->view('template/pengunjung/footer');
    }





    public function berita_terkini()
    {
    }

    public function galeri()
    {
    }
    public function about()
    {
    }
}
