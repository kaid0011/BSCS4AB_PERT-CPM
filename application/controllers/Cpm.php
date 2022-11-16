<?php
class Cpm extends CI_Controller
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('length');
    }

    public function proj_len()
    {
        $data['proj_len'] = $this->input->post('proj_len');
        // echo $data['proj_len'];
        $this->load->view('cpm', $data);
    }

    public function calculate()
    {
        $proj_len = $this->input->post('proj_len');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $proj_len; $i++) {
            // echo $this->input->post('task_name_'.$i);
            $data['task_id_' . $i]['id'] = $this->input->post('task_id_' . $i);
            $data['task_id_' . $i]['name'] = $this->input->post('task_name_' . $i);
            $data['task_id_' . $i]['time'] = $this->input->post('task_time_' . $i);
            $data['task_id_' . $i]['prereq'] = $this->input->post('task_prereq_' . $i); // multiple prereqs to be added later
            $data['task_id_' . $i]['es'] = 0;
            $data['task_id_' . $i]['ef'] = 0;
            $data['task_id_' . $i]['ls'] = 0;
            $data['task_id_' . $i]['lf'] = 0;
            $data['task_id_' . $i]['float'] = 0;
            $data['task_id_' . $i]['isCritical'] = "no";
        }

        $this->forward_pass($data);
    }

    public function forward_pass($data)
    { 
        foreach ($data as $tasks) 
        {
            $id = $tasks['id'];
            if(in_array("-", $tasks)) //check if first task
            {
                $data['task_id_'.$id]['es'] = 0;
                $data['task_id_'.$id]['ef'] = $tasks['time'];
            }
            else{   //if not first task
                $prereq = $tasks['prereq'];     //get prereq
                $prereq_id = array_search($prereq, array_column($data, 'name')) + 1;      //get prereq id
                $data['task_id_'.$id]['es'] = $data['task_id_' . $prereq_id]['ef'];
                $data['task_id_'.$id]['ef'] = $data['task_id_'.$id]['es'] + $tasks['time'];
            }
        }
        //project finish time
        $data['finish_time'] = max(array_column($data, 'ef'));

        $this->backward_pass($data);
    }

    public function backward_pass($data)
    {
        // reverse $data array
        $cnt = count($data)-1;
        $rev_data = array();
        for($j = $cnt; $j >= 1; $j--)
        {
            $rev_data[] = $data['task_id_'.$j];
        }

        $index = -1;
        foreach($rev_data as $revtasks)
        {
            $rev_id = $revtasks['id'];
            $index++;
            if($index == 0) // check if last task
            {
                $data['task_id_'.$rev_id]['lf'] = $data['task_id_' . $rev_id]['ef'];
                $data['task_id_'.$rev_id]['ls'] = $data['task_id_' . $rev_id]['es'];
                $data['task_id_'.$rev_id]['isCritical'] = "yes";
            }

            $rprereq = $revtasks['prereq'];
            $rprereq_id = array_search($rprereq, array_column($data, 'name')) + 1;
            if($rprereq != '-')
            {
                if($data['task_id_'.$rprereq_id]['lf'] == 0)
                {
                    $data['task_id_'.$rprereq_id]['lf'] = $data['task_id_'.$rev_id]['ls'];
                    $data['task_id_'.$rprereq_id]['ls'] = $data['task_id_'.$rprereq_id]['lf'] - $data['task_id_'.$rprereq_id]['time'];
                    $data['task_id_'.$rprereq_id]['float'] = $data['task_id_'.$rprereq_id]['lf'] - $data['task_id_'.$rprereq_id]['ef'];
                    if($data['task_id_'.$rprereq_id]['float'] == 0)
                    {
                        $data['task_id_'.$rprereq_id]['isCritical'] = "yes";
                    }
                }
            } 
        }

        // $this->isCritical($data);
        $this->show_result($data);
    }

    public function show_result($data)
    {
        $data['qty'] = count($data);
        $this->load->view('results', $data);
    }
}
