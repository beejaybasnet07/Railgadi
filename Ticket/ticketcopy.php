<?php
session_start();
include('database\dbcon.php');
include('headfoot\head.php');
?>
<?php
function  random($numx,$numy)
{
    return (rand($numx, $numy));
} 

?>
<?php
$ar = array();
$res = array();
$class;
$num1;$num2;

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
        $num1=12;$num2=22;
   
          }
elseif ($preference == "Lower berth") {
    $num1=1;$num2=11;

      }
      
            elseif ($preference == "middle berth") {
              $num1=39;$num2=46;
         
                }
                elseif ($preference == "Side Lower berth") {
                  $num1=23;$num2=30;
             
                    }
                  elseif ($preference == "Side Lower berth") {
                      $num1=31;$num2=38;
                 
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
                    $ab = random($num1,$num2);
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
                    if ($count == 0) {
                        $query3 = "insert into book(tid,pid,class,berth,seat,date) values(:tid ,:pid ,:class, :berth, :seat, :date);";
                        $stmt = $pdo->prepare($query3);
                        $stmt->bindParam(':tid', $result['id']);
                        $stmt->bindParam(':pid', $passid);
                        $stmt->bindParam(':class', $_SESSION['class']);
                        $stmt->bindParam(':berth', $preference);
                        $stmt->bindParam(':seat', $ab);
                        $stmt->bindParam(':date', $result['date']);
                        $stmt->execute();
                        echo "<script>alert('passenger booking successfully.')</script>";
                    }
                }
            }
        







        
    
}


?>



<div class="container">
    <nav class="navbar navbar-light bg-white">
        <a class="navbar-brand" href="..\index.php">
            <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
            <span style="color:skyblue;"> Railgadi</span>
        </a>
    </nav>
    <div class="container" style="border: 2px solid whitesmoke;margin-bottom:10px;border-radius:10px;">

        <div class="row">
            <div class="col" >
                <h1 style="color: greenyellow; padding-left:100px;">Congratulations your booking is successful !!!</h1>
                <div class="col pr-5" id="ple">
                    <h5> Please carry required verification documents for validation.</h5>
                </div>
            </div>
        </div>


    </div>
    <div class="container" style="border: 2px solid whitesmoke;background-color:#fafa16;padding-top:20px;border-radius:5px;">
        <div class="row">
            <div class="col-md-4 offset-2" id="con1">
                <div class="row">
                    <div class="col-md offset-1">
                        <h2> Passenger's Details</h2>
                        <hr>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md pl-5">
                        <h6>Passenger </h6>
                        <h3> <?php echo $pname; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6>No. of travellers</h6>
                        <h3> <?php echo $_SESSION['passenger']; ?></h3>
                    </div>


                    <div class="col-md">
                        <h6> phone</h6>
                        <h3>98484949</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6> Age</h6>
                        <h3><?php echo $age ?></h3>
                    </div>


                    <div class="col-md ">
                        <h6> Gender</h6>
                        <h3><?php echo $gender; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md pl-5">
                        <h6>Email</h6>
                        <h4><?php echo $email; ?></h4>
                    </div>
                </div>


            </div>
            <div class="col-5  " id="con2">

                <div class="row">
                    <div class="col-md offset-1">
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