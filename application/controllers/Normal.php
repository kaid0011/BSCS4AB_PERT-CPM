<?php
class Normal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require 'vendor/autoload.php';
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
            if ($this->input->post('task_prereq_' . $i) != '-') {
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));
            } else {
                $data[$i]['prereq'][] = -1;
            }
            // $data[$i]['sd'] = 0;
            $data[$i]['es'] = 0;
            $data[$i]['ef'] = 0;
            $data[$i]['ls'] = 0;
            $data[$i]['lf'] = 0;
            $data[$i]['float'] = 0;
            $data[$i]['isCritical'] = "No";
            $data[$i]['N'] = $this->input->post('N');
        }
        $this->alphabeta($data);
    }

    public function alphabeta($data)
    {
        foreach($data as $ab)
        {
            $id = $ab['id'];
            $a = $ab['opt'];
            $m = $ab['ml'];
            $b = $ab['pes'];
            $pd = 'normal';
            $N = $ab['N'];
            
            // echo $id."<br>";

            $command = escapeshellcmd("python pd.py $pd $a $m $b $N");
            $output = shell_exec($command);

            // echo $output."<br>";
            $data[$id]['time'] = round($output, 2);
            // echo "Time: ".$data[$id]['time']."<br>";
        }
        $this->forward_pass($data);
    }

    public function forward_pass($data)
    {
        foreach ($data as $tasks) {
            $id = $tasks['id'];
            if (in_array("-1", $tasks['prereq'])) //check if first task
            {
                $data[$id]['es'] = 0;
                $data[$id]['ef'] = $tasks['time'];
            } else {
                foreach ($tasks['prereq'] as $prereq) {
                    if ($prereq != '-1' and count($tasks['prereq']) == 1) {
                        $data[$id]['es'] = $data[$prereq]['ef'];
                        $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];
                    } elseif ($prereq != '-1') {
                        if ($data[$prereq]['ef'] > $data[$id]['es']) {
                            $data[$id]['es'] = $data[$prereq]['ef'];
                            $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];
                        }
                    }
                }
            }
        }
        $data['finish_time'] = max(array_column($data, 'ef'));  //project finish time

        $this->backward_pass($data);
    }

    public function backward_pass($data)
    {
        // reverse $data array
        $cnt = count($data) - 1;
        $rdata = array();
        $pre = array();
        for ($j = $cnt; $j >= 1; $j--) {
            $rdata[] = $data[$j];
            $pre[] = $data[$j]['prereq'];
        }
        $merged_pre = call_user_func_array('array_merge', $pre);

        foreach ($rdata as $rtasks) {
            $rid = $rtasks['id'];
            if (in_array($rid, $merged_pre)) {
                $p = array_column($data, 'prereq');
                $key = '';
                foreach ($p as $k => $v) {
                    if (in_array($rid, $v)) {
                        $key = $k;
                        if ($data[$rid]['lf'] == 0) {
                            $data[$rid]['lf'] = $data[$key + 1]['ls'];
                            $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
                        }
                        if ($data[$rid]['lf'] > $data[$key + 1]['ls']) {
                            $data[$rid]['lf'] = $data[$key + 1]['ls'];
                            $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
                        }
                    }
                }
            } else {
                $data[$rid]['lf'] = $data['finish_time'];
                $data[$rid]['ls'] = $data[$rid]['lf'] - $rtasks['time'];
            }
            //compute float and if critical task
            $data[$rid]['float'] = $data[$rid]['lf'] - $data[$rid]['ef'];
            if ($data[$rid]['float'] == 0) {
                $data[$rid]['isCritical'] = "Yes";
            }
        }
        // var_dump($data);
        flush();
        print_r($data);
        $this->show_result($data);
    }

    public function show_result($data)
    {
        $data['qty'] = count($data);
        for ($j = 1; $j < $data['qty']; $j++) {
            $project[] = $data[$j];
        }
        $data['project'] = $project;

        // var_dump($data);

        $this->load->view('normal_results', $data);
    }
}