<?php 
  session_start();
?>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <nav class="navbar navbar-light bg-white">
      <a class="navbar-brand" href="/datasearch/index.php">
        <img src="/images/logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
        <span class="font-weight-normal text-info">Railgadi</span>
      </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../datasearch/index.php" style="display: inline;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/index.php" style="display: inline;">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../train/index.php" style="display: inline;">Train</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/userinfo.php" style="display: inline;">Users</a>
        </li>
        <?php if(isset($_SESSION['id'])): ?>
          <li class="nav-item">
            <a class="nav-link" onclick="return confirm('Are you sure you want to logout?')"  href="/admin/adminlogout.php" style="display: inline;">Logout</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</div>