<?php
class m_masyarakat extends CI_Model
{
    public function get_pengaduan($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        return $this->db->get()->result_array();
    }
    
    public function get_pengaduan_pending($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        $this->db->where('status', 'Pending');
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_proses($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
        $this->db->where('status', 'Proses');
        return $this->db->get()->result_array();
    }

    public function get_pengaduan_selesai($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('nik', $nik);
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

    public function ubah_profile($data,$nik)
    {
        $this->db->where('nik', $nik);
        $this->db->update('masyarakat', $data);
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
}
