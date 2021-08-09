<!DOCTYPE html>
<html lang="en">

<head>

  <?php include('inc\header.php'); ?>
  <?php include('inc\nav.php'); ?>

  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <title> </title>
</head>

<body>
  <div class="container" >
    <div  class="search" style="padding-top: 50px;">
      <form method="POST" action="../Railgadi/Search/search.php">
        <div class="row" style="padding-bottom: 20px;">
          <div class="col" id="col">
            <h1  id="h11" class="pt-5 font-weight-bold">Search For Trains</h1>
            <h5 id="h66" class=" pt-2 text-black-50">make your journey easier and faster</h5>
</div>
        </div>

        <div class="form-box">
          <div class="row">
            <div class="col-md-3">
          <input type="text" class="search-field location" placeholder="FROM" name="from" required>
            </div>
            <div class="col-md-3">
          <input type="text" class="search-field location" placeholder="TO" name="to" required>
            </div>
            <div class="col-md-3">
          <input class="search-field date" type="date" name="date" required>
            </div>
            <div class="col-md-3 pr-4">
          <button class="search-btn" type="submit" name="search">Search</button>
            </div>
          </div>

        </div>
      </form>
    </div>


  <div class="container bg-warning" id="con">
    <div class="row">
      <div class="col pl-5 pt-3" >
        <h2 class="book">Book trains seats in 3 steps</h2>
        <p class="bookp">Railgadi provies easier and faster bookings</p>
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