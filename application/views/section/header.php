<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
  <!-- Icon -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    .table-nowrap{
      white-space: nowrap;
    }

    .table-nowrap tr td:nth-child(6) {
      text-align: center;
    }

    .table-detail tr{
      height: 25px;
    }

    .table-detail tr td:nth-child(1) {
      width: 30%;
    }

    .icheck-pad {
      padding: .375rem .5rem;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <i class="fas fa-washer"></i>
      <span class="brand-text font-weight-light">Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata("nama") ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo ($link == "D") ? "#" : base_url("dashboard") ; ?>" class="nav-link <?php echo ($link == "D") ? "active" : "" ; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($this->session->userdata("role") != "Owner") : ?>
          <li class="nav-item">
            <a href="<?php echo ($link == "M") ? "#" : base_url("member") ; ?>" class="nav-link <?php echo ($link == "M") ? "active" : "" ; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
              </p>
            </a>
          </li>
          <?php endif; if($this->session->userdata("role") == "Admin") : ?>
          <li class="nav-item">
            <a href="<?php echo ($link == "P") ? "#" : base_url("paket") ; ?>" class="nav-link <?php echo ($link == "P") ? "active" : "" ; ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Paket
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo ($link == "O") ? "#" : base_url("outlet") ; ?>" class="nav-link <?php echo ($link == "O") ? "active" : "" ; ?>">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Outlet
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo ($link == "U") ? "#" : base_url("user") ; ?>" class="nav-link <?php echo ($link == "U") ? "active" : "" ; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?php echo ($link == "T") ? "#" : base_url("transaksi") ; ?>" class="nav-link <?php echo ($link == "T") ? "active" : "" ; ?>">              <i class="nav-icon fas fa-tag"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>

          <li class="nav-header">ACCOUNT</li>
          <li class="nav-item">
            <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>