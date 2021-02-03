

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    
</head>
<body>

<?php
include_once("header.php");
include_once("../all_query.php");
$obj=new Details();
$result=$obj->tbl_user_show();
// print_r($result);
$i=count($result);
?>      
 <div class="container-fluid">
     <div class="row pt-5 pl-5">
         <div class="col-sm-3">
         <div class="card bg-warning">
            <div class="card-header" style="text-align:center;color:blue;font-weight:bold">Total Number of User</div>
            <div class="card-body" style="height:30vh;text-align:center;font-size:10.5rem;color:rgba(0,0,0,.5)"><?php echo $i;?></div>
            <div class="card-footer" style="text-align:center;color:blue;font-weight:bold"><a href="user_detail.php">more info</a></div>
        </div>
        </div>
         <div class="col-sm-4">
             
         </div>
         <div class="col-sm-4"></div>
     </div>
   
 </div>

 <?php
include_once("../footer.php");
?>

</body>
</html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>