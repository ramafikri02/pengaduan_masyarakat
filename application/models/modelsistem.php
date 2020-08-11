<?php
class modelsistem extends CI_Model
{
    public function simpan_db()
    {
        $config['upload_patch'] = './asessts/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '2048000';
        $config['file_name'] = url_title($this->input->post('gambar'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = $this->upload->data();

        $data = array(
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'level' => $this->input->post('level'),
            'image' => $this->input->post('status'),
            'date_created' => time()
        );

        $this->db->insert('petugas', $data);
        echo "Data berhasil di simpan";
    }
}
