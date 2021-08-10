<title>Admin :: Railgadi</title>
<?php include('../inc/header.php'); ?>
<?php include('../admin/nav.php'); ?>

<?php 
    require '../database/dbcon.php';

    //total users
    $statement = $pdo->prepare("SELECT * FROM user");
    $statement->execute();
    $user_count = $statement->rowCount();

    //total ticket booking today
    $date = date('y-m-d');
    $statement =  $pdo->prepare("SELECT * FROM book WHERE date = '$date'");
    $statement->execute();
    $count = $statement->rowCount();

    //filter datas
    $date = isset($_POST['date']) ? $_POST['date'] : NULL;
    $code = isset($_POST['code']) ? $_POST['code'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    // echo($name);

    $sql = '';
    
    if($date != NULL && $name == NULL && $code == NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.date = '$date'";
    }else if($date == NULL && $name == NULL && $code != NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.code = $code";
    }else if($date == NULL && $name != NULL && $code == NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE p.pname = '$name'";
    }else if($date != NULL && $name != NULL && $code == NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.date = '$date' && p.pname = '$name'";
    }else if($date != NULL && $name == NULL && $code != NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.date = '$date' && b.code = $code";
    }else if($date == NULL && $name != NULL && $code != NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE p.pname = '$name' && b.code = $code";
    }else if($date != NULL && $name != NULL && $code != NULL){
        $sql = "SELECT b.date, b.code, p.pname FROM book as b LEFT JOIN passenger as p ON p.id = b.pid WHERE b.date = '$date' && p.pname = '$name' && b.code = $code";
    }

    $statement = $pdo->prepare($sql);
    $statement->execute();
?>

<div class="container mb-5">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats bg-info">
                <div class="card-body">
                    <h5 class="card-title text-uppercase font-weight-bold mb-0 h5">Total Ticket</br>Booking Today</h5>
                    <span class="fa fa-check pr-2"></span>
                    <span class="h2 font-weight-bold mb-0"><?= $count;?></span>
                </div>
            </div>
        </div> <div class="col-xl-3 col-md-6">
            <div class="card card-stats bg-info">
                <div class="card-body">
                    <h5 class="card-title text-uppercase font-weight-bold mb-0 h3">Total Users</h5>
                    <span class="fa fa-users pr-2"></span>
                    <span class="h2 font-weight-bold mb-0"><?= $user_count;?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h3>Filter By</h3>
    <form method="post">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="date">Date</label>
                <input type="date" name ="date" id="book_date" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="code">Code</label>
                <input type="code" name="code" id="code" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="name">Name</label>
                <input type="name" name="name" id="p_name" class="form-control">
            </div>
            
            <div class="col-md-3" style="margin-top:34px">
                <input type ="submit" class="btn btn-info btn-sm" id="filter">
                <button class="btn btn-danger btn-sm" id="clear">Clear</button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Information</h2>
        </div>
    </div>
    <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Date</th>
                        <th>Code</th>
                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                        <?php 
                            while($rows=$statement->fetch(PDO::FETCH_ASSOC)){
                                extract($rows);
                        ?>
                            <tr>
                                <td><?= $i++;?></td>
                                <td><?= $date;?></td>
                                <td><?= $code;?></td>
                                <td><?= $pname;?></td>
                            </tr>
                        <?php 
                            }
                        ?>
                </tbody>
    </table>
</div>



