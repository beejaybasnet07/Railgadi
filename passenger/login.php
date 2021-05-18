<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<section class="form my-5 mx-5">
   <div class="container">
     <div class="row no-gutters">
      <div class="col-lg-5">
       </div>
      <div class="col-lg-7 px-5 pt-5"><h1 class="heading1" >Railgadi Login</h1>
        <h3 class="py-3" style="color:lightgreen;">Sign in to your Account </h3>
        <form method="POST">
          <div class="form-row">
            <div
            class="col-lg-7">
              <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
            </div>
            
          </div>
          <div class="form-row">
            <div
            class="col-lg-7">
              <input type="password" name="password" placeholder="Password" class="form-control my-3 p-4" >
            </div>
            
          </div>
          <div class="form-row">
            <div
            class="col-lg-7">
              <button type="submit" class="btn1 mt-3 mb-3 loginbtn">login</button>
            </div>
            
          </div>
          <p> Don't have an account??<a href="register.php"> Register Now</a></p>
        </form>
      </div>
     </div>
   </div>
</section>
</div>
<?php include('headfoot\foot.php'); ?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $password=md5($pass);
    
        $query="SELECT * FROM passenger WHERE email=:email AND password=:password";
        $stmt =$pdo->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
         $user=$stmt->fetch();
         if(!empty($user)){
            
             $_SESSION['user_id']=$user['id'];
             echo '<script>alert("Login sucessful,\Welcome")</script>';
            echo "<script>window.location.href ='../homepage/home.php'</script>";
       

         }
         else
         {
             echo '<script>alert("INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS")</script>';
         }
     }
    
    ?>