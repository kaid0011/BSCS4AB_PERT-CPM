<?php
class Policy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function privacypolicy()
    {
        $temp['title'] = 'Privacy Policy';
        $this->load->view('template/header', $temp);
        $this->load->view('policies/privacypolicy');
        $this->load->view('template/footer');
    }

    public function cookiepolicy()
    {
        $temp['title'] = 'Cookie Policy';
        $this->load->view('template/header', $temp);
        $this->load->view('policies/cookie');
        $this->load->view('template/footer');
    }

    public function termsandconditions()
    {
        $temp['title'] = 'Terms and Conditions';
        $this->load->view('template/header', $temp);
        $this->load->view('policies/tnc');
        $this->load->view('template/footer');
    }
}
?>