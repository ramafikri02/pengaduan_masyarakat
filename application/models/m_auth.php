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
}
