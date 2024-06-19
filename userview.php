<?php
// Start a session
session_start();
include "connect.php";
 ?>
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
<body>
   <header>
      <div class="navbar">

         <nav>
            <ul>
               <li id="title"><a href="loginuser.php">Logout</a></li>
               <li><a href="userview.php"> Dashboard </a></li>
               <li><a href="Room.php"> Rooms </a></li>
               <li><a href="booking.php"> Book Now </a></li>
               <li><a href="review.php"> Review </a></li>
               <li><a href="Search.php"> Search Booking </a></li>
			   <li><a href="billing.php">Payment</a></li>
               <li><a href="contact.php">Contact Us</a></li>
			   <li><a href="facilities.php"> Facilities </a></li>
			   
            </ul>
         </nav>

      </div>
   <center><h1>Mountain View Resort</h1>
   <center><img src="img/Resort1.jpg" id="himg">
   </header>

<div class="home">

   <div class="stars" >
     <form action="userview.php" method="post">
       <h2><center>Write a Review</center></h2>
       <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
       <label class="star star-5" for="star-5"></label>
       <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
       <label class="star star-4" for="star-4"></label>
       <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
       <label class="star star-3" for="star-3"></label>
       <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
       <label class="star star-2" for="star-2"></label>
       <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
       <label class="star star-1" for="star-1"></label>
       <input type="text" class="starinput" name="Comment" placeholder="Comment">
       <input type="submit" class="starbutton" name="review"  value="Submit">
    </form>
   </div>

      
   <?php

   if (isset($_POST['review'])) {
     //echo '<script type="text/javascript"> alert("review button click")</script>';

     $query = "INSERT INTO rating (star,comnt) VALUES ('".$_POST['star']."','".$_POST['Comment']."')";


     $query_run = mysqli_query ($con,$query);

     if ($query_run) {
         echo '<script type="text/javascript"> alert("Review Submitted")</script>';
     }
     else {
        echo '<script type="text/javascript"> alert("!! ERROR !!")</script>';
     }
   }

   mysqli_close($con);

    ?>


<div id="hdiscrp">
         <article >
            <h2><center>Share your experience with us</center></h2>
            A five-star review for the Mountain View Resort is a great way to share your positive experience with others. 
            To start, consider the unique features of the resort that made your stay enjoyable, such as the breathtaking views of the mountain ranges, 
            comfortable rooms, modern amenities. The friendly staff who made your stay even better, the delicious food, and the peaceful environment. Overall, highlight how the resort exceeded your expectations and why you would recommend it to others. 
            and by giving it a five-star rating, as a testament to the exceptional quality of the resort.
         </article>
      </div>

<div id="hbooknow">
   <center>
      <a href="room.php">Rooms</a>
      <a href="booking.php">Book Now</a>
   </center>
</div>


<?php
include "include/footer.php";
 ?>