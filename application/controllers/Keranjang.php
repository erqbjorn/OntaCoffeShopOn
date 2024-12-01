<?php
class Keranjang extends CI_Controller
{
     public function __construct()
     {
         parent::__construct();
         $this->load->model('Coffe_model');
         $this->load->model('Noncoffe_model');
         $this->load->model('Keranjang_model');
     }
 

     public function index()
     {
  
         // Ambil data dari tabel keranjang
         $data['keranjang'] = $this->db->get('keranjang')->result_array();
     
         // Kirim variabel ke view
         $data['judul'] = 'RyxxBilliardShop';
         $this->load->view('templates/header', $data);
         $this->load->view('keranjang/index', $data); // Pastikan view diakses dengan benar
         $this->load->view('templates/footer'); // Jika Anda memiliki footer
     }
     

     public function tambahkeranjangcoffe()
     {
         $data = [
             'id' => $this->input->post('id'),
             'nama' => $this->input->post('nama'),
             'harga' => $this->input->post('harga'),
             'jumlah' => $this->input->post('jumlah') ?? 1
         ];
     
         // Langsung insert tanpa pengecekan jumlah
         $this->db->insert('keranjang', $data);
     
         echo json_encode(['status' => 'success']);
     }

    public function tambahkeranjangNoncoffe()
{
    $data = [
        'id' => $this->input->post('id'),
        'nama' => $this->input->post('nama'),
        'harga' => $this->input->post('harga'),
        'jumlah' => $this->input->post('jumlah') ?? 1 // default jumlah 1
    ];

    // Insert data ke tabel 'keranjang'
    $this->db->insert('keranjang', $data);

    echo json_encode(['status' => 'success', 'message' => 'Data Noncoffe berhasil dimasukkan']);
}

public function tambahkeranjangchalk()
{
    $data = [
        'id' => $this->input->post('id'),
        'nama' => $this->input->post('nama'),
        'harga' => $this->input->post('harga'),
        'jumlah' => $this->input->post('jumlah') ?? 1 // default jumlah 1
    ];

    // Insert data ke tabel 'keranjang'
    $this->db->insert('keranjang', $data);

    echo json_encode(['status' => 'success', 'message' => 'Data chalk berhasil dimasukkan']);
}
    
public function hapus($id)
{
    $this->Keranjang_model->hapusDataKeranjang($id);
    $this->session->set_flashdata('flash','dihapus');
    redirect('keranjang');
}

public function hapus_semua()
{
    $this->session->unset_userdata('keranjang');
 $this->output->set_content_type('application/json')->set_output(json_encode(['success' => true]));
 redirect('keranjang');
}

    }



?>