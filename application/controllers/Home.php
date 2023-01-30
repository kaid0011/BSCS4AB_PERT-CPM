<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('length');
    }

    public function choose()
    {
        $data['choice'] = $this->input->post('choice');
        $data['proj_len'] = $this->input->post('proj_len');
        $data['unit'] = $this->input->post('unit');
        $this->load->view('projectdetails', $data);
    }
}