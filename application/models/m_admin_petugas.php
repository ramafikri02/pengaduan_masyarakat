<?php
class m_admin_petugas extends CI_Model
{
    public function register_ap()
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

        $config['upload_patch'] = './asessts/img/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file_name'] = url_title($this->input->post('gambar'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = $this->upload->data();

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'telp' => $this->input->post('telp'),
                'level' => $this->input->post('level'),
                'date_created' => time()
            );

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di tambahkan</div>');
            redirect('auth');
        }
    }
}
