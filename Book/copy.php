<?php include('headfoot\head.php'); ?>

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <form id='con'>
        <div class="row">
            <div class='col-md-3'>
                <input type='text' class='form-control' id='inputEmail4' placeholder='Name'>
            </div>
            <div class='col-md-2'>
                <input type='number' class='form-control' id='inputEmail4' placeholder='Age'>
            </div>
            <div class='col-md-2'>
                <div class='form-group'>
                    <select name='gender' class='form-control'>
                        <option>Male</option>
                        <option>female</option>
                    </select>
                </div>
            </div>
            <div class='col-md-3'>
                <input type='text' class='form-control' id='inputEmail4' placeholder='Preferences'>
            </div>
            <div class='col-md-2'>
                <div class=form-group'>
                    <select name='country' class='form-control'>
                        <option>Nepal</option>
                        <option>India</option>
                    </select>
                </div>
            </div>
    </form>
</div>

</div>