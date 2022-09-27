<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login) redirect('dashboard');
		$this->load->model('M_Admin', 'admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $data['title'] = 'Halaman Login';
		$this->load->view('auth/login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->admin->cekDataAdmin("admin", $where);
		$data_user = $cek->row();
		if ($data_user > 0) {
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('nama_admin', $data_user->nama_admin);
			$this->session->set_userdata('foto_admin', $data_user->foto_admin);
			$this->session->set_userdata('kode_admin', $data_user->kode_admin);
			$this->session->set_userdata('id_admin', $data_user->id_admin);
			$this->session->set_userdata('is_login', TRUE);
			redirect(base_url("dashboard"));
		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah');
			redirect(base_url("auth"));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> You have been logout!</div>');
		redirect(base_url('auth'));
	}
}
