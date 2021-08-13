<title>Admin :: Railgadi</title>
<?php 
    session_start();
    
    include('../inc/header.php'); 
    include('../database/dbcon.php'); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE email=:email AND password=:password";
        $stmt = $pdo->prepare($query);

        $data = [
            ':email' => $email,
            ':password' => $password, 
        ];
        $stmt->execute($data);

        $admin = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($admin)) {
            $_SESSION['id'] = $admin->id;
            $_SESSION['role'] = 'admin';

            echo "<script>alert(' Login Sucessful...!!!!');
            window.location.href='../datasearch/index.php';</script>";      
        } 
        else {
            echo '<script>alert("INVALID LOGIN,\nPLEASE TRY AGAIN WITH VALID CREDENTIALS")</script>';
        }
      }
?>

<div class="container pb-5 mt-2" style="background-color:#f8f9fa;">
    <nav class="navbar navbar-light " style="background-color:#f8f9fa;">
        <a class="navbar-brand" href="../index.php">
        <img src="../images/logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
        <span class="font-weight-normal text-info">Railgadi</span>
        </a>
    </nav>
    <div class="row">
        <div class="col-lg-7 offset-md-3 ">
            <form method="POST" class="px-5 py-5" style="box-shadow: 0 5px 30px rgba(0, 0, 0, .50); background: #f8f9fa; border-radius:10px;">
                <h2 class="pb-3  text-black-50 font-weight-bold">Sign in to your Account</h2>  
                <div class="col-lg-7">
                    <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
                </div>  

                <div class="col-lg-7">
                    <input type="password" name="password" placeholder="Password" class="form-control my-3 p-4">
                </div> 

                <div class="col-lg-7">
                    <button type="submit" class="btn1 mt-3 mb-3 loginbtn">login</button>
                </div> 

                <div class="col-md-12">
                    <p class="text-black-50 font-weight-bold"><a href="../passenger/login.php">Login as User</a></p>
                </div>
        </form>
        </div>
    </div>
</div>

<?php include('..\inc\footer.php'); ?>