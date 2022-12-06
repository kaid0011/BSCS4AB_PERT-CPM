<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $this->load->view('length');
        $command = escapeshellcmd('python sample.py');
        $output = shell_exec($command);
        echo $output;

    }

    public function choose()
    {
        $data['choice'] = $this->input->post('choice');
        $data['proj_len'] = $this->input->post('proj_len');
        $this->load->view('projectdetails', $data);
    }
}