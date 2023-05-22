<?php
class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function simu()
    {
        $pqty = $this->input->post('pqty_1');

        for ($i = 1; $i <= $pqty; $i++) {
            $x = "Task $i,";
            $x .= $this->input->post('sv_' . $i);
            $sv[$i] = explode(",", $x);
        }
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Simulation Values.csv');
    
        foreach ($sv as $row) {
            echo implode(",", $row) . "\n";
        }
    }

    public function results()
    {
        //Export for PERT and Simulations
        $res = [];
        $qty = $this->input->post('len');

        for ($i = 0; $i <= $qty; $i++) {
            if ($i == 0) {
                $inp = "Activity//";
                $inp .= "Description//";
                $inp .= "Optimistic//";
                $inp .= "Most Likely//";
                $inp .= "Pessimistic//";
                $inp .= "Calculated Duration//";
                $inp .= "Pre-requisites//";
                $inp .= "ES//";
                $inp .= "EF//";
                $inp .= "LS//";
                $inp .= "LF//";
                $inp .= "Slack//";
                $inp .= "Critical//";
            } else {
                $inp = "$i//";
                $inp .= $this->input->post('desc_' . $i) . "//";
                $inp .= $this->input->post('opt_' . $i) . "//";
                $inp .= $this->input->post('ml_' . $i) . "//";
                $inp .= $this->input->post('pes_' . $i) . "//";
                $inp .= $this->input->post('time_' . $i) . "//";
                $inp .= $this->input->post('pre_' . $i) . "//";
                $inp .= $this->input->post('es_' . $i) . "//";
                $inp .= $this->input->post('ef_' . $i) . "//";
                $inp .= $this->input->post('ls_' . $i) . "//";
                $inp .= $this->input->post('lf_' . $i) . "//";
                $inp .= $this->input->post('slack_' . $i) . "//";
                $inp .= $this->input->post('ic_' . $i);
            }
            $res[$i] = explode("//", $inp);
        }
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=WAPS-Results.xls");

        foreach ($res as $row) {
            echo implode("\t", $row) . "\n";
        }
    }

    public function result()
    {
        //Export for CPM
        $res = [];
        $qty = $this->input->post('len');

        for ($i = 0; $i <= $qty; $i++) {
            if ($i == 0) {
                $inp = "Activity//";
                $inp .= "Description//";
                $inp .= "Estimated Duration//";
                $inp .= "Pre-requisites//";
                $inp .= "ES//";
                $inp .= "EF//";
                $inp .= "LS//";
                $inp .= "LF//";
                $inp .= "Slack//";
                $inp .= "Critical//";
            } else {
                $inp = "$i//";
                $inp .= $this->input->post('desc_' . $i) . "//";
                $inp .= $this->input->post('time_' . $i) . "//";
                $inp .= $this->input->post('pre_' . $i) . "//";
                $inp .= $this->input->post('es_' . $i) . "//";
                $inp .= $this->input->post('ef_' . $i) . "//";
                $inp .= $this->input->post('ls_' . $i) . "//";
                $inp .= $this->input->post('lf_' . $i) . "//";
                $inp .= $this->input->post('slack_' . $i) . "//";
                $inp .= $this->input->post('ic_' . $i);
            }
            $res[$i] = explode("//", $inp);
        }

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=WAPS-Results.xls");

        foreach ($res as $row) {
            echo implode("\t", $row) . "\n";
        }
    }
}
?>