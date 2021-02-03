

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
$i=0;
?>      
 <div class="container-fluid">
     <div class="row pt-5 pl-5">
         <div class="col">
         <table class="table table-striped " id="table_id">
    <thead style="font-size:30px;color:#5BB349;">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody style="font-size:20px;color:#274C90;">
    
        <?php foreach($result as $key=>$value):?>
            <?php $i=$i+1;?>
            <tr>
                <?php echo "<td>$i</td>";?>
                <?php foreach($value as $key=>$value1):?>
                    <?php if($key=='id'):?>
                        <?php $id=$value1;?>
                    <?php endif;?>
                    <?php if($key!='id'):?>
                        <?php echo "<td>$value1</td>";?>
                        
                    <?php endif;?>
                <?php endforeach;?>
                <?php echo "<td><a href='single_user_info.php?id=$id' class='btn btn-primary'>more_info</a></td>";?>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
         </div>
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
    $('#table_id').DataTable(
      
    );
} );
</script>