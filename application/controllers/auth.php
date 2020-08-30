<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_auth');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->m_auth->aksi_login();
		}
	}

	public function m_register()
	{
		$this->m_auth->register_m();
	}

	public function register()
	{
		$this->m_auth->register_ap();
	}

	public function logout()
	{
		$this->m_auth->aksi_logout();
	}
}
