<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masyarakat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->model('m_masyarakat');
	}

	public function index()
	{
		$data['title'] = 'Pengaduan';
		$data['name'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->m_masyarakat->data_pengaduan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function selesai()
	{
		$data['title'] = 'My Profile';
		$data['name'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->m_masyarakat->data_pengaduan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/selesai', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'My Profile';
		$data['name'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['date_created'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/profile', $data);
		$this->load->view('templates/footer');
	}
}
