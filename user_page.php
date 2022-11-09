<?php
session_start();
@include 'config.php';

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Booking System</title>
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
    <link rel="stylesheet" href="services.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap");
      .text-center {
        color: white;
        font-family: "Bebas Neue", cursive;
      }

      body {
        background-image: url(https://wallpaperaccess.com/full/254367.png);
        background-size: cover;
      }
      
      #form h3 {
        border-bottom: 2px solid #3399ff;
        width: 210px;
        padding: 5px;
        margin-bottom: 3rem;
      }

      #input #input-group {
        width: 300px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }

      #input4 #input-group {
        width: 300px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      .bookingform-button {
        display: flex;
        justify-content: center;
        margin: 3rem;
      }


      /* old css */
      .container {
        padding-top: 10px;
      }
      #form {
        background-color: #000;
        height: 575px;
        width: 700px;
        margin: auto;
        margin-bottom: 15px;
        padding: 20px;
        opacity: 0.7;
        border-radius: 5px;
      }

      ::placeholder {
        color: #fff;
      }
      #input #input-group {
        width: 300px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      #input2 #input-group {
        width: 195px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      #input3 #input-group {
        margin-left: 50px;
      }
      #input4 #input-group {
        width: 300px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      #input4 #input-group1 {
        width: 615px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      #input5 h3 {
        border-bottom: 2px solid #3399ff;
        width: 220px;
        padding: 5px;
      }
      #input6 #input-group {
        width: 300px;
        /* margin:5px; */
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
      #input6 #input-group1 {
        width: 615px;
        margin: 5px;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        background: transparent;
        color: #fff;
      }
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
      .booking-button{
        margin-left: 10px;
      }
    </style>
    <link rel="stylesheet" href="style.css">
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
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="logout.php"
                  >Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- <div class="container">
   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div> -->
    <main>
      <div class="container">
        <!--container-->

        <form class="form-group" method="POST" action="code.php">
          <!--form-->
          <h1 class="text-center">Airline Booking Form</h1>

          <div id="form">
            <!--form-->
            <h3 class="text-white">Booking Details</h3>

            <div id="input">
              <!--input-->
              <input type="text" id="input-group" placeholder="From" name="fromPlace"/>
              <input type="text" id="input-group" placeholder="To" name="toPlace"/>
            </div>
            <!--input-->

            <div id="input4">
              <!--input4-->
              <input type="text" id="input-group" placeholder="First Name" name="firstname"/>
              <input type="text" id="input-group" placeholder="Last Name" name="lastname"/>
              <input type="number" id="input-group" placeholder="Contact No." name="contact"/>
            </div>
            <!--input4-->
            <!--input5-->

            <div id="input4">
              <!--input4-->
              <input type="text" id="input-group" placeholder="Email" name="email"/>
              <input type="text" id="input-group" placeholder="Ticket-code" name="ticketCode"/>
            </div>
            <!--input6-->
            <div class="bookingform-button">
              <button
                type="submit"
                class="btn btn-warning text-white booking-button"
                name="submit-booking"
              >
                Submit Form
              </button>
              <button type="reset" class="btn btn-primary booking-button">
                Clear Form
              </button>
            </div>
          </div>
          <!--form-->
        </form>
        <!--form-->
      </div>
      <!--container-->
    </main>
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
