

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    
</head>
<body>

<?php
error_reporting(0);
include_once("header.php");
include_once("../all_query.php");
$obj=new Details();
$result=$obj->c_show();
// print_r($result);
?>
 <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col">
                <form id="addquestion">
                <h1>Select  Category :</h1>
                <select class="form-control" id="select" name="select">
                <?php foreach($result as $key=>$value):?>
                    <?php foreach($value as $key=>$value1):?>
                <?php if($key!='id'):?>
                <?php echo "<option value='$value1'>$value1</option>";?>
                <?php endif?>
                <?php endforeach ?>
                <?php endforeach ?>
                </select>
                <br>
                    <h1>Enter Question</h1>
                    <input type="text" name="question" class="form-control">
                    <br>
                    <h1>Option 1 :</h1>
                    
                    <input type="text" name="op1" class="form-control">
                    <br>
                    <h1>Option 2 :</h1>
                    
                    <input type="text" name="op2" class="form-control">
                    <br>
                    <h1>Option 3 :</h1>
                    
                    <input type="text" name="op3" class="form-control">
                    <br>
                    <h1>Option 4 :</h1>
                
                    <input type="text" name="op4" class="form-control">
                    <br>
                    <h1>Answer :</h1>
                
                    <input type="text" name="answer" class="form-control">
                    <br>
                    <input type="submit" value="ADD" name="submit" class="btn btn-primary"> 
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>    
 </div>


 <?php
include_once("../footer.php");
?>

</body>
</html>
