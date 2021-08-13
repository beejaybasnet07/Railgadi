<title>Users :: Railgadi</title>

<?php include('../inc/header.php'); ?>
<?php include('../admin/nav.php'); ?>

<?php 
    require '../database/dbcon.php';

    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $age = isset($_POST['age']) ? $_POST['age'] : NULL;
    $contact = isset($_POST['contact']) ? $_POST['contact'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;

    $sql = "";

    if(empty($name) && empty($age)  && empty($contact)  && empty($email)){
        $sql = "SELECT pname, age, gender, phone, email FROM user;";
    }

    if(!empty($name)){
        $sql .= "SELECT pname, age, gender, phone, email FROM user WHERE pname LIKE '%$name%';";
    }
    
    if(!empty($age)){
        $sql .= "SELECT pname, age, gender, phone, email FROM user WHERE age = $age;";
    }
    
    if(!empty($contact)){
        $sql .= "SELECT pname, age, gender, phone, email FROM user WHERE phone LIKE '%$contact%';";
    } 

    if(!empty($email)){
        $sql .= "SELECT pname, age, gender, phone, email FROM user WHERE email LIKE '%$email%';";
    } 

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
                <h2>Users<a href="/admin/index.php" style="font-size:small"></a></h2>
        </div>
        <form method="post">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="age">Age</label>
                    <input type="number" name ="age" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
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
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <!-- <th width="5%">Action</th> -->
                    </tr>
            </thead>
            
            <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($infos as $info): ?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $info->pname;?></td>
                            <td><?= $info->age;?></td>
                            <td><?= $info->gender;?></td>
                            <td><?= $info->phone;?></td>
                            <td><?= $info->email;?></td>
                            <!-- <td><button class="btn btn-info btn-sm fa fa-eye"></button></td> -->
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<div style="height: 35px;"></div>