<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'admin');
		$this->load->model('M_Potensi', 'potensi');
		// $this->load->model('M_Wilayah', 'wilayah');
	}

	public function index()
	{
		$this->data['title'] = 'Dashboard';
		$this->load->view('template/admin/header');
		// $this->data['admin'] = $this->admin->jumlah_admin();
		// $this->load->view('dashboard', $this->data);
		$this->load->view('template/admin/footer');
	}
}
