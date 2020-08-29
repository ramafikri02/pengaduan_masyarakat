<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_petugas');
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['petugas'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_p', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('petugas/profile', $data);
		$this->load->view('templates/footer');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['pengaduan'] = $this->m_petugas->get_pengaduan_proses();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_p', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('petugas/pengaduan_proses', $data);
		$this->load->view('templates/footer');
	}

	public function selesai()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['pengaduan'] = $this->m_petugas->get_pengaduan_selesai();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_p', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('petugas/pengaduan_selesai', $data);
		$this->load->view('templates/footer');
	}
}
