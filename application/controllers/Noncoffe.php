<?php

class Noncoffe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Noncoffe_model');
        $this->load->library('upload');
    }

    public function index()
    {    
        $data['judul'] = 'RyxxBilliardShop';
        $data['Noncoffe'] = $this->Noncoffe_model->getAllNoncoffe();
        
        if($this->input->post('keyword')) {
            $data['Noncoffe'] = $this->Noncoffe_model->cariDataNoncoffe();
        }

        // Jika ada post data
        if($this->input->post()) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('poto')) {
                $upload_data = $this->upload->data();
                
                $data_insert = [
                    'nama' => $this->input->post('nama'),
                    'poto' => $upload_data['file_name'],
                    'harga' => $this->input->post('harga')
                ];

                $this->db->insert('Noncoffe', $data_insert);
                $this->session->set_flashdata('flash', 'ditambahkan');
                redirect('Noncoffe');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('Noncoffe/index', $data);
        $this->load->view('templates/footer');

    }

    public function ubah()
    {
        $id = $this->input->post('id');
        
        // Ambil data lama
        $old_data = $this->db->get_where('Noncoffe', ['id' => $id])->row_array();

        // Konfigurasi upload
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        // Jika ada file yang diupload
        if (!empty($_FILES['poto']['name'])) {
            if ($this->upload->do_upload('poto')) {
                // Hapus file lama jika ada
                if ($old_data['poto'] && file_exists('./assets/images/' . $old_data['poto'])) {
                    unlink('./assets/images/' . $old_data['poto']);
                }

                $new_foto = $this->upload->data('file_name');
                
                $data = [
                    'nama' => $this->input->post('nama'),
                    'poto' => $new_foto,
                    'harga' => $this->input->post('harga')
                ];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Noncoffe');
            }
        } else {
            // Jika tidak ada file baru yang diupload
            $data = [
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga')
            ];
        }

        // Update data
        $this->db->where('id', $id);
        $this->db->update('Noncoffe', $data);
        
        $this->session->set_flashdata('flash', 'diubah');
        redirect('noncoffe');
    }

    public function hapus($id)
    {
        // Ambil data untuk hapus file
        $Noncoffe = $this->db->get_where('Noncoffe', ['id' => $id])->row_array();
        
        // Hapus file foto jika ada
        if ($Noncoffe['poto'] && file_exists('./assets/images/' . $Noncoffe['poto'])) {
            unlink('./assets/images/' . $Noncoffe['poto']);
        }

        $this->Noncoffe_model->hapusDataNoncoffe($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('Noncoffe');
    }
}