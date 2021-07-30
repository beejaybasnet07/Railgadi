<?php  
session_start();
include('database\dbcon.php');
include('inc\header.php'); 
?>

<script>
    $(function() {
        var count = 1;
        $('#btn').click(function() {
            $('#con').append("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><form id='con'><div class='row'><div class='col-md-3'><input type='text' class='form-control' id='inputEmail4' placeholder='Name'></div><div class='col-md-2'><input type='number' class='form-control' id='inputEmail4' placeholder='Age'></div><div class='col-md-2'><div class='form-group'><select name='gender' class='form-control'><option>Male</option><option>female</option></select></div></div><div class='col-md-3'><input type='text' class='form-control' id='inputEmail4' placeholder='Preferences'></div><div class='col-md-2'><div class=form-group'><select name='country'class='form-control'><option>Nepal</option><option>India</option></select></div></div></form></div></div>");
            count++;
            if (count > 4) {
                $('#btn').prop('disabled', true);
            }
        });
    });
</script>

<?php if (isset($_POST['ac3'])) {
    
    $tnumber = $_POST['tnumber'];
    $_SESSION["tire"] = "AC 3 Tire (3A) | HIGH CLASS";
    $_SESSION["trainid"] = $tnumber;
    $_SESSION["class"] = "ac3";

} ?>
<?php if (isset($_POST['ac2'])) {
    
    $tnumber = $_POST['tnumber'];
    
    $_SESSION["trainid"] = $tnumber;
    $_SESSION["tire"]="AC 2 Tire (2A) | MEDIUM CLASS";
    $_SESSION["class"] = "ac2";
    echo  $_SESSION["class"];
} ?>
<?php if (isset($_POST['sleeper'])) {
    
    $tnumber = $_POST['tnumber'];
    $_SESSION["tire"]= " SLEEPER CLASS(SL) | GENERAL";
    $_SESSION["trainid"] = $tnumber;
    $_SESSION["class"] = "sleeper";

} ?>
<?php
$query = "Select * from train where tnumber=:train";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':train', $_SESSION["trainid"]);
$stmt->execute();
$result = $stmt->fetch();
?>
<div class="container" id="main">
<nav class="navbar navbar-light bg-white">
        <a class="navbar-brand" href="..\index.php">
            <img src="..\images\logore.png" width="100" height="100" class="d-inline-block align-center " alt="">
            <span style="color:skyblue;"> Railgadi</span>
        </a>
    </nav>
    <div class="container" id="sub">
        <div class="row" id="name">
            <div class="col">
            <?php echo $_SESSION["class"];?>
                <h2><?php echo $result['name']; ?></h2>
            </div>
        </div>
        <div class="row" id="source">
            <div class="col-3">
                <h4><?php echo $result['_from']; ?></h4>
                <h5><?php echo $result['date']; ?></h5>
            </div>
            <div class="col-3">
                <h4> -5hrs-</h4>
            </div>
            <div class="col-3">
                <h4><?php echo $result['_to']; ?></h4>
                <h5><?php echo $result['date']; ?></h5>
            </div>
            <div class="col-3">
            <?php
               echo $result['id'];
             $res=array();
              $query2 = "Select COUNT(seat) from book where tid=:tnumber AND date=:date AND class=:class";
              $stmt = $pdo->prepare($query2);
              $stmt->bindParam(':tnumber', $result['id']);
              $stmt->bindParam(':date', $result['date']);
              $stmt->bindParam(':class', $_SESSION['class']);
              $stmt->execute();
               $res=$stmt->fetch();
               
               

               
              ?>
              <h5>Seats<span style="color:red;font-size:bold;">
              &nbsp;&nbsp;&nbsp;&nbsp;<?php if( $_SESSION["class"] =="sleeper"){ echo(46-($res[0]));}    
                if( $_SESSION["class"] =="ac3"){ echo(22-($res[0]));} 
                if( $_SESSION["class"] =="ac2"){ echo(32-($res[0]));}  ?> </span> </h5>
                
            </div>
        </div>
        <hr>
        <div class="row" id="sitting">
            <div class="col-md offset-md-4">
                <h3 style="background-color:darkgrey; "> <?php echo $_SESSION["tire"]; ?></h3>
            </div>
        </div>
        <div class="row" id="boarding">
            <div class="col my-2 pt-2">
                <h5>Boarding Station | <?php echo $result['_from']; ?> | Arrival: 5:00 | Depature: 6:00 |Boarding Date | <?php echo $result['date']; ?></h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Note !!</strong> You must bring identification card for verification
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="container" style=" border: 2px whitesmoke solid;">
        <div class="row">
            <div class="col my-3">
                <h5> Passengers Details</h5>
            </div>
        </div>

        <form method="POST" action="../Review/review.php">
            <div class="form-row" id="con">
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputEmail4" name="pname" placeholder="Name">
                </div>
                <div class="col-md-1">
                    <input type="number" class="form-control" id="inputEmail4" name="page" placeholder="Age">
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="gender" class="form-control">
                            <option>Male</option>
                            <option>female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="preference" class="form-control">
                            <?php if ($_SESSION["class"] =="sleeper") { ?>
                                <option>Lower berth</option>
                                <option>upper berth</option>
                                <option>middle berth</option>
                                <option> Side Lower berth</option>
                                <option> Side upper berth</option>
                            <?php } ?>
                            <?php if ($_SESSION["class"] =="ac2") { ?>
                                <option>Lower berth</option>
                                <option>upper berth</option>
                                <option> Side Lower berth</option>
                                <option> Side upper berth</option>
                            <?php } ?>
                            <?php if ($_SESSION["class"] =="ac3") { ?>
                                <option>Lower berth</option>
                                <option>upper berth</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <select name="country" class="form-control">
                            <option>Nepal</option>
                            <option>India</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="inputEmail4" name="phone" placeholder="No. of passengers">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputEmail4" name="email" placeholder="email">
                </div>

            </div>
                            </div>
            <div class="row">
                <div class="col py-2">
                    <button type="button" class="btn btn-info" id="btn"><i class="fa fa-plus"></i> Add Passenger</button>
                </div>
            </div>
    <div class="container"  style="  border: 2px whitesmoke solid;">
        <div class="row">
        <div class="col my-3"><h5>Destination details</h5></div>
        </div>
        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-3">
                <input type="text" class="form-control" id="inputEmail4" name="station" placeholder="Station Name">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="inputEmail4" name="scity" placeholder="City">
            </div>

        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-2 ml-3 py-2 pr-2 mt-2">

            <?php if (isset($_POST['ac3'])) { ?> <input type="hidden" name="tire" value=" <?php echo $ac3; ?>"></input><?php } ?>
            <?php if (isset($_POST['ac2'])) { ?> <input type="hidden" name="tire" value=" <?php echo $ac2; ?>"></input><?php } ?>
            <?php if (isset($_POST['sleeper'])) { ?> <input type="hidden" name="tire" value="<?php echo $sleeper; ?>"></input><?php } ?>

           
            <button type="submit" class="btn btn-success" name="continue">Continue</button>
        </div>

    </div>

    </form>
</div>
<?php include('inc\footer.php');?>