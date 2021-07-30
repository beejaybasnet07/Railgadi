<!DOCTYPE html>
<html lang="en">

<head>

  <?php include('inc\header.php'); ?>
  <?php include('inc\nav.php'); ?>

  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <title> </title>
</head>

<body>
  <div class="container">
    <div class="search">
      <form method="POST" action="../Railgadi/Search/search.php">
        <div class="row">
          <div class="col" id="col">
            <h1 id="h11">Search For Trains</h1>
            <h6 id="h66">make your journey easier and faster</h6>
          </div>
        </div>

        <div class="form-box">
          <input type="text" class="search-field location" placeholder="FROM" name="from" required>
          <input type="text" class="search-field location" placeholder="TO" name="to" required>
          <input class="search-field date" type="date" name="date" required>
          <button class="search-btn" type="submit" name="search">Search</button>

        </div>
      </form>
    </div>


  <div class="container bg-warning" id="con">
    <div class="row">
      <div class="col pl-5 pt-3" >
        <h2 style="color:white; ">Book trains seats in 3 steps</h2>
        <p>Railgadi provies easier and faster bookings</p>
      </div>
    </div>
    <div class="card-columns mt-2 pb-2">
      <div class="card text-center">
        <blockquote class="blockquote mb-0 card-body">
          <img src="images\search.png">
          <footer class="blockquote-footer">
            <h5> Search trains</h5>
          </footer>
        </blockquote>
      </div>
      <div class="card text-center">
        <blockquote class="blockquote mb-0 card-body">
          <img src="images\book.png">

          <footer class="blockquote-footer">
            <small class="text-muted">
              <h5> Book seats</h5>
            </small>
          </footer>
        </blockquote>
      </div>
      <div class="card text-white text-center p-3">
        <blockquote class="blockquote mb-0">
          <img src="images\ccard.png">
          <footer class="blockquote-footer">
          <small class="text-muted">
            <h5>
              Pay and Relex
            </h5>
          </small>
          </footer>
        </blockquote>
      </div>
    </div>
  </div>
  </div>
</body>

<?php include('inc\footer.php') ?>

</html>