<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class beranda extends CI_Controller {

	/**
	 * beranda Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/beranda
	 *	- or -
	 * 		http://example.com/beranda/beranda
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /beranda/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
