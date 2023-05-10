<?php
class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function simu()
    {
        $output = '';

        $pqty = $this->input->post('pqty_1');
        $n = $this->input->post('N_1');

        for ($i = 1; $i <= $pqty; $i++) {
            $x = "Task $i,";
            $x .= $this->input->post('sv_' . $i);
            $sv[$i] = explode(",", $x);
        }
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=Simulation Values.csv');
        $output = fopen("php://output", "w");
        foreach ($sv as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function results()
    {
        //Export for PERT and Simulations
        $output = '';
        $res = [];
        $qty = $this->input->post('len');

        $h = array('Activity','Description','Optimistic','Most Likely','Pessimistic','Estimated Duration','Pre-requisites','ES','EF','LS','LF','Slack','Critical');

        for ($i = 1; $i <= $qty; $i++)
        {
            $inp = "$i,";
            $inp .= $this->input->post('desc_' . $i).",";
            $inp .= $this->input->post('opt_' . $i).",";
            $inp .= $this->input->post('ml_' . $i).",";
            $inp .= $this->input->post('pes_' . $i).",";
            $inp .= $this->input->post('time_' . $i).",";
            $inp .= $this->input->post('pre_' . $i).",";
            $inp .= $this->input->post('es_' . $i).",";
            $inp .= $this->input->post('ef_' . $i).",";
            $inp .= $this->input->post('ls_' . $i).",";
            $inp .= $this->input->post('lf_' . $i).",";
            $inp .= $this->input->post('slack_' . $i).",";
            $inp .= $this->input->post('ic_' . $i);      
            $res[$i] = explode(",", $inp);
        }
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=WAPS Results.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, $h);
        foreach ($res as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function result()
    {
        //Export for CPM
        $output = '';
        $res = [];
        $qty = $this->input->post('len');

        $h = array('Activity','Description','Estimated Duration','Pre-requisites','ES','EF','LS','LF','Slack','Critical');

        for ($i = 1; $i <= $qty; $i++)
        {
            $inp = "$i,";
            $inp .= $this->input->post('desc_' . $i).",";
            $inp .= $this->input->post('time_' . $i).",";
            $inp .= $this->input->post('pre_' . $i).",";
            $inp .= $this->input->post('es_' . $i).",";
            $inp .= $this->input->post('ef_' . $i).",";
            $inp .= $this->input->post('ls_' . $i).",";
            $inp .= $this->input->post('lf_' . $i).",";
            $inp .= $this->input->post('slack_' . $i).",";
            $inp .= $this->input->post('ic_' . $i);      
            $res[$i] = explode(",", $inp);
        }
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=WAPS Results.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, $h);
        foreach ($res as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
}
