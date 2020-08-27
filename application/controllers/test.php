<?php
defined('BASEPATH') or exit('No direct script access allowed');

class test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('m_masyarakat');
    }

    function index()
    {
        $data['pengaduan'] = $this->m_masyarakat->get_data_pengaduan();
        $this->load->view('test', $data);
    }
}