<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('dashboard/dashboard');
        $this->load->view('template/footer');
    }

    public function inputtasks()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('dashboard/inputtasks');
        $this->load->view('template/footer');
    }

    public function results()
    {
        $temp['title'] = 'WAPS with Simulation';
        $this->load->view('template/header', $temp);
        $this->load->view('dashboard/results');
        $this->load->view('template/footer');
    }

    public function insertProjDetails()
    {
        //sample only
        //INSERT PROJECT DETAILS TO DB
        if($this->input->is_ajax_request()) {
            $ProjectID = $this->input->post('ProjectID');
            $ProjectName = $this->input->post('ProjectName');
            $ProjectDesc = $this->input->post('ProjectDesc');
            $Unit = $this->input->post('Unit');
            $StartDate = $this->input->post('StartDate');
            $CompType = $this->input->post('CompType');
        }
        else {
            $ProjectName = "huh";
        }  
        
        //insert to db
        //check if projectid = 0
        //if 0, insert normally without projectid
        //else, update project
        //return project id

        if($ProjectID == 0) {
            $proj = array(
                'ProjectName' => $ProjectName,
                'ProjectDesc' => $ProjectDesc,
                'Unit' => $Unit,
                'StartDate' => $StartDate,
                'CompType' => $CompType
            );
            $NProjectID = $this->Projects_model->insertProject($proj);
        }
        else {
            $proj = array(
                'ProjectID' => $ProjectID,
                'ProjectName' => $ProjectName,
                'ProjectDesc' => $ProjectDesc,
                'Unit' => $Unit,
                'StartDate' => $StartDate,
                'CompType' => $CompType
            );
            $NProjectID = $this->Projects_model->updateProject($proj);
        }

        echo json_encode($NProjectID);
    }

    public function insertTaskDetails()
    {//remove later
        if($this->input->is_ajax_request()) {
            $TaskID = explode(",", $this->input->post('TaskID'));

            foreach($TaskID as $ti) {
                $data[$ti]['TaskID'] = $ti;
            }
        }

        print_r($data);
        exit;
    }

    public function getcpmResults()
    {
        if($this->input->is_ajax_request()) {
            $ProjectID = $this->input->post('ProjectID');
        }
        $data = $this->Projects_model->getcpmResults($ProjectID);

        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td>".$row->TaskID."</td>";
            echo "<td>".$row->TaskName."</td>";
            echo "<td>".$row->TaskDesc."</td>";
            echo "<td>".$row->Duration."</td>";
            $pre = $row->PreRequisites;
            if($pre == -1) {
                $pre = "-";
            }
            echo "<td>".$pre."</td>";
            echo "<td>".$row->ES."</td>";
            echo "<td>".$row->EF."</td>";
            echo "<td>".$row->LS."</td>";
            echo "<td>".$row->LF."</td>";
            echo "<td>".$row->Slack."</td>";
            $cri = $row->Critical;
            if($cri == 1) {
                $cri = "Yes";
            }
            else {
                $cri = "No";
            }
            echo "<td>".$cri."</td>";
            echo "<td>".$row->PriorityLvl."</td>";
            echo "<td>".$row->Type."</td>";
            echo "</tr>";
        }
    }
}
?>