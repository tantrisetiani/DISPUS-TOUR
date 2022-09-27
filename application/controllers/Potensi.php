<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Potensi', 'potensi');
        $this->load->model('M_Kategori', 'kategori');
        $this->load->model('M_Wilayah', 'wilayah');
    }

    public function index()
    {
        $data['title'] = 'Data Potensi';
        $data['potensi'] = $this->potensi->get_data_db();
        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();

        $this->load->view('template/admin/header', $data);
        $this->load->view('potensi/index', $data);
        $this->load->view('template/admin/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Data Potensi';
        $data['potensi'] = $this->potensi->get_data_db();
        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();

        $this->form_validation->set_rules('id_kategori', 'Kategori Potensi', 'required');
        $this->form_validation->set_rules('id_wilayah', 'Wilayah Potensi', 'required');
        $this->form_validation->set_rules(
            'nama_potensi',
            'Nama Potensi',
            'required',
            array('required' => 'Nama Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'sejarah_potensi',
            'Sejarah Potensi',
            'required',
            array('required' => 'Sejarah Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'video_potensi',
            'Video Potensi',
            'required',
            array('required' => 'Nama Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'tentang_potensi',
            'Tentang Potensi',
            'required',
            array('required' => 'Nama Potensi harus diisi')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('potensi/tambah', $data);
            $this->load->view('template/admin/footer', $data);
        } else {
            $id_kategori = $this->input->post('id_kategori');
            $id_wilayah = $this->input->post('id_wilayah');
            $nama_potensi = $this->input->post('nama_potensi');
            $sejarah_potensi = $this->input->post('sejarah_potensi');
            $video_potensi = $this->input->post('video_potensi');
            $tentang_potensi = $this->input->post('tentang_potensi');
            $foto_potensi = $_FILES['foto_potensi'];
            if ($foto_potensi = '') {
            } else {
                $config['upload_path'] = './assets/img/potensi';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_potensi')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $foto_potensi = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_kategori' => $id_kategori,
                'id_wilayah' => $id_wilayah,
                'nama_potensi' => $nama_potensi,
                'sejarah_potensi' => $sejarah_potensi,
                'video_potensi' => $video_potensi,
                'tentang_potensi' => $tentang_potensi,
                'foto_potensi' => $foto_potensi
            );

            $this->potensi->add_data($data, 'potensi');
            $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data <strong>Potensi</strong> berhasil ditambahkan!
        </div>
        ');
            redirect('potensi');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Potensi';
        $data['potensi'] = $this->potensi->getDataById($id);
        $data['kategori'] = $this->kategori->tampilData();
        $data['wilayah'] = $this->wilayah->get_data_db();
        // $data['potensi'] = $this->potensi->getDataRelation($id);
        $this->form_validation->set_rules(
            'nama_potensi',
            'Nama Potensi',
            'required',
            array('required' => 'Nama Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori Potensi',
            'required',
            array('required' => 'Kategori Potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'id_wilayah',
            'Wilayah Potensi',
            'required',
            array('required' => 'Wilayah harus diisi')
        );
        $this->form_validation->set_rules(
            'video_potensi',
            'Video Potensi',
            'required',
            array('required' => 'Video potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'tentang_potensi',
            'Tentang Potensi',
            'required',
            array('required' => 'Tentang potensi harus diisi')
        );
        $this->form_validation->set_rules(
            'sejarah_potensi',
            'Sejarah Potensi',
            'required',
            array('required' => 'Sejarah Potensi harus diisi')
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin/header', $data);
            $this->load->view('potensi/edit', $data);
            $this->load->view('template/admin/footer');
        } else {
            $this->potensi->update_data($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fas fa-check-circle"></i>
          Data <strong>Potensi</strong> berhasil diupdate!
          </div>
          ');
            redirect('potensi');
        }
    }

    public function hapus($id)
    {
        $where = [
            'id_potensi' => $id
        ];

        $this->potensi->delete_data($where);
        $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fas fa-check-circle"></i>
      Data <strong>Potensi</strong> berhasil dihapus!
      </div>
      ');
        redirect('potensi');
    }
}
