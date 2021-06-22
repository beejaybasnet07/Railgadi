<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<script>
    $(function() {
        var count = 1;
        $('#btn').click(function() {
            $('#con').append("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><form id='con'><div class='row'><div class='col-md-3'><input type='text' class='form-control' id='inputEmail4' placeholder='Name'></div><div class='col-md-2'><input type='number' class='form-control' id='inputEmail4' placeholder='Age'></div><div class='col-md-2'><div class='form-group'><select name='gender' class='form-control'><option>Male</option><option>female</option></select></div></div><div class='col-md-3'><input type='text' class='form-control' id='inputEmail4' placeholder='Preferences'></div><div class='col-md-2'><div class=form-group'><select name='country'class='form-control'><option>Nepal</option><option>India</option></select></div></div></form></div></div>");
            count++;
            if (count > 4){
                $('#btn').prop('disabled', true);
            }
        });
    });
</script>

<?php if (isset($_POST['ac3'])) {
    $tname = $_POST['tname'];
    $tire = $_POST['tire1'];
    $_to = $_POST['_to'];
    $_from = $_POST['_from'];
    $date = $_POST['date'];
    $tnumber=$_POST['tnumber'];
    $ac3 = "AC 3 Tire (3A) | HIGH CLASS";
    
} ?>
<?php if (isset($_POST['ac2'])) {
    $tname = $_POST['tname'];
    $tire = $_POST['tire2'];
    $_to = $_POST['_to'];
    $_from = $_POST['_from'];
    $date = $_POST['date'];
    $tnumber=$_POST['tnumber'];
    $ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
    
} ?>
<?php if (isset($_POST['sleeper'])) {
    $tname = $_POST['tname'];
    $tire = $_POST['tire3'];
    $_to = $_POST['_to'];
    $_from = $_POST['_from'];
    $date = $_POST['date'];
    $tnumber=$_POST['tnumber'];
    $sleeper = " SLEEPER CLASS(SL) | GENERAL";
} ?>
<div class="container-fluid" id="main">
    <div class="row" id="logo">
        <div class="col-5 offset-1 ">
            <h2 style="color:blue;">Railgadi</h2>
            <!--<img src="../images/logo.jpg" height="200px"  >-->
        </div>
        <div class="col-2 offset-4  ">book
        </div>
    </div>
    <div class="container" id="sub">
        <div class="row" id="name">
            <div class="col">
                <h2><?php echo $tname; ?></h2>
            </div>
        </div>
        <div class="row" id="source">
            <div class="col-3">
                <h4><?php echo $_from; ?></h4>
                <h5><?php echo $date; ?></h5>
            </div>
            <div class="col-3">
                <h4> -5hrs-</h4>
            </div>
            <div class="col-3">
                <h4><?php echo $_to; ?></h4>
                <h5><?php echo $date; ?></h5>
            </div>
            <div class="col-3">
                <h4>Available-0077</h4>
            </div>
        </div>
           <hr>
        <div class="row" id="sitting">
            <div class="col-md offset-md-4">
                <h3 style="background-color:darkgrey; "> <?php echo $tire; ?></h3>
            </div>
        </div>
        <div class="row" id="boarding">
            <div class="col">
                <h5>Boarding Station | <?php echo $_from; ?> | Arrival: 5:00 | Depature: 6:00 |Boarding Date | <?php echo $date; ?></h5>
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
        <div class="row">
            <div class="col">
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
                            <?php if (isset($_POST['sleeper'])) { ?>
                                <option>Lower berth</option>
                                <option>upper berth</option>
                                <option>middle berth</option>
                                <option> Side Lower berth</option>
                                <option> Side upper berth</option>
                            <?php } ?>
                            <?php if (isset($_POST['ac2'])) { ?>
                                <option>Lower berth</option>
                                <option>upper berth</option>
                                <option> Side Lower berth</option>
                                <option> Side upper berth</option>
                            <?php } ?>
                            <?php if (isset($_POST['ac3'])) { ?>
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
                    <input type="number" class="form-control" id="inputEmail4" name="phone" placeholder="phone">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputEmail4" name="email" placeholder="email">
                </div>

            </div>
          <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-info" id="btn"><i class="fa fa-plus"></i> Add Passenger</button>
                 </div>
            </div> 
    </div>
    <div class="container" id="des">
        <div class="row" id="inside_des">Destination details
        </div>
        <div class="row">
            <div class="col-md-3">
                <input type="text" class="form-control" id="inputEmail4" name="station" placeholder="Station Name">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="inputEmail4" name="scity" placeholder="City">
            </div>

        </div>
    </div>
    
    <div class="row">
        <div class="col-2 offset-md-1">

<?php if (isset($_POST['ac3'])) {?> <input type="hidden" name="tire" value=" <?php echo $ac3; ?>"></input><?php }?>
<?php if (isset($_POST['ac2'])) {?> <input type="hidden" name="tire" value=" <?php echo $ac2; ?>"></input><?php }?>
<?php if (isset($_POST['sleeper'])){?> <input type="hidden" name="tire" value="<?php echo $sleeper; ?>"></input><?php }?>

                <input type="hidden" name="tname" value="<?php echo $tname; ?>"></input>
               <input type="hidden" name="_to" value="<?php echo $_to; ?>"></input>
                <input type="hidden" name="_from" value="<?php echo $_from; ?>"></input>
                <input type="hidden" name="date" value="<?php echo $date; ?>"></input> 
                <input type="hidden" name="tnumber" value="<?php echo $tnumber; ?>"></input>
                <button type="submit" class="btn btn-success" name="continue">Continue</button>
        </div>
     
    </div>
  
</form>
</div>