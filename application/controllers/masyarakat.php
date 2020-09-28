<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masyarakat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_masyarakat');
	}

	private function _uploadImage()
	{
		$this->load->helper('file');
		$config['upload_path'] 			= '.assets/img/pengaduan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'item-' . date('ymd');
		$config['overwrite']            = true;
		$config['max_size']             = 2048;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data('file_name');
		}
		print_r($this->upload->display_errors());
	}

	private function _editImagePengaduan()
	{
		$config['upload_path']          = './assets/img/pengaduan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5120;
		$config['max_width']            = '4480';
		$config['max_height']           = '4480';
		$config['file_name']            = 'image' . time();

		$this->upload->initialize($config);
		$id = $this->input->post('id');

		if (!empty('image' . time())) {
			if ($this->upload->do_upload('image')) {
				$old_image = $this->input->post('old_image');;
				if ($old_image != 'default.jpg') {
					unlink('assets/img/pengaduan/' . $old_image);
				}
				return $this->upload->data("file_name");
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Gambar gagal di Upload!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
				</button></div>');
				redirect('masyarakat/ubah_pengaduan?id=' . $id);
				print_r($this->upload->display_errors());
			}
		} else {
			$this->input->post('image');
		}
	}

	private function _editImageProfile()
	{
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5120;
		$config['max_width']            = '4480';
		$config['max_height']           = '4480';
		$config['file_name']            = 'image' . time();

		$this->upload->initialize($config);
		$id = $this->input->post('id');

		if (!empty('image' . time())) {
			if ($this->upload->do_upload('image')) {
				$old_image = $this->input->post('old_image');;
				if ($old_image != 'default.jpg') {
					unlink('assets/img/profile/' . $old_image);
				}
				return $this->upload->data("file_name");
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show" role="alert"> Gambar gagal di Upload!.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
				</button></div>');
				redirect('masyarakat/profile');
				print_r($this->upload->display_errors());
			}
		} else {
			$this->input->post('image');
		}
	}

	private function _deleteImagePengaduan()
	{
		$old_image = $this->input->post('old_image');;
		if ($old_image != 'default.jpg') {
			unlink('assets/img/pengaduan/' . $old_image);
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['masyarakat'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_pengaduan_pending($nik);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/pending', $data);
		$this->load->view('templates/footer');
	}

	public function data_pengaduan()
	{
		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_pengaduan_pending($nik);
	}

	public function proses()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['masyarakat'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_pengaduan_proses($nik);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/proses', $data);
		$this->load->view('templates/footer');
	}

	public function selesai()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['masyarakat'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_pengaduan_selesai($nik);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/selesai', $data);
		$this->load->view('templates/footer');
	}

	public function detail_pengaduan()
	{
		$id = $this->input->get('id');
		$data['detail'] = $this->m_masyarakat->get_detail_pengaduan($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_p', $data);
		$this->load->view('masyarakat/detail_pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['masyarakat'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/profile', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_pengaduan()
	{
		if ($this->m_masyarakat->validation("save")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->m_masyarakat->tambah_pengaduan(); // Panggil fungsi save() yang ada di SiswaModel.php

			// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
			$email = $this->session->userdata('email');
			$masyarakat = $this->m_masyarakat->get_nik($email);
			$nik = $masyarakat['nik'];
			$html = $this->load->view('masyarakat/view', array('pengaduan' => $this->m_masyarakat->get_pengaduan_pending($nik)), true);

			$callback = array(
				'status' => 'sukses',
				'pesan' => 'Data berhasil disimpan',
				'html' => $html
			);
		} else {
			$callback = array(
				'status' => 'gagal',
				'pesan' => validation_errors()
			);
		}

		echo json_encode($callback);
	}

	public function ubah_pengaduan()
	{
		$id = $this->input->get('id');
		$data['edit'] = $this->m_masyarakat->get_detail_pengaduan($id);

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_p', $data);
		$this->load->view('masyarakat/form-edit', $data);
		$this->load->view('templates/footer');
	}

	public function proses_ubah_pengaduan()
	{
		$id = $this->input->post('id');

		$data = array(
			'kategori'       => $this->input->post('kategori'),
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'image' 		 => $this->_editImagePengaduan(),
		);
		$this->m_masyarakat->ubah_pengaduan($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}

	public function hapus_pengaduan()
	{
		$id = $this->input->post('id');
		$this->_deleteImagePengaduan();

		$this->m_masyarakat->hapus_pengaduan($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}

	public function ubah_profile()
	{
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

		$data = array(
			'nama'      => $this->input->post('nama', TRUE),
			'email'     => $this->input->post('email', TRUE),
			'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'telp'      => $this->input->post('telp'),
			'image' 	=> $this->_editImageProfile(),
		);

		$nik = $this->input->post('nik');
		$this->m_masyarakat->ubah_profile($data, $nik);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/profile');
	}
}
