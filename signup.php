

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<?php include "header.php";
	?>
    <!---login--->
			<div class="container pt-5 pb-5">
                <form id="signup">
                <h5>Name</h5>
                <input type="text" class="form-control" name="user" required>               
                <br>
                <h5>Password</h5>
                <input type="password" class="form-control" name="pass" id="pass" required>               
                <br>
                <h5>Confirm Password</h5>
                <input type="password" class="form-control" name="cpass" id="cpass" required>               
               <br>
                <h5>Email</h5>
                <input type="email" class="form-control" name="email" required>               
                <br>
                <input type="submit" class="btn btn-primary" value="Register" name="submit">               
                </form>
            </div>
<!-- login -->
<?php include "footer.php";?>
</body>
</html>
