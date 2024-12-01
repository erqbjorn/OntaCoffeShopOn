<?php 

  /**
   * summary
   */
    class Coffe_model extends CI_model{
        public function getAllCoffe()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('Coffe')->result_array();
        
    }

        public function tambahDataCoffe()
        {
            $data =[
                "nama"=>$this->input->post('nama',true),
                "poto"=>$this->input->post('poto',true),
                "harga"=>$this->input->post('harga',true),
            ];
            $this->db->insert('Coffe', $data);
        }
        
        public function getCoffeById($id)
        {
            return $this->db->get_where('Coffe', ['id' =>$id])->row_array();
        }

        public function cariDataCoffe()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get('Coffe')->result_array();
        }
    

        
        public function ubahDataCoffe($id)
        {
            $data = [
                "nama" => $this->input->post('nama', true),                
                "poto" => $this->input->post('poto', true),                
                "harga" => $this->input->post('harga', true),

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('Coffe',$data);
        }
        
        public function hapusDataCoffe($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('Coffe');

        }
    }

