<title>Admin :: Railgadi</title>

<?php  
    include('../inc/header.php');  
    include('../admin/nav.php'); 
?>

<?php 
    require '../database/dbcon.php';

    //filter datas
    $date = isset($_POST['date']) ? $_POST['date'] : NULL;
    $code = isset($_POST['code']) ? $_POST['code'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : NULL;

    $sql = "";

    if(!empty($date)){
        $sql .= "SELECT b.date, b.code, b.class, b.berth, b.seat, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.date = '$date';";
    }
    
    if(!empty($code)){
        $sql .= "SELECT b.date, b.code, b.class, b.berth, b.seat, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.code = $code;";
    }
    
    if(!empty($name)){
        $sql .= "SELECT b.date, b.code, b.class, b.berth, b.seat, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE p.pname LIKE '%$name%';";
    }   

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Information</h2>
        </div>
    </div>

    <form method="post">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="date">Date</label>
                <input type="date" name ="date" id="book_date" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="p_name" class="form-control">
            </div>
            
            <div class="col-md-3" style="margin-top:34px">
                <button type ="submit" class="btn btn-info btn-sm" id="filter">Search</button>
                <button class="btn btn-danger btn-sm" id="clear">Clear</button>
            </div>
        </div>
    </form>
    
    <div style="height:400px; overflow: scroll;">
        <table class="table table-bordered mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>S.N</th>
                    <th>Code</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Berth</th>
                    <th>Seat</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($infos as $info): ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $info->code;?></td>
                        <td><?= $info->date;?></td>
                        <td><?= $info->pname;?></td>
                        <td><?= $info->class;?></td>
                        <td><?= $info->berth;?></td>
                        <td><?= $info->seat;?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div style="height: 35px;"></div>


