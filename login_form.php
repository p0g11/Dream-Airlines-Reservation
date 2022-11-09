<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LOGIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    
    <link rel="stylesheet" href="stylings.css">

    <style>
      .container-footer , .qoutes{
         background-color: #222;
         color: #ccc;
         padding: 60px 0 30px;
      }
      
      .containers{
         display: flex;
         width: 1440px;
         max-width: 100%;
         margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-light"
        style="background-color: #f6f4e8"
      >
        <div class="container-md">
          <a class="navbar-brand" href="#"
            ><img class="logo" src="./assets/img/logo.png" alt="" />DREAM
            <span class="color">AIRLINE</span>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="http://localhost/login_system/final_project-main/index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="http://localhost/login_system/final_project-main/about.html"
                  >About</a
                >
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle active"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Services
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="http://localhost/login_system/final_project-main/services.html"
                      >Plan travel</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item active" href="http://localhost/login_system/login_form.php"
                      >Book now!</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Help and Support
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="
http://localhost/login_system/final_project-main/contact.html">Contact us</a>
                  </li>
                  <li><a class="dropdown-item" href="http://localhost/login_system/final_project-main/FAQ'S.html">FAQ's</a></li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- login -->
    <div class="form-container">

   <form action="" method="post">
      
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>
    <!-- end of login -->


    <!-- <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">
              Additional Information
            </h6>
            <p>
              The airline industry is the world's largest and most diverse, with
              more than 360 airlines flying to more than 180 destinations.
              Passenger demand, competition and changes in technology continue
              to influence all aspects of the industry.
            </p>
            <p>
              Surcharges, along with other taxes and fees Regardless of where
              the airline ticket was purchased, passengers who are departing the
              Country are required to pay the Travel Tax, which is a tax imposed
              by the government of the Philippines.
            </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Address</h6>

            <p>
              938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila

              <br />Quictix@mywebsite.com

              <br />(02) 8911 0964

              <br />(02) 8911 0964
            </p>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center">
        © 2022 Copyright: QuickTix.com
      </div>
    </footer> -->

    <footer>
      <div class="container-footer f-con">
         <div class="containers">
         <div>
            <h3>ADDITIONAL INFORMATION</h3>
            <p>The airline industry is the world's largest and most diverse, with more than 360 airlines flying to more than 180 destinations. Passenger demand, competition and changes in technology continue to influence all aspects of the industry.</p>
            <p>Surcharges, along with other taxes and fees Regardless of where the airline ticket was purchased, passengers who are departing the Country are required to pay the Travel Tax, which is a tax imposed by the government of the Philippines.</p>
         </div>

         <div>
            <h3>ADDRESS</h3>
            <p>938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
            <p>Quictix@mywebsite.com
            (02) 8911 0964 <br>
            (02) 8911 0964 <br>
            </p>
         </div>
         </div>
      </div>
      <div>
         <p class = "qoutes text-center">© 2022 Copyright: QuickTix.com</p>
      </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
