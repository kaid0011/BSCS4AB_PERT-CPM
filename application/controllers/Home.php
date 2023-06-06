<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('home/homepage');
        $this->load->view('template/footer');
    }    
}
?>