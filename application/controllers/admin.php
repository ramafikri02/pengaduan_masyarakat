<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->helper('url');
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

	public function index()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();

		//Dasboard
		$data['total_masyarakat'] = $this->m_admin->count_masyarakat();
		$data['total_petugas'] = $this->m_admin->count_petugas();
		$data['total_pengaduan'] = $this->m_admin->count_pengaduan();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/admin/footer');
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/admin/footer');
	}

	public function pengaduan()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['kategori'] = $this->m_admin->get_kategori();

		$data['pending'] = $this->m_admin->get_pengaduan_pending();
		$data['proses'] = $this->m_admin->get_pengaduan_proses();
		$data['selesai'] = $this->m_admin->get_pengaduan_selesai();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/pengaduan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function detail_pengaduan()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$id = $this->input->get('id');
		$data['detail'] = $this->m_admin->get_detail_pengaduan($id);

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/detail_pengaduan', $data);
		$this->load->view('templates/admin/footer');
	}

	public function masyarakat()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['masyarakat'] = $this->m_admin->get_data_masyarakat();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/masyarakat', $data);
		$this->load->view('templates/admin/footer');
	}

	public function petugas()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['petugas'] = $this->m_admin->get_data_petugas();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/petugas', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah_masyarakat()
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"User gagal di tambahkan</div>');
			$this->load->view('admin/masyarakat');
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"User berhasil di tambahkan</div>');
			redirect('admiin/masyarakat');
		}
	}

	public function tambah_petugas()
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"User gagal di tambahkan</div>');
			$this->load->view('admin/petugas');
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
			redirect('admin/masyarakat');
		}
	}

	public function kategori()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['admin'] = $this->db->get_where('petugas', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->m_admin->get_kategori();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah_kategori() {
		$this->m_admin->tambah_kategori();
		redirect('admin/kategori');
	}

	public function edit_kategori() {
		$this->m_admin->edit_kategori();
		redirect('admin/kategori');
	}

	public function hapus_kategori() {
		$this->m_admin->hapus_kategori();
		redirect('admin/kategori');
	}

	public function setujui_pengaduan() {
		$this->m_admin->setujui_pengaduan();
		redirect('admin/pengaduan');
	}
}
