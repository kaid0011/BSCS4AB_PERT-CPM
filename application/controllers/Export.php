<?php
class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $output = '';
        if(isset($_POST["export"]))
        {
            $pqty = $this->input->post('pqty_1');
            $n = $this->input->post('N_1');

            for($i = 1; $i <= $pqty; $i++)
            {
                $x = "Task $i,";
                $x .= $this->input->post('sv_'.$i);
                $sv[$i] = explode(",", $x);
            }

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=sampleeeee.csv');
            $output = fopen("php://output", "w");
            foreach($sv as $row)
            {
                fputcsv($output, $row);
            }
            fclose($output);
        }
    }
}