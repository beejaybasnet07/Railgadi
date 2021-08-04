<?php 
    require '../database/dbcon.php';

    $id = $_GET['id'];
    $sql = 'DELETE FROM train WHERE id=:id';
    $statement = $pdo->prepare($sql);

    if($statement->execute([':id' => $id])){
        header('Location: /train/index.php');
    }
?>