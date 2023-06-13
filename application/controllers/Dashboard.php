<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
}
?>