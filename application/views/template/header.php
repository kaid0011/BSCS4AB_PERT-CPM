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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/<?php echo $css; ?>.css">
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/logo.svg"/>
    <title><?php echo $pagename; ?></title>
    
    <!-- <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/inputpage.css">
    <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/outputage.css"> -->
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
    