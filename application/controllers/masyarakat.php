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

		return "default.jpg";
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['kategori'] = $this->m_masyarakat->get_kategori();

		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$nik = $masyarakat['nik'];
		$data['pengaduan'] = $this->m_masyarakat->get_data_pengaduan($nik);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function selesai()
	{
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->m_masyarakat->data_pengaduan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_m', $data);
		$this->load->view('masyarakat/selesai', $data);
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
		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$data = [
			'nik' 			 => $masyarakat['nik'],
			'kategori'       => $this->input->post('kategori'),
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'image' 		 => $this->_uploadImage(),
			'tgl_pengaduan'  => time(),
		];

		$this->m_masyarakat->tambah_pengaduan($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
		redirect('masyarakat/index');
	}

	public function ubah_pengaduan()
	{
		$id = $this->input->post('id');
		$data = array(
			'kategori'       => $this->input->post('kategori'),
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'image' 		 => $this->_uploadImage(),
		);
		$this->m_masyarakat->ubah_pengaduan($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}

	public function hapus_pengaduan()
	{
		$id = $this->input->post('id');
		$this->m_masyarakat->hapus_pengaduan($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}

	public function ubah_profile()
	{
		$nik = $this->input->post('nik');
		$this->m_masyarakat->ubah_profile($nik);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/profile');
	}
}
