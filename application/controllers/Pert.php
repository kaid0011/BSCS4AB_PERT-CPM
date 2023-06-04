<?php
class Pert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model');
    }

    public function index()
    {
        $temp['title'] = 'Project Evaluation Review Technique (PERT)';
        $this->load->view('template/header', $temp);
        $this->load->view('pert/pert_main');
        $this->load->view('template/footer'); 
    }

    public function proj_details()
    {
        $len = $this->input->post('proj_len');
        $unit = $this->input->post('unit');
        $arr = array(
            'proj_len' => $len,
            'unit' => $unit,
            'd' => 'none'   //FOR DEMO PURPOSES ONLY
        );
        $this->session->set_userdata($arr);
        redirect('pert/projectdetails');
    }

    public function demo()
    {
        //FOR DEMO PURPOSES ONLY
        $d = $this->uri->segment(3);
        if($d == 'demo1') {
            $proj_len = 15;
        }
        else if($d == 'demo2') {
            $proj_len = 4;
        }
        else if ($d == 'demo3') {
            $proj_len = 4;
        }

        $arr = array(
            'd' => $d,
            'proj_len' => $proj_len,
            'unit' => 'Days'
        );
        $this->session->set_userdata($arr);
        redirect('pert/projectdetails');
    }

    public function projectdetails()
    {
        if(!$this->session->userdata("proj_len"))
        {
            redirect("Home");            
        }
        else 
        {
            $temp['title'] = 'Project Evaluation Review Technique (PERT)';
            $this->load->view('template/header', $temp);
            $this->load->view('pert/pert_input');
            $this->load->view('template/footer');
        }
    }

    public function calculate()
    {
        $proj_len = $this->input->post('proj_len');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $proj_len; $i++) {
            $data[$i]['id'] = $this->input->post($i);
            $data[$i]['desc'] = $this->input->post('task_desc_' . $i);
            $data[$i]['opt'] = $this->input->post('task_opt_' . $i);
            $data[$i]['ml'] = $this->input->post('task_ml_' . $i);
            $data[$i]['pes'] = $this->input->post('task_pes_' . $i);
            $data[$i]['time'] = 0;
            $data[$i]['unit'] = $this->input->post('unit');     // Unit
            if ($this->input->post('task_prereq_' . $i) != '-') {
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));
            } else {
                $data[$i]['prereq'][] = -1;
            }
            $data[$i]['sd'] = 0;
            $data[$i]['v'] = 0;     // variance
            $data[$i]['es'] = 0;
            $data[$i]['ef'] = 0;
            $data[$i]['ls'] = 0;
            $data[$i]['lf'] = 0;
            $data[$i]['slack'] = 0;
            $data[$i]['isCritical'] = false;
            $data[$i]['pqty'] = $proj_len;
        }
        $this->time($data);
    }

    public function dbCalculate() //new
    {
        if($this->input->is_ajax_request()) {
            $ProjectID = explode(",", $this->input->post('ProjectID'));
            $TaskID = explode(",", $this->input->post('TaskID'));
            $TaskName = explode(",", $this->input->post('TaskName'));
            $TaskDesc = explode(",", $this->input->post('TaskDesc'));
            $Optimistic = explode(",", $this->input->post('Optimistic'));
            $MostLikely = explode(",", $this->input->post('MostLikely'));
            $Pessimistic = explode(",", $this->input->post('Pessimistic'));
            $PreRequisites = explode(",", $this->input->post('PreRequisites'));

            foreach($TaskID as $ti) {
                $data[$ti]['ProjectID'] = $ProjectID[$ti - 1];
                $data[$ti]['TaskID'] = $ti;
                $data[$ti]['TaskName'] = $TaskName[$ti - 1];
                $data[$ti]['TaskDesc'] = $TaskDesc[$ti - 1];
                $data[$ti]['Optimistic'] = $Optimistic[$ti - 1];
                $data[$ti]['MostLikely'] = $MostLikely[$ti - 1];
                $data[$ti]['Pessimistic'] = $Pessimistic[$ti - 1];
                $data[$ti]['Duration'] = 0;
                if($PreRequisites[$ti - 1] != '-') {
                    $data[$ti]['PreRequisites'] = explode(";", $PreRequisites[$ti - 1]);
                } else {
                    $data[$ti]['PreRequisites'][] = -1;
                }
                $data[$ti]['SD'] = 0;
                $data[$ti]['Variance'] = 0;
                $data[$ti]['ES'] = 0;
                $data[$ti]['EF'] = 0;
                $data[$ti]['LS'] = 0;
                $data[$ti]['LF'] = 0;
                $data[$ti]['Slack'] = 0;
                $data[$ti]['Critical'] = false;
                $data[$ti]['PriorityLvl'] = "Low";
                $data[$ti]['Type'] = "Parallel";
            }
        }       
        $this->time($data);
    }

    public function time($data)
    {
        foreach ($data as $time)
        {
            $tid = $time['TaskID'];
            $duration = ($time['Optimistic'] + (4 * $time['MostLikely']) + $time['Pessimistic']) / 6;              // compute task mean
            $data[$tid]['Duration'] = round($duration, 2);                                      // round mean to 2 decimal places
            $data[$tid]['SD'] = ($time['Pessimistic'] - $time['Optimistic']) / 6;                          // compute task standard deviation
            $data[$tid]['Variance'] = pow($data[$tid]['SD'], 2);                                   // compute task variance
        }
        $this->forward_pass($data);     // proceed to forward pass
    }

    public function forward_pass($data) //new - data array keys
    {
        /* 
            ---FORWARD PASS---
            EF = ES + T
            * If first task, EF = T

            ES = EF of prerequisite
            * If more than one prerequisite, get highest 
        */
        foreach ($data as $tasks) {
            $id = $tasks['TaskID'];
            if (in_array("-1", $tasks['PreRequisites'])) //check if first task
            {
                $data[$id]['ES'] = 0;   //ES = 0
                $data[$id]['EF'] = $tasks['Duration'];   //EF = duration
            } else {    //if not first task
                foreach ($tasks['PreRequisites'] as $prereq) {     // Loop through the prereq array of each task 
                    if ($prereq != '-1' and count($tasks['PreRequisites']) == 1) {     // If only 1 prereq
                        $data[$id]['ES'] = $data[$prereq]['EF'];                // ES = EF of prereq
                        $data[$id]['EF'] = $data[$id]['ES'] + $tasks['Duration'];   // EF = ES + Duration
                    } elseif ($prereq != '-1') {        // If multiple prereqs
                        if ($data[$prereq]['EF'] > $data[$id]['ES']) {      // if prereq's EF is greater than current task's ES
                            $data[$id]['ES'] = $data[$prereq]['EF'];        // ES = EF of prereq
                            $data[$id]['EF'] = $data[$id]['ES'] + $tasks['Duration'];   // EF = ES + duration
                        }
                    }
                }
            }
        }
        //$data['finish_time'] = max(array_column($data, 'EF'));  //project finish time = maximum EF  //new

        $this->backward_pass($data);    // proceed to backward pass
    }

    public function backward_pass($data) //new - data array keys
    {
        /*
            ---BACKWARD PASS---
            LF
            * If not a prerequisite of any task, LF = Project Finish Time
            * Otherwise, LS of successor
            ** If multiple successors, get lowest

            LS = LF - T
        */

        // reverse $data array
        $cnt = count($data); //new
        $rdata = array();
        $pre = array();
        for ($j = $cnt; $j >= 1; $j--) {
            $rdata[] = $data[$j];            // assign reversed $data array to $rdata
            $pre[] = $data[$j]['PreRequisites'];    // assign all prereqs to $pre associative array
        }
        $merged_pre = call_user_func_array('array_merge', $pre);    // merge $pre array to easily locate if a task is a prereq of any task

        foreach ($rdata as $rtasks) {
            $rid = $rtasks['TaskID'];
            if (in_array($rid, $merged_pre)) {
                $p = array_column($data, 'PreRequisites');
                $key = '';
                foreach ($p as $k => $v) {
                    if (in_array($rid, $v)) {
                        $key = $k;
                        if ($data[$rid]['LF'] == 0) {   // if LF not yet computed
                            $data[$rid]['LF'] = $data[$key + 1]['LS'];
                            // $data[$rid]['LS'] = $data[$rid]['LF'] - $rtasks['Duration'];
                            $data[$rid]['LS'] = bcsub($data[$rid]['LF'], $rtasks['Duration'], 2);
                        }
                        if ($data[$rid]['LF'] > $data[$key + 1]['LS']) {    // if current task's LF is greater than succesor's LS
                            $data[$rid]['LF'] = $data[$key + 1]['LS'];
                            // $data[$rid]['LS'] = $data[$rid]['LF'] - $rtasks['Duration'];
                            $data[$rid]['LS'] = bcsub($data[$rid]['LF'], $rtasks['Duration'], 2);
                        }
                    }
                }
            } else {     // if not a prereq of any task
                //$data[$rid]['LF'] = $data['finish_time'];
                $data[$rid]['LF'] = max(array_column($data, 'EF')); //new
                // $data[$rid]['LS'] = $data[$rid]['LF'] - $rtasks['Duration'];
                $data[$rid]['LS'] = bcsub($data[$rid]['LF'], $rtasks['Duration'], 2);
            }
            //compute slack and if critical task
            //$data[$rid]['Slack'] = $data[$rid]['LF'] - $data[$rid]['EF'];
            $data[$rid]['Slack'] = bcsub($data[$rid]['LF'], $data[$rid]['EF'], 2);
            if ($data[$rid]['Slack'] == 0) {
                $data[$rid]['Critical'] = true;
                $data[$rid]['PriorityLvl'] = "High"; //new
                $data[$rid]['Type'] = "Sequential"; //new
            }
        }
        //$this->show_result($data);  // proceed to show_result
        $this->returnResult($data); //new
    }

    public function returnResult($data) //new
    {
        //insert to db
        foreach ($data as $tasks) {
            $id = $tasks['TaskID'];
            $data[$id]['PreRequisites'] = implode(";", $tasks['PreRequisites']);
        }
        $ProjectID = $this->Projects_model->insertPERT($data);

        echo json_encode($ProjectID);
    }

    public function show_result($data)
    {
        $proj_var = 0;
        $data['qty'] = count($data);
        for ($j = 1; $j < $data['qty']; $j++) {
            $project[] = $data[$j];
            if ($data[$j]['isCritical'] == true)
            {
                $cp[] = $data[$j];
                $proj_var += $data[$j]['v'];    // add up variance of critical tasks to get project variance
            }
        }  
        $arr = array(
            'project' => $project,
            'cp' => $cp,
            'finish_time' => $data['finish_time'],
            'proj_variance' => $proj_var,
            'proj_sd' => sqrt($proj_var),    // project SD = square root of project variance
            'unit' => $data[1]['unit']
        );
        $this->session->set_userdata($arr);
        redirect('pert/results');
    }

    public function results()
    {
        if(!$this->session->userdata("project"))
        {
            redirect("Home");            
        }
        else 
        {
            $temp['title'] = 'Project Evaluation Review Technique (PERT)';
            $this->load->view('template/header', $temp);
            $this->load->view('pert/pert_output');
            $this->load->view('template/footer'); 
        }
    }
}
?>