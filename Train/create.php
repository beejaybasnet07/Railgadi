<title>Add Admin :: Railgadi</title>

<?php 
    require '../database/dbcon.php';

    $train = isset($_POST['name'])
            && isset($_POST['tnumber'])
            && isset($_POST['arrival_time'])
            && isset($_POST['departure_time'])
            && isset($_POST['date'])
            && isset($_POST['_from'])
            && isset($_POST['_to'])
            && isset($_POST['ac2price'])
            && isset($_POST['ac3price'])
            && isset($_POST['sprice']);

    if($train){
        $name = $_POST['name'];
        $tnumber = $_POST['tnumber'];
        $arrival_time = $_POST['arrival_time'];
        $departure_time = $_POST['departure_time'];
        $date = $_POST['date'];

        //time calculation
        $time1 = explode(':', $arrival_time);
        $time2 = explode(':', $departure_time);
    
        $minutes1 = ($time1[0] * 60.0 + $time1[1]);
        $minutes2 = ($time2[0] * 60.0 + $time2[1]);
    
        $time_diff = $minutes2 - $minutes1;
        $time = date('i:s',$time_diff);

        $from = $_POST['_from'];
        $to = $_POST['_to'];
        $ac2price = $_POST['ac2price'];
        $ac3price = $_POST['ac3price'];
        $sprice = $_POST['sprice'];

        $sql = 'INSERT INTO train (name, tnumber, arrival_time, departure_time, date, time, _from, _to, ac2price, ac3price, sprice)
                 VALUES (:name, :tnumber, :arrival_time, :departure_time, :date, :time, :from, :to, :ac2price, :ac3price, :sprice)';
    
        $statement = $pdo->prepare($sql);

        $data = [
            ':name' => $name,
            ':tnumber' => $tnumber,
            ':arrival_time' => $arrival_time,
            ':departure_time' => $departure_time,
            ':date' => $date,
            ':time' => $time,
            ':from' => $from,
            ':to' => $to,
            ':ac2price' => $ac2price,
            ':ac3price' => $ac3price,
            ':sprice' => $sprice,
        ];

        if($statement->execute($data)){
            header('Location: /train/index.php');
        }
    }   
?>

<?php include('../inc/header.php'); ?>
<?php include('../admin/nav.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
                <h2 style="margin-bottom:-30px;">Train <a href="/train/index.php" style="font-size:small"><< Back to Trains</a></h2>
        </div>

        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="font-weight-bold">Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" id="train_name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tnumber" class="font-weight-bold">Train Number</label><span class="text-danger">*</span>
                        <input type="text" name="tnumber" id="tnumber" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="arrival_time" class="font-weight-bold">Arrival Time</label><span class="text-danger">*</span>
                        <input type="time" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="departure_time" class="font-weight-bold">Departure Time</label><span class="text-danger">*</span>
                        <input type="time" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date" class="font-weight-bold">Date</label><span class="text-danger">*</span>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="from" class="font-weight-bold">From</label><span class="text-danger">*</span>
                        <input type="text" name="_from" id="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to" class="font-weight-bold">To</label><span class="text-danger">*</span>
                        <input type="text" name="_to" id="to" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ac2price" class="font-weight-bold">AC2 Price</label><span class="text-danger">*</span>
                        <input type="number" name="ac2price" id="ac2price" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ac3price" class="font-weight-bold">AC3 Price</label><span class="text-danger">*</span>
                        <input type="number" name="ac3price" id="ac3price" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sprice" class="font-weight-bold">Sleeper Class Price</label><span class="text-danger">*</span>
                        <input type="number" name="sprice" id="sprice" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="fa fa-save btn btn-success"> Save and Back</button>
                </div>
            </form>
            <a href="/train/index.php"><button class="fa fa-ban btn btn-dark"> Cancel</button></a>
        </div>
    </div>
</div>
