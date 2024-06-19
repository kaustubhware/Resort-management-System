<?php
// Start a session
session_start();
include "include/header1.php";
include "connect.php";
?>

<link rel="stylesheet" href="css/style.css">
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
   <title>MOUNTAIN VIEW RESORT</title>
</head>

<div id="loginbox">
   <form id="loginpage" action="loginuser.php" method="post">
      <h1>Login</h1>

         <input name="email" type="text" class="input"  placeholder="Email" required/>
         <br>
         <input name="password" type="password" class="input"  placeholder="Password" required/>
         <br>
         <input name="login" type="submit" class="loginbutton" value="SIGN IN" />

   </form>
   <?php

      if(isset($_POST['login'])){
         //echo '<script type="text/javascript"> alert("Logged in xD !!")</script>';
         $email=$_POST['email'];
         $password=$_POST['password'];

         $query = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";

         $query_run = mysqli_query($con,$query);

         if (mysqli_num_rows ($query_run) > 0) {
            //vaild
            $_SESSION['email']=$email;
            header('location:userview.php');
         }
         else {
            //Invaild
            echo '<script type="text/javascript"> alert("Invaild User")</script>';
         }


      }

mysqli_close($con);

    ?>
   <a href="registartion.php">Register</a>
</div>
