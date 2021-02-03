

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
$id=$_GET['id'];
$obj=new Details();
$result=$obj->single_user_info($id);
?>      
<div class="container-fluid">
    <div class="row pt-5 pl-5">
        <div class="col">
             <table class="table table-striped " id="table_id">
                <thead style="font-size:30px;color:#5BB349;">
                    <tr>
                        <th>Id</th>
                        <th>Language</th>
                        <th>Marks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size:20px;color:#274C90;">
                    <?php $i=0;foreach($result as $key=>$value):?>
                        <tr>
                            <td><?php $i=$i+1;echo $i;?></td>
                            <?php foreach($value as $key=>$value1):?>
                                <?php if($key=='id'):?>
                                <?php $ids=$value1;?>
                                <?php endif;?>
                                <?php if($key!='id'):?>
                                <?php echo "<td>$value1</td>";?>
                                <?php endif;?>
                            <?php endforeach?>
                            <?php echo "<td><button type='button' class='btn btn-primary del' data-id=$ids>Delete</button></td>";?>
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