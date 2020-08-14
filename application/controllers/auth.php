<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_masyarakat');
		$this->load->model('m_admin_petugas');
		$this->load->model('m_login');
		$this->load->model('m_logout');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->_aksi_login();
		}
	}

	private function _aksi_login()
	{
		$this->m_login->aksi_login();
	}

	public function m_register()
	{
		$this->m_masyarakat->register_m();
	}

	public function register()
	{
		$this->m_admin_petugas->register_ap();
	}

	public function logout()
	{
		$this->m_logout->aksi_logout();
	}
}
