

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<?php include "header.php";
	
	if(isset($_SESSION['admin']))
	{
		header("location:admin/dashboard.php");
	}
	?>
    <!---login--->
			<div class="container pt-5 pb-5">
                <div class="row">
							<div class="col-sm-6">
									 <h3>New User</h3>
									 <a class="acount-btn" href="signup.php">Create an Account</a>
								</div>
								<div class="col-sm-6">
									<h3>Registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form id="login">
                                    <div class="row pb-2">
									  <div class="col-sm-3">
										<span>Email Address<label>*</label></span>
                                      </div>
                                      <div class="col-sm-6">
										<input type="email" name="username" class="form-control" required> 
									  </div>
                                    </div>
                                    <div class="row">
									  <div class="col-sm-3">
										<span>Password<label>*</label></span>
										</div>
                                      <div class="col-sm-6">
									
                                        <input type="password" name="pass" class="form-control" required> 
									  </div>
                                    </div>
									  <!-- <a class="forgot" href="#">Forgot Your Password?</a> -->
									  <input type="submit" value="Login" class="btn btn-success" style="background-color:#274C90;">
                                    </div>
									</form>
								</div>	
               </div>
			</div>
<!-- login -->
<?php include "footer.php";?>
</body>
</html>
