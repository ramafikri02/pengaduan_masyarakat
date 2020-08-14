<?php
class m_logout extends CI_Model
{
    public function aksi_logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil keluar!</div>');
        redirect('auth');
    }
}
