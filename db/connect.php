<?php
  $host = "127.0.0.1"; //localhost //::1
  $dbname = "company";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($host,$username,$password,$dbname);
  if($conn->connect_error){
    die("Connection faild".$conn->connect_error);
  }
  //mysqli_close($conn);
?>