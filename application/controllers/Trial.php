<?php
class Trial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('trial');
    }
}