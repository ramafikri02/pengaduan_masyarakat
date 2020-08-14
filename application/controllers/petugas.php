<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {

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
	public function index()
	{
		$data['title'] = 'My Profile';
		$data['name'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['date_created'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_p', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('petugas/index', $data);
		$this->load->view('templates/footer');
	}

	public function pengaduan()
	{
		$this->load->view('petugas/pengaduan');
	}
}
