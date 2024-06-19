<?php
  session_start();
  // Connect to the database
  include "connect.php";
  include "include/header.php";

  // Check if user is logged in
  if (!isset($_SESSION['email'])) {
    header('Location: loginuser.php');
  }

  // Get the email of the logged-in user
  $email = $_SESSION['email'];

  // Get the details of the logged-in user from the 'users' database
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $sql);
  $user_data = mysqli_fetch_assoc($result);

  // Get the details of the logged-in user from the 'request_room' database
  $sql = "SELECT name, email, phone, a_date, d_date, people, room_type FROM request_room WHERE email='$email'";
  $result = mysqli_query($con, $sql);
  $request_data = mysqli_fetch_assoc($result);

  // Get the total amount of the logged-in user from the 'billing' database
  $sql = "SELECT total_amount FROM billing WHERE email='$email'";
  $result = mysqli_query($con, $sql);
  $billing_data = mysqli_fetch_assoc($result);
  
  mysqli_close($con);
  
?>

<html>
  <head>
    <link rel="stylesheet" href="style.css">
	<div id="bookbox">
    <title>Billing</title>

	
    <title>Billing</title>
	
  </head>
  <body>
    <h1>Billing</h1>

    <table>
	
      <tr>
        <td>Name:</td>
        <td><?php echo $request_data['name']; ?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo $request_data['email']; ?></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><?php echo $request_data['phone']; ?></td>
      </tr>
      <tr>
        <td>Arrival Date:</td>
        <td><?php echo $request_data['a_date']; ?></td>
      </tr>
      <tr>
        <td>Departure Date:</td>
        <td><?php echo $request_data['d_date']; ?></td>
      </tr>
      <tr>
        <td>People:</td>
        <td><?php echo $request_data['people']; ?></td>
      </tr>
      <tr>
        <td>Room Type:</td>
        <td><?php echo $request_data['room_type']; ?></td>
      </tr>
      <tr>
        <td>Total Amount in ₹:</td>
        <td><?php echo $billing_data['total_amount']; ?></td>
      </tr>
    </table>
   </div> 

<style>
  /* Add your CSS styles here */
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  form {
    padding: 20px;
  }
  input[type="text"], input[type="email"], input[type="number"], select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
<div id="bookbox">

<!DOCTYPE html>
<html>
<head>
	<title>Billing Page</title>
</head>
<body>
	<h3>Payment Method:</h3>
	<input type="radio" id="card_payment" name="payment_method" value="card_payment" onclick="showCardPaymentForm()" checked>
	<label for="card_payment">Card Payment</label><br>
	<input type="radio" id="online_payment" name="payment_method" value="online_payment" onclick="showOnlinePaymentForm()">
	<label for="online_payment">Online Payment</label><br><br>
	<form action="payment_submit.php" method="post" id="card_payment_form">
	<input type="hidden" name="payment_method" value="card_payment">
	<h3>Card Payment Information:</h3>
	<label for="card_number">Card Number:</label><br>
	<input type="text" id="card_number" name="card_number"><br><br>

	<label for="cvv">CVV:</label><br>
	<input type="text" id="cvv" name="cvv"><br><br>

	<label for="expiry_date">Expiry Date:</label><br>
	<input type="date" id="expiry_date" name="expiry_date"><br><br>


	<input type="submit" value="Pay">
</form>

<form action="payment_submit.php" method="post" id="online_payment_form" style="display:none">
	<input type="hidden" name="payment_method" value="online_payment">
	<h3>Online Payment Information:</h3>
	<label for="bank_name">Bank Name:</label><br>
	<input type="text" id="bank_name" name="bank_name"><br><br>
	<label for="online_transaction_id">Bank Account Number:</label><br>
    <input type="text" id="online_transaction_id" name="online_transaction_id"><br><br>
    <label for="online_transaction_id">Re-Enter Bank Account Number:</label><br>
    <input type="text" id="online_transaction_id" name="online_transaction_id"><br><br>
	<label for="online_transaction_id">IFSC Code:</label><br>
    <input type="text" id="online_transaction_id" name="online_transaction_id"><br><br>
	<label for="name">Recipient Name:</label><br>
    <input type="text" id="name" name="name"><br><br>
	<input type="submit" value="Pay">
</form>

<script type="text/javascript">
	function showCardPaymentForm() {
		document.getElementById("card_payment_form").style.display = "block";
		document.getElementById("online_payment_form").style.display = "none";
	}

	function showOnlinePaymentForm() {
		document.getElementById("card_payment_form").style.display = "none";
		document.getElementById("online_payment_form").style.display = "block";
	}
</script>





</body>
</html>