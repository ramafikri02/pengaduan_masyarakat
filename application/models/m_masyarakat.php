<?php
class m_masyarakat extends CI_Model
{
    private function _uploadImage()
    {
        $this->load->helper('file');
        $config['upload_path']             = './assets/img/pengaduan/';
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

    private function _editImagePengaduan()
	{
		$config['upload_path']          = './assets/img/pengaduan/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5120;
		$config['max_width']            = '4480';
		$config['max_height']           = '4480';
		$config['file_name']            = 'item-' . date('ymd');

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
				print_r($this->upload->display_errors());
			}
		} else {
			$this->input->post('image');
		}
	}

    public function get_nik($email)
    {
        $this->db->select("nik");
        $this->db->from('masyarakat');
        $this->db->where('email', $email);
        return $this->db->get()->row_array();
    }

    public function get_pengaduan($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_pending($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        $this->db->where('status', 'Pending');
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_proses($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        $this->db->where('status', 'Proses');
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_selesai($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        $this->db->where('status', 'Selesai');
        return $this->db->get()->result_array();
    }

    public function get_detail_pengaduan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }

    public function get_kategori()
    {
        $data = $this->db->get('kategori');
        return $data->result();
    }

    public function validation($mode)
    {
        $this->load->library('form_validation');

        if ($mode == "save")
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul_laporan', 'Judul Laporan', 'required');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');

        if ($this->form_validation->run())
            return true;
        else
            return false;
    }

    public function tambah_pengaduan()
    {
        $email = $this->session->userdata('email');
        $masyarakat = $this->m_masyarakat->get_nik($email);
        $data = [
            'nik'            => $masyarakat['nik'],
            'kategori'       => $this->input->post('kategori'),
            'judul_laporan'  => $this->input->post('judul_laporan'),
            'isi_laporan'    => $this->input->post('isi_laporan'),
            'image'          => $this->_uploadImage(),
            'tgl_pengaduan'  => time(),
        ];
        $this->db->insert('pengaduan', $data);
    }

    public function ubah_pengaduan($id)
    {
        $data = array(
			'kategori'       => $this->input->post('kategori'),
			'judul_laporan'  => $this->input->post('judul_laporan'),
			'isi_laporan'    => $this->input->post('isi_laporan'),
			'image' 		 => $this->_uploadImage(),
		);
        
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }

    public function hapus_pengaduan($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');
    }

    public function view()
    {
        return $this->db->get('pengaduan')->result();
    }

    public function ubah_profile($data, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('masyarakat', $data);
    }
}
