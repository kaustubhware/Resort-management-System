<?php
include "connect.php";
include "include/header1.php";
 ?>

   <link rel="stylesheet" href="css/style.css">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
   <title>MOUNTAIN VIEW RESORT</title>
</head>
<div id="regbox">

   <form id="registrationpage" action="registartion.php" method="post">
      <h1>Registration</h1>

         <input type="text" name="fname" class="input" placeholder="First Name" />
         <br>
         <input type="text" name="lname" class="input" placeholder="Last Name" required/>
         <br>
         <input type="text" name="email" class="input" placeholder="Email" required/>
         <br>
         <input type="password" name="password" class="input" placeholder="Password" required/>
         <br>
         <input type="password" name="cpassword" class="input" placeholder="Re-enter Password" required/>
         <br>
         <input type="submit" name="signup" class="Registrationbutton" value="Submit" />

   </form>

   <?php

   if (isset($_POST['signup'])) {
      //echo '<script type="text/javascript"> alert("Register button click")</script>';

      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $cpassword=$_POST['cpassword'];

      if ($password == $cpassword) {
         $query = "SELECT * FROM users WHERE email = '$email' ";

         $query_run = mysqli_query ($con,$query);

         if (mysqli_num_rows($query_run)>0) {
            //all ready a user
            echo '<script type="text/javascript"> alert("User Exists !!")</script>';
         }
         else {
            $query1 = "INSERT INTO users (First_name,Last_name,email,password)
                     VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".md5($_POST['password'])."')";
            $query2 =  "INSERT INTO users (email,password) VALUES ('".$_POST['email']."','".md5($_POST['password'])."')";

            $query_run = mysqli_query ($con,$query1) && mysqli_query ($con,$query2);
            if ($query_run) {
               echo '<script type="text/javascript"> alert("Member Add Successfully !!")</script>';
            }
            else {
               echo '<script type="text/javascript"> alert("!! Error !!")</script>';
            }


         }

      }
      else {
         echo '<script type="text/javascript"> alert("Please Enter Values !!")</script>';
      }
   }

mysqli_close($con);

    ?>
   <a href="loginuser.php">Back to Login</a>
</div>

</body>
</html>
