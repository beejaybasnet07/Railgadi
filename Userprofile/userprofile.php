<?php
session_start();
include('database\dbcon.php');
include('headfoot\head.php');

date_default_timezone_set('Asia/Kathmandu');
$datetime = date("Y-m-d H:i:s");
$date_time = strtotime($datetime);

?>

<?php
$ab;

$query = "SELECT * FROM user WHERE id=:id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();
$user = $stmt->fetch();
$a = 0;

$query1 = "SELECT distinct code,tid,pid,date,class,berth,timestamp  from book  where uid=:id AND flag=:flag order by timestamp desc limit 0, 5";
$stmt1 = $pdo->prepare($query1);
$stmt1->bindParam(':id', $_SESSION['id']);
$stmt1->bindParam(':flag', $a);
$stmt1->execute();
$result = $stmt1->fetchAll(PDO::FETCH_OBJ);



$query2 = "SELECT distinct code,tid,pid,date,class,berth  from book  where uid=:id AND flag=1 order by timestamp desc limit 0, 2";
$stmt2 = $pdo->prepare($query2);
$stmt2->bindParam(':id', $_SESSION['id']);
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
?>


<?php
if (isset($_POST['submit'])) {

    $pname = $_POST['name'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $scity = $_POST['city'];
    $station = $_POST['station'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];
    $password = md5($pass);
    if ($pass == "") {
        $query = "UPDATE user SET pname=:name, age=:age, gender=:gender, city=:city, station=:station,
        phone=:phone WHERE id=:id";
    } else {
        $query = "UPDATE user SET pname=:name, age=:age, gender=:gender, city=:city, station=:station,
        phone=:phone, pass1=:password  WHERE id=:id";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $pname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':city', $scity);
    $stmt->bindParam(':station', $station);

    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $_SESSION['id']);
    if ($password != "") {
        $stmt->bindParam(':password', $password);
    }

    $stmt->execute();
    echo "<script>alert('Updated Successfully')</script>";
    echo "<script>window.location.href ='../Userprofile/userprofile.php'</script>";
}




?>

<body>


    <div class="container rounded  mt-5 mb-5" id="blur">
        <nav class="navbar navbar-light " style="background-color:#f8f9fa;">
            <a class="navbar-brand" href="..\index.php">
                <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
                <span class="font-weight-normal text-info"> Railgadi</span>
            </a>
            <div class=" text-center float-right"><button class="btn btn-primary profile-button" onclick="toggler()" type="button">Update Profile</button></div>
        </nav>

        <div class="row pt-5">
            <div class="col-md-5  border-right">
                <div class="card  mt-3 bg-primary">

                    <div class="card-body">
                    </div>
                </div>
                <div class=" align-items-center text-center">
                    <i style="color:#428df5;padding-left:10px; margin-top:50px;" class="fa fa-user-circle fa-5x"></i>
                    <h4><span class="text-black-50 font-weight-bold"><?php echo $user['pname']; ?></span></h4><span> </span>
                </div>
                <div class="card  mt-5 mb-3 bg-primary">

                    <div class="card-body">
                    </div>
                </div>



            </div>
            <div class="col-md-6  bg-warning ml-3" style="border-radius: 10px; ">
                <div class="py-4 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Details</h4>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-7">
                            <label class="labels">
                                PhoneNumber
                                <h3>
                                    <span class="font-weight-bold" id="value"><?php echo $user['phone']; ?></span>
                                </h3>
                            </label>
                        </div>
                        <div class="col-md-5">
                        <label class="labels">
                        Address
                            <h3>
                                <span class="font-weight-bold" id="value"><?php echo $user['city']; ?></span>
                            </h3>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-7">
                            <label class="labels">
                                Email ID
                            
                            <h3>
                                <span class="font-weight-bold" id="value"><?php echo $user['email']; ?></span>
                            </h3>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label class="labels">
                                Near Station
                            
                            <h3>
                                <span class="font-weight-bold" id="value"><?php echo $user['station']; ?></span>
                            </h3>
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-7">
                            <label class="labels">
                                Gender
                            
                            <h3>
                                <span class="font-weight-bold " id="value"><?php echo $user['gender']; ?></span>
                            </h3>
                            </label>
                        </div>
                        <div class="col-md-5">
                            <label class="labels">
                                Age
                            
                            <h3>
                                <span class="font-weight-bold" id="value"><?php echo $user['age']; ?></span>
                            </h3>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-center">Booking Details</h4>
                    </div>

                    <table class="table  table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-dark text-white">

                                <th scope="col">Passenger</th>
                                <th scope="col">Train</th>
                                <th scope="col">Class</th>
                                <th scope="col">Berth</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <!-- <th scope="col">Time</th> -->

                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $row) {

                            $query3 = "SELECT * FROM passenger WHERE id=:id";
                            $stmt3 = $pdo->prepare($query3);
                            $stmt3->bindParam(':id', $row->pid);
                            $stmt3->execute();
                            $res = $stmt3->fetch();

                            $query4 = "SELECT * FROM train WHERE id=:id";
                            $stmt4 = $pdo->prepare($query4);
                            $stmt4->bindParam(':id', $row->tid);
                            $stmt4->execute();
                            $ress = $stmt4->fetch();


                        ?>
                            <tbody>
                                <tr>

                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $ress['name']; ?></td>
                                    <td><?php echo $row->class; ?></td>
                                    <td><?php echo $row->berth; ?></td>

                                    <td><?php echo $ress['_from']; ?></td>

                                    <td><?php echo $ress['_to']; ?></td>

                                    <td><?php echo $row->date; ?></td>
                                    <td>
                                        <p class=" font-weight-bold text-success">BOOKED</p>
                                    </td>
                                    <td><?php
                                        date_default_timezone_set('Asia/Kathmandu');
                                        $ab = strtotime($row->timestamp);

                                        if ($date_time > $ab) { ?>
                                            <button class=" btn btn-danger btn-sm" disabled data-toggle="tool-tip" id="cancle" title="Cancle">Cancle</button></a>


                                        <?php } else { ?>
                                            <a onclick="return confirm('Are you sure to delete this entry?')" href="cancle.php?id=<?php echo $row->code; ?>">
                                                <button class=" btn btn-danger btn-sm" data-toggle="tool-tip" id="cancle" title="Cancle">Cancle</button></a>
                                        <?php } ?>
                            </tbody>

                        <?php } ?>
                    </table>

                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-center">Booking Cancelled</h4>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">

                                <th scope="col">Passenger</th>
                                <th scope="col">Train</th>
                                <th scope="col">Class</th>
                                <th scope="col">Berth</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>

                                <th scope="col">Date</th>

                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <?php foreach ($result2 as $row) {

                            $query3 = "SELECT * FROM passenger WHERE id=:id";
                            $stmt3 = $pdo->prepare($query3);
                            $stmt3->bindParam(':id', $row->pid);
                            $stmt3->execute();
                            $res = $stmt3->fetch();

                            $query4 = "SELECT * FROM train WHERE id=:id";
                            $stmt4 = $pdo->prepare($query4);
                            $stmt4->bindParam(':id', $row->tid);
                            $stmt4->execute();
                            $ress = $stmt4->fetch();


                        ?>
                            <tbody>
                                <tr>

                                    <td><?php echo $res['pname']; ?></td>
                                    <td><?php echo $ress['name']; ?></td>
                                    <td><?php echo $row->class; ?></td>
                                    <td><?php echo $row->berth; ?></td>

                                    <td><?php echo $ress['_from']; ?></td>

                                    <td><?php echo $ress['_to']; ?></td>

                                    <td><?php echo $row->date; ?></td>
                                    <td>
                                        <p class=" font-weight-bold text-info">CANCALLED</p>
                                    </td>

                            </tbody><?php } ?>
                    </table>

                </div>
            </div>

        </div>

    </div>

    <div id="pop">
        <a href=""><i class="fa fa-times-circle fa-2x" style="margin-left:500px;color:red; " aria-hidden="true"></i></a>
        <div class="one">

            <h2 style="color:chocolate;">PROFILE SETTING</h2>
            <h7><label for="inputlg" style="color:blue;">Leave as it is to use existing detail</label></h7><br><br>
            <div class="second">


                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control input-lg" id="inputlg" type="text" name="name" value="<?php echo $user['pname']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input class="form-control input-lg" id="inputlg" type="number" name="phone" value="<?php echo $user['phone']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control input-lg" id="inputlg" type="text" name="email" value="<?php echo $user['email']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Postal Code">City</label>
                                <input class="form-control input-lg" id="inputlg" type="text" name="city" value="<?php echo $user['city']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Station</label>
                                <input class="form-control input-lg" id="inputlg" type="text" name="station" value=<?php echo $user['station']; ?> required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control input-lg" id="inputlg" type="text" name="password" value=<?php echo md5($user['pass1']); ?> placeholder="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="number" class="form-control" placeholder="age" name="age" id="age" value=<?php echo $user['age']; ?> required="required" pattern="^[A-Za-z]{2,25}">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="radio" checked value="male">
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
                    <div class="row">
                        <div class="col-md-4 ">
                            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('..\inc\footer.php');?>

    <script type="text/javascript">
        function toggler() {
            var blur = document.getElementById('blur');
            blur.classList.toggle('active');
            var pop = document.getElementById('pop');
            pop.classList.toggle('active');
        }

        function cancle() {
            var v = $(this).value;
            alert(v);
        }
    </script>



</body>
