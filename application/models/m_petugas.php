<?php
class m_petugas extends CI_Model
{
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

    public function get_id($email)
    {
        $this->db->select("id_petugas");
        $this->db->from('petugas');
        $this->db->where('email', $email);
        return $this->db->get()->row_array();
    }
    
    public function get_pengaduan_proses()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('status', 'Proses');
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_selesai()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
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

    public function tambah_tanggapan($data)
    {
        $this->db->insert('tanggapan', $data);
    }

    public function get_tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }
    
    public function _ubah_profile($id)
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
			'image' 	=> $this->_uploadImage(),
        );
        
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }
}
