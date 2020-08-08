<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

	/**
	 * auth Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/auth
	 *	- or -
	 * 		http://example.com/auth/auth
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /auth/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$this->load->view('auth/register');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_petugas');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_petugas->cek_login("admin", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin"));
		} else {
			echo "Username dan password salah !";
		}
	}
}
