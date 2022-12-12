<?php
class Probability extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function compute()
    {
        if ($this->input->is_ajax_request()) {
            // $ajax_data = $this->input->post();
            $x = $this->input->post('x');
            $m = $this->input->post('m');
            $s = $this->input->post('s');

            $command = escapeshellcmd("python completion.py $x $m $s");
            $output = shell_exec($command);
            $p = round((float)$output*100)."%";     // convert decimal to percentage

            $data = array('response' => "success", 'p' => $p);  // return values
        } else {
            $data = array('response' => "failed");
        }
        echo json_encode($data);
    }
}
