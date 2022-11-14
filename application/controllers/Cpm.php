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
            $data['task_id_' . $i]['isCritical'] = False;
        }

        $this->forward_pass($data);
    }

    public function forward_pass($data)
    { 
        foreach ($data as $tasks) 
        {
            echo $tasks['id']."<br>";
            $id = $tasks['id'];
            if(in_array("-", $tasks)) //check if first task
            {
                echo 'yes'."<br>";
                $data['task_id_'.$id]['es'] = 0;
                $data['task_id_'.$id]['ef'] = $tasks['time'];
                echo "ES: ".$data['task_id_'.$id]['es']."<br>";//
                echo "EF: ".$data['task_id_'.$id]['ef']."<br>";//
            }
            else{   //if not first task
                echo "no"."<br>";//
                echo "Pre: ".$tasks['prereq']."<br>";
                $prereq = $tasks['prereq'];     //get prereq
                $prereq_id = array_search($prereq, array_column($data, 'name')) + 1;      //get prereq id
                echo "Pre ID: ".$prereq_id."<br>";
                $data['task_id_'.$id]['es'] = $data['task_id_' . $prereq_id]['ef'];
                $data['task_id_'.$id]['ef'] = $data['task_id_'.$id]['es'] + $tasks['time'];
                echo "ES: ".$data['task_id_'.$id]['es']."<br>";
                echo "EF: ".$data['task_id_'.$id]['ef']."<br>";
            }
        }
        //project finish time
        $data['finish_time'] = max(array_column($data, 'ef'));
        echo $data['finish_time'];

        // $this->backward_pass($data);
    }

    public function backward_pass($data)
    {

    }
}
