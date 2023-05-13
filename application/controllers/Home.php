<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr = array(
            'pagename' => 'WAPS with Simulation',
            'css' => 'homepage'
        );
        $this->session->set_userdata($arr);
        $this->load->view('template/header');
        $this->load->view('home/homepage');
        $this->load->view('template/footer');
    }
}