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




    $query = "Select * from train where tnumber=:tnumber";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':tnumber', $_SESSION["trainid"]);
    $stmt->execute();
    $result = $stmt->fetch();
} ?>

<div class="container-fluid" id="remain">

    <div class="row">
        <div class="col-5 offset-1 ">logo</div>
        <div class="col-2 offset-4  ">book</div>
    </div>


    <div class="container" id="resub">
        <div class="row" id="inside">
            <div class="col-9 mt-3" id="up">
                <div class="row" id="rename">
                    <div class="col ">
                        <h2><?php echo $result['name']; ?></h2>
                    </div>
                </div>
                <div class="row mt-3" id="resource">
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

            <div class="col-md-2 ml-5 mt-3" id="re" style="border:2px solid gray; border-radius:5px;" >
                <div class="row" >
                    <div class="col">
                        <h5>FARE SUMMARY</h5>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        Fare:
                            <?php if ($_SESSION["class"] = "ac3") {
                                echo ($phone) . "*" . ($result['ac3price']) . "=" . ($phone) * ($result['ac3price']);
                                $total = ($phone) * ($result['ac3price']);
                            } else if ($_SESSION["class"] = "ac2") {
                                echo ($phone) . "*" . ($result['ac2price']) . "=" . ($phone) * ($result['ac2price']);
                                $total = ($phone) * ($result['ac2']);
                            } else if ($_SESSION["class"] = "sleeper") {
                                echo ($phone) . "*" . ($result['sprice']) . "=" . ($phone) * ($result['sprice']);
                                $total = ($phone) * ($result['sleeper']);
                            } ?>
                            </div>
                </div>
                <div class="row">
                    <div class="col"> Tax: <span>
                            <?php echo $phone . "* 45 =" . ($phone * 45); ?><span></div>
                </div>
                <div class="row">
                    <div class="col"> Insurance: <span>
                            <?php echo $phone . "* 5 =" . ($phone * 5); ?> <span> </div>
                </div>
                <hr>
                <div class="row" style="font-weight:bold;">
                    <div class="col">TOTAL FARE: <span>
                            <?php
                            echo ($phone * 50) + $total; ?><span> </div>
                </div>
            </div>
        </div>


    </div>
    <div class="container" id="last">

        <div class="row" id="pass">
            <h5 style="font-weight:bold;">Passenger Details</h5>
        </div>
        <div class="row" id="name">
            <h6> 1 <span style="font-weight:bold;"><?php echo $pname; ?>
                </span> <?php echo $age; ?>yrs | <?php echo $gender; ?> | <?php echo $country; ?> | <?php echo $result['_from']; ?>

        </div>
    </div>

</div>
<div class="container" id="last1">
    <div class="row" id="pass1">Your ticket will be sent to
        <h5 style="font-weight:bold;"> <?php echo $phone; ?> <span> |</span><?php echo $email; ?> </h5>

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
            <input type="hidden" name="phone" value="<?php echo $phone; ?>"></input>
            <input type="hidden" name="preference" value="<?php echo $preference; ?>"></input>

            <input type="hidden" name="email" value="<?php echo $email; ?>"></input>
            <input type="hidden" name="gender" value="<?php echo $gender; ?>"></input>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>

    </div>
</form>
</div>