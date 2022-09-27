
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_Berita"); //load model 
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "Data Berita";

        $data["data_berita"] = $this->M_Berita->getAll();

        $this->load->view('template/admin/header', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('template/admin/footer', $data);
    }

    //method add digunakan untuk menampilkan form tambah data 
    public function add()
    {
        $tberita = $this->M_Berita; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($tberita->rules()); //menerapkan rules validasi pada M_berita
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada M_berita
        if ($validation->run()) {
            $tberita->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("berita");
        }
        $data["title"] = "Tambah Data Berita";
        $this->load->view('template/admin/header', $data);
        $this->load->view('berita/add', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('berita');

        $tberita = $this->M_Berita;
        $validation = $this->form_validation;
        $validation->set_rules($tberita->rules());

        if ($validation->run()) {
            $tberita->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diedit.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("berita");
        }
        $data["title"] = "Edit Data";
        $data["data_berita"] = $tberita->getById($id);
        if (!$data["data_berita"]) show_404();
        $this->load->view('berita/edit', $data);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->M_Berita->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}
