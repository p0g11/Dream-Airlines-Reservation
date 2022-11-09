<?php
include 'config.php';
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <title>FILE EDIT</title>

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
</head>
<body>
 
<main>
      <div class="container">
        <!--container-->

        <?php
        
        if(isset($_GET['id']))
        {
          $file_id = mysqli_real_escape_string($conn, $_GET['id']);
          $query = "SELECT * FROM file_maintenance WHERE id='$file_id' ";
          $query_run = mysqli_query($conn, $query);
          
           if(mysqli_num_rows($query_run) > 0)
           {
              $file_maintenance = mysqli_fetch_array($query_run);
             

              ?>
              
           

        <form class="form-group" method="POST" action="file_Edit.php">

       

          <!--form-->
          <h1 class="text-center">Airline Booking Form</h1>

          <div id="form">
            <!--form-->
            <h3 class="text-white">Booking Details</h3>

            <div id="input">
              <!--input-->
              <input type="text" id="input-group" placeholder="From" name="fromPlace" value="<?=$file_maintenance['fromPlace'];?>"/>
              <input type="text" id="input-group" placeholder="To" name="toPlace" value="<?=$file_maintenance['toPlace'];?>"/>
            </div>
            <!--input-->

            <div id="input4">
              <!--input4-->
              <input type="text" id="input-group" placeholder="First Name" name="firstname" value="<?=$file_maintenance['firstname'];?>"/>
              <input type="text" id="input-group" placeholder="Last Name" name="lastname" value="<?=$file_maintenance['lastname'];?>"/>
              <input type="number" id="input-group" placeholder="Contact No." name="contact" value="<?=$file_maintenance['contact'];?>"/>
            </div>
            <!--input4-->
            <!--input5-->

            <div id="input4">
              <!--input4-->
              <input type="text" id="input-group" placeholder="Email" name="email" value="<?=$file_maintenance['email'];?>"/>
              <input type="text" id="input-group" placeholder="Ticket-code" name="ticketCode" value="<?=$file_maintenance['ticketCode'];?>"/>
            </div>
            <!--input6-->
            <div class="bookingform-button">
              <button
                type="submit"
                class="btn btn-warning text-white booking-button"
                name="update_File"
              >
                UPDATE USER
              </button>
              <a href="file_Maintenance.php" class="btn btn-primary booking-button">
                BACK
              </a>
            </div>
          </div>
          <!--form-->
        </form>


           
              <?php


           }
           else
           {
            echo "<h4> NO SUCH FILES FOUND </h4>";
           }

        }
        
        ?>



        <!--form-->
      </div>
      <!--container-->
    </main>



    





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>