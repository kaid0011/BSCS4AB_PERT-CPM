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
            'pagename' => 'HOME TOH',
        );
        $this->load->view('template/header');
        $this->load->view('home/homepage', $arr);
        $this->load->view('template/footer');
    }
}