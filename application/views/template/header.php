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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/footer.css">
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/images/logo.svg"/>
    <title><?php echo $pagename; ?></title>  
    <!-- <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/inputpage.css">
    <link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/outputage.css"> -->
</head>

<body>
    <header>
    <div class="topnav" id="myTopnav">
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
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i style="font-size:36px" class="fa">&#xf0c9;</i>
    </a>
    </div>
    </header>

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
        border: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        }

        /* Navigation */
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

        .topnav a #logo{
        float: left;
        display: block;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
        }
        
        .topnav .icon {
        display: none;
        color: black;
        }
        
        @media only screen and (max-width: 1000px) and (min-width: 300px) 
        {
        .topnav a
        {
            display: none;
        }
        .topnav a.icon 
        {
            float: right;
            display: block;
        }
        }
        
        @media only screen and (min-width: 300px) 
        {
            .topnav.responsive 
        {
            position: relative;
        }
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        }

        @media only screen and (max-width: 1000px) 
        {
            .topnav.responsive 
        {
            position: relative;
        }
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
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
        }

        ul {
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

        #logo
        {
            width: auto;
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
    </style>

<script>
        function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }}
</script>