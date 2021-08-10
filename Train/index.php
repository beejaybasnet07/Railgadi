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
            <a href="create.php"><button class="fa fa-plus btn btn-primary">Add Train</button></a>
        </div>
    </div>

    <div class="mt-2" id="horizontal" style="table-layout: auto; width:100%; height:500px; overflow: scroll; ">
            <table id="fixed-headers" class="table table-striped table-bordered" style="white-space:nowrap;">
                <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Train Number</th>
                            <th>Arrival Time</th>
                            <th>Departure Time</th>
                            <th>Date</th>
                            <th>Time</br><small>(H:I)</small></th>
                            <th>From</th>
                            <th>To</th>
                            <th>AC2 Price</th>
                            <th>AC3 Price</th>
                            <th>Sleeper Class Price</th>
                            <th>Actions</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($infos as $info): ?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $info->name?></td>
                            <td><?= $info->tnumber?></td>
                            <td><?= date('h:i',strtotime($info->arrival_time))?></td>
                            <td><?= date('h:i',strtotime($info->departure_time))?></td>
                            <td><?= $info->date?></td>
                            <td><?= date('h:i',strtotime($info->time)) ?></td>
                            <td><?= $info->_from?></td>
                            <td><?= $info->_to?></td>
                            <td><?= $info->ac2price?></td>
                            <td><?= $info->ac3price?></td>
                            <td><?= $info->sprice ?></td>
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
