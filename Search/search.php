<?php

include('headfoot\head.php');
include('database\dbcon.php');
include('inc\nav.php'); ?>
<?php

$ac3 = "AC 3 Tire (3A) | HIGH CLASS";
$ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
$sleeper = " SLEEPER CLASS(SL) | GENERAL";
if (isset($_POST['search'])) {
  $_SESSION['s_from'] = $_POST['from'];
  $_SESSION['s_to'] = $_POST['to'];
  $_SESSION['s_date'] = $_POST['date'];
}
$query = "Select * from train where _from=:from AND _to=:to AND date=:date";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':from', $_SESSION['s_from']);
$stmt->bindParam(':to',  $_SESSION['s_to']);
$stmt->bindParam(':date',  $_SESSION['s_date']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<body>
  <div class="container">
    <div class="container">
      <form action="" method="POST">
        <div class="row" id="ro2">

          <div class="col-lg">
            <div class="form-group">
              <div class="form-label-group">
                <label for="exampleInputEmail1">From</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="from" aria-describedby="emailHelp" value="<?php echo  $_SESSION['s_from']; ?>" placeholder="From">
              </div>
            </div>
          </div>

          <div class="col-lg">
            <div class="form-group">
              <div class="form-label-group">
                <label for="name"> TO</label>
                <input type="text" id="name" class="form-control" placeholder=" to" name="to" required="required" value="<?php echo  $_SESSION['s_to']; ?>" pattern="^[A-Za-z][A-Za-z ,.'-]+">

              </div>
            </div>
          </div>
          <div class="col-lg">
            <div class="form-group">
              <div class="form-label-group">
                <label for="name"> Date</label>
                <input type="date" id="name" class="form-control" placeholder=" Date" name="date" required="required" value="<?php echo  $_SESSION['s_date']; ?>" pattern="^[A-Za-z][A-Za-z ,.'-]+">
              </div>
            </div>
          </div>


          <div class="col-lg">
            <div class="form-group">
              <div class="form-label-group">
                <label for="name">Modify Search</label>
                <input type="submit" class="btn btn-info btn-block" id="register" name="search" value="submit"></input>
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php
              if (!empty($result)) { ?>
        <div class="row" id="res">
          <div class="col-8 pl-5" id="re">
            <h4 class="text-black-50 font-weight-bold"> Result Filters</h4>
          </div>
        
        </div>
    </div><?php } ?>

      <?php
      if (empty($result)) { ?>
        <div class="row">
          <div class="col">
            <img style=" margin:50px 0px 0px 60px;" src="http://www.medical.sjp.ac.lk/my-scripts/staff-profiles/view-profiles/supports/images/no-results-found.png">
          </div>
        </div>
      <?php  } ?>

      <?php if ($result) {
        foreach ($result as $row) {
          $a = $row->id;
      ?>
          <div class="container" id="con1">
            <div class="row">
              <div class="col-lg-5">
                <h3 style="color:white;"> <?php echo $row->name; ?>[<?php echo $row->tnumber; ?>]
                </h3>
              </div>
              <div class="col-lg-5">
                <h5> <span class="text-black-50">Runs On<span> <span class="text-muted font-weigh-normal">&nbsp;&nbsp;[&nbsp; M T U T F S S &nbsp;]</span></h5>
              </div>
              <div class="col-lg-2">
                <input class="btn btn-primary" type="submit" value="Schedule">
              </div>
            </div>
            <div class="row" id="source">
              <div class="col-sm-6">
                <h5>
                  <?php
                  echo trim($row->time);
                  echo ("  |  ");
                  echo ($row->_from);
                  echo ("  | ");
                  echo ($row->date); ?>
                </h5>
              </div>
              <div class="col-sm-3">
                <h5> 5 hours</h5>
              </div>
              <div class="col-sm-3">
                <h5><?php echo ($row->_to);
                    echo (" | ");
                    echo ($row->date); ?></h5>
              </div>
            </div>
            <form method="POST" action="../Book/book.php">
              <div class="row" id="app">
                <div class="col-sm-3" id="ap">
                  <h4> AC 3 Tire(3A)</h4>
                  <div class="col" id="a">
                    <hr size="50">
                    <?php
                    $class = "ac3";
                    $query1 = "Select COUNT(seat) from book where tid=:tnumber AND date=:date AND class=:class AND flag=0";
                    $stmt = $pdo->prepare($query1);
                    $stmt->bindParam(':tnumber', $a);
                    $stmt->bindParam(':date',$_SESSION['s_date']  );
                    $stmt->bindParam(':class', $class);
                    $stmt->execute();
                    $res = $stmt->fetch();



                    ?>
                    <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;<?php echo (22 - $res[0]); ?></span> </h5>
                    <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs <?php echo $row->ac3price; ?></span></h5>
                  </div>
                  <div class="col" id="btn">


                    <input type="hidden" name="tnumber" value="<?php echo $row->tnumber; ?>"></input>
                    <input type="submit" class="btn btn-success btn-block" id="register" name="ac3" value="BOOK"></input>
                  </div>
                </div>
                <div class="col-sm-3" id="ap">

                  <h4> AC 2 Tire(2A)</h4>
                  <div class="col" id="a">
                    <hr size="50">
                    <?php
                    $class = "ac2";
                    $query1 = "Select COUNT(seat) from book where tid=:tnumber AND date=:date AND class=:class AND flag=0";
                    $stmt = $pdo->prepare($query1);
                    $stmt->bindParam(':tnumber', $a);
                    $stmt->bindParam(':date', $_SESSION['s_date'] );
                    $stmt->bindParam(':class', $class);
                    $stmt->execute();
                    $res = $stmt->fetch();



                    ?>
                    <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;<?php echo (32 - $res[0]); ?></span> </h5>

                    <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs <?php echo $row->ac2price; ?></span></h5>
                  </div>
                  <div class="col" id="btn">

                    <input type="hidden" name="tnumber" value="<?php echo $row->tnumber; ?>"></input>
                    <input type="submit" class="btn btn-success btn-block" id="register" name="ac2" value="BOOK"></input>
                  </div>
                </div>

                <div class="col-sm-3" id="ap">
                  <h4> SLEEPER CLASS(SL)</h4>
                  <div class="col" id="a">
                    <hr size="50">
                    <?php
                    $class = "sleeper";
                    $query1 = "Select COUNT(seat) from book where tid=:tnumber AND date=:date AND class=:class and flag=0";
                    $stmt = $pdo->prepare($query1);
                    $stmt->bindParam(':tnumber', $a);
                    $stmt->bindParam(':date', $_SESSION['s_date'] );
                    $stmt->bindParam(':class', $class);
                    $stmt->execute();
                    $res = $stmt->fetch();



                    ?>
                    <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;<?php echo (46 - $res[0]); ?></span> </h5>
                    <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs <?php echo $row->sprice; ?></span></h5>
                  </div>
                  <div class="col" id="btn">

                    <input type="hidden" name="tnumber" value="<?php echo $row->tnumber; ?>"></input>
                    <input type="submit" class="btn btn-success btn-block" id="register" name="sleeper" value="BOOK"></input>
                  </div>
                </div>
              </div>



          </div>
          </form>
      <?php }
      } ?>
    </div>

  </div>
</body>
<?php include('..\inc\footer.php');?>
