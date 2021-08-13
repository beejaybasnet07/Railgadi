<?php session_start();
include('database\dbcon.php');
include('..\inc\header.php');
?>

<div class="container pb-5 mt-2" style="background-color:#f8f9fa;">
  <nav class="navbar navbar-light " style="background-color:#f8f9fa;">
    <a class="navbar-brand" href="..\index.php">
      <img src="images\logore.png" width="100" height="100" class="d-inline-block align-center" alt="">
      <span class="font-weight-normal text-info">Railgadi</span>
    </a>
  </nav>
  <div class="row">
    <div class="col-lg-7 offset-md-3 ">
      <form method="POST" class="px-5 py-5" style="box-shadow: 0 5px 30px rgba(0, 0, 0, .50);
      background: #f8f9fa; border-radius:10px;">
        <h2 class="pb-3  text-black-50 font-weight-bold">Sign in to your Account
          </h2>
          <div class="form-row">
            <div class="col-lg-7">
              <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-7">
              <input type="password" name="pass1" placeholder="Password" class="form-control my-3 p-4">
            </div>
          </div>
          <div class="form-row">
            <div class="col-lg-7">
              <button type="submit" class="btn1 mt-3 mb-3 loginbtn">login</button>
            </div>
          </div>
          <div class="row">
            <div class="col-7">
              <p class="text-black-50 font-weight-bold"> Don't have an account??<a href="../passenger/register.php"> Register Now</a></p>
            </div>
            <div class="col-5">
              <p class="text-black-50 font-weight-bold"><a href="/admin/adminlogin.php">Login as Admin</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
<?php include('../inc/footer.php');?>  

  <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];
  $pass = $_POST['pass1'];
  $password = md5($pass);
  echo $password;
  $query = "SELECT * FROM user WHERE email=:email AND pass1=:password";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  $user = $stmt->fetch();
  
  if (!empty($user)) {
    
    $_SESSION['id'] = $user['id'];
    echo  $_SESSION['id'];
    echo "<script>alert(' Login Sucessful...!!!!');
    window.location.href='../index.php';</script>";
    
  } else {
    echo "<script>alert('INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS');</script>";
  }
}

?>
