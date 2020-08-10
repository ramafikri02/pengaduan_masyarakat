<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function m_register()
	{
		$this->load->view('auth/m_register');
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[8]|max_length[16]', [
			'min_length' => 'Nama Pengguna anda terlalu pendek',
			'max_length' => 'Nama Pengguna tidak boleh melebihi 16 huruf'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Kata Sandi terlalu pendek',
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[12]|max_length[13]', [
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/register');
		} else {
			$data = [
				'nik' => $this->input->post('nik'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
			];
		}
	}
}
