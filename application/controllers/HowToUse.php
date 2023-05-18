<?php
class HowToUse extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cpm()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('howtouse/cpm');
        $this->load->view('template/footer');
    }

    public function pert()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('howtouse/pert');
        $this->load->view('template/footer');
    }

    public function normal()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('howtouse/normal');
        $this->load->view('template/footer');
    }

    public function triangular()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('howtouse/triangular');
        $this->load->view('template/footer');
    }

    public function betapert()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('howtouse/betapert');
        $this->load->view('template/footer');
    }
}
?>