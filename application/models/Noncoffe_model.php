<?php 

  /**
   * summary
   */
    class Noncoffe_model extends CI_model{
        public function getAllNoncoffe()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('Noncoffe')->result_array();
        
    }

        public function tambahDataNoncoffe()
        {
            $data =[
                "nama"=>$this->input->post('nama',true),
                "poto"=>$this->input->post('poto',true),
                "harga"=>$this->input->post('harga',true),
            ];
            $this->db->insert('Noncoffe', $data);
        }
        
        public function getNoncoffeById($id)
        {
            return $this->db->get_where('Noncoffe', ['id' =>$id])->row_array();
        }

        public function cariDataNoncoffe()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get('Noncoffe')->result_array();
        }
    

        
        public function ubahDataNoncoffe($id)
        {
            $data = [
                "nama" => $this->input->post('nama', true),                
                "poto" => $this->input->post('poto', true),                
                "harga" => $this->input->post('harga', true),

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('Noncoffe',$data);
        }
        
        public function hapusDataNoncoffe($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('Noncoffe');

        }
    }

