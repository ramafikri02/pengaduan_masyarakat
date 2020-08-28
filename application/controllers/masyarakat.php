<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masyarakat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url');
		$this->load->model('m_masyarakat');
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/pengaduan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']         = TRUE;
		$config['max_size']             = 2048;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("encrypt_name");
		}
		print_r($this->upload->display_errors());

		return "default.jpg";
	}

	public function index()
	{
		$data['title'] = 'Pengaduan';
		$data['user'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();

		$nik = $this->session->userdata('nik');
		$data['pengaduan'] = $this->m_masyarakat->get_data_pengaduan($nik);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/pengaduan', $data);
		$this->load->view('templates/footer');
	}

	public function selesai()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('masyarakat', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pengaduan'] = $this->m_masyarakat->data_pengaduan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/selesai', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['date_created'] = $this->db->get_where('login', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar/sidebar_m', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('masyarakat/profile', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$email = $this->session->userdata('email');
		$masyarakat = $this->m_masyarakat->get_nik($email);
		$data = [
			'nik' 			 => $masyarakat['nik'],
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'tgl_kejadian'   => $this->input->post('tgl_kejadian'),
			'image' 		 => $this->_uploadImage(),
			'tgl_pengaduan'  => time(),
		];

		$this->m_masyarakat->tambah_pengaduan($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
		redirect('masyarakat/index');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$data = array(
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'tgl_kejadian'   => $this->input->post('tgl_kejadian'),
			'image' 		 => $this->_uploadImage(),
		);
		$this->m_masyarakat->ubah_pengaduan($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$this->m_masyarakat->hapus_pengaduan($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
		redirect('masyarakat/index');
	}
}
