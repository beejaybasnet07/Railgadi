<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<?php

?>

            
<div class="container mt-2" id="register_container" style="background-color:#f8f9fa;" >
<nav class="navbar navbar-light " style="background-color:#f8f9fa;">
    <a class="navbar-brand" href="..\index.php">
      <img src="images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
      <span class="font-weight-normal text-info">Railgadi</span>
    </a>
  </nav>
    <div class="row">
        <div class="col offset-md-9">
            <p class="text-black-50 font-weight-bold">Already have an Account ?? &nbsp;<a href="../passenger/login.php" class="stretched-link">LOGIN</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col offset-md-1 pb-2">
            <strong>
                <h4 class="text-black-50 font-weight-bold"><u> Register your account now</u></h4>
            </strong>
        </div>
    </div>
    <div class="row" >
        <div class="col-md  mb-5 pb-1" id="main" style="background:white;">
            <form method="POST" action="" enctype="multipart/form-data">
                <h5 class="text-black-50 font-weight-bold pl-5 pt-3 my-3">Personal Details</h5>
                <div class="row" id="row1" style="background-color:rgb(237,234,232,0.4)">
                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Your Name" id="name" name="pname" required="required" pattern="^[A-Za-z]{2,25}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 pt-3 ml-3">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="number" class="form-control" placeholder="age" name="age" id="age" required="required" pattern="^[A-Za-z]{2,25}">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3 ml-3">
                        <div class="form-group">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="radio" value="male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="radio" value="female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="radio" value="others">
                                <label class="form-check-label" for="inlineRadio3">Others</label>
                            </div>


                        </div>
                    </div>


                </div>
                <h5 class="text-black-50 font-weight-bold pl-5 my-3"> Address</h5>
                <div class="row" id="row2" style="background-color:rgb(237,234,232,0.4)">
                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">

                                <input type="text" class="form-control" placeholder="City" 
                                name="scity" id="scity" required="required" pattern="[A-Za-z]+">

                            </div>
                        </div>

                    </div>
                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">

                                <input type="text" class="form-control" placeholder="station" 
                                name="station" id="station" required="required">

                            </div>
                        </div>

                    </div>

                </div>
                <h5 class="text-black-50 font-weight-bold pl-5 my-3">Contact Details</h5>
                <div class="row" id="row3" style=" background-color:rgb(237,234,232,0.4)">
                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">

                                <input type="number" class="form-control" placeholder="eg.(98**********)" 
                                name="phone" id="phone" required="required" pattern="^[98][0-9]{9}">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">

                                <input type="email" class="form-control" placeholder="Email" name="email" 
                                id="email" required="required" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">

                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-black-50 font-weight-bold pl-5 my-3">Password</h5>
                <div class="row" id="row4" style="background-color:rgb(237,234,232,0.4)">

                    <div class="col-md-5 pt-3">
                        <div class="form-group">
                            <div class="form-label-group">

                                <input type="password" class="form-control" placeholder="Must contain 8 characters" 
                                id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 pt-3">
                        <div class="form-group">

                            <div class="form-label-group">
                                <input type="password" class="form-control" placeholder="Retype Password" 
                                id="repassword" name="repassword"  required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" onblur="check()">

                            </div>
                            <label id="lb"></label>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 offset-md-1 pt-4 pb-3">
                        <input type="submit" class="btn btn-success btn-block" id="loginbtn" name="submit"
                         onclick="verify()" value="submit"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function check() {

        var text1 = document.getElementById("password").value;
        var text2 = document.getElementById("repassword").value;

        if (text1 != text2) {

            document.getElementById("lb").style.color = "red";
            document.getElementById('lb').innerHTML = "password do not match";

        } else {
            document.getElementById('lb').innerHTML = "";
        }

    }
</script>



<?php
if (isset($_POST['submit'])) {


    $pname = $_POST['pname'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $scity = $_POST['scity'];
    $station = $_POST['station'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];


    
    
    $password = md5($pass);
    echo   $scity . $station . $email . $pass . $gender;

    $query = "INSERT INTO user (pname, age, gender, city, station, phone, email, pass1)
                        VALUES(:pname, :age, :gender, :scity, :station, :phone, :email, :pass)";
    $stmt = $pdo->prepare($query);
    print_r($query);
    echo ($query);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':scity', $scity);
    $stmt->bindParam(':station', $station);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $password);
    $s=$stmt->execute();
if($s=!null){
    echo "<script>alert(' Congrulations !!! you are now our member.');
    window.location.href='../passenger/register.php'; </script>";
}

}
?><?php include('..\inc\footer.php'); ?>