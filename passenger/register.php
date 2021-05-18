<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<div class="container">
    <div class="row">

        <div class="col pt-2 offset-md-9">
            <p class="display-5">Already have an Account??<a href="#" class="stretched-link">LOGIN</a>
                <p>
        </div>
    </div>
    <div class="row mb-2  pl-5 get">
        <h3 class="text-center display-4"> CONNECT TO OUR SERVICES</h3>
    </div>
    <div class="row">
        <div class="col ">
            <strong>
                <h5><u> Register your account now</u></h5>
            </strong>
        </div>
    </div>
    <div class="row">
        <div class="col pt-3 mb-5 ml-2 cus">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="name">NAME</label>
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required="required" pattern="^[A-Za-z]{2,25}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" placeholder="eg.(98**********) " name="contact" required="required" pattern="^[98][0-9]{9}">

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="District" name="district" required="required" pattern="[A-Za-z]+">

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="address">City</label>
                        <input type="text" class="form-control" placeholder="City Name" name="city" required="required" pattern="[A-Za-z]+">
                    </div>
                </div>

                
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="email">Email address</label><span id="span"></span>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="required" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Must contain 8 characters" name="password" required="required" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="password">Gender</label> </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Others</label>
                    </div>


                </div>


                <input type="submit" class="btn btn-success btn-block" id="register" name="submit" value="submit"></input>
            </form>

        </div>
        <div class="col mb-5">
        </div>
    </div>
</div>

</div>
<?php include('headfoot\foot.php'); ?>
<?php 
  if(isset($_POST['submit'])){
 $name =$_POST['name'];
 $contact = $_POST['contact'];
 $district = $_POST['district'];
 $city = $_POST['city'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $gender=$_POST['gender'];
 $password =md5($pass);
 $query = "INSERT INTO passenger (name, district, city ,contact ,email ,gender, password) VALUES (:name, :district ,:city ,:contact, :email,:gender, :password)";
 $stmt=$pdo->prepare($query);
 
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':contact',$contact);
 $stmt->bindParam(':gender',$gender);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->bindParam(':district',$district);
 $stmt->bindParam(':city',$city);
 
 $stmt->execute(); 
 echo "<script>alert('Account created successfully. Login to continue')</script>"; 
  echo "<script>window.location.href ='../homepage/home.php'</script>";
 
  } 
?>