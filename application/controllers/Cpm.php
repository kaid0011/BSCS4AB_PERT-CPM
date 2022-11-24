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
        $this->load->view('cpm', $data);
    }

    public function calculate()
    {
        $proj_len = $this->input->post('proj_len');

        // ASSIGNING VALUES TO ARRAY
        for ($i = 1; $i <= $proj_len; $i++) {
            $data[$i]['id'] = $this->input->post($i);
            $data[$i]['desc'] = $this->input->post('task_desc_' . $i);
            $data[$i]['time'] = $this->input->post('task_time_' . $i);
            if($this->input->post('task_prereq_' . $i) != '-')
            {
                $data[$i]['prereq'] = explode(",", $this->input->post('task_prereq_' . $i));
            }
            else
            {
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
        foreach ($data as $tasks) 
        {
            $id = $tasks['id'];
            if(in_array("-1", $tasks['prereq'])) //check if first task
            {
                $data[$id]['es'] = 0;
                $data[$id]['ef'] = $tasks['time'];
            }
            else
            {
                foreach($tasks['prereq'] as $prereq)
                {
                    if($prereq != '-1' and count($tasks['prereq']) == 1)
                    {
                        $data[$id]['es'] = $data[$prereq]['ef'];
                        $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];
                    }
                    elseif($prereq != '-1')
                    {
                        if($data[$prereq]['ef'] > $data[$id]['es'])
                        {
                            $data[$id]['es'] = $data[$prereq]['ef'];
                            $data[$id]['ef'] = $data[$id]['es'] + $tasks['time'];
                        }
                    }
                }
            }
        }
        //project finish time
        $data['finish_time'] = max(array_column($data, 'ef'));

        // $this->backward_pass($data);
        $this->show_result($data);
    }

    // public function backward_pass($data)
    // {
    //     // reverse $data array
    //     $cnt = count($data)-1;
    //     $rev_data = array();
    //     for($j = $cnt; $j >= 1; $j--)
    //     {
    //         $rev_data[] = $data[ .$j];
    //     }

    //     $index = -1;
    //     foreach($rev_data as $revtasks)
    //     {
    //         $rev_id = $revtasks['id'];
    //         $index++;
    //         if($index == 0) // check if last task
    //         {
    //             $data[ .$rev_id]['lf'] = $data[  . $rev_id]['ef'];
    //             $data[ .$rev_id]['ls'] = $data[  . $rev_id]['es'];
    //             $data[ .$rev_id]['isCritical'] = "yes";
    //         }

    //         $rprereq = $revtasks['prereq'];
    //         $rprereq_id = array_search($rprereq, array_column($data, 'desc')) + 1;
    //         if($rprereq != '-')
    //         {
    //             if($data[ .$rprereq_id]['lf'] == 0)
    //             {
    //                 $data[ .$rprereq_id]['lf'] = $data[ .$rev_id]['ls'];
    //                 $data[ .$rprereq_id]['ls'] = $data[ .$rprereq_id]['lf'] - $data[ .$rprereq_id]['time'];
    //                 $data[ .$rprereq_id]['float'] = $data[ .$rprereq_id]['lf'] - $data[ .$rprereq_id]['ef'];
    //                 if($data[ .$rprereq_id]['float'] == 0)
    //                 {
    //                     $data[ .$rprereq_id]['isCritical'] = "yes";
    //                 }
    //             }
    //         } 
    //     }

    //     // $this->isCritical($data);
    //     $this->show_result($data);
    // }

    public function show_result($data)
    {
        $data['qty'] = count($data);
        for($j=1; $j < $data['qty']; $j++)
        {
            $project[] = $data[$j];
        }
        $data['project'] = $project;

        $this->load->view('results', $data);
    }
}
