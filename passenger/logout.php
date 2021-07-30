<?php session_start();?> 

<?php
include('database\dbcon.php');
include('inc\header.php'); 

    session_unset();
    session_destroy();
    echo "<script>window.location.href='../index.php';</script>";

    
    
    //header("Location:.././login.php"); 
    


?>