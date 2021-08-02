<title>Trains :: Railgadi</title>
<?php 
    require '../database/dbcon.php'; 
    
    $sql = 'SELECT * FROM train';
    $statement = $pdo->prepare($sql);

    $statement->execute();

    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php include('../inc/header.php'); ?>
<?php include('../inc/nav.php'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Trains</h2>
            <a href="/train/create.php"><button class="fa fa-plus btn btn-primary">Add Train</button></a>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Train Number</th>
                        <th>Arrival Time</th>
                        <th>Departure Time</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($infos as $info): ?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $info->name;?></td>
                        <td><?= $info->tnumber;?></td>
                        <td><?= $info->arrival_time;?></td>
                        <td><?= $info->departure_time;?></td>
                        <td><?= $info->_from;?></td>
                        <td><?= $info->_to;?></td>
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
</div>
