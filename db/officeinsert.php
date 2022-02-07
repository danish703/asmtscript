<?php 
 include('connect.php');
 if(isset($_POST['name'])&&isset($_POST['country'])){
   $n = $_POST['name'];
   $c = $_POST['country'];
   
   if($n!='' && $c != ''){
       $query = "INSERT INTO office(oname,country) VALUES ('$n','$c')";
       if(mysqli_query($conn,$query)){
           $msg= "inserted";
       }else{
           $msg= "error=".mysqli_error($conn);
       }
   }else{
       $msg= "no fields can be empty";
   }

 }else{
     $msg= "not sufficent data";
 }
 header('Location:../office.php?msg='.$msg);
 ?>