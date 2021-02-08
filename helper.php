<?php
include_once("all_query.php");
error_reporting(0);
$obj=new Details();
$action=$_REQUEST['action'];
switch($action)
{
    case "insert":
        $name=$_POST['user'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $result=$obj->insert($name,$pass,$email);
        echo $result;
    break;
    case "show":
        $user=$_POST['username'];
        $pass=$_POST['pass'];
        $result=$obj->show($user,$pass);
        print_r($result);
    break;
    case "add":
        $cate=$_POST['select'];
        // echo $cate;
        $ques=$_POST['question'];
        $op1=$_POST['op1'];
        $op2=$_POST['op2'];
        $op3=$_POST['op3'];
        $op4=$_POST['op4'];
        $answer=$_POST['answer'];
        $result=$obj->add($ques,$op1,$op2,$op3,$op4,$cate,$answer);
        print_r($result);
    break;
    case "next":
        $cname=$_POST['cname'];        
        $result=$obj->ques_show($cname);
        $i=0;
        foreach($result as $key=>$value)
        {
            $j=$i+1;
            echo "<div class='tab$i'>";
            foreach($value as $key=>$value1)
            {    
                if($key=='id')
                {
                    $ids=$value1;
                }
                else if ($key=="ques") {
                    echo "<h3 style='color:green;font-weight:bold;font-size:30px;'><input value='Q$j $value1' style='border:none;width:100%'  readonly></h3>";
                }
                else if($key=='ans')
                {
                    echo "<div class='ans$i'><input type='text' style='border:none' class='ans' value='$value1'></div>";
                }
                else if($key!='id')
                {
                    echo "<input type='radio' name='opt' style='margin-left:2%!important;' value='$value1'> <span style='font-size:20px'><input style='border:0px;' value='$value1' readonly ></span> </br>";
                }   
            }    
            echo "</div>";
            $i++; 
        }
    break;
    case "create":
        $cname=$_POST['cname'];
        $result=$obj->c_insert($cname);
        echo $result;
    break;
    case "del":
        $id=$_POST['id'];
        $result=$obj->del($id);
        echo $result;
        break;
    case "getuserdata": 
        $result = $obj->data_user();
        echo json_encode($result);
        break;
    
}
