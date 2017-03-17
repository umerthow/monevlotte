<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.css" rel="stylesheet">

 <!-- PNotify -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">



</head>
<body>




 <body class="nav-md bg-blue">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2><?php echo $heading; ?></h2>
              <p><?php echo $message; ?> <a href="#">Report this?</a>
              </p>
              <div class="mid_center">
                <h3>Search</h3>
              <a href="<?php echo base_url()?>" class="btn  btn-danger"> Back to Homepage	</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

</body>

    <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
       <!-- jQuery -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.js"></script>


        <!-- PNotify -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pnotify/dist/pnotify.nonblock.js"></script>


</html>