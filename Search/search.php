<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $ac3 = "AC 3 Tire (3A) | HIGH CLASS";
  $ac2 = "AC 2 Tire (2A) | MEDIUM CLASS";
  $sleeper = " SLEEPER CLASS(SL) | GENERAL";

  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['date'];
  $query = "Select * from train where _from=:from AND _to=:to AND date=:date";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':from', $from);
  $stmt->bindParam(':to', $to);
  $stmt->bindParam(':date', $date);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_OBJ);
  $class = "ac2";
               $query1 = "Select COUNT(*) from book;";
               $stmt = $pdo->query($query1);
               echo $stmt->rowCount();
               $stmt->bindParam(':tnumber', $a);/*
               $stmt->bindParam(':date', $date);
               $stmt->bindParam(':class', $class);*/
              
}
?>

<body>

  <div class="container" id="con">
    <div class="row" id="ro">
      <div class="col-5">
        <h1 style="color:blue;">Railgadi</h1>
      </div>
      <div class="col-5">

      </div>
      <div class="col-1"> <input class="btn btn-primary" type="submit" value="Regiter"></div>
      <div class="col-1"><input class="btn btn-primary" type="submit" value="login"></div>
    </div>
    <div class="row" id="ro2">
      <div class="col-lg">
        <div class="form-group">
          <div class="form-label-group">
            <label for="exampleInputEmail1">From</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="From">
          </div>
        </div>
      </div>

      <div class="col-lg">
        <div class="form-group">
          <div class="form-label-group">
            <label for="name"> TO</label>
            <input type="text" id="name" class="form-control" placeholder=" to" name="destination" required="required" pattern="^[A-Za-z][A-Za-z ,.'-]+">

          </div>
        </div>
      </div>
      <div class="col-lg">
        <div class="form-group">
          <div class="form-label-group">
            <label for="name"> Date</label>
            <input type="date" id="name" class="form-control" placeholder=" Date" name="destination" required="required" pattern="^[A-Za-z][A-Za-z ,.'-]+">
          </div>
        </div>
      </div>
      <div class="col-lg">
        <div class="form-group">
          <div class="form-label-group">
            <label for="name">Seat Class</label>
            <select class="form-control">
              <option>Economy class</option>
              <option>Business class</option>
              <option>First class</option>
            </select>
            <span class="select-arrow"></span>
          </div>
        </div>
      </div>

      <div class="col-lg">
        <div class="form-label-group">
          <div class="form-label-group">
            <label for="name">Modify Search</label>
            <input type="submit" class="btn btn-success btn-block" id="register" name="submit" value="submit"></input>
          </div>
        </div>
      </div>

    </div>

    <div class="row" id="res">
      <div class="col-8" id="re">
        <h5> Result filters</h5>
      </div>
      <div class="col-4" id="re">
        <h6> Number of result for source to destination</h6>
      </div>
    </div>
    <?php foreach ($result as $row) {  
      $a= $row->id;
              
              ?>
      <div class="container" id="con1">
        <div class="row">
          <div class="col-lg-5">
            <h3 style="color:white;"> <?php echo $row->name;?>[<?php echo $row->tnumber;?>]
                                      </h3>
          </div>
          <div class="col-lg-5">
            <h5> <span style="color: white;">Runs On<span> <span style="font-size:20px; color:black;">&nbsp;&nbsp;&nbsp;M T U T F S S</span></h5>
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
              <h4> AC 3 Tire(3A)</h4><div class="col" id="a"><hr size="50" >
              <?php
              
               

               
              ?>
              <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;0110</span> </h5>
              <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs 750</span></h5></div>
              <div class="col" id="btn">

                <input type="hidden" name="tname" value="<?php echo $row->name; ?>"></input>
                <input type="hidden" name="tire1" value=" <?php echo $ac3; ?>  "></input>
                <input type="hidden" name="_to" value="<?php echo $row->_to; ?>"></input>
                <input type="hidden" name="_from" value="<?php echo $row->_from; ?>"></input>
                <input type="hidden" name="date" value="<?php echo $row->date; ?>"></input>
                <input type="hidden" name="tnumber" value="<?php echo $row->tnumber; ?>"></input>
                <input type="submit" class="btn btn-success btn-block" id="register" name="ac3" value="BOOK"></input>
              </div>
            </div>
            <div class="col-sm-3" id="ap">
            
              <h4> AC 2 Tire(2A)</h4><div class="col" id="a"><hr size="50" >
              <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;0110</span> </h5>
              <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs 750</span></h5></div>
              <div class="col" id="btn">
                <input type="hidden" name="tname" value="<?php echo $row->name; ?>"></input>
                <input type="hidden" name="tire2" value=" <?php echo $ac2; ?> "></input>
                <input type="hidden" name="_to" value="<?php echo $row->_to; ?>"></input>
                <input type="hidden" name="_from" value="<?php echo $row->_from; ?>"></input>
                <input type="hidden" name="date" value="<?php echo $row->date; ?>"></input>
                <input type="submit" class="btn btn-success btn-block" id="register" name="ac2" value="BOOK"></input>
              </div>
            </div>

            <div class="col-sm-3" id="ap">
              <h4> SLEEPER CLASS(SL)</h4><div class="col" id="a"><hr size="50" >
              <h5>Seats<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;0110</span> </h5>
              <h5>Price<span style="color:red;font-size:bold;">&nbsp;&nbsp;&nbsp;Rs 750</span></h5></div>
              <div class="col" id="btn">
                <input type="hidden" name="tname" value="<?php echo $row->name; ?>"></input>
                <input type="hidden" name="tire3" value="<?php echo $sleeper; ?>"></input>
                <input type="hidden" name="_to" value="<?php echo $row->_to; ?>"></input>
                <input type="hidden" name="_from" value="<?php echo $row->_from; ?>"></input>
                <input type="hidden" name="date" value="<?php echo $row->date; ?>"></input>
                <input type="submit" class="btn btn-success btn-block" id="register" name="sleeper" value="BOOK"></input>
              </div>
            </div>
          </div>

          

      </div>
      </form>
    <?php } ?>
  </div>

  </div>
</body>
<?php include('headfoot\foot.php'); ?>