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
        $html_template = '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sample</title>
            </head>
            <body onload=""></body>
                <form action="" method="post">
                    <input type="text" value="{VALUE_NAME}" placeholder="Name" name="name" id="name">&nbsp;&nbsp;&nbsp;
                    <input type="text" value="{VALUE_SURNAME}" placeholder="Surname" name="surname" id="surname"><br><br>
                    <input type="submit" value="Greet">
                </form>
            </body>
        </html>';

        // echo $html_template;

        $input_name = (array_key_exists('name', $_POST)) ? $_POST['name'] : "";
        $input_surname = (array_key_exists('surname', $_POST)) ? $_POST['surname'] : "";

        $html_output = str_replace("{VALUE_NAME}", $input_name, $html_template);
        $html_output = str_replace("{VALUE_SURNAME}", $input_surname, $html_output);

        echo $html_output;
        
        print_r($_POST);
        $greeter_link = "/c/xampp/htdocs/BSCS4AB_PERT-CPM/controllers/sample.py?name=" . $input_name . "&surname=" . $input_surname;
        $greeter_data = file_get_contents($greeter_link);
        echo $greeter_link;
        echo "<br><br>" . $greeter_data;
    }
}