<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_masyarakat');
	}

	public function index()
	{
		$this->load->view('beranda');
	}

	public function lacak()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'trim|required');
		
		$nik = $this->input->post('nik');
		$data['pengaduan'] = $this->m_masyarakat->get_pengaduan($nik);
		if ($this->form_validation->run() == false) {
			$this->load->view('lacak' , $data);
		} else {
			$this->_aksi_lacak_pengaduan();
		}
	}

	private function _aksi_lacak_pengaduan()
	{
		$nik = $this->input->post('nik');
		$user = $this->db->get_where('masyarakat', ['nik' => $nik])->row_array();
		// Nyari Nik
		if ($user) {
			$data['pengaduan'] = $this->m_masyarakat->get_pengaduan($nik);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengaduan anda Ditemukan!</div>');
			$this->load->view('lacak', $data);
		} else {
			// ini kalo Nik belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengaduan anda Tidak Ditemukan!</div>');
			redirect('beranda/lacak');
		}
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/m_register');
	}
}
