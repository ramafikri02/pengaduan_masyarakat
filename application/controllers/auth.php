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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('login', ['email' => $email])->row_array();
		// jika user ditemukan
		if ($user) {
			// jika password benar
			if (password_verify($password, $user['password']))
			// simpan data ke session
			{
				$data = [
					'email' => $user['email'],
					'level' => $user['level']
				];
				$this->session->set_userdata($data);
				// redirect('user');
				// level manajemen login ( admin,petugas dan masyarakat)
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
			// jika email belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function m_register()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[15]|max_length[16]', [
			'required' => 'Mohon masukkan NIK!',
			'min_length' => 'NIK tidak boleh kurang dari 13 suku kata',
			'max_length' => 'NIK tidak boleh melibihi 13 suku kata'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Mohon masukkan nama lengkap anda!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[petugas.email]', [
			'required' => 'Mohon masukkan email anda!',
			'valid_email' => 'Mohon masukkan email yang tepat!',
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => 'Mohon masukkan kata sandi!',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
			'matches' => 'Kata sandi tidak cocok!'
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
			'required' => 'Mohon masukkan Nomor Telepon!',
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/m_register');
		} else {
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'date_created' => time()
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Mohon masukkan nama lengkap anda!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[petugas.email]', [
			'required' => 'Mohon masukkan email anda!',
			'valid_email' => 'Mohon masukkan email yang tepat!',
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'required' => 'Mohon masukkan kata sandi!',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
			'matches' => 'Kata sandi tidak cocok!'
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|trim|min_length[10]|max_length[13]', [
			'required' => 'Mohon masukkan Nomor Telepon!',
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);
		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/register');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp'),
				'level' => $this->input->post('level'),
				'date_created' => time()
			];

			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil keluar!</div>');
		redirect('auth');
	}
}
