<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

	public function pengaduan()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['kategori'] = $this->m_admin->get_kategori();

		$data['pending'] = $this->m_admin->get_pengaduan_pending();
		$data['proses'] = $this->m_admin->get_pengaduan_proses();
		$data['selesai'] = $this->m_admin->get_pengaduan_selesai();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function masyarakat()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['masyarakat'] = $this->m_admin->get_data_masyarakat();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/masyarakat', $data);
		$this->load->view('templates/footer');
	}

	public function petugas()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['petugas'] = $this->m_admin->get_data_petugas();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/petugas', $data);
		$this->load->view('templates/footer');
	}

	public function kategori()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->m_admin->get_kategori();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_a', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_kategori() {
		$this->m_admin->tambah_kategori();
		redirect('admin/kategori');
	}

	public function edit_kategori() {
		$this->m_admin->edit_kategori();
		redirect('admin/kategori');
	}

	public function hapus_kategori() {
		$this->m_admin->hapus_kategori();
		redirect('admin/kategori');
	}

	public function setujui_pengaduan() {
		$this->m_admin->setujui_pengaduan();
		redirect('admin/pengaduan');
	}
}
