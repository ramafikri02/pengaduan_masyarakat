<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_masyarakat');
    }
    
	public function pengaduan()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_data_pengaduan($nik);

		
		$this->load->view('test', $data);
	}
}
