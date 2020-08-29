<?php
class m_admin extends CI_Model
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

    // public function count_user() {
    //     $data = $this->db->get('login');
    //     return $data->num_rows();
    // }

    // public function count_pengaduan() {

    // }

    // public function count_kategori() {

    // }

    // =========================================================================

    public function tambah_kategori()
    {
        $data = [
            'kategori'       => $this->input->post('nama_kategori'),
            'tgl_ditambahkan'  => time(),
        ];

        $this->db->insert('kategori', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
    }

    public function edit_kategori()
    {
        $id = $this->input->post('id');
        $data = array(
            'kategori'       => $this->input->post('nama_kategori'),
        );

        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
    }

    public function hapus_kategori()
    {
        $id = $this->input->post('id');

        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');

        $this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show" role="alert"> Data Berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
    }
}
