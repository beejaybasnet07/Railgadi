<?php

include('database\dbcon.php');
$code = $_GET['id'];
echo"<script>alert($code);</script>";
    $query = "UPDATE book set flag=1 where code=:code";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':code',$code);
    $result=$stmt->execute();
    if($result){
        header('location:userprofile.php');
    }


?>