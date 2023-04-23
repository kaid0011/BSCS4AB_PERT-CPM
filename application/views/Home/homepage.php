<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="headfoots.css">
  <link rel="stylesheet" href="homes.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>

<body>

    <header>
        <!-- Navigation Bar -->

        <div class="navi">
            <a href="<?=base_url()?>" style="align-self:left;"><img src="assets/images/logo.svg" height="40px" width="40px"></a>
            <ul>
                <li><a href="/PERT/PERTMain.html">PERT</a></li>
                <li><a href="<?=base_url('cpm')?>">CPM</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">SIMULATIONS <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="/NORMAL/NormalMain.html">Normal Distribution</a>
                        <a href="/TRIANGLE/TriangleMain.html">Traingular Distribution</a>
                        <a href="/BETA-PERT/BETAPERTMain.html">BETA - PERT Distribution</a>
                    </div>
                </li>
            </ul>
        </div>

    </header>

    <!-- Body  -->

    <body>
        <div class="firstpg">
            <div class="title">
                <b> STANDARD </b>
            </div>
            <div class="paragone">
                Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
                feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
                exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
                <br><br>
                Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
                vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
                adversarium, dicam appetere necessitatibus sed ut.
            </div>
        </div>

        <div class="container">
            <div class="box">
                <h3>PERT</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="/PERT/PERTMain.html">USE PERT</a>
                    </div>
                </center>
            </div>

            <div class="box">
                <h3>CPM</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?=base_url('cpm')?>">USE CPM</a>
                    </div>
                </center>
            </div>
        </div>

        <div class="secondparag">
            <div class="title">
                <b> SIMULATIONS </b>
            </div>
            <div class="paragone">
                Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
                feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
                exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
                <br><br>
                Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
                vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
                adversarium, dicam appetere necessitatibus sed ut.
            </div>
        </div>
        <div class="container1">
            <div class="box1">
                <h3>Normal</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="/NORMAL/NormalMain.html">USE NORMAL</a>
                    </div>
                </center>
            </div>
            <div class="box1">
                <h3>Triangular</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="/TRIANGLE/TriangleMain.html">USE TRIANGULAR</a>
                    </div>
                </center>
            </div>
            <div class="box1">
                <h3>BETA-PERT</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="/BETA-PERT/BETAPERTMain.html">USE BETA-PERT</a>
                    </div>
                </center>
            </div>
        </div>


        <!-- Footer -->
        <footer>
            <div class="footer">
                <ul>
                    <li style="padding: 10px;">Privacy Policy</li>
                    <li style="padding: 10px;">Cookie Policy</li>
                    <li style="padding: 10px;">Terms & Conditions</li>
                    <li style="padding: 10px;float: right;">Copyright © 2023 WAPS</li>
                </ul>
            </div>
        </footer>

    </body>

</html>

<style>
    html {
        font-family: sans-serif;
        background-color: #FFFFFF;
        scroll-behavior: smooth;
        -ms-overflow-style: none;
        /* IE and Edge */

    }

    body {
        margin: 0;
        padding: 0;
        padding-top: 60px;
        padding-bottom: 40px;
        border: 0;
        height: 100%;


    }


    /* .containers
{
    min-height: 100vh;
    height: auto !important;
    height: 100%;
    margin: 0 auto;
} */

    /* Navigation */
    header {
        top: 0;
        width: 100%;
        position: fixed;
        margin-left: auto;
        margin-right: auto;
    }

    .navi {
        background-color: #D9D9D9;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }


    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    li {
        float: left;
    }


    li a,
    .dropbtn {
        display: inline-block;
        color: rgb(75, 61, 38);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover,
    .dropdown:hover .dropbtn {
        background-color: #B19090;
        ;
    }

    li.dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        font-size: 1rem;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Footer */
    footer {
        position: absolute;
        left: 0;
        bottom: 0;
        height: auto;
        width: 100%;
    }

    .footer {
        width: 100%;
        position: fixed;
        padding: 1px 0;
        bottom: 0;
        width: 100%;
        margin: 2rem 0rem 0rem;
        background-color: #EEEEEE;
    }


    /* EXTRAS */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;

    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #B19090;

    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #776161;
    }

    .title {
        font-size: 2rem;
        text-align: center;
        margin: 1rem;
    }

    .paragone {
        font-size: 24px;
        font-style: normal;
        text-align: justify;
        margin: 2rem 5rem;
    }

    /* Cards */
    .container {
        justify-content: space-evenly;
        display: flex;
        width: auto;
        height: auto;
        margin-bottom: 3rem;
    }

    .box {
        width: 30%;
        height: auto;
        padding: 3px 2px 25px 2px;
        border: 1px solid #ccc;
        margin: 5vh;
        background: white;
        border-radius: 10px;
        transition: 0.9;
    }

    .box:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
        cursor: pointer;
    }

    .container1 {
        justify-content: space-evenly;
        display: flex;
        width: auto;
        height: auto;
        margin-bottom: 5rem;
    }

    .box1 {
        width: 32%;
        height: auto;
        padding: 3px 2px 25px 2px;
        border: 1px solid #ccc;
        margin: 5vh;
        background: white;
        border-radius: 10px;
        transition: 0.9;
    }

    .box1:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
        cursor: pointer;
    }

    h3,
    p {
        font-size: 20px;
        padding: 5px 5px;
        text-align: center;
        color: rgb(104, 92, 92);
    }

    p {
        font-size: 15px;
        padding: 5px 5px;
        text-align: center;
        color: rgb(104, 92, 92);
    }


    @media (max-width: 800px) {

        .container,
        .container1 {
            width: 85%;
            display: block;
        }

        .box,
        .box1 {
            width: 100%;
            margin-bottom: 4%;
        }
    }

    /* .without
{
    flex-direction: column;
    background-color: #eeee;
    
    width: 25%;
    margin: 2rem 1rem;
    padding: 20px 20px;
    border-radius: 10px;
    align-items: center;
}
.withouts
{
    flex-direction: column;
    background-color: #eeee;
    width: 25%;
    margin: 2rem 1rem;
    padding: 20px 20px;
    border-radius: 10px;
    align-items: center;
} */
    .btn {
        text-decoration: none;
        text-align: center;
        font-size: 1rem;
        color: #eeee;
        background-color: #B19090;
        border-radius: 40px;
        display: inline-block;
        padding: 10px 20px;
        border-color: #544141;
    }

    .btn:hover {
        background-color: #eeee;
        color: #B19090;

    }


    /* Navigation Hamburger */
</style>