<?php

require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> FORM EDIT</title>

   
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


   
<div class="form-container">

<?php


if(isset($_GET['id']))
{
  $user_ID = mysqli_real_escape_string($conn, $_GET['id']);
  $query = "SELECT * FROM user_form WHERE id = '$user_ID'";
  $query_run = mysqli_query($conn, $query);

  if(mysqli_num_rows($query_run) > 0)
  {
   $user_form = mysqli_fetch_array($query_run);
   ?>
   
   <form action="admin_page.php" method="post">
      <h3>EDIT <span> USER_TYPE </span></h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="hidden" name="user_ID" value="<?=$user_form['id'];?>">
      <input type="text" name="name" required placeholder="enter your name" value="<?=$user_form['name'];?>">
      <input type="email" name="email" required placeholder="enter your email" value="<?=$user_form['email'];?>">
      <input type="password" name="password" required placeholder="enter your password" value="<?=$user_form['password'];?>">
      <input type="password" name="cpassword" required placeholder="confirm your password" value="<?=$user_form['password'];?>">
      <select name="user_type" value="<?=$user_form['user_type'];?>">
         <option>user</option>
         <option>admin</option>
      </select>
      <input type="submit" name="update_userType" value="Update User Type" class="form-btn">
      
   </form>

   
   <?php
  }
  else
  {
   echo "<h4> no data found</h4>";
  }
}

?>

</div>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>