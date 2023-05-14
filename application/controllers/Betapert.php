<?php
class Betapert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $temp['title'] = 'BETA-PERT Distribution';
        $this->load->view('template/header', $temp);
        $this->load->view('betapert/betapert_main');
        $this->load->view('template/footer');     
    }

    public function proj_details()
    {
        $len = $this->input->post('proj_len');
        $unit = $this->input->post('unit');
        $arr = array(
            'proj_len' => $len,
            'unit' => $unit
        );
        $this->session->set_userdata($arr);
        redirect('betapert/projectdetails');
    }

    public function projectdetails()
    {
        $temp['title'] = 'BETA-PERT Distribution';
        $this->load->view('template/header', $temp);
        $this->load->view('betapert/betapert_input');
        $this->load->view('template/footer');
    }

    public function calculate()
    {
        $proj_len = $this->input->post('proj_len');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $proj_len; $i++) {
            $data[$i]['id'] = $this->input->post($i);   // Task ID
            $data[$i]['desc'] = $this->input->post('task_desc_' . $i);  // Task Description
            $data[$i]['opt'] = $this->input->post('task_opt_' . $i);    // Optimistic 
            $data[$i]['ml'] = $this->input->post('task_ml_' . $i);  // Most Likely
            $data[$i]['pes'] = $this->input->post('task_pes_' . $i);    // Pessimistic
            $data[$i]['time'] = 0;  // Duration
            $data[$i]['unit'] = $this->input->post('unit');     // Unit
            if ($this->input->post('task_prereq_' . $i) != '-') {   // If not 1st task
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));    // Turn prereqs into array
            } else {    //If first task
                $data[$i]['prereq'][] = -1; // Turn prereq into array and replace with -1
            }
            $data[$i]['alpha'] = 0;
            $data[$i]['beta'] = 0;
            $data[$i]['mean'] = 0;
            $data[$i]['sd'] = 0;
            $data[$i]['es'] = 0;    // Earliest Start
            $data[$i]['ef'] = 0;    // Earliest Finish
            $data[$i]['ls'] = 0;    // Latest Start
            $data[$i]['lf'] = 0;    // Latest Finish
            $data[$i]['slack'] = 0; // slack
            $data[$i]['isCritical'] = "No"; // Critical task or not
            $data[$i]['N'] = $this->input->post('N');   // Number of trials
            $data[$i]['pqty'] = $proj_len;
        }
        $this->alphabeta($data);    // proceed to alphabeta function to compute task duration
    }

    public function alphabeta($data)
    {
        // Loop through each task to calculate task duration with beta distribution
        foreach($data as $ab)
        {
            $id = $ab['id'];    // task id
            $a = $ab['opt'];    // optimistic
            $m = $ab['ml'];     // most likely
            $b = $ab['pes'];    // pessimistic
            $pd = 'beta';       // type of probability distribution
            $N = $ab['N'];      // number of trials

            $data[$id]['alpha'] = (4 * $m + $b - 5 * $a) / ($b - $a);
            $data[$id]['beta'] = (5 * $b - $a - 4 * $m) / ($b - $a );
            $data[$id]['mean'] = ($a + (4 * $m) + $b) / 6;
            $data[$id]['sd'] = round((($b - $a) / 6), 2);

            $al = $data[$id]['alpha'];
            $be = $data[$id]['beta'];
            $me = $data[$id]['mean'];
            $sd = $data[$id]['sd'];
            $v = 0;

            // Pass values to python to compute task duration
            
            for($k = 1; $k <= $N; $k++)
            {
                //$command = escapeshellcmd("python pd.py $pd $a $m $b $N"); //change parameters to a, b, mean, sd
                $command = escapeshellcmd("python pd.py $pd $N $al $be $me $sd $v"); 
                $res = shell_exec($command);
                $f = floatval($res);
                $sim_arr[$id][] = $f; 
                $data[$id]['sim_val'][] = $f;          
            }
            $t = (array_sum($data[$id]['sim_val']) / count($data[$id]['sim_val']));

            $data[$id]['time'] = round($t-1, 2);     // assign task duration

        }
        $this->forward_pass($data); // proceed to forward pass
    }

    public function forward_pass($data)
    {
        /* 
            ---FORWARD PASS---
            EF = ES + T
            * If first task, EF = T

            ES = EF of prerequisite
            * If more than one prerequisite, get highest 
        */
        foreach ($data as $tasks) {
            $id = $tasks['id'];
            if (in_array("-1", $tasks['prereq'])) //check if first task
            {
                $data[$id]['es'] = 0;   //ES = 0
                $data[$id]['ef'] = $tasks['time'];      //EF = duration
            } else {    //if not first task
                foreach ($tasks['prereq'] as $prereq) {     // Loop through the prereq array of each task 
                    if ($prereq != '-1' and count($tasks['prereq']) == 1) {     // If only 1 prereq
                        $data[$id]['es'] = $data[$prereq]['ef'];                // ES = EF of prereq
                        $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];   // EF = ES + Duration
                    } elseif ($prereq != '-1') {    // If multiple prereqs
                        if ($data[$prereq]['ef'] > $data[$id]['es']) {      // if prereq's EF is greater than current task's ES
                            $data[$id]['es'] = $data[$prereq]['ef'];        // ES = EF of prereq
                            $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];   // EF = ES + duration
                        }
                    }
                }
            }
        }
        $data['finish_time'] = max(array_column($data, 'ef'));  //project finish time = maximum EF

        $this->backward_pass($data);    // proceed to backward pass
    }

    public function backward_pass($data)
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
        $cnt = count($data) - 1;
        $rdata = array();
        $pre = array();
        for ($j = $cnt; $j >= 1; $j--) {
            $rdata[] = $data[$j];           // assign reversed $data array to $rdata
            $pre[] = $data[$j]['prereq'];   // assign all prereqs to $pre associative array
        }
        $merged_pre = call_user_func_array('array_merge', $pre);    // merge $pre array to easily locate if a task is a prereq of any task

        foreach ($rdata as $rtasks) {
            $rid = $rtasks['id'];
            if (in_array($rid, $merged_pre)) {  // if current task is a prereq of any task
                $p = array_column($data, 'prereq');
                $key = '';
                foreach ($p as $k => $v) {
                    if (in_array($rid, $v)) {
                        $key = $k;
                        if ($data[$rid]['lf'] == 0) {   // if LF not yet computed
                            $data[$rid]['lf'] = $data[$key + 1]['ls'];
                            // $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
                            $data[$rid]['ls'] = bcsub($data[$rid]['lf'], $rtasks['time'], 2);
                        }
                        if ($data[$rid]['lf'] > $data[$key + 1]['ls']) {    // if current task's LF is greater than succesor's LS
                            $data[$rid]['lf'] = $data[$key + 1]['ls'];
                            // $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
                            $data[$rid]['ls'] = bcsub($data[$rid]['lf'], $rtasks['time'], 2);
                        }
                    }
                }
            } else {    // if not a prereq of any task
                $data[$rid]['lf'] = $data['finish_time'];
                // $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
                $data[$rid]['ls'] = bcsub($data[$rid]['lf'], $rtasks['time'], 2);
            }
            //compute slack and if critical task
            $data[$rid]['slack'] = $data[$rid]['lf'] - $data[$rid]['ef'];
            if ($data[$rid]['slack'] == 0) {
                $data[$rid]['isCritical'] = "Yes";
            }
        }
        $this->show_result($data);  // proceed to show_result
    }

    public function show_result($data)
    {
        $data['qty'] = count($data);
        for ($j = 1; $j < $data['qty']; $j++) {
            $project[] = $data[$j];
            if ($data[$j]['isCritical'] == "Yes")
            {
                $cp[] = $data[$j];
            }
        }

        $arr = array(
            'project' => $project,
            'cp' => $cp,
            'finish_time' => $data['finish_time'],
            'unit' => $data[1]['unit']
        );
        $this->session->set_userdata($arr);
        redirect('betapert/results');
    }

    public function results()
    {
        $temp['title'] = 'BETA-PERT Distribution';
        $this->load->view('template/header', $temp);
        $this->load->view('betapert/betapert_output');
        $this->load->view('template/footer'); 
    }
}



