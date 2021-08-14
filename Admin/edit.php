<title>Edit Train :: Railgadi</title>

<?php 
    include('../inc/header.php'); 
    include('../admin/nav.php'); 
?>

<?php 
    require '../database/dbcon.php';

    $id =  $_GET['id'];
    
    $sql = "SELECT * FROM admin WHERE id = $id";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $information = $statement->fetch(PDO::FETCH_OBJ);

    $train = isset($_POST['name'])
            && isset($_POST['email'])
            && isset($_POST['password']);

    if($train){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = MD5($password);

        $sql = 'UPDATE admin SET name=:name, email=:email, password=:password WHERE id=:id';
        
        $statement = $pdo->prepare($sql);
        
        $data = [
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        ];

        if($statement->execute($data)){
            header("Location: ../admin/index.php");
        }
    }
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Admin <a href="/admin/index.php" style="font-size:small"><< Back to Admins</a></h2>
        </div>
        <div class="card-body">
            <form method='post'>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name" class="font-weight-bold">Name</label><span class="text-danger">*</span>
                        <input value="<?= $information->name; ?>" type="text" name="name" id="train_name" class="form-control" required>
                    </div>
                    <div class="col col-md-9"></div>
                    <div class="form-group col-md-4">
                        <label for="admin_email" class="font-weight-bold">Email</label><span class="text-danger">*</span>
                        <input value="<?= $information->email; ?>" type="email" name="email" id="admin_email" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password" class="font-weight-bold">Password</label><span class="text-danger">*</span>
                        <input value="<?= $information->password; ?>" type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="repassword" class="font-weight-bold">Re-Type Password</label><span class="text-danger">*</span>
                        <input value="<?= $information->password; ?>" type="password" name="repassword" id="repassword" class="form-control" onblur="check()" required>
                        <label id="lb"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="fa fa-save btn btn-success"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function check() {

        var text1 = document.getElementById("password").value;
        var text2 = document.getElementById("repassword").value;

        if (text1 != text2) {

            document.getElementById("lb").style.color = "red";
            document.getElementById('lb').innerHTML = "Password Do Not Match";

        } else {
            document.getElementById("lb").style.color = "Green";
            document.getElementById('lb').innerHTML = "Password Match";
        }

    }
</script>