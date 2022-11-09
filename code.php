<?php
include 'config.php';
require 'config.php';


if(isset($_POST['update_File']))
{
   
   $file = mysqli_real_escape_string($conn, $_POST['id']);
   $fromPlace = mysqli_real_escape_string($conn, $_POST['fromPlace']);
   $toPlace = mysqli_real_escape_string($conn, $_POST['toPlace']);
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $ticketCode = mysqli_real_escape_string($conn, $_POST['ticketCode']);

   $query = "UPDATE file_maintenance SET fromPlace='$fromPlace', toPlace='$toPlace', firstname='$firstname', lastname='$lastname', contact='$contact', email='$email', ticketCode='$ticketCode' WHERE id='$file'";

   $query_run = mysqli_query($conn, $query);
}





if (isset($_POST['submit-booking']))
{
 $fromPlace = mysqli_real_escape_string($conn, $_POST['fromPlace']);
 $toPlace = mysqli_real_escape_string($conn, $_POST['toPlace']);
 $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
 $contact = mysqli_real_escape_string($conn, $_POST['contact']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $ticketCode = mysqli_real_escape_string($conn, $_POST['ticketCode']);

 $query = "INSERT INTO file_maintenance (fromPlace,toPlace,firstname,lastname,contact,email,ticketCode) VALUE 
                      ('$fromPlace','$toPlace','$firstname','$lastname','$contact','$email','$ticketCode')";

 $query_run = mysqli_query($conn, $query);

 if ($query_run)
 {
  header("location:http://localhost/login_system/final_project-main/services.html");
  exit(0);
 }

}



?>