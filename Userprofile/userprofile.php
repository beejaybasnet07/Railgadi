<?php
include('database\dbcon.php');
include('headfoot\head.php'); ?>
<body>
	
	<div class="container rounded bg-white mt-5 mb-5">
           <div class="row">
        <div class="col border-right">
            <div class=" align-items-center text-center">
                <img class="rounded-circle mt-5" src="https://images.creativemarket.com/0.1.0/ps/5161410/1820/1213/m1/fpnw/wm1/vsqkokzhqi4n9sc3egd5rsrwpgkzalgn3avvrlyq4wxexeqmj1kzhj7wv5ft5hag-.jpg?1538906191&s=49c35ea48818c8cc21efce331f008716" height="200px" width="300px"><h3>
                	<span class="font-weight-bold">Railgadi</span></h3> <h4><span class="text-black-50">beejaybasnet01@gmail.com</span></h4><span> </span>
            </div>
        </div>
    </div>
           <div class="row">
        <div class="col-md-4">
            <div class="p-3 py-5">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Update Profile</button></div>
            </div>
        </div>
        <div class="col-md-8 border-left">
            <div class="p-3 py-5">
            	<div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">Booking Details</h4>
                </div>

            	<table class="table table-striped">
  <thead>
       <tr class="bg-dark text-white">
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
    
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><button class="btn btn-primary profile-button" type="button">Cancle</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
       <td><button class="btn btn-primary profile-button" type="button">Cancle</button></td>

    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
            <td><button class="btn btn-primary profile-button" type="button">Cancle</button></td>

    </tr>
  </tbody>
</table>
               
            </div>
        </div>

    </div>
    
</div>
</div>
</div>
</body>