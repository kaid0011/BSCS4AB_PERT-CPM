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
<div class="topnav" id="myTopnav">
<div class="homes">
    <a href="<?=base_url('home')?>"><img class="logo" id="logo" src="<?=base_url('/assets/images/logo.svg')?>"></a>
  </div>
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
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i style="font-size:36px" class="fa">&#xf0c9;</i>
    </a>
</div>
</header>

<style>
  /* THEME */
  html 
  {
      font-family: sans-serif;
      background-color: #FFFFFF;
      scroll-behavior: smooth;
      -ms-overflow-style: none; /* IE and Edge */
  }
  
  body{
      margin: 0;
      padding: 0;
      border: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
  }

  /* Navigation - borgir */
  header {
        top: 0;
        width: 100%;
        position: sticky;
        margin-left: auto;
        margin-right: auto;
    }

    .topnav {
      overflow: hidden;
      background-color: #D9D9D9;
      margin: 0 auto;
      display: flex;
      align-items: center;
    }
    
    .topnav a{
      display: block;
      text-align: center;
      text-decoration: none;
      font-size: 20px;
    }

    .topnav a .logo{
      float: left;
      display: block;
      text-align: center;
      text-decoration: none;
      font-size: 20px;
    }
    
    .topnav .icon {
      display: none;
      color: black;
      padding: 0 40px;
    }
  
    img
    {
      width: 50px;
      float: left;
    }

    .homes
  {
    justify-content: left;
    padding: 0 10px;
  }

    /* MENU */
    .topnav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
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
        
    }

    li .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: fixed;
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


  
  /* Responsive website */
  @media screen and (max-width: 800px) 
    {
      .topnav
      {
        overflow: hidden;
        background-color: #D9D9D9;
      }

      .topnav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
        display: grid;
    }

      .topnav ul li
      {
        display: none;
      }

      .logo
      {
        display: block;
      }

      .topnav a.icon 
      {
        float: right;
        display: flex;
      }
    }
    
    @media screen and (max-width: 800px) 
    {
        .topnav.responsive 
    {
        position: relative;
        display: grid;
    }
      .topnav.responsive .icon {
        position: absolute;
        float: right;
        right: 0;
        top: 10px;
      }
      .topnav.responsive ul li {
        float: none;
        display: block;
        text-align: center;
        align-items: center;
        justify-content: center;
        justify-items: center;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        align-items: center;
      }

      .topnav.responsive #logo
      {
        float: left;
        justify-content: left;
        padding: 0 10px;
        display: flex;
      }
    }
  </style>