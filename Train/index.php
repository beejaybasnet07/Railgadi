<title>Trains :: Railgadi</title>

<?php 
    include('../inc/header.php'); 
    include('../admin/nav.php'); 
?>

<?php 
    require '../database/dbcon.php'; 

    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $tnumber = isset($_POST['tnumber']) ? $_POST['tnumber'] : NULL;
    $from = isset($_POST['from']) ? $_POST['from'] : NULL;
    $to = isset($_POST['to']) ? $_POST['to'] : NULL;
    $ac2price = isset($_POST['ac2price']) ? $_POST['ac2price'] : NULL;
    $ac3price = isset($_POST['ac3price']) ? $_POST['ac3price'] : NULL;
    $sprice = isset($_POST['sprice']) ? $_POST['sprice'] : NULL;

    $sql = "";
    if(empty($name) && empty($tnumber) && empty($from)  && empty($to)  && empty($ac2price)  && empty($ac3price)  && empty($sprice)){
        $sql = 'SELECT * FROM train';
    }
    
    if(!empty($name)){
        $sql .= "SELECT * FROM train WHERE name LIKE '%$name%';";
    }  

    if(!empty($tnumber)){
        $sql .= "SELECT * FROM train WHERE tnumber LIKE '%$tnumber%';";
    }   

    if(!empty($from)){
        $sql .= "SELECT * FROM train WHERE _from LIKE '%$from%';";
    }    

    if(!empty($to)){
        $sql .= "SELECT * FROM train WHERE _to LIKE '%$to%';";
    }   
         
    if(!empty($ac2price)){
        $sql .= "SELECT * FROM train WHERE ac2price = $ac2price;";
    } 

    if(!empty($ac3price)){
        $sql .= "SELECT * FROM train WHERE ac3price = $ac3price;";
        echo $sql;
    }   

    if(!empty($sprice)){
        $sql .= "SELECT * FROM train WHERE sprice = $sprice;";
    }   

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $infos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Trains</h2>
            <a href="create.php"><button class="fa fa-plus btn btn-primary">Add Train</button></a>
        </div>
    </div>

    <form method="post">
        <div class="row">
            <div class="form-group col-md-2">
                <label for="tnumber">Train Number</label>
                <input type="text" name ="tnumber" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="from">From</label>
                <input type="text" name="from" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="to">To</label>
                <input type="text" name="to" class="form-control">
            </div>
        </div>
        <div class="row">        
            <div class="form-group col-md-2">
                <label for="ac2price">AC2 Price</label>
                <input type="number" name="ac2price" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="ac3price">AC3 Price</label>
                <input type="number" name="ac3price" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="sprice">Sleeper Class Price</label>
                <input type="number" name="sprice" class="form-control">
            </div>
            
            <div class="col-md-3" style="margin-top:34px">
                <button type ="submit" class="btn btn-info btn-sm" id="filter">Search</button>
                <button class="btn btn-danger btn-sm" id="clear">Clear</button>
            </div>
        </div>
    </form>

    <div class="mt-2" id="horizontal" style="table-layout: auto; width:100%; height:500px; overflow: scroll; ">
            <table id="fixed-headers" class="table table-striped table-bordered" style="white-space:nowrap;">
                <thead class="thead-dark">
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Train Number</th>
                            <th>Arrival Time</th>
                            <th>Departure Time</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>AC2 Price<br><small>(in NRS)</small></th>
                            <th>AC3 Price<br><small>(in NRS)</small></th>
                            <th>Sleeper Class<br>Price <small>(in NRS)</small></th>
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
                            <td><?= date('h:i A',strtotime($info->arrival_time))?></td>
                            <td><?= date('h:i A',strtotime($info->departure_time))?></td>
                            <td><?= $info->date?></td>
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
<div class="row"></div>
