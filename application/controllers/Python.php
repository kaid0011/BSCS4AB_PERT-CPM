<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $command = escapeshellcmd("python pythonfile.py");
        $res = shell_exec($command);
    }
}