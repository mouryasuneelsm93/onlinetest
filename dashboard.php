

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
    error_reporting(0);
include_once("all_query.php");
$obj=new Details();
$result=$obj->data_user();
// print_r($result);
?>
<table class="table table-striped">
    <thead style="font-size:30px;color:green;">
        <th>Id</th>
        <th>Language</th>
        <th>Marks</th>
    </thead>
    <tbody style="font-size:20px;color:blue;">
        <?php foreach($result as $key=>$value):?>
            <tr>
            <?php foreach($value as $key=>$value1):?>
            <?php echo "<td>$value1</td>";?>
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
