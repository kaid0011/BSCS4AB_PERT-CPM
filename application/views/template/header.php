<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>WAPS</title>
</head>

<body>
    <header>
        <!-- Navigation Bar -->
        <div class="navi">
            <a href="<?= base_url() ?>"><img id="logo" src="<?=base_url()?>/assets/images/logo.svg" height="50px" width="50px"></a>
            <ul>
                <li><a href="<?=base_url('pert')?>">PERT</a></li>
                <li><a href="<?= base_url('cpm') ?>">CPM</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">SIMULATIONS <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="<?= base_url('normal') ?>">Normal Distribution</a>
                        <a href="<?= base_url('triangular') ?>">Triangular Distribution</a>
                        <a href="<?= base_url('betapert') ?>">BETA - PERT Distribution</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>