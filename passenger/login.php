<?php session_start();
include('database\dbcon.php');
include('headfoot\head.php'); 
?>

<div class="container" >
<nav class="navbar navbar-light bg-white">
      <a class="navbar-brand" href="..\index.php">
        <img src="images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
        <span style="color:skyblue;"> Railgadi</span>
      </a>
    </nav>
  <div class="row" >
    <div class="col-lg-5 border-right text-center">
      <h1 class="heading1">Login</h1>
      <i style="color:#428df5;padding-top: 100px; padding-left:20px;" class="fas fa-user-circle fa-5x"></i>
    </div>
    <hr>
    <div class="col-lg-7 px-5">

      <h2 class="pb-5 pl-3 text-primary">Sign in to your Account </h2>

      <form method="POST">
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
        <p> Don't have an account??<a href="../passenger/register.php"> Register Now</a></p>
      </form>
    </div>
  </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $pass = $_POST['pass1'];
  $password = md5($pass);

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

    //echo "<script>window.location.href ='index.php'</script>";
    

  } else {
    echo '<script>alert("INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS")</script>';
  }
}

?><?php include('..\inc\footer.php');?>