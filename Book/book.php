<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>

<div class="container-fluid" id="main">
    <div class="row">
        <div class="col-5 offset-1 ">logo</div>
        <div class="col-2 offset-4  ">book</div>
    </div>
    <div class="container" id="sub">
        <div class="row" id="name">
            <div class="col">
                <h2>Sagarmatha Express</h2>
            </div>
        </div>
        <div class="row" id="source">
            <div class="col-3">
                <h4>6:00 | Birat</h4>
                <h5>2078/5/3</h5>
            </div>
            <div class="col-3">
                <h4> -5hrs-</h4>
            </div>
            <div class="col-3">
                <h4>Ktm</h4>
                <h5>2078/5/3</h5>
            </div>
            <div class="col-3">
                <h4>Available-0077</h4>
            </div>
        </div>

        <div class="row" id="sitting">
            <div class="col-md offset-md-4">
                <h3 style="background-color:darkgrey; "> Sleeper class(SC) | General</h3>
            </div>
        </div>
        <div class="row" id="boarding">
            <div class="col">
                <h5>Boarding Station | Birat | Arrival: 5:00 | Depature: 6:00 |Boarding Date | 2077/5/3</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Note !!</strong> You must bring identification card for verification
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5> Passengers Details</h5>
            </div>
        </div>
        <form>
            <div class="form-row">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="inputEmail4" placeholder="Age">
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="gender" class="form-control" >
                            <option>Male</option>
                            <option>female</option>
                            
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Preferences">
                </div>
                <div class="col-md-2">
                <div class="form-group">
                        <select name="country" class="form-control" >
                            <option>Nepal</option>
                            <option>India</option>
                            
                            
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Add Passenger</button>
  
               
                </div>
            </div>

        </form>
    </div>
</div>

</div>


<?php include('headfoot\foot.php'); ?>