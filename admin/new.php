<?php
include_once("header.php");
$obj = new Details();
$result = $obj->new();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
  <style>
    .tab0,
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
      padding:10px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background-color: #f1f1f1;
    }

    #regForm  {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: Raleway;
      padding: 40px;
      width: 70%;
      min-width: 300px;
      padding-bottom:5%;
    }
    .score  {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: Raleway;
      padding: 40px;
      width: 70%;
      min-width: 300px;
      text-align: center;

      padding-bottom:5%;
    }

    h1 {
      text-align: center;
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

    button:hover {
      opacity: 0.8;
    }

    * {
      margin: 0;
      padding: 0;
    }
    .score 
    {
      display: none;
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    
    <div class="row">
      <div class="col">
      <div class="score">
      jlhjk
      </div>
        <form id="regForm">
          <?php $i = 0;
          foreach ($result as $key => $value) : ?>
            <div class="tab<?php echo $i; ?>">
              <?php foreach ($value as $key => $value1) : ?>
                <?php if ($key == 'id') : ?>
                  <?php $id = $value1 ?>
                <?php elseif ($key == 'ques') : ?>
                  <?php echo "<h3>Q.$id $value1</h3>" ?>
                <?php else : ?>
                  <?php echo "<div><input type='radio' name='opt'>$value1</div>" ?>
                <?php endif ?>
              <?php endforeach; ?>
            </div>
            <?php $i++ ?>
          <?php endforeach; ?>
          <br>
          <br>
          <button type="button" style="float:right" class="btn next" onclick="next()">Next</button>
          <button type="button" style="float:left" class="btn " onclick="back()">Back</button>
          <button type="button" style="float:right;display:none" class="btn submit" onclick="finish()">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  count = 0;
  pro(count);
  function next() {
    if(count==8)
    {
      $(".next").hide();
      $(".submit").show();
    }
    $(`.tab${count}`).hide();
    count++;
    $(`.tab${count}`).show();
    console.log(count);
  }
  function pro(count) {
    $(`.tab${count}`).show();
  }
  function back() {
    $(`.tab${count}`).hide();
    count--;
    $(`.tab${count}`).show();
    console.log(count);
  }
  function finish()
  {
    $("#regForm").hide();
    $(".score").show();
  }
</script>