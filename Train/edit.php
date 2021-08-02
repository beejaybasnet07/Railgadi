<title>Edit Train::Railgadi</title>

<?php 
        require '../database/dbcon.php';

    $id =  $_GET['id'];
    
    $sql = 'SELECT * FROM train WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    $information = $statement->fetch(PDO::FETCH_OBJ);

    $train = isset($_POST['name'])
            && isset($_POST['tnumber'])
            && isset($_POST['arrival_time'])
            && isset($_POST['departure_time'])
            && isset($_POST['_from'])
            && isset($_POST['_to']);

    if($train){
        // echo 'submitted';

        $name = $_POST['name'];
        $tnumber = $_POST['tnumber'];
        $arrival_time = $_POST['arrival_time'];
        $departure_time = $_POST['departure_time'];
        $from = $_POST['_from'];
        $to = $_POST['_to'];

        $sql = 'UPDATE train SET name=:name, tnumber=:tnumber, arrival_time=:arrival_time, departure_time=:departure_time, _from=:_from, _to=:_to WHERE id=:id';
        
        $statement = $pdo->prepare($sql);
        
        $data = [
            ':id' => $id,
            ':name' => $name,
            ':tnumber' => $tnumber,
            ':arrival_time' => $arrival_time,
            ':departure_time' => $departure_time,
            ':_from' => $from,
            ':_to' => $to,
        ];
        // echo($name);

        if($statement->execute($data)){
            header("Location: /train/index.php");
        }
    }
?>

<?php include('../inc/header.php'); ?>
<?php include('../inc/nav.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Train</h2>
        </div>
        <div class="card-body">
            <form method='post'>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input value="<?= $information->name; ?>" type="text" name="name" id="train_name" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tnumber">Train Number</label><span class="text-danger">*</span>
                        <input value="<?= $information->tnumber; ?>" type="text" name="tnumber" id="tnumber" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="arrival_time">Arrival Time</label><span class="text-danger">*</span>
                        <input value="<?= $information->arrival_time; ?>" type="time" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="departure_time">Departure Time</label><span class="text-danger">*</span>
                        <input value="<?= $information->departure_time; ?>" type="time" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="from">From</label><span class="text-danger">*</span>
                        <input value="<?= $information->_from; ?>" type="text" name="_from" id="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to">To</label><span class="text-danger">*</span>
                        <input value="<?= $information->_to; ?>" type="text" name="_to" id="to" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="fa fa-save btn btn-success"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>