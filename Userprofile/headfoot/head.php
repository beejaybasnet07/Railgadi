<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Railgadi</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../CSS/userprofile.css" <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <style>
  #blur.active{
filter: blur(5px); 
pointer-events: none;
user-select: none;
}

    #pop {
      position: fixed;
      top: 40%;
      left: 50%;
      width: 600px;
      padding: 30px;
      transform: translate(-50%, -50%);
      box-shadow: 0 5px 30px rgba(0, 0, 0, .50);
      background: #f8f9fa;
      visibility: hidden;
      opacity: 0;
      transition: 0.5s;

    }

    #pop.active {
      top: 50%;
      opacity: 1;
      visibility: visible;
      transition: 0.5s;
      border-radius: 20px;
    }

    #pop.one {
      position: relative;
    }

    .one.second {
      position: absolute;
      margin-left: 500px;
    
    }
  </style>

</head>