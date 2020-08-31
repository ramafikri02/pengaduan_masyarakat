<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class beranda extends CI_Controller {
	public function index()
	{
		$this->load->view('beranda');
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
