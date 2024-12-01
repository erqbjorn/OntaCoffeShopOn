<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

    public function tambahKeranjang($data) {
        return $this->db->insert('keranjang', $data); // Simpan data ke tabel keranjang
    }

    public function getAllKeranjang() {
        return $this->db->get('keranjang')->result_array(); // Ambil semua data keranjang
    }
    

    public function tambahnonCoffe($data) {
        return $this->db->insert('keranjang', $data);
    }
    
    public function tambahChalk($data) {
        return $this->db->insert('keranjang', $data);
    }

    public function hapusDataKeranjang($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('Keranjang');

        }
}
