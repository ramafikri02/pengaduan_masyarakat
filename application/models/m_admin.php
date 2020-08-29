<?php
class m_admin extends CI_Model
{
    public function tambah_kategori()
    {
        $data = [
            'nama_kategori'       => $this->input->post('nama_kategori'),
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
            'nama_kategori'       => $this->input->post('nama_kategori'),
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
