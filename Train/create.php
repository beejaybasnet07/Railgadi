<title>Add Train :: Railgadi</title>
<?php 
    require '../database/dbcon.php';

    $train = isset($_POST['name'])
            && isset($_POST['tnumber'])
            && isset($_POST['arrival_time'])
            && isset($_POST['departure_time'])
            && isset($_POST['_from'])
            && isset($_POST['_to']);

    if($train){
        $name = $_POST['name'];
        $tnumber = $_POST['tnumber'];
        $arrival_time = $_POST['arrival_time'];
        $departure_time = $_POST['departure_time'];
        $from = $_POST['_from'];
        $to = $_POST['_to'];

        $sql = 'INSERT INTO train (name,tnumber,arrival_time,departure_time,_from,_to) VALUES (:name, :tnumber, :arrival_time, :departure_time, :from, :to)';
    
        $statement = $pdo->prepare($sql);

        $data = [
            ':name' => $name,
            ':tnumber' => $tnumber,
            ':arrival_time' => $arrival_time,
            ':departure_time' => $departure_time,
            ':from' => $from,
            ':to' => $to,
        ];

        if($statement->execute($data)){
            header('Location: /train/index.php');
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
            <form method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" id="train_name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tnumber">Train Number</label><span class="text-danger">*</span>
                        <input type="text" name="tnumber" id="tnumber" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="arrival_time">Arrival Time</label><span class="text-danger">*</span>
                        <input type="time" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="departure_time">Departure Time</label><span class="text-danger">*</span>
                        <input type="time" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="from">From</label><span class="text-danger">*</span>
                        <input type="text" name="_from" id="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to">To</label><span class="text-danger">*</span>
                        <input type="text" name="_to" id="tp" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="fa fa-save btn btn-success"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
