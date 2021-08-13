<?php
session_start(); ?>
<<<<<<< HEAD
<div class="container mt-5">
<nav class="navbar navbar-expand-sm navbar-light bg-white">
    <a class="navbar-brand" href="..\Railgadi\index.php">
      <img src="images\logore.png" width="100" height="100" class="d-inline-block align-top" alt="">
    </a>
    <a class="navbar-brand" href="..\Railgadi\index.php">
    <span class="font-weight-normal text-info">Railgadi</span></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="..\Railgadi\index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\Railgadi\passenger\register.php">Sign up</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="..\Railgadi\about.php" >About us</a>
=======
<div class="container" style="margin-bottom:45px;">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <nav class="navbar navbar-light bg-white">
      <a class="navbar-brand" href="/index.php">
        <img src="/images/logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
        <span class="font-weight-normal text-info">Railgadi</span>
      </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/index.php" style="display: inline;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/passenger/register.php" style="display: inline;">Sign up</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/about.php" style="display: inline;">About us</a>
>>>>>>> cb327988fce063e22778d605558cf1ca79ac1ef3
        </li>
        <?php
        //echo $_SESSION['id'];
        if (isset($_SESSION['id'])) { ?>
          <li class="nav-item">
<<<<<<< HEAD
            <a class="nav-link" href="..\passenger\logout.php" >Logout</a>
=======
            <a class="nav-link" href="/passenger/logout.php" style="display: inline;">Logout</a>
>>>>>>> cb327988fce063e22778d605558cf1ca79ac1ef3
          </li>
          <li class="nav-item">
            <a class="nav-link" href="..\Railgadi\Userprofile\userprofile.php"><i class="fa fa-user fa-1x"></i></a>
          </li><?php } else{?>
          <li class="nav-item">
<<<<<<< HEAD
          <a class="nav-link" href="..\passenger\login.php" >Login</a>
=======
          <a class="nav-link" href="/passenger/login.php" style="display: inline;">Login</a>
>>>>>>> cb327988fce063e22778d605558cf1ca79ac1ef3
        </li><?php } ?>
      </ul>
    </div>
  </nav>
</div>