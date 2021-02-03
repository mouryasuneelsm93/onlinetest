

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
?>
 <div class="container-fluid">
    <?php
    
include_once("all_query.php");
$obj=new Details();
$result=$obj->data_user();
// print_r($result);
?>
<table class="table table-striped " id="table_id">
    <thead style="font-size:30px;color:#5BB349;">
    <tr>
        <th>Id</th>
        <th>Language</th>
        <th>Marks</th>
    </tr>
    </thead>
    <tbody style="font-size:20px;color:#274C90;">
    
        <?php $i=0; foreach($result as $key=>$value):?>
            <tr>
            <td><?php $i=$i+1; echo $i;?></td>
            <?php foreach($value as $key=>$value1):?>
            <?php if($key!='id'):?>
            <?php echo "<td>$value1</td>";?>
            <?php endif;?>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

 </div>

 <?php
include_once("footer.php");
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