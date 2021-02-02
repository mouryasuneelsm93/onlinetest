<?php
// error_reporting(0);
class Db
{
    public $servername="localhost";
    public $username="root";
    public $password="";
    public $dbname="onlinetest";
    public $con;
    function __construct()
    {
        $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
        if(!$this->con)
        {
            die("Failed!".mysqli_connect_error());
        }
      
    }
}



?>