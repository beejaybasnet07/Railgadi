<title>Admin :: Railgadi</title>
<?php 
    require '../database/dbcon.php'; 
    
    $sql = 'SELECT * FROM admin';
    $statement = $pdo->prepare($sql);

    $statement->execute();

    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php include('../inc/header.php'); ?>
<?php include('../admin/nav.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Admins</h2>
            <a href="create.php"><button class="fa fa-plus btn btn-primary">Add Admin</button></a>
        </div>
    </div>

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