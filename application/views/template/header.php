<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/templates.css">
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/images/logo.svg" />
  <title><?php echo $title; ?></title>
</head>
<header>
  <div class="topnav" id="myTopnav">
    <div class="homes">
      <a href="<?= base_url('') ?>"><img class="logo" id="logo" src="<?= base_url('/assets/images/logo.svg') ?>"></a>
    </div>
    <div class="menu-items">
      <ul>
        <li><a href="<?= base_url('') ?>">HOME</a></li>
        <li><a href="<?= base_url('pert') ?>">PERT</a></li>
        <li><a href="<?= base_url('cpm') ?>">CPM</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">SIMULATIONS <i class="fa fa-caret-down"></i></a>
          <div class="dropdown-content">
            <a href="<?= base_url('normal') ?>">Normal Distribution</a>
            <a href="<?= base_url('triangular') ?>">Triangular Distribution</a>
            <a href="<?= base_url('betapert') ?>">BETA-PERT Distribution</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">HOW TO USE <i class="fa fa-caret-down"></i></a>
          <div class="dropdown-content">
            <a href="<?= base_url('howtouse/pert') ?>">PERT</a>
            <a href="<?= base_url('howtouse/cpm') ?>">CPM</a>
            <a href="<?= base_url('howtouse/normal') ?>">Normal Distribution</a>
            <a href="<?= base_url('howtouse/triangular') ?>">Triangular Distribution</a>
            <a href="<?= base_url('howtouse/betapert') ?>">BETA-PERT Distribution</a>
          </div>
        </li>
      </ul>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa"> &#xf0c9;</i>
    </a>
  </div>
</header>

<body>