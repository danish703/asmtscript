<?php
  include('db/connect.php');
  if(isset($_GET['q'])){
    $country = $_GET['q'];  
    $query =  "SELECT * FROM office WHERE country = '$country'";
  }else if(isset($_GET['name'])){
     $name = $_GET['name']; 
     $query = "SELECT * FROM office WHERE oname LIKE '%$name%'";
  }else{  
    $query  = "SELECT * FROM office";
  } 
  $result = mysqli_query($conn,$query);
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
             <form method="POST" action="db/officeinsert.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Office Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Kuleshor Branch">
                </div>

                 <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contry</label>
                    <input type="text" name="country" class="form-control" id="exampleFormControlInput1" placeholder="Nepal">
                </div>

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
     <div class="row justify-content-md-center">
         <div class="col-8">
             <form metod="GET">
               <div class="input-group mb-3">
                <input type="text" class="form-control" name="q" placeholder="Search by country" aria-describedby="basic-addon2">
                <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                </div>
            </form>

             <form metod="GET">
               <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Search by name" aria-describedby="basic-addon2">
                <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                </div>
            </form>
             <table class="table">
                <thead>
                    <th>Office Name</th>
                    <th>Country</th>
                    <th>Action</th>
                </thead>
                <?php while($row=mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $row['oname']; ?></td>
                                <td><?php echo $row['country'];?></td>
                                <td>
                                    <a href="db/officedelete.php?id=<?php echo $row['onumber'];?>">Del</a> | 
                                     <a href="officeupdate.php?id=<?php echo $row['onumber'];?>">Update</a>

                                </td>
                            </tr>
                    <?php } ?>
             </table>
         </div>
     </div>           

 </div>

</body>
</html>