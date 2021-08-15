<div class="container mt-2">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="..\index.php">
      <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-top" alt="">
    </a>
    <a class="navbar-brand" href="">
    <span class="font-weight-normal text-info">Railgadi</span></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="../index.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../passenger/register.php">Sign up</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../about.php" >About us</a>
        </li>
        <?php
        //echo $_SESSION['id'];
        if (isset($_SESSION['id'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="../passenger/logout.php" >Logout</a>
          </li>
          <li class="nav-item">
            <a  style="color:skyblue;" class="nav-link"  data-toggle="tooltip"  title="userprofile"href="../Railgadi/Userprofile/userprofile.php"><i class="fa fa-user fa-1x"></i></a>
          </li><?php } else{?>
          <li class="nav-item">
          <a class="nav-link" href="../passenger/login.php" >Login</a>
        </li><?php } ?>

      </ul>
    </div>
  </nav>
  </div>
  