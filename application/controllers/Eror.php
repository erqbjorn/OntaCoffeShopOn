<?php
class Error extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        $data['judul'] = '404 Page Not Found';
        $this->output->set_status_header('404');
        $this->load->view('errors/custom_404', $data); // Buat view custom untuk 404
    }
}
?>