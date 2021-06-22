<?php

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

    $query = "INSERT INTO passenger(pname, age, scity, country, station, phone, email, gender) VALUES (:pname, :age, :scity, :country, :station,:phone, :email, :gender)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':scity', $scity);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':station', $station);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();

    $tname = $_POST['tname'];
    $tnumber = $_POST['tnumber'];
    $tire = $_POST['tire'];
    $_to = $_POST['_to'];
    $_from = $_POST['_from'];
    $date = $_POST['date'];
} ?>

<div class="container-fluid" id="remain">

    <div class="row">
        <div class="col-5 offset-1 ">logo</div>
        <div class="col-2 offset-4  ">book</div>
    </div>


    <div class="container" id="resub">
        <div class="row" id="inside">
            <div class="col-9" id="up">
                <div class="row" id="rename">
                    <div class="col">
                        <h2><?php echo $tname; ?></h2>
                    </div>
                </div>
                <div class="row" id="resource">
                    <div class="col-md-3">
                        <h4>6:00 | <?php echo $_from; ?></h4>
                        <h5><?php echo $date; ?></h5>
                    </div>
                    <div class="col-md-3">
                        <h4> -5hrs-</h4>
                    </div>
                    <div class="col-md-3">
                        <h4><?php echo $_to; ?></h4>
                        <h5><?php echo $date; ?></h5>
                    </div>
                    <div class="col-md-3">
                        <h4>Available-0077</h4>
                    </div>
                </div>


                <div class="row" id="reboarding">
                    <div class="col-md">
                        <h6>1 Adult | 0 children | <?php echo $tire; ?> | Boarding at <?php echo $_to; ?> |<?php echo $date; ?> </h6>
                    </div>
                </div>
            </div>

            <div class="col-md-2" id="re" style="background-color: skyblue;margin-left:30px;">
                <div class="row" style="background-color:cornflowerblue;color:white">
                    <h5>FARE SUMMARY</h5>
                </div>
                <div class="row">Ticket Fare: <span style="margin-left:27px;"> Rs 340<span> </div>
                <div class="row"> Tax: <span style="margin-left:80px;"> Rs 45<span></div>
                <div class="row"> Insurance: <span style="margin-left:38px;"> Rs 2<span> </div>
                <div class="row" style="font-weight:bold;"> TOTAL FARE: <span style="margin-left:30px;">Rs 387<span> </div>
            </div>
        </div>


    </div>
    <div class="container" id="last">

        <div class="row" id="pass">
            <h5 style="font-weight:bold;">Passenger Details</h5>
        </div>
        <div class="row" id="name">
            <h6> 1 <span style="font-weight:bold;"><?php echo $pname; ?></span> <?php echo $age; ?>yrs | <?php echo $gender; ?> | <?php echo $country; ?> | <?php echo $_from; ?>

        </div>
    </div>

</div>
<div class="container" id="last1">
    <div class="row" id="pass1">Your ticket will be sent to
        <h5 style="font-weight:bold;"> <?php echo $phone; ?> <span> |</span><?php echo $email; ?> </h5>

    </div>


</div>
<form action="../Ticket/ticket.php" method="POST">
    <div class="row">

        <div class="col-2 offset-md-1">
            <a href="../Book/book.php"><button type="button" class="btn btn-primary">Back</button></a>
            <input type="hidden" name="tname" value="<?php echo $tname; ?>"></input>
            <input type="hidden" name="_to" value="<?php echo $_to; ?>"></input>
            <input type="hidden" name="_from" value="<?php echo $_from; ?>"></input>
            <input type="hidden" name="date" value="<?php echo $date; ?>"></input>
            <input type="hidden" name="tire" value="<?php echo $tire ?>"></input>
            <input type="hidden" name="tnumber" value="<?php echo $tnumber ?>"></input>

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