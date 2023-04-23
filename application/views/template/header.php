<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Additionals -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.2.2/dist/css/materialize.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/> -->
    <title>WAPS</title>
</head>

<body>
    <header>
        <!-- Navigation Bar -->
        <div class="navi">
            <a href="<?= base_url() ?>" style="align-self:left;"><img src="assets\images\logo.svg" height="40px" width="40px"></a>
            <ul>
                <li><a href="/PERT/PERTMain.html">PERT</a></li>
                <li><a href="<?= base_url('cpm') ?>">CPM</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">SIMULATIONS <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="/NORMAL/NormalMain.html">Normal Distribution</a>
                        <a href="/TRIANGLE/TriangleMain.html">Triangular Distribution</a>
                        <a href="/BETA-PERT/BETAPERTMain.html">BETA - PERT Distribution</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>