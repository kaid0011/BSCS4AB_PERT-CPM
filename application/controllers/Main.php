<?php
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $this->session->sess_destroy();
        if(!$this->session->userdata('ReferenceNo'))
        {
            $length = 5;
            $ReferenceNo = substr(str_shuffle('0123456789'),1,$length);
            $this->session->set_userdata('ReferenceNo', $ReferenceNo);
            //refno = current date + project id
        }       

        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('main/main');
        $this->load->view('template/footer');
    }

    public function proj_info()
    {
        $len = $this->input->post('proj_len');
        $unit = $this->input->post('unit');
        $CompType = $this->input->post('CompType');

        if($this->session->userdata('ProjectID') == null) {
            $proj = array(
                'ProjectName' => $this->input->post('ProjectName'),
                'ProjectDesc' => $this->input->post('ProjectDesc'),
                'ProjectLen' => $len,
                'Unit' => $unit,
                'StartDate' => $this->input->post('StartDate'),
                'CompType' => $this->input->post('CompType'),
                'ReferenceNo' => $this->input->post('ReferenceNo'),
                'UserEmail' => ""
            );
            $ProjectID = $this->Projects_model->insertProject($proj);
        }
        else {
            $ProjectID = $_SESSION['ProjectID'];
            $proj = array(
                'ProjectName' => $this->input->post('ProjectName'),
                'ProjectDesc' => $this->input->post('ProjectDesc'),
                'ProjectLen' => $len,
                'Unit' => $unit,
                'StartDate' => $this->input->post('StartDate'),
                'CompType' => $this->input->post('CompType'),
                'ReferenceNo' => $this->input->post('ReferenceNo'),
                'UserEmail' => ""
            );
            $ProjectID = $this->Projects_model->updateProject($proj, $ProjectID);
        }
        

        $arr = array(
            'proj_len' => $len,
            'unit' => $unit,
            'ProjectID' => $ProjectID,
            'ReferenceNo' => $this->input->post('ReferenceNo'),
            'd' => 'none'   //FOR DEMO PURPOSES ONLY
        );
        $this->session->set_userdata($arr);

        switch($CompType)
        {
            case "CPM":
                redirect('cpm/projectdetails');
                break;
            case "PERT":
                redirect('pert/projectdetails');
                break;
            case "NORMAL":
                redirect('normal/projectdetails');
                break;
            case "TRIANGULAR":
                redirect('triangular/projectdetails');
                break;
            case "BETAPERT":
                redirect('betapert/projectdetails');
                break;
            default:
                redirect('home/homepage');
                break;
        }
    }

    public function addEmail()
    {
        $UserEmail = $this->input->post('UserEmail');
        $ReferenceNo = $this->input->post('ReferenceNo');

        //update projects db
        $this->Projects_model->addEmail($UserEmail, $ReferenceNo);

        // $this->session->unset_userdata('ReferenceNo');
        // $this->session->unset_userdata('ProjectID');

        $x = true;

        echo json_encode($x);
    }
}