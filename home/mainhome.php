

<?php include('inc\header.php')?>
<?php include('inc\nav.php')?>

<body>

<div class="search">
<form method="POST" action="../Search/search.php">
    <h1>Search For Trains</h1>
	   <div class="form-box">
       <input type="text" class="search-field location" placeholder="from"  name="from" required>
       <input type="text" class="search-field location" placeholder="to" name="to" required>
       <input class="search-field date" type="date" name="date" required>
       <button class="submit-btn" type="submit" name="search">Search</button>

      </div> 
  </form>      
</div>


</body>

<?php include('inc\footer.php')?>
</html>