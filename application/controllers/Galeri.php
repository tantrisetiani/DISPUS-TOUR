<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Galeri', 'galeri');
    }

    public function index()
    {
        $data['title'] = 'Data Foto Galeri';
        $data['galeri'] = $this->galeri->get_data_db();

        $this->load->view('template/admin/header', $data);
        $this->load->view('galeri/index', $data);
        $this->load->view('template/admin/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Foto Galeri';
        $data['galeri'] = $this->galeri->get_data_db();

        $this->form_validation->set_rules(
            'keterangan_galeri',
            'Keterangan Foto',
            'required',
            array('required' => 'Keterangan Foto Galeri harus diisi')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('galeri/tambah', $data);
            $this->load->view('template/admin/footer', $data);
        } else {
            $keterangan_galeri = $this->input->post('keterangan_galeri');
            $foto_galeri = $_FILES['foto_galeri'];
            if ($foto_galeri = '') {
            } else {
                $config['upload_path'] = './assets/img/galeri';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_galeri')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $foto_galeri = $this->upload->data('file_name');
                }
            }
            $data = array(
                'keterangan_galeri' => $keterangan_galeri,
                'foto_galeri' => $foto_galeri
            );

            $this->galeri->add_data($data, 'galeri');
            $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data <strong>Foto Galeri</strong> berhasil ditambahkan!
        </div>
        ');
            redirect('galeri');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Foto Galeri';
        $data['galeri'] = $this->galeri->getDataById($id);

        $this->form_validation->set_rules(
            'keterangan_galeri',
            'Keterangan Foto',
            'required',
            array('required' => "Keterangan Foto Galeri harus diisi")
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('galeri/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->galeri->update_data($id);
            $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data <strong>Foto Galeri</strong> berhasil diupdate!
        </div>
        ');
            redirect('galeri');
        }
    }

    public function hapus($id)
    {
        $where = [
            'id_galeri' => $id
        ];

        $this->galeri->delete_data($where);
        $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fas fa-check-circle"></i>
      Data <strong>Foto Galeri</strong> berhasil dihapus!
      </div>
      ');
        redirect('galeri');
    }
}
