<title>Admin :: Railgadi</title>
<?php include('../inc/header.php'); ?>
<?php include('nav.php'); ?>

<div class="container pb-5 mt-2" style="background-color:#f8f9fa;">
    <div class="row">
        <div class="col-lg-7 offset-md-3 ">
            <form method="POST" class="px-5 py-5" style="box-shadow: 0 5px 30px rgba(0, 0, 0, .50); background: #f8f9fa; border-radius:10px;">
                <h2 class="pb-3  text-black-50 font-weight-bold">Sign in to your Account</h2>  
                <div class="col-lg-7">
                    <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
                </div>  

                <div class="col-lg-7">
                    <input type="password" name="pass1" placeholder="Password" class="form-control my-3 p-4">
                </div> 

                <div class="col-lg-7">
                    <button type="submit" class="btn1 mt-3 mb-3 loginbtn">login</button>
                </div> 

                <div class="col-md-12">
                    <p class="text-black-50 font-weight-bold"> Login as User<a href="../passenger/login.php"> User</a></p>
                </div>
        </form>
        </div>
    </div>
</div>