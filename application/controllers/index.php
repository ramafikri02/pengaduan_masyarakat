<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index
	 *	- or -
	 * 		http://example.com/index/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function beranda()
	{
		$this->load->view('beranda');
	}

	public function kontak()
	{
		$this->load->view('kontak');
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