<?php
class m_masyarakat extends CI_Model
{
    public function get_data_pengaduan()
    {
        $data = $this->db->get('pengaduan');
        return $data->result();
    }

    public function tambah_pengaduan($data)
    {
        $this->db->insert('pengaduan', $data);
    }

    public function get_nik($email)
    {
        $this->db->select("nik");
        $this->db->from('masyarakat');
        $this->db->where('email', $email);
        return $this->db->get()->row_array();
    }

    public function ubah_pengaduan($data, $id)
    {
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

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }
}
