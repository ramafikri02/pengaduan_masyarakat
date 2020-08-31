<?php
class m_auth extends CI_Model
{
    public function register_m($data)
    {
        $this->db->insert('masyarakat', $data);
    }

    public function register_ap($data)
    {
        $this->db->insert('petugas', $data);
    }

    public function forgot_password($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('login', $data);
    }
}
