<?php
error_reporting(0);
include_once("all_query.php");
include_once("header.php");
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
$obj = new Details();
$result = $obj->c_show1();
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
        body {
            background-color: #f1f1f1 !important;
        }

        .r2 {
            display: none;

        }

        #r2 {
            display: none;
        }

        .tab1,
        .tab2,
        .tab3,
        .tab4,
        .tab5,
        .tab6,
        .tab7,
        .tab8,
        .tab9,
        .tab10,
        .tab11 {
            display: none;
            /* position: absolute; */
            padding: 10px;
        }


        #regForm {
            background-color: #ffffff;
            font-family: Raleway;
            margin: auto;
            padding: 40px;
            width: 70%;
            min-width: 300px;
            padding-bottom: 5%;
            display: none;
        }

        .score {
            background-color: #ffffff;
            font-family: Raleway;
            margin: auto;
            padding: 40px;
            width: 70%;
            text-align: center;
            min-width: 300px;
            padding-bottom: 5%;
            display: none;
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }
        #t{
            display:none;
            padding-left:5%;
            padding-right: 5%;
        }
        .ans0,
        .ans1,
        .ans2,
        .ans3,
        .ans4,
        .ans5,
        .ans6,
        .ans7,
        .ans8,
        .ans9,
        .ans10,
        .score {
            display: none;
        }
    </style>

</head>

<body>

    <div class="jumbotron-fluid">
        <div class="row bg-warning" id="t">
            <div class="col-sm-10" style="font-size:3.5rem;color:#264B90;">Left Time</div>
            <div class="col-sm-2 text-right">
                <div class="timer" style="font-size:3.5rem;color:#5BB349;">
                    <input type="button" id="trig" disabled style="display:none">
                </div>
            </div>
        </div>
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
                    <h1>Select Category :</h1>
                    <select class="form-control" id="select" name="select">
                        <?php foreach ($result as $key => $value) : ?>
                            <?php foreach ($value as $key => $value1) : ?>
                                <?php echo "<option value='$value1'>$value1</option>"; ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </select>
                    <div class="col-sm-4"></div>
                    <br>
                    <button type='button' style='margin-left:2%!important;' class='btn btn-primary qnext'>Next</button>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <form id="regForm">
                    <div class="tab">
                    </div>
                    <br>
                    <br>
                    <button type="button" style="float:right" class="btn next1" onclick="next()">Next</button>
                    <button type="button" style="float:left" class="btn " onclick="back()">Back</button>
                    <!-- <button type="button" style="float:right;display:none" class="btn submit" onclick="finish()">Submit</button> -->
                </form>
                <div class="score">
                    <h1 style="color:#274C90;font-weight:bold">Score : <span class="marks" style="color:greenyellow;"></span></h1>
                    <h2 style="color:#274C90;font-weight:bold">Right : <span class="right" style="color:greenyellow;"></span></h2>
                    <h3 style="color:#274C90;font-weight:bold">Wrong : <span class="wrong" style="color:greenyellow;"></span></h3>
                    <h3 style="color:#274C90;font-weight:bold">Not attempt question : <span class="notq" style="color:greenyellow;"></span></h3>
                    <a href="start.php" style="float:right" class="btn btn-primary">Exit</a>
                </div>
            </div>

        </div>
    </div>
    <?php
    include_once("footer.php");
    ?>
</body>
</html>
<script>
    var count = 0;
    var marks = 0;
    var wrong = 0;
    var right = 0;
    var i = 0;
    var ques=10;
    function next() {
        i++;
        var opt = $('input[name="opt"]:checked').val();
        var ans = $(`.ans${count}`).children('.ans').val();
        console.log(opt,ans);
        if (opt == ans) {
            marks += 5;
            right++;
            console.log(marks,right);
            ques--;
        }
        if (opt != ans) {
            wrong++;
            ques--;
            console.log(wrong);
        }
        if (count == 9) {
            $(".next1").html('submit');
        }
        $(".marks").text(marks);
        $(".right").text(right);
        $(".wrong").text(wrong);
        $(".notq").text(ques);
        console.log(i);
        if (i == 10) {
            $("#regForm").hide();
            $(".score").show();
        }
        $(`.tab${count}`).hide();
        count++;
        $(`.tab${count}`).show();
    }
    function back() {
        i--;
        if (count > 0) {
            $(`.tab${count}`).hide();
            count--;
            $(`.tab${count}`).show();
            console.log(count);
        }
    }
    // setInterval(function() { console.log(sec); }, 1000);
   
</script>