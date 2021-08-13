<?php
session_start();
include('database\dbcon.php');
include('headfoot\head.php');
date_default_timezone_set('Asia/Kathmandu');
$new_time = date("Y-m-d H:i:s", strtotime('3 hours'));
?>
<?php
function  random($numx, $numy)
{
    return (rand($numx, $numy));
}

?>
<?php
$ar = array();
$res = array();
$class;
$num1;
$num2;

if (isset($_POST['submit'])) {
    $ac3 = "AC 3 Tire (3A) | HIGH CLASS";
    $ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
    $sleeper = " SLEEPER CLASS(SL) | GENERAL";

    $pname = $_POST['pname'];
    $age = $_POST['page'];
    $gender = $_POST['gender'];
    $preference = $_POST['preference'];
    echo $preference;
    $country = $_POST['country'];
    $station = $_POST['station'];
    $scity = $_POST['scity'];
    $_SESSION['passenger'] = $_POST['phone'];
    $email = $_POST['email'];
    echo $_SESSION['passenger'];

    $query = "Select * from train where tnumber=:tnumber";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':tnumber', $_SESSION["trainid"]);
    $stmt->execute();
    $result = $stmt->fetch();


    $query = "INSERT INTO passenger(pname, age, scity, country, station, phone, email, gender) VALUES (:pname, :age, :scity, :country, :station,:phone, :email, :gender)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':scity', $scity);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':station', $station);
    $stmt->bindParam(':phone', $_SESSION['passenger']);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();
    echo ("passenger added");



    $trainid = $result['id'];

    $query1 = "Select id from passenger WHERE pname=:pname AND phone=:phone AND email=:email;";
    $stmt = $pdo->prepare($query1);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':phone', $_SESSION['passenger']);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $ti = $stmt->fetch();
    echo $ti['id'];
    $passid = $ti['id'];
    $seatava = 0;





    if ($preference == "upper berth") {
        $num1 = 12;
        $num2 = 22;
    } elseif ($preference == "Lower berth") {
        $num1 = 1;
        $num2 = 11;
    } elseif ($preference == "middle berth") {
        $num1 = 39;
        $num2 = 46;
    } elseif ($preference == "Side Lower berth") {
        $num1 = 23;
        $num2 = 30;
    } elseif ($preference == "Side Lower berth") {
        $num1 = 31;
        $num2 = 38;
    }

    $query2 = "select count(seat) from book WHERE tid=:tid AND class=:class AND date=:date AND berth=:berth;";
    $stmt = $pdo->prepare($query2);
    $stmt->bindParam(':tid', $result['id']);
    $stmt->bindParam(':class', $_SESSION['class']);
    echo  $_SESSION["class"];
    $stmt->bindParam(':date', $result['date']);
    $stmt->bindParam(':berth', $preference);
    $stmt->execute();
    $res = $stmt->fetch();
    if ((11 - $res[0]) < $_SESSION['passenger']) {
        /*echo "<script>alert(' SORRY!!  seats are occupied for lower berth. please change preference')</script>";
                sleep(5);
                header("Location:http://localhost/Railgadi/Book/book.php");*/
        echo "<script>alert(' SORRY!!  seats are occupied for lower berth. please change preference');
                   window.location.href='../Book/book.php';</script>";
    } else {
        for ($x = 1; $x <= $_SESSION['passenger']; $x++) {
            l1:
            $count = 0;
            $ab = random($num1, $num2);
            $ar[$x] = $ab;
            $query1 = "Select seat from book where tid=1;";
            $stmt = $pdo->query($query1);
            $stmt->execute();
            $r = $stmt->fetchAll(PDO::FETCH_OBJ);
            //echo $ab;
            foreach ($r as $ro) {
                if ($ab == $ro->seat)
                    $count = 1;
            }
            if ($count == 1) {
                //echo("this is already assigned."); 
                goto l1;
            }
            $code = $result['id'] . $passid . $_SESSION['id'];
            if ($count == 0) {
                $flag = 0;
                $query3 = "insert into book(tid,pid,uid,class,berth,seat,code,date,flag,timestamp) 
                        values(:tid ,:pid ,:uid ,:class ,
                         :berth, :seat, :code, :date, :flag, :timestamp)";
                $stmt = $pdo->prepare($query3);
                $stmt->bindParam(':tid', $result['id']);
                $stmt->bindParam(':pid', $passid);
                $stmt->bindParam(':uid', $_SESSION['id']);
                $stmt->bindParam(':class', $_SESSION['class']);
                $stmt->bindParam(':berth', $preference);
                $stmt->bindParam(':seat', $ab);
                $stmt->bindParam(':code', $code);
                $stmt->bindParam(':date', $result['date']);
                $stmt->bindParam(':flag', $flag);
                $stmt->bindParam(':timestamp', $new_time);
                $stmt->execute();
                echo "<script>alert('passenger booking successfully.')</script>";
            }
        }
    }
}


?>

<div class="container" style="background-color:#f8f9fa;">
    <nav class="navbar navbar-light " style="background-color:#f8f9fa;">
        <a class="navbar-brand" href="..\index.php">
            <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
            <span class="font-weight-normal text-info">Railgadi</span></a>
        </a>
    </nav>
    <div class="container" style="border:2px solid whitesmoke;margin-bottom:10px;border-radius:10px; background-color:white;">
        <div class="row">
            <div class="col">
                <h1 style="color: greenyellow; padding-left:100px;">Congratulations your booking is successful !!!</h1>
                <div class="col pr-5" id="ple">
                    <h5> Please carry required verification documents for validation.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="border: 2px solid whitesmoke;background-color:rgb(230,225,225,0.2);padding-top:20px;border-radius:5px;">
        <div class="row">
            <div class="col pl-2">

                <div class=" text-center float-left">
                    <button class="btn btn-info profile-button" name="print" type="submit">Print</button>
                </div>
            </div>
            <div class="col offset-5">
                <form method="POST" action="">
                    <input type="hidden" name="receiver_email" id="receiver_email" value="<?php echo $email; ?>" />
                    <input type="hidden" name="receiver_pname" id="receiver_pname" value="<?php echo $pname; ?>" />
                    <input type="hidden" name="receiver_pre" id="receiver_pre" value="<?php echo $preference; ?>">
                    <input type="hidden" name="receiver_tname" id="receiver_tname" value="<?php echo $result['name']; ?>">
                    <input type="hidden" name="receiver_tdate" id="receiver_tdate" value="<?php echo $result['date']; ?>">
                    <input type="hidden" name="receiver_time" id="receiver_time" value="<?php echo $result['time']; ?>">
                    <input type="hidden" name="code" id="s_to" value="<?php echo $_SESSION['s_to']; ?>" />
                    <input type="hidden" name="code" id="code" value="<?php echo $code; ?>" />
                    <input type="hidden" name="code" id="s_from" value="<?php echo $_SESSION['s_from']; ?>" />
                    <input type="hidden" name="code" id="class" value="<?php echo $_SESSION['class']; ?>" />
                    <div class=" text-center float-right">
                        <button class="btn btn-info profile-button" type="submit" name="send" id="send">SendToMail</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-2 mb-2" id="tcon1" style=" background-color: white;
              border-radius: 10px;
              border: 1px solid skyblue;">
                <div class="row">
                    <div class="col-md offset-1">
                        <h2> Passenger's Details</h2>
                        <hr>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md pl-5 ">
                        <h6>Passenger </h6>
                        <h3> <?php echo $pname; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6>No. of travellers</h6>
                        <h3> <?php echo $_SESSION['passenger']; ?></h3>
                    </div>


                    <div class="col-md pl-5">
                        <h6> phone</h6>
                        <h3>98484949</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-sm-5">
                        <h6> Age</h6>
                        <h3><?php echo $age ?></h3>
                    </div>


                    <div class="col-md ">
                        <h6> Gender</h6>
                        <h3><?php echo $gender; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-md-5">
                        <h6>Email</h6>
                        <h4><?php echo $email; ?></h4>
                    </div>
                </div>


            </div>
            <div class="col-md-5 offset-md-1" id="con2">

                <div class="row">
                    <div class="col-md offset-md-1">
                        <h2> <i class="fa fa-train" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp; Journey Details</h2>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md pl-5">
                        <h3><?php echo $result['_from']; ?>&nbsp;&nbsp;
                            <i class="far fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;<?php echo $result['_to']; ?>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6>Number</h6>
                        <h3> <?php echo $result['tnumber']; ?> </h3>
                    </div>
                    <div class="col-md">
                        <h6>Date</h6>
                        <h3> <?php echo $result['date']; ?> </h3>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6> Seat Number</h6>
                        <h3> <?php for ($i = 1; $i <= $_SESSION['passenger']; $i++) {
                                    echo $ar[$i] . "  ";
                                } ?></h3>
                    </div>


                    <div class="col-md">
                        <h6> Berth</h6>
                        <h3><?php echo $preference; ?> </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6>Class</h6>
                        <h4><?php echo $_SESSION["tire"]; ?> </h4>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md" id="bord">
            <h6> ** Please be at boarding station ahead of departure time.</h6>
        </div>
    </div>
</div>
<?php include('..\inc\footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#send").on("click", function(e) {
            alert("checked");
            e.preventDefault();
            var name = $('#receiver_pname').val();
            var email = $('#receiver_email').val();
            var train = $('#receiver_tname').val();
            var date = $('#receiver_tdate').val();
            var pre = $('#receiver_pre').val();
            var clas = $('#class').val();
            var time = $('#receiver_time').val();
            var sto = $('#s_to').val();
            var sfrom = $('#s_from').val();
            var code = $('#code').val();
            alert(name);
            $.ajax({
                url: "mail/index.php",
                type: "POST",
                data: {
                    username: name,
                    useremail: email,
                    usertrain: train,
                    userdate: date,
                    userpre: pre,
                    userclass: clas,
                    userto: sto,
                    userfrom: sfrom,
                    usertime: time,
                    code: code
                },
                success: function(data) {

                    if (data == "1") {
                        alert(" sorry !! mail not delevered.'\r\n'\check your EmailId and try again.'\n'Thank you.");

                    } else {
                        alert("mail delevired sucessfully.Thank you.");
                    }

                }
            });
        });
    });
</script>
</script>