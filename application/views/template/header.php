<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/<?php echo $css; ?>.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/footer.css">
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/logo.svg"/>
    <title><?php echo $pagename; ?></title>  
    <!-- <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/inputpage.css">
    <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/outputage.css"> -->
</head>
<body>
<!-- Header -->
<header>
<div class="navi" >
  <div class ="homes">
    <a href="<?=base_url('home')?>"><img src="<?=base_url('/assets/images/logo.svg')?>"></a>
  </div>
  <center>
    <div class ="topnav" id="myTopnav">
      <a href="<?=base_url('pert')?>">PERT</a>
    <a href="<?= base_url('cpm') ?>">CPM</a>
    <div class="dropdown">
      <button class="dropbtn">SIMULATIONS <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="<?= base_url('normal') ?>">Normal Distribution</a>
        <a href="<?= base_url('triangular') ?>">Triangular Distribution</a>
        <a href="<?= base_url('betapert') ?>">BETA - PERT Distribution</a>
      </div>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
    </div>
  </center>
</div>
</header>