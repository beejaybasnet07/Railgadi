<?php
session_start(); ?>
<div class="container" style="margin-bottom:10px;">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <nav class="navbar navbar-light bg-white">
      <a class="navbar-brand" href="..\Railgadi\index.php">
        <img src="images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
        <span style="color:skyblue;"> Railgadi</span>
      </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="..Railgadi/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="passenger/register.php">Sign up</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <?php
        //echo $_SESSION['id'];
        if (isset($_SESSION['id'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="passenger/logout.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Railgadi/Userprofile/userprofile.php"><i class="fa fa-user fa-1x"></i></a>
          </li><?php } else{?>
          <li class="nav-item">
          <a class="nav-link" href="passenger/login.php">Login</a>
        </li><?php } ?>
      </ul>
    </div>
  </nav>
</div>