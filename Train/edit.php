<title>Edit Train :: Railgadi</title>

<?php 
    include('../inc/header.php'); 
    include('../admin/nav.php'); 
?>

<?php 
    require '../database/dbcon.php';

    $id =  $_GET['id'];
    
    $sql = "SELECT * FROM train WHERE id = $id";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $information = $statement->fetch(PDO::FETCH_OBJ);

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

        $sql = 'UPDATE train SET name=:name, tnumber=:tnumber, arrival_time=:arrival_time, departure_time=:departure_time, date=:date, _from=:_from, _to=:_to, ac2price=:ac2price, ac3price=:ac3price, sprice=:sprice WHERE id=:id';
        
        $statement = $pdo->prepare($sql);
        
        $data = [
            ':id' => $id,
            ':name' => $name,
            ':tnumber' => $tnumber,
            ':arrival_time' => $arrival_time,
            ':departure_time' => $departure_time,
            ':date' => $date,
            // ':time' => $time,
            ':_from' => $from,
            ':_to' => $to,
            ':ac2price' => $ac2price,
            ':ac3price' => $ac3price,
            ':sprice' => $sprice,
        ];

        if($statement->execute($data)){
            header("Location: ../train/index.php");
        }
    }
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Train <a href="/train/index.php" style="font-size:small"><< Back to Trains</a></h2>
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
                        <label for="date">Date</label><span class="text-danger">*</span>
                        <input value="<?= $information->date; ?>" type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="from">From</label><span class="text-danger">*</span>
                        <input value="<?= $information->_from; ?>" type="text" name="_from" id="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to">To</label><span class="text-danger">*</span>
                        <input value="<?= $information->_to; ?>" type="text" name="_to" id="to" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ac2price">AC2 Price</label><span class="text-danger">*</span>
                        <input value="<?= $information->ac2price; ?>" type="number" name="ac2price" id="ac2price" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ac3price">AC3 Price</label><span class="text-danger">*</span>
                        <input value="<?= $information->ac3price; ?>" type="number" name="ac3price" id="ac3price" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sprice">Sleeper Class Price</label><span class="text-danger">*</span>
                        <input value="<?= $information->sprice; ?>" type="number" name="sprice" id="sprice" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="fa fa-save btn btn-success"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>