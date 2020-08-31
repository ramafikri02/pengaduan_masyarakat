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
			$this->_aksi_login();
		}
	}

	private function _aksi_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('login', ['email' => $email])->row_array();
		// Nyari User
		if ($user) {
			// Ini kalo passwordnya bener
			if (password_verify($password, $user['password']))
			// ini gua gk tau apaan namanya
			{
				$data = array(
					'status'       => 'Online',
				);

				$this->db->where('email', $user['email']);
				$this->db->update('login', $data);

				$data = [
					'email' => $user['email'],
					'level' => $user['level']
				];
				$this->session->set_userdata($data);
				// nentuin dia nanti masuknya kemana berdasarkan level
				if ($user['level'] == "Admin") {
					redirect('admin/index');
				} elseif ($user['level'] == "Petugas") {
					redirect('petugas/index');
				} else {
					redirect('masyarakat/index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi yang anda masukkan salah!</div>');
				redirect('auth/login');
			}
		} else {
			// ini kalo email belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div>');
			redirect('auth/login');
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
		$this->_aksi_logout();
	}

	private function _aksi_logout()
	{
		$user = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data = array(
			'status'       => 'Offline',
		);

		$this->db->where('email', $user['email']);
		$this->db->update('login', $data);

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Kamu berhasil keluar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
		redirect('auth/login');
	}
}
