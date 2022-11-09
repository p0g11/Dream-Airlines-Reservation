<?php

@include 'config.php';

if(isset($_POST['delete']))
{
   $user_ID = mysqli_real_escape_string($conn,$_POST['delete']);

   $query = "DELETE FROM user_form WHERE id = '$user_ID'";

   $query_run = mysqli_query($conn, $query);
}

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:admin_page.php');
      }
   }

}

if(isset($_POST['update_userType']))
{
   $user_ID = mysqli_real_escape_string($conn, $_POST['user_ID']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

   $query = "UPDATE user_form SET name='$name', email='$email', password='$pass', user_type='$user_type' WHERE id='$user_ID'";

   $query_run = mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADMIN FORM</title>

   
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Merriweather&display=swap%27");
@import url("https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap%22");
@import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap");

* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
}

body {
  font-family: "Montserrat", sans-serif;
  font-size: 1rem;
  background-color: #f6f4e8;
}

ul li a {
  font-size: 1.3rem !important;
}
.color {
  align-self: center;
  color: red;
}

ul li a:hover {
  color: red !important;
}

.footer-copyright {
  color: #666;
  padding: 40px 0;
}

.logo {
  width: 30%;
  margin: 0;
  padding: 0;
}
.nav-link {
  color: #666 !important;
  font-family: "Quicksand", sans-serif;
}

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 60px;
}

.container .content {
  text-align: center;
}

.container .content h3 {
  font-size: 30px;
  color: #333;
}

.container .content h3 span {
  background: crimson;
  color: #fff;
  border-radius: 5px;
  padding: 0 15px;
}

.container .content h1 {
  font-size: 50px;
  color: #333;
}

.container .content h1 span {
  color: crimson;
}

span {
  color: crimson;
}

.container .content p {
  font-size: 25px;
  margin-bottom: 20px;
}

.container .content .btn {
  display: inline-block;
  padding: 10px 30px;
  font-size: 20px;
  background: #333;
  color: #fff;
  margin: 0 5px;
  text-transform: capitalize;
}

.container .content .btn:hover {
  background: crimson;
}

.form-container {
  
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 60px;
  background-color: #f6f4e8;
}

.form-container form {
  padding: 20px;
  border-radius: 22px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  background: #333;
  color: #fff;
  text-align: center;
  width: 500px;
}

.form-container form h3 {
  font-size: 30px;
  text-transform: uppercase;
  margin-bottom: 10px;
  color: rgb(255, 255, 255);
}

.form-container form input,
.form-container form select {
  width: 100%;
  padding: 10px 15px;
  font-size: 17px;
  margin: 8px 0;
  background: #eee;
  border-radius: 5px;
}

.form-container form select option {
  background: #fff;
}

.form-container form .form-btn {
  background: #28b4ff;
  color: #ffffff;
  text-transform: capitalize;
  font-size: 20px;
  cursor: pointer;
}

.form-container form .form-btn:hover {
  background: #18c9ff;
  color: #fff;
}

.form-container form p {
  margin-top: 10px;
  font-size: 20px;
  color: rgb(255, 255, 255);
}

.form-container form p a {
  color: #ff8787f0;
}

.form-container form .error-msg {
  margin: 10px 0;
  display: block;
  background: crimson;
  color: #fff;
  border-radius: 5px;
  font-size: 20px;
  padding: 10px;
}

</style>
</head>
<body>

<div class="container">

   <div class="content">
      <h3>HI, <span>ADMIN</span></h3>
   </div>
</div>
   
<div class="form-container">
   <form action="" method="post">
      <h3>INSERT NEW <span> USER_TYPE </span></h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your Fullname">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="INSERT" class="form-btn">
     <a href="file_Maintenance.php" class="btn btn-warning btn-sm">GO TO FILE MAINTENANCE</a>
      <br>
      <br>
       <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
   </form>

</div>

<div class="container">
<table class="table table-bordered">
   <thead>
    <tr>
     <th>ID</th>
     <th>NAME</th>
     <th>EMAIL</th>
     <th>PASSWORD</th>
     <th>USER_TYPE</th>
     <th>EDIT</th>
     <th>DELETE</th>
    </tr>
   </thead>
   <tbody>
      <?php
      
      $query = "SELECT * FROM user_form";
      $query_run = mysqli_query($conn ,$query);

      if(mysqli_num_rows($query_run) > 0)
      {
         foreach($query_run as $user_form)
         {
            
            ?>
            <tr>
            <td> <?= $user_form['id']; ?> </td>
            <td> <?= $user_form['name']; ?> </td>
            <td> <?= $user_form['email']; ?> </td>
            <td> <?= $user_form['password']; ?> </td>
            <td> <?= $user_form['user_type']; ?> </td>
            <td> <a href="user-edit.php?id=<?= $user_form['id']; ?>" class="btn btn-success btn-sm">Edit</a> </td>
            

            <form action="admin_page.php" method="post">
            <td> <button type="submit" name="delete" value="<?=$user_form['id'];?>" class="btn btn-danger btn-sm">Delete</button> </td>
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
  
</div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>