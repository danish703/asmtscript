<?php 
 include('connect.php');
 if(isset($_POST['name'])&&isset($_POST['country'])){
   $n = $_POST['name'];
   $c = $_POST['country'];
   $id = $_POST['id'];
   
   if($n!='' && $c != ''){
       $query = "UPDATE office SET oname='$n',country='$c' WHERE onumber = '$id'";
       if(mysqli_query($conn,$query)){
           $msg= "updated";
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