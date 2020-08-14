<?php
class m_data extends CI_Model
{
    public function data_user()
    {
        $data = $this->db->get('login');
        return $data->result();
    }

    public function count_user()
    {
        $data = $this->db->get('login');
        return $data->num_rows();
    }
}
