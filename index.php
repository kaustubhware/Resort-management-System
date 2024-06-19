<?php
include "connect.php";
 ?>
 <link rel="stylesheet" type="text/css" href="style.css">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
   <title>MOUNTAIN VIEW RESORT</title>
</head>
<div class="navbar">

         <nav>
            <ul>
               <li id="title"><a href="loginuser.php">User Login</a></li>
               <li id="title"><a href="loginadmin.php">Admin Login</a></li>
            </ul>
         </nav>
      </div>
   <center><h1>Mountain View Resort</h1>
   <center><img src="img/Resort1.jpg" id="himg">

<br><br><br>


<div class="home">

   <div class="stars" >
     <form action="index.php" method="post">
       <h2><center>Give a Review</center></h2>
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
            <h2><center>Description</center></h2>
            The resort is a luxurious getaway located in Igatpuri, Maharashtra, India. 
            Nestled in the heart of the stunning mountain ranges, it offers serene environment to its guests with breathtaking views 
	    of the majestic peaks. The resort is conveniently located, making it an ideal destination for nature enthusiasts and adventure seekers.
            The surrounding areas of Igatpuri are rich in flora and fauna and offer numerous opportunities for outdoor activities 
	    The resort itself is equipped with modern amenities and facilities to make the stay of its guests comfortable and enjoyable.
         </article>
      </div>

</div>





<?php
include "include/footer.php";
 ?>
