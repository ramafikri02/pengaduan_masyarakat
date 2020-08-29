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
}
