<?php


require 'config.php';
if(isset($_POST['delete_output']))
{
   $file_maintenace = mysqli_real_escape_string($conn,$_POST['delete_output']);
   $query = "DELETE FROM file_maintenance WHERE id = '$file_maintenace'";
   $query_run = mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <title>FILE MAINTENANCE</title>
 <style>
  body {
   font-family: 'Courier New', Courier, monospace;
  }

  .container h1 {
   background-color: #333;
   color: #fff;
   padding: 1.825em;
   letter-spacing: 10px;
  }
  .container h1 span{
   color: red;
   text-shadow: 1px 1px 1px white;
  }
 </style>
</head>
<body>

<main>
 <div class="container">
  
  <h1 class="text-center"> <strong> FILE <span> MAINTENANCE </span> </strong></h1>
  
 
 </div>

 <section>
  <div class="container-fluid">
  <table class="table table-sm">
   <thead>
    <tr>
     <th>ID</th>
     <th>from</th>
     <th>to</th>
     <th>firstname</th>
     <th>lastname</th>
     <th>contact</th>
     <th>email</th>
     <th>ticket code</th>
     <th>edit</th>
     <th>delete</th>
    </tr>
   </thead>
   <tbody>
   

    <?php
    
    $query = "SELECT * FROM file_maintenance";
    $query_run = mysqli_query($conn ,$query);
    
    if(mysqli_num_rows($query_run) > 0)
    {
      foreach($query_run as $file_maintenace)
         {
            
          // echo 

          ?>
                  <tr>
                   <td><?=$file_maintenace['id'];?></td>
                   <td><?=$file_maintenace['fromPlace'];?></td>
                   <td><?=$file_maintenace['toPlace'];?></td>
                   <td><?=$file_maintenace['firstname'];?></td>
                   <td><?=$file_maintenace['lastname'];?></td>
                   <td><?=$file_maintenace['contact'];?></td>
                   <td><?=$file_maintenace['email'];?></td>
                   <td><?=$file_maintenace['ticketCode'];?></td>
                   <td> <a href="file_Edit.php?id=<?= $file_maintenace['id']; ?>" class="btn btn-success btn-sm">Edit</a></td>
                     <form action="file_Maintenance.php" method="post">
                      <td><button type="submit" name="delete_output" value="<?=$file_maintenace['id'];?>" class="btn btn-danger btn-sm">Delete</button></td>
                     </form>
                   </tr>
          <?php
           
         }

    }
    else 
      {
         echo "<h5> No Record Found </h5>";
      }

    ?>


   </tbody>
  </table>

  <a class="btn btn-primary" href="admin_page.php">GO TO ADMIN PAGE</a>
  </div>
 </section>

</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>