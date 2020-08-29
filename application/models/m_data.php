<?php
class m_data extends CI_Model
{
    public function get_kategori()
    {
        $data = $this->db->get('kategori');
        return $data->result();
    }

    public function get_data_pengaduan()
    {
        $data = $this->db->get('pengaduan');
        return $data->result();
    }

    public function get_data_masyarakat()
    {
        $data = $this->db->get('masyarakat');
        return $data->result();
    }

    public function get_data_petugas()
    {
        $data = $this->db->get('petugas');
        return $data->result();
    }
}
