<?php
class BetaPert extends CI_Controller
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
            $data[$i]['sd'] = 0;
            $data[$i]['es'] = 0;
            $data[$i]['ef'] = 0;
            $data[$i]['ls'] = 0;
            $data[$i]['lf'] = 0;
            $data[$i]['float'] = 0;
            $data[$i]['isCritical'] = "No";
        }
        $this->alphabeta($data);
    }

    public function alphabeta($data)
    {
        $r = mt_rand(0, 100) / 100;
        $alpha = 0;
        $beta = 0;
        $cdf = 0;

        foreach($data as $ab)
        {
            $id = $ab['id'];
            echo $id."<br>";
            $alpha = (4*$ab['ml'] + $ab['opt'] - 5*$ab['pes']) / ($ab['opt'] - $ab['pes']);
            $beta = (5*$ab['opt'] - $ab['pes'] - 4*$ab['ml']) / ($ab['opt'] - $ab['pes']);
            echo "Alpha: ".$alpha."<br>";
            echo "Beta: ".$beta."<br>";
            
            // $cdf = stats_cdf_beta($r, $alpha, $beta, 1);
        }
    }
}