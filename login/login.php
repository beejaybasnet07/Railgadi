<?php
include('header.php');
?>
	<div class="container-fluid">
		<div class="row main-content1  text-center">
			<div class="col-md-4 text-center mt-5">
			   <h1>login</h1>
			   <i  style="color:#428df5;margin-top: 80px;"class="fas fa-user-circle fa-5x"></i>
			</div>
			<div class="col border-left">
				<div class="container-fluid">
					<div class="row">
						<div class="col mt-5 mb-5">
						<h3 style="color:#428df5;"> Sign into your Account</h3>
					</div>
					</div>
					<div class="row pr-3 ">
						<form control="" class="form-group">
							<div class="row">
            
              <input type="email" name="email" placeholder="Email" class="form-control my-3 p-4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$">
           

          </div>
          <div class="row">
            
              <input type="password" name="pass1" placeholder="Password" class="form-control my-3 p-4">
            

          </div>
					<div class="row">
								 <button type="submit" class="btn1 mt-3 mb-3 " id="loginbtn">login</button>
							</div>
						</form>
					</div>
					<div class="row">
						<div class="col mt-3">
						<p style="margin-left: 50px;">Don't have an account? <a href="#">Register Here</a></p></div>
					</div>
				</div>
			</div>
		</div>
	</div>
