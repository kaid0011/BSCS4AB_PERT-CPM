<?php
class Trial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('trial');
        $this->load->view('template/footer');
    }
}