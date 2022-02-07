<?php
  include('db/connect.php');
  if(isset($_GET['id'])){
   $id= $_GET['id'];
   $query = "SELECT * FROM office WHERE onumber='$id'";
   $res = mysqli_query($conn,$query);
   
   if(mysqli_num_rows($res)==1){
    $row = mysqli_fetch_assoc($res);
   }else{
       die("no record found with this id");
   }
  }else{
      die("please pass id");
  }
?>

<html>
    <head>
        <title>Office</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

<body>
   <?php include('include/header.php') ;?> 
 <div class="container">
     <div class="row justify-content-md-center">
        <div class="col-8">
             <h4>Create Office</h4>
             <form method="POST" action="db/officeupdate.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Office Name</label>
                    <input type="text" value="<?php echo $row['oname']; ?>" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Kuleshor Branch">
                </div>

                 <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contry</label>
                    <input type="text" value="<?php echo $row['country'];?>" name="country" class="form-control" id="exampleFormControlInput1" placeholder="Nepal">
                </div>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <button type="submit" class="btn btn-primary">Save</button>
            </form> 
            <?php if(isset($_GET['msg'])){ ?>
                    <div class="alert alert-info">
                      <?php echo $_GET['msg']; ?>
                    </div>
           <?php } ?>
        </div>
     </div>
     <hr/>
         

 </div>

</body>
</html>