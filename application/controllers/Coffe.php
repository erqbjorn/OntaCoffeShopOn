<?php

class Coffe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coffe_model');
        $this->load->library('upload');
    }

    public function index()
    {    
        $data['judul'] = 'RyxxBilliardShop';
        $data['Coffe'] = $this->Coffe_model->getAllCoffe();
        
        if($this->input->post('keyword')) {
            $data['Coffe'] = $this->Coffe_model->cariDataCoffe();
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

                $this->db->insert('Coffe', $data_insert);
                $this->session->set_flashdata('flash', 'ditambahkan');
                redirect('Coffe');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('Coffe/index', $data);
        $this->load->view('templates/footer');

    }

    public function ubah()
    {
        $id = $this->input->post('id');
        
        // Ambil data lama
        $old_data = $this->db->get_where('Coffe', ['id' => $id])->row_array();

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
                redirect('Coffe');
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
        $this->db->update('Coffe', $data);
        
        $this->session->set_flashdata('flash', 'diubah');
        redirect('Coffe');
    }

    public function hapus($id)
    {
        // Ambil data untuk hapus file
        $Coffe = $this->db->get_where('Coffe', ['id' => $id])->row_array();
        
        // Hapus file foto jika ada
        if ($Coffe['poto'] && file_exists('./assets/images/' . $Coffe['poto'])) {
            unlink('./assets/images/' . $Coffe['poto']);
        }

        $this->Coffe_model->hapusDataCoffe($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('Coffe');
    }
}