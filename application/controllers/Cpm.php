<?php
class Cpm extends CI_Controller
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function calculate()
    {
        $data['qty'] = $this->input->post('proj_len');
        $data['choice'] = $this->input->post('choice');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $data['qty']; $i++) {
            $data[$i]['id'] = $this->input->post($i);
            $data[$i]['desc'] = $this->input->post('task_desc_' . $i);
            $data[$i]['time'] = $this->input->post('task_time_' . $i);
            if ($this->input->post('task_prereq_' . $i) != '-') {
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));
            } else {
                $data[$i]['prereq'][] = -1;
            }
            $data[$i]['es'] = 0;
            $data[$i]['ef'] = 0;
            $data[$i]['ls'] = 0;
            $data[$i]['lf'] = 0;
            $data[$i]['float'] = 0;
            $data[$i]['isCritical'] = "No";
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
        $this->show_result($data);
    }

    public function show_result($data)
    {
        for ($j = 1; $j < $data['qty']; $j++) {
            $project[] = $data[$j];
        }
        $data['project'] = $project;

        $this->load->view('cpm_results', $data);
    }
}
