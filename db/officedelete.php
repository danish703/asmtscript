<?php
  include('connect.php');
  if(isset($_GET['id'])){
   $id = $_GET['id'];
   $query = "DELETE FROM office WHERE onumber='$id'";
   if(mysqli_query($conn,$query)){
       $msg = "deleted successfully";
   }else{
       $msg= "error=".mysqli_error($conn);
   }
    header('Location:../office.php?msg='.$msg);
  }else{
      echo "please pass id to delete the record";
  }
  

  ?>