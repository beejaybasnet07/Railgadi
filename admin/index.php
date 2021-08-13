<title>Admin :: Railgadi</title>

<?php 
    include('../inc/header.php'); 
    include('../admin/nav.php'); 
?>

<?php 
    require '../database/dbcon.php'; 
    
    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    $sql = "";
    
    if(empty($name) && empty($email)){
        $sql = "SELECT * FROM admin;";
    }
    
    if(!empty($name)){
        $sql .= "SELECT * FROM admin WHERE name LIKE '%$name%';";
    }
    
    if(!empty($email)){
        $sql .= "SELECT * FROM admin WHERE email LIKE '%$email%';";
    } 

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>



<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Admins</h2>
            <a href="create.php"><button class="fa fa-plus btn btn-primary">Add Admin</button></a>
        </div>
    </div>

    <form method="post">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="email">Email</label>
                <input type="text" name ="email" class="form-control">
            </div>
            <div class="col-md-3" style="margin-top:34px">
                <button type ="submit" class="btn btn-info btn-sm" id="filter">Search</button>
                <button class="btn btn-danger btn-sm" id="clear">Clear</button>
            </div>
        </div>
    </form>

    <div class="mt-2" id="horizontal" style="width:100%; height:400px; overflow: scroll;">
        <table class="table table-striped table-bordered " style="white-space:nowrap;">
                <thead class="thead-dark">
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width:10%">Actions</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($infos as $info): ?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $info->name?></td>
                            <td><?= $info->email?></td>
                            <td>
                                <a href="edit.php?id=<?= $info->id ?>"><button class="fa fa-edit btn btn-warning btn-sm" data-toggle="tooltip" title="Edit"></button></a>
                                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $info->id ?>"><button class="fa fa-trash btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"></button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
</div>

<div style="height: 35px;"></div>