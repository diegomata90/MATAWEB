<!DOCTYPE html>
<html lang="es">
  <head>
    <title>SIIGC-MFA</title>
        
      <meta charset="utf-8" />
              
      <!-- FAVICON -->
      <link rel="icon" type="image/png" href="<?= PATH_ASSETS . '/img/logo-grano.png'?>" />

       <!-- Custom fonts for this template-->
      <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/vendor/fontawesome-free/css/all.min.css' ?>" />

  	   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
      <link rel="stylesheet" href="<?= PATH_ASSETS . '/css/sb-admin-2.css' ?>" />


    <!-- Custom styles for this page -->
      <link rel="stylesheet" href="<?= PATH_ASSETS . '/vendor/datatables/dataTables.bootstrap4.min.css' ?>" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Sidebar Menu -->
      <?php 
      if ($rol == 1) {
        require 'app/views/Main/menuadmin.php';  
      }elseif ($rol == 2) {
        require 'app/views/Main/menuuser.php';
      }      

      ?>
      <!-- /.sidebar-menu -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

		<?php require_once 'app/views/Main/topbar.php'; ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">