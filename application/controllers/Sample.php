<?php
use gburtini\Distributions\Beta;
class Sample extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();       
    }

    public function index()
    {       
        $beta = new Beta(1, 2);
        $draw = $beta->rand();
        if($draw > 0.5) {
        echo "We drew a number bigger than 0.5 from a Beta(1,100).\n";
        }
        else{
        echo "shet";
        }
    }
}