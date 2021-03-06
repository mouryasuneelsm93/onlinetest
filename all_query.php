<?php
session_start();
include_once("connect1.php");
class Details extends Db
{
    public $con;
    public $arr = [];
    public $id = 1;
    public $i = 0;
    public function __construct()
    {
        $obj = new Db();
        $this->con = $obj->con;
    }
    public function insert($name, $pass, $email)
    {
        $sql = "INSERT into tbl_user(username,password,email,is_admin) VALUES('$name','$pass','$email',0)";
        if ($this->con->query($sql) == true) {
            return "1";
        } else {
            return "0";
        }
    }
    public function show($user, $pass)
    {
        $sql = "SELECT *from tbl_user where email='$user' and password='$pass'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['is_admin'] == 1) {
                    $_SESSION['admin'] = $row['username'];
                } else {
                    $_SESSION['user'] = $row['username'];
                }
                return "1";
            }
        } else {
            echo "0 results";
        }
        $this->con->close();
    }

    public function add($ques, $op1, $op2, $op3, $op4, $cname, $answer)
    {
        $sql = "INSERT into add_ques(c_id,question,option1,option2,option3,option4,answer) VALUES((SELECT id from category where name='$cname'),'$ques','$op1','$op2','$op3','$op4','$answer')";
        if ($this->con->query($sql) == true) {
            return "1";
        } else {
            return "0";
        }
        return $sql;
    }
    public function ques_show($id)
    {
        $this->id = $id;
        $i = 1;
        $sql1 = "SELECT id from category where name='$this->id' ";
        $result1 = $this->con->query($sql1);
        $cid = $result1->fetch_assoc();
        $c_id = $cid['id'];
        $sql = "SELECT *from add_ques where c_id=$c_id ORDER BY rand() limit 10";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->arr[] = array(
                    'id' => $i,
                    'ques' => $row['question'],
                    'op1' => $row['option1'],
                    'op2' => $row['option2'],
                    'op3' => $row['option3'],
                    'op4' => $row['option4'],
                    'ans'   => $row['answer']
                );
                $i = $i + 1;
            }
            return $this->arr;
        } else {
            echo "0 results";
        }
        $this->con->close();
    }
    public function c_insert($cname)
    {
        $sql = "INSERT into category(name) VALUES('$cname')";
        if ($this->con->query($sql) == true) {
            return "1";
        } else {
            return "0";
        }
    }
    public function c_show()
    {
       
        $sql = "SELECT *from category";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                    $this->arr[] = array(
                    'name' => $row['name'],  
                );
               
            }
            
            return $this->arr;
        } else {
            echo "0 results";
        }
        $this->con->close();
    }
    public function c_show1()
    {
        $count=0;
        $sql = "SELECT *from category";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id=$row['id'];
                $sql1="SELECT *from add_ques where c_id=$id";
                $result1=$this->con->query($sql1);
                while($rows=$result1->fetch_assoc())
                {
                    $count++;
                }
                if ($count>10) {
                    $this->arr[] = array(
                    'name' => $row['name'],  
                );
                }
                $count=0;
            }
            // return $count;
            return $this->arr;
        } else {
            echo "0 results";
        }
        $this->con->close();
    }

    public function user_data($name, $cname, $marks)
    {
        $sql = "INSERT into user_data(u_id,category,marks) VALUES((SELECT id from tbl_user where username='$name'),'$cname','$marks')";
        if ($this->con->query($sql) == true) {
            return "1";
        } else {
            return "0";
        }
        return $sql;
    }
    public function data_user()
    {
        $uname = $_SESSION['user'];
        $sql1 = "SELECT id from tbl_user where username='$uname'";
        $result1 = $this->con->query($sql1);
        $uid = $result1->fetch_assoc();
        $u_id = $uid['id'];
        $sql = "SELECT *from user_data where u_id='$u_id'";
        if ($result = $this->con->query($sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                $this->arr['data'][] = array(
                    'id' => $i,
                    'category' => $row['category'],
                    'marks' => $row['marks']
                );
            }
            return $this->arr;
        }
        return false;
    }
    public function tbl_user_show()
    {
        $sql = "SELECT *from tbl_user where is_admin=0";
        $result = $this->con->query($sql);
        // $this->arr=  $result->fetch_assoc();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->arr[] = array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'email' => $row['email']
                );
            }
        }
        return $this->arr;
        $this->con->close();
    }
    public function single_user_info($id)
    {
        $sql = "SELECT *from user_data where u_id='$id'";
        $result = $this->con->query($sql);
        // $row[] = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->arr[] = array(
                    'id' => $row['id'],
                    'category' => $row['category'],
                    'marks' => $row['marks']
                );
            }
            return $this->arr;
        } else {
            echo "0 results";
        }
        $this->con->close();
    }
    public function del($id)
    {
        $sql = "DELETE from user_data where id='$id'";
        $result = $this->con->query($sql);
        if ($result == true) {
            $b = 1;
        } else {
            $b = 0;
        }
        return $b;
    }
    public function new()
    {
        $i = 1;
        $sql = "SELECT *from add_ques where c_id=1";
        $result = $this->con->query($sql);
        while ($row = $result->fetch_assoc()) {
            //    echo $row['option3'];
            $this->arr[] = array(
                'id' => $i,
                'ques' => $row['question'],
                'op1' => $row['option1'],
                'op2' => $row['option2'],
                'op3' => $row['option3'],
                'op4' => $row['option4'],
            );
            $i = $i + 1;
        }
        // $j=json_encode($this->arr);
        // echo "<pre>";
        return $this->arr;
    }
}
