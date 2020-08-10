<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('petugas', ['username' => $username])->row_array();
		$u_masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
		// jika user ditemukan
		if ($user) {
			// jika password benar
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'level' => $user['level']
				];
				$this->session->set_userdata($data);
				// redirect('user');
				if ($user['level'] == "admin") {
					redirect('admin');
				} elseif ($user['level'] == "petugas") {
					redirect('petugas');
				} else {
					redirect('masyarakat');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi yang anda masukkan salah!</div>');
				redirect('auth');
			}
		} else {
			// jika username belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Pengguna atau Kata Sandi yang anda masukkan salah!</div>');
			redirect('auth');
		}
	}

	public function m_register()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[15]|max_length[16]', [
			'min_length' => 'NIK tidak boleh kurang dari 13 suku kata',
			'max_length' => 'NIK tidak boleh melibihi 13 suku kata'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[16]', [
			'min_length' => 'Nama Pengguna anda terlalu pendek',
			'max_length' => 'Nama Pengguna tidak boleh melebihi 16 suku kata'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Kata Sandi terlalu pendek',
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/m_register');
		} else {
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp')
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[16]', [
			'min_length' => 'Nama Pengguna anda terlalu pendek',
			'max_length' => 'Nama Pengguna tidak boleh melebihi 16 suku kata'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Kata Sandi terlalu pendek',
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);
		$this->form_validation->set_rules('level', 'level', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/register');
		} else {
			$data = [
				'nama_petugas' => htmlspecialchars($this->input->post('name', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'level' => $this->input->post('level')
			];

			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil keluar!</div>');
		redirect('auth');
	}
}
