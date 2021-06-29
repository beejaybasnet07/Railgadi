<?php

include('database\dbcon.php');
include('headfoot\head.php');
?>
<?php
function  random() {
  return(rand(1,11));
  
}?>
<?php
$ar=array();
$result=array();
if (isset($_POST['submit'])) {
    $ac3 = "AC 3 Tire (3A) | HIGH CLASS";
    $ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
    $sleeper = " SLEEPER CLASS(SL) | GENERAL";

    $tname = $_POST['tname'];
    $tire = $_POST['tire'];
    echo $tire;
    $_to = $_POST['_to'];
    $_from = $_POST['_from'];
    $date = $_POST['date'];
    $tnumber = $_POST['tnumber'];

    $pname = $_POST['pname'];
    $age = $_POST['page'];
    $gender = $_POST['gender'];
    $preference = $_POST['preference'];
    echo $preference;
    $country = $_POST['country'];
    $station = $_POST['station'];
    $scity = $_POST['scity'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "Select id from train WHERE tnumber=:tnumber;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':tnumber', $tnumber);
    $stmt->execute();
    $tid = $stmt->fetch();
    echo $tid['id'];
    $trainid = $tid['id'];

    $query1 = "Select id from passenger WHERE pname=:pname AND phone=:phone AND email=:email;";
    $stmt = $pdo->prepare($query1);
    $stmt->bindParam(':pname', $pname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $ti = $stmt->fetch();
    echo $ti['id'];
    $passid = $ti['id'];
    $seatava = 0;

    if (preg_match("/HIGH/", $tire)) {
        $ac3name = "ac3";
        if ($preference == "Lower berth") {

            $query2 = "select count(seat) from book WHERE tid=:tid AND date=:date AND berth=:berth;";
            $stmt = $pdo->prepare($query2);
            $stmt->bindParam(':tid', $trainid);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':berth', $preference);
            $stmt->execute();
            $result = $stmt->fetch();
            if((11-$result[0])<$phone)
            { 
                echo("no seat available");
            }
            else
             {   
                    for($x=1;$x<=$n;$x++) 
                      {
                         l1:
                           $count=0;
                           $ab=random();
                           $ar[$x]=$ab;
                           $query1 = "Select seat from book where pid=87 AND tid=1;";
                           $stmt = $pdo->query($query1);
                           $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            //echo $ab;
                           foreach($result as $ro)
                          {  
                              if($ab==$ro->seat) 
                              $count=1;
                          }
                              if ($count==1)
                                {
                                       //echo("this is already assigned."); 
                                      goto l1;
                                 }
                             if($count==0)
                            {
                                $query3 = "insert into book(tid,pid,class,berth,seat,date) values(:tid ,:pid ,:class, :berth, :seat, :date);";
                                $stmt = $pdo->prepare($query3);
                                $stmt->bindParam(':tid', $trainid);
                                $stmt->bindParam(':pid', $passid);
                                $stmt->bindParam(':class', $ac3name);
                                $stmt->bindParam(':berth', $preference);
                                $stmt->bindParam(':seat', $ab);
                                $stmt->bindParam(':date', $date);
                                $stmt->execute();
                                echo "<script>alert('passenger booking successfully.')</script>";
                             }
            }
        }


















           
        }























        if ($preference == "upper berth") {
             rand(12, 22);
            echo $a;
            $seatava = $a;
        }
          for ($i=0;$i<$phone;$i++){
              $a=funname();
              $arr[$i]=$a;
        $query3 = "insert into book(tid,pid,class,berth,seat,date) values(:tid ,:pid ,:class, :berth, :seat, :date);";
        $stmt = $pdo->prepare($query3);
        $stmt->bindParam(':tid', $trainid);
        $stmt->bindParam(':pid', $passid);
        $stmt->bindParam(':class', $ac3name);
        $stmt->bindParam(':berth', $preference);
        $stmt->bindParam(':seat', $a);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        echo "<script>alert('passenger booking successfully.')</script>";}
    }
   
}


?>
<div class="container">

    <div class="row">
        <div class="col-5 offset-1 "><img src="../images/logo1.jpg" height="200px;"></div>

    </div>
    <div class="row" id="cong">
        <h1 style="color: greenyellow;">Congratulations your booking is successful</h1>
        <h5> Please carry required verification documents for validation.</h5>
    </div>
    <div class="row" id="ticket">
        <div class="col" id="tic">
            <h2> Journey Details</h2>
        </div>
    </div>
    <div>
        <div class="row" id="name">
            <div class="col-9">
                <h3> <?php echo $tname; ?>[<?php echo $tnumber; ?>] </h3>
            </div>
            <div class="col-3">
                <h3> <?php echo $date; ?> </h3>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <h5>From-to</h5>
            <h2><?php echo $_from; ?> ---- <?php echo $_to; ?> </h2>
        </div>
        <div class="col">
            <h5>Name</h5>
            <h3> <?php echo $tname; ?> </h3>
        </div>
        <div class="col">
            <h5>Number</h5>
            <h3> <?php echo $tnumber; ?> </h3>
        </div>
        <div class="col">
            <h5>Date</h5>
            <h3> <?php echo $date; ?> </h3>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <h5>Traveller </h5>
            <h3> <?php echo $pname; ?> </h3>
        </div>

        <div class="col">
            <h5> Seat Number</h5>
            <h3> <?php for($i=1;$i<=$phone;$i++){ echo $ar[$i]." "; }?></h3>
        </div>


        <div class="col">
            <h5> Berth</h5>
            <h3><?php echo $preference; ?> </h3>
        </div>
        <div class="col">
            <h5>Class</h5>
            <h4> <?php echo $tire; ?> </h4>
        </div>

    </div>
</div>