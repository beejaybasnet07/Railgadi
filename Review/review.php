<?php

session_start();
include('database\dbcon.php');
include('headfoot\head.php');

?>

<?php
if (isset($_POST['continue'])) {

    $ac3 = "AC 3 Tire (3A) | HIGH CLASS";
    $ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
    $sleeper = " SLEEPER CLASS(SL) | GENERAL";
    $pname = $_POST['pname'];
    $age = $_POST['page'];
    $gender = $_POST['gender'];
    $preference = $_POST['preference'];
    $country = $_POST['country'];
    $station = $_POST['station'];
    $scity = $_POST['scity'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $total = 0;

    $_SESSION['pname'] = $pname;
    $_SESSION['page'] = $age;
    $_SESSION['gender'] = $gender;
    $_SESSION['preference'] =  $preference;
    $_SESSION['country'] = $country;
    $_SESSION['station'] = $station;
    $_SESSION['scity'] = $scity;
    $_SESSION['passenger'] = $phone;
    $_SESSION['email'] = $email;

    $query = "Select * from train where tnumber=:tnumber";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':tnumber', $_SESSION["trainid"]);
    $stmt->execute();
    $result = $stmt->fetch();
} ?>
<?php

$query = "Select * from train where tnumber=:tnumber";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':tnumber', $_SESSION["trainid"]);
$stmt->execute();
$result = $stmt->fetch();


?>


<div class="container" id="resub" style="background-color:#f8f9fa;">
    <nav class="navbar navbar-light" style="background-color:#f8f9fa;">
        <a class="navbar-brand" href="..\index.php">
            <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
            <span class="font-weight-normal text-info">Railgadi</span>
        </a>
    </nav>
    <div class="row" id="inside">
        <div class="col-9 mt-3 ml-3" id="up">
            <div class="row" id="rename">
                <div class="col text-warning">
                    <h2><?php echo $result['name']; ?></h2>
                </div>
            </div>
            <div class="row mt-3 mb-2" id="resource" style="background-color: white;">
                <div class="col-md-3">
                    <h4>6:00 | <?php echo $result['_from']; ?></h4>
                    <h5><?php echo $result['date']; ?></h5>
                </div>
                <div class="col-md-3">
                    <h4> -5hrs-</h4>
                </div>
                <div class="col-md-3">
                    <h4><?php echo $result['_to']; ?></h4>
                    <h5><?php echo $result['date']; ?></h5>
                </div>
                <div class="col-md-3">
                    <h4>Available-0077</h4>
                </div>
            </div>


            <div class="row" id="reboarding">
                <div class="col-md">
                    <h6>1 Adult | 0 children | <?php echo $_SESSION["tire"]; ?> |
                        Boarding at <?php echo $result['_to']; ?> |<?php echo $result['date']; ?> </h6>
                </div>
            </div>
        </div>

        <div class="col-md-2 ml-5 mt-3" id="re" style="border:2px solid gray; border-radius:5px;">
            <div class="row">
                <div class="col text-danger">
                    <h6 id="register_h5">FARE SUMMARY</h6>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    Fare:

                    <?php if ($_SESSION["class"] == "ac3") {
                        echo ($_SESSION['passenger']) . "*" . ($result['ac3price']) . "=" . ($_SESSION['passenger']) * ($result['ac3price']);
                        $total = ($_SESSION['passenger']) * ($result['ac3price']);
                    } elseif ($_SESSION["class"] == "ac2") {
                        echo ($_SESSION['passenger']) . "*" . ($result['ac2price']) . "=" . ($_SESSION['passenger']) * ($result['ac2price']);
                        $total = ($_SESSION['passenger']) * ($result['ac2price']);
                    } elseif ($_SESSION["class"] == "sleeper") {
                        echo ($_SESSION['passenger']) . "*" . ($result['sprice']) . "=" . ($_SESSION['passenger']) * ($result['sprice']);
                        $total = ($_SESSION['passenger']) * ($result['sprice']);
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="col"> Tax: <span>
                        <?php echo $_SESSION['passenger'] . "* 45 =" . ($_SESSION['passenger'] * 45); ?><span></div>
            </div>
            <div class="row">
                <div class="col"> Insurance: <span>
                        <?php echo $_SESSION['passenger'] . "* 5 =" . ($_SESSION['passenger'] * 5); ?> <span> </div>
            </div>
            <hr>
            <div class="row" style="font-weight:bold;">
                <div class="col">TOTAL FARE: <span>
                        <?php
                        echo ($_SESSION['passenger'] * 50) + $total; ?><span> </div>
            </div>
        </div>
    </div>



    <div class="container" id="last" style="background-color: white;">

        <div class="row" id="pass">
            <h4>Passenger Details</h4>
        </div>
        <div class="row" id="name">
            <h6> 1 <span style="font-weight:bold;"><?php echo $_SESSION['pname']; ?>
                </span> <?php echo $_SESSION['page']; ?>yrs | <?php echo $_SESSION['gender']; ?> | <?php echo $_SESSION['country']; ?>
                | <?php echo $result['_from']; ?>
        </div>
    </div>

    <div class="container" id="last1" style="background-color: white;">
        <div class="row">
            <div class="col py-3">Your ticket will be sent to
                <span style="font-weight:bold;padding-left:10px;"> <?php echo $_SESSION['passenger']; ?>
                </span> |<span <span style="font-weight:bold;padding-left:5px;"><?php echo $_SESSION['email']; ?></span>
            </div>
        </div>


    </div>
    <form action="../Ticket/ticketcopy.php" method="POST">
        <div class="row">
            <div class="col-2 offset-md-1">
                <a href="../Book/book.php"><button type="button" class="btn btn-primary">Back</button></a>
                <!--  <input type="hidden" name="tname" value="<?php echo $tname; ?>"></input>
            <input type="hidden" name="_to" value="<?php echo $_to; ?>"></input>
            <input type="hidden" name="_from" value="<?php echo $_from; ?>"></input>
            <input type="hidden" name="date" value="<?php echo $date; ?>"></input>
            <input type="hidden" name="tire" value="<?php echo $tire ?>"></input>
            <input type="hidden" name="tnumber" value="<?php echo $tnumber ?>"></input>-->

                <input type="hidden" name="pname" value="<?php echo $pname; ?>"></input>
                <input type="hidden" name="page" value="<?php echo $age; ?>"></input>
                <input type="hidden" name="station" value="<?php echo $station; ?>"></input>
                <input type="hidden" name="scity" value="<?php echo $scity; ?>"></input>
                <input type="hidden" name="country" value="<?php echo $country; ?>"></input>
                <input type="hidden" name="phone" value="<?php echo $_SESSION['passenger']; ?>"></input>
                <input type="hidden" name="preference" value="<?php echo $preference; ?>"></input>

                <input type="hidden" name="email" value="<?php echo $email; ?>"></input>
                <input type="hidden" name="gender" value="<?php echo $gender; ?>"></input>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>

        </div>

    </form>
</div>
<?php include('..\inc\footer.php'); ?>