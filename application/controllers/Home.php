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
        if (!$this->session->flashdata('message')) {
            $this->session->sess_destroy();
        }      

        $count = $this->Projects_model->countCompType();

        if($count) {
            foreach($count as $c) {
                $temp[$c->CompType] = $c->count;
            }
        }

        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('home/homepage', $temp);
        $this->load->view('template/footer');
    }    
}
?>