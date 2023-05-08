<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/<?php echo $css; ?>.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/templates.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/header.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/footer.css">
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/images/logo.svg" />
  <title><?php echo $pagename; ?></title>
</head>
<header>
  <div class="topnav" id="myTopnav">
    <div class="homes">
      <a href="<?= base_url('home') ?>"><img class="logo" id="logo" src="<?= base_url('/assets/images/logo.svg') ?>"></a>
    </div>
    <ul>
      <li><a href="<?= base_url('pert') ?>">PERT</a></li>
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
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i style="font-size:36px" class="fa">&#xf0c9;</i>
    </a>
  </div>
</header>

<body>