<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="headfoot.css">
    <link rel="stylesheet" href="CPMInput.css"> -->
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.2/dist/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CPM Input</title>
</head>

<body>
    <header>
        <!-- Navigation Bar -->
        <div class="navi">
            <ul>
                <li><a href="<?= base_url() ?>">HOME</a></li>
                <li><a href="/PERT/PERTMain.html">PERT</a></li>
                <li><a href="<?= base_url('cpm') ?>">CPM</a></li>
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
    <div class="firstpg">
        <div class="title">
            <b> CPM Input </b>
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
        <table class="responsive-table highlight centered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Pre-Requisites</th>
                </tr>
            </thead>
            <tbody>
                <form action="<?php echo base_url('cpm/calculate') ?>" method="post">
                    <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                    <input type="text" name="choice" value="<?php echo 'cpm'; ?>" hidden>
                    <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                    <?php
                    for ($i = 1; $i <= $proj_len; $i++) {
                    ?>
                        <tr>
                            <td><input type="text" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                            <td><input type="text" name="task_desc_<?php echo $i; ?>" required></td>
                            <td><input type="number" name="task_time_<?php echo $i; ?>" min="1" max="20" step="any" required></td>
                            <td><?php
                                if ($i == 1) {
                                ?>
                                    <input type="text" name="task_prereq_<?php echo $i; ?>" value="-" readonly>
                                <?php
                                } else { ?>
                                    <input type="text" name="task_prereq_<?php echo $i; ?>" required>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        <div class="calculate">
            <!-- <a class="btn" href="CPMOutput.html">Calculate</a> -->
            <button class="btn">Calculate</button>
        </div>
    </div>
    </form>
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

    .calculate {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 2rem;
    }

    .container {
        width: 99rem;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .btn {
        text-decoration: none;
        text-align: center;
        font-size: 1.2rem;
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

    /* TABLE */
    .responsive-table {
        margin-top: 3rem;
        margin-bottom: 2rem;
        margin-left: auto;
        margin-right: auto;
        align-items: center;
    }

    tbody,
    thead,
    tr,
    td,
    .responsive-table,
    table {}

    /* RESPONSIVE */
    @media screen {
        .form {
            background-color: #f0f0f0;
            margin: 3rem 10rem 2rem;
            border-radius: 1.2rem;
            padding: 0.25rem;
        }
    }
</style>