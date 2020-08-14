<?php
class m_login extends CI_Model
{
    public function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('login', ['email' => $email])->row_array();
        // Nyari User
        if ($user) {
            // Ini kalo passwordnya bener
            if (password_verify($password, $user['password']))
            // ini gua gk tau apaan namanya
            {
                $data = [
                    'email' => $user['email'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                // nentuin dia nanti masuknya kemana berdasarkan level
                if ($user['level'] == "admin") {
                    redirect('admin/index');
                } elseif ($user['level'] == "petugas") {
                    redirect('petugas/index');
                } else {
                    redirect('masyarakat/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi yang anda masukkan salah!</div>');
                redirect('auth');
            }
        } else {
            // ini kalo email belum terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div>');
            redirect('auth');
        }
    }
}
