

<?php
error_reporting(0);
include_once("all_query.php");
include_once("header.php");
if(!isset($_SESSION['user']))
{
header("location:login.php");
}
$obj=new Details();
$result=$obj->c_show();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet"> 
    <title>index</title>
    <style>
.r2{
    display:none;
}
#r2{
    display:none;
}
#qnext{
    display:none;
}
#back{
    display:none;
}
.sc{
    display:none;
}
.pro{
    display:none;
    font-size:60px;
    color:yellowgreen;
    font-family: 'Potta One', cursive;

}
.sco{
    display:none;
    font-size:80px;
    color:lightcoral;
    font-family: 'Potta One', cursive;

}
</style>
</head>
<body>

 <div class="container">
    <div class="contain">
    <div class="row pb-5 pt-5 r1">
        <div class="col-sm-4"></div>
        <div class="col">
           <button type="submit" class="next btn btn-primary form-control">Start Quiz</button>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row pb-5 pt-5" id="r2">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <h1>Select  Category :</h1>
                <select class="form-control" id="select" name="select">
                <?php foreach($result as $key=>$value):?>
                    <?php foreach($value as $key=>$value1):?>
                <?php if($key!='id'):?>
                <?php echo "<option value='$value1'>$value1</option>";?>
                <?php endif?>
                <?php endforeach ?>
                <?php endforeach ?>
                </select><div class="col-sm-4"></div>
                <br>
                <button type='button' style='margin-left:2%!important;' class='btn btn-primary qnext'>Next</button>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
    <div class="row five">
        <div class="col">
                <div class="data"></div>
                <button type='button' style='margin-left:2%!important;' class='btn btn-primary back' id="back">Back</button>
                <button type='button' style='margin-left:2%!important;' class='btn btn-primary qnext' id="qnext">Next</button>
        </div>
    </div>
    <div class="row sc">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <div class="sco">
                Score :
            </div>
            <div class="score">
            </div>
            <div class="pass">
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
 </div>
 <?php
include_once("footer.php");
?>
 



</body>
</html>
