
<?php
include "include/header.php";
include "connect.php";
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>

<div id="searchbox">
   <form id="spage" action="search.php" method="post">
      <h1>Search</h1>

         <input name="name" type="text" class="searchinput" autocomplete="off" placeholder="Name"/>
         <br>
         <input name="phone" type="text" class="searchinput" autocomplete="off" placeholder="Phone Number"/>
         <br>
         <input name="search" type="submit" class="searchbutton" value="Search" />

</div>
   <?php
      if(isset($_POST['search'])){
         //echo '<script type="text/javascript"> alert("Searched !!")</script>';
         $name = $_POST['name'];
         $phone = $_POST['phone'];
         $querys ="SELECT * FROM `request_room`WHERE name like'%$name%' AND phone = '$phone' ";

$result = mysqli_query($con,$querys);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Arrival Date</th>";
    echo "<th>Departure Date</th>";
    echo "<th>People</th>";
    echo "<th>Room Type</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["a_date"] . "</td>";
        echo "<td>" . $row["d_date"] . "</td>";
        echo "<td>" . $row["people"] . "</td>";
        echo "<td>" . $row["room_type"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
   }

}else {

}
   

    ?>


</form>

<?php

mysqli_close($con);
?>
