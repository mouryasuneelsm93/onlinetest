<?php
include_once("all_query.php");
error_reporting(0);
$obj=new Details();
$action=$_POST['action'];
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
        $marks=$_POST['marks'];
        $id1=$_POST['id'];
        $cname=$_POST['cname'];
        $opt=$_POST['opt'];
        if($id1==4)
        {
            if($marks>0)
            {
                $marks=$marks+10;
                // echo $marks;
                $name=$_SESSION['user'];
                $result2=$obj->user_data($name,$cname,$marks);
                
            }
            else
            {
                echo $marks;
            }
        }
        
        $result1=$obj->ques_show($cname);
        $result=$obj->marks_show($opt);
        // echo $result;
        if($result!="0")
        {
            echo "&nbsp&nbsp";

        }
        foreach($result1 as $key=>$value)
        {   if($key==$id1)
            {
            foreach($value as $key=>$value1)
            {  if($key=='id')
                {
                    $ids=$value1;
                }
                else if ($key=="ques") {
                    echo "<h3 style='color:green;font-weight:bold;font-size:30px;'>Q$ids $value1</h3>";
                }
                else if($key!='id')
                {
                    echo "<input type='radio' name='opt' style='margin-left:2%!important;' value='$value1'> <span style='font-size:20px'>$value1</span> </br>";
                }
                
            }
            
            }   
        }
    break;
    case "qnext":
    break;
    case "create":
        $cname=$_POST['cname'];
        $result=$obj->c_insert($cname);
        echo $result;
}


?>