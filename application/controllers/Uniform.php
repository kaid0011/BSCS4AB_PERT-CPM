<?php
class Uniform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function calculate()
    {
        $proj_len = $this->input->post('proj_len');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $proj_len; $i++) {
            $data[$i]['id'] = $this->input->post($i);
            $data[$i]['desc'] = $this->input->post('task_desc_' . $i);
            $data[$i]['min'] = $this->input->post('task_min_' . $i);
            $data[$i]['max'] = $this->input->post('task_max_' . $i);
            $data[$i]['time'] = 0;
            if ($this->input->post('task_prereq_' . $i) != '-') {
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));
            } else {
                $data[$i]['prereq'][] = -1;
            }
            $data[$i]['sd'] = 0;
            $data[$i]['es'] = 0;
            $data[$i]['ef'] = 0;
            $data[$i]['ls'] = 0;
            $data[$i]['lf'] = 0;
            $data[$i]['float'] = 0;
            $data[$i]['isCritical'] = "No";
        }
        $this->time($data);
    }

    public function time($data)
    {
        foreach ($data as $time)
        {
            $r = mt_rand(1, 10)/10;
            echo $r."<br>";
            $tid = $time['id'];
            $data[$tid]['time'] = $time['min'] + ($time['max'] - $time['min']) * $r;
            echo "Time: ".$data[$tid]['time']."<br>";
        }
        // $this->forward_pass($data);
        exit;
    }
}