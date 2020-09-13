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

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5120;
		$config['max_width']            = '4480';
		$config['max_height']           = '4480';
		$config['file_name']            = $_FILES['image']['name'];

		$this->upload->initialize($config);

		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				return $this->upload->data("file_name");
			} else {
				print_r($this->upload->display_errors());
			}
		} else {
			echo "Gambar gagal di upload";
		}
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
		$this->form_validation->set_rules('nik', 'Nik', 'required|min_length[15]|max_length[16]', [
			'required' => 'Mohon masukkan NIK!',
			'min_length' => 'NIK tidak boleh kurang dari 15 suku kata',
			'max_length' => 'NIK tidak boleh melibihi 16 suku kata'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Mohon masukkan nama lengkap anda!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[masyarakat.email]', [
			'required' => 'Mohon masukkan email anda!',
			'valid_email' => 'Mohon masukkan email yang tepat!',
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'required' => 'Mohon masukkan kata sandi!',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|min_length[3]|matches[password1]', [
			'matches' => 'Kata sandi tidak cocok!'
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|min_length[10]|max_length[13]', [
			'required' => 'Mohon masukkan Nomor Telepon!',
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/m_register');
		} else {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp', true),
				'image' => $this->_uploadImage(),
				'tgl_ditambahkan' => time()
			);

			$this->m_auth->register_m($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth/login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Mohon masukkan nama lengkap anda!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[petugas.email]', [
			'required' => 'Mohon masukkan email anda!',
			'valid_email' => 'Mohon masukkan email yang tepat!',
			'is_unique' => 'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'required' => 'Mohon masukkan kata sandi!',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|min_length[3]|matches[password1]', [
			'matches' => 'Kata sandi tidak cocok!'
		]);
		$this->form_validation->set_rules('telp', 'Telephone', 'required|min_length[10]|max_length[13]', [
			'required' => 'Mohon masukkan Nomor Telepon!',
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor tidak boleh melebihi 13 angka'
		]);
		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/register');
		} else {
			$data = array(
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telp' => $this->input->post('telp', true),
				'image' => $this->_uploadImage(),
				'level' => $this->input->post('level'),
				'tgl_ditambahkan' => time()
			);

			$this->m_auth->register_ap($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
			redirect('auth/login');
		}
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/forgot_password');
		} else {
			$this->_aksi_forgot_password();
		}
	}

	private function _aksi_forgot_password()
	{
		$email = $this->input->post('email');

		$user = $this->db->get_where('login', ['email' => $email])->row_array();
		// Nyari User
		if ($user) {
			$data = [
				'email' => $user['email']
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email anda Ditemukan!</div>');
			redirect('auth/set_forgot_password');
		} else {
			// ini kalo email belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda Tidak Ditemukan!</div>');
			redirect('auth/forgot_password');
		}
	}

	public function set_forgot_password()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'required' => 'Mohon masukkan kata sandi!',
			'min_length' => 'Kata Sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|min_length[3]|matches[password1]', [
			'matches' => 'Kata sandi tidak cocok!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/set_password');
		} else {
			$email = $this->session->userdata('email');
			$data = array(
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
			);

			$this->m_auth->forgot_password($email, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah. Silahkan Login :)</div>');
			redirect('auth/login');
		}
	}

	public function logout()
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
