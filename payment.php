<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
   <title>ADMIN</title>

<body>
   <header>
      <div class="navbar">

         <nav>
            <ul>
               <li id="title"><a href="loginadmin.php">Logout</a></li>
               <li><a href="managerview.php"> Admin Dashboard </a></li>
               <li><a href="mreview.php"> Review </a></li>
               <li><a href="msg.php"> Messages </a></li>
               <li><a href="mroomview.php"> Rooms </a></li>
               <li><a href="managerview.php">Requested Rooms</a></li>
               <li><a href="assignroom.php"> Assign Room </a></li>
               <li><a href="payment.php"> Billing </a></li>
            </ul>
         </nav>

      </div>
   </header>
   <center><h1>Billing Information</h1></center>
</head>


<?php
include "connect.php";

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the data from the request_room database
$sql = "SELECT a_date, d_date, name, email, people, room_type FROM request_room";
$result = mysqli_query($con, $sql);

// Calculate the total amount
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $a_date = strtotime($row["a_date"]);
        $d_date = strtotime($row["d_date"]);
        $name = $row["name"];
        $email = $row["email"];
        $people = $row["people"];
        $room_type = $row["room_type"];

        // Convert a_date and d_date into integer
        $a_date = intval($a_date / 86400);
        $d_date = intval($d_date / 86400);

        // Calculate the difference between a_date and d_date
        $diff = $d_date - $a_date;

        // Example calculation for total amount based on room type
        switch ($room_type) {
            case 'Single':
                $total_amount = $diff * 10000 * $people;
                break;
            case 'Double':
                $total_amount = $diff * 15000 * $people;
                break;
            case 'Deluxe':
                $total_amount = $diff * 25000 * $people;
                break;
            case 'Presidential Suite':
                $total_amount = $diff * 35000 * $people;
                break;
            case 'Bungalow':
                $total_amount = $diff * 45000 * $people;
                break;
            default:
                $total_amount = 0;
        }
		
		
		// Check if the name and email already exist in the billing database
        $check_sql = "SELECT * FROM billing WHERE name = '$name' AND email = '$email'";
        $check_result = mysqli_query($con, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
        } 
		 else {
         // Insert the total amount, name, and email into the billing database
         $sql = "INSERT INTO billing (total_amount, name, email) VALUES ($total_amount, '$name', '$email')";
         mysqli_query($con, $sql);
		 }
    }
} else {
    echo "0 results";
}

// Display the total amount against name, email, and phone
$sql = "SELECT billing.total_amount, billing.name, billing.email, request_room.phone, request_room.a_date, request_room.d_date, request_room.people, request_room.room_type 
FROM billing 
JOIN request_room 
ON billing.name = request_room.name AND billing.email = request_room.email";
$result = mysqli_query($con, $sql);



if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Total Amount in ₹</th>";
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
        echo "<td>" . $row["total_amount"] . "</td>";
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
} else {
    echo "0 results";
}


// Close the connection
mysqli_close($con);
?>
</body>
</html>


