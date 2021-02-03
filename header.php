<?php
include_once("all_query.php");
if(isset($_SESSION['admin']))
{
  header("location:admin/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style>
        .nav-link{
          font-size: 20px!important;
        }
   </style>
   <link rel="stylesheet" href="style.css">
   </head>
<body>
<div class="header" id="header">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="index.php"> <img class="logoimg img-responsive" src="logo.png" title="Programming skills" alt="Programming skills"></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="start.php">Start Test</a>
      </li>
    
      <?php if(!isset($_SESSION['user'])):?>
                                <?php echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';?>
								<?php endif;?>
								<?php if(isset($_SESSION['user'])):?>
									<li class="dropdown nav-item">
                 <?php echo '<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="color:blue"> '.$_SESSION['user'].'</a>';?>
								
								<ul class="dropdown-menu"><li>
								<?php echo '<a href="dashboard.php">Dashboard</a></li><li><a href="logout.php">Logout</a></li>';?>
								</li></ul></li>
								<?php endif;?>
               
    </ul>
  </div>
  
</nav>

</body>
</html>