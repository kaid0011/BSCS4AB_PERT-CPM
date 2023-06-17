<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WAPS with Simulation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('/assets/images/logo.svg') ?>" rel="icon">
  <link href="<?= base_url('/assets/images/logo.svg') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files --> 
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="manifest" href="<?= base_url() ?>/manifest.json" />
  <script>navigator.serviceWorker.register("<?= base_url() ?>/service-worker.js")</script> 

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn me-2"></i>
      <a href="<?= base_url('') ?>"><img style="width: 60px;" id="logo" src="<?= base_url('/assets/images/logo.svg') ?>"></a>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
    <!-- End Search Bar -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- Home Nav -->
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 2){echo "active";} else {echo "collapsed";}?>" href="<?= base_url() ?>">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li>
      <!-- End Home Nav -->

      <!-- Calculator Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('projectdetails') ?>">
          <i class="bi bi-calculator"></i>
          <span>Calculator</span>
        </a>
      </li>
      <!-- End Calculator Nav -->

      <!-- How to Use -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('howtouse') ?>">
          <i class="bi bi-question-circle"></i>
          <span>How To Use</span>
        </a>
      </li>
      <!-- End How to Use -->

      <!-- How it Works -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#works-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-book"></i><span>How It Works</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="works-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('howitworks/pert') ?>">
              <i class="bi bi-circle"></i><span>PERT</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('howitworks/cpm') ?>">
              <i class="bi bi-circle"></i><span>CPM</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('howitworks/normal') ?>">
              <i class="bi bi-circle"></i><span>Normal Distribution</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('howitworks/triangular') ?>">
              <i class="bi bi-circle"></i><span>Triangular Distribution</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('howitworks/betapert') ?>">
              <i class="bi bi-circle"></i><span>BETA-PERT Distribution</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End How it Works -->

      <!-- About -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#about-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="about-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('aboutwaps') ?>">
              <i class="bi bi-circle"></i><span>About WAPS</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('aboutus') ?>">
              <i class="bi bi-circle"></i><span>About Us</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('contactus') ?>">
              <i class="bi bi-circle"></i><span>Contact Us</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End About -->

    </ul>

  </aside>
  <!-- End Sidebar-->