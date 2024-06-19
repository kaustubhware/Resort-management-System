<?php

session_start();
  // Connect to the database
  include "connect.php";

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

if (isset($_POST['payment_method'])) {
    $payment_method = $_POST['payment_method'];
} else {
    $payment_method = "";
}



// Get the input values
$name = $request_data['name'];
$email = $request_data['email'];
$phone = $request_data['phone'];
$a_date = $request_data['a_date'];
$d_date = $request_data['d_date'];
$room_type = $request_data['room_type'];
$people = $request_data['people'];
$total_amount = $billing_data['total_amount'];
$payment_method = $_POST['payment_method'];



require_once('fpdf185/fpdf.php');





class PDF extends FPDF
{
	function Header()
	{
		$this->SetFont('Arial','B',15);
		$this->Cell(80);
		$this->Cell(30,10,'Mountain View Resort',0,0,'C');
		$this->Ln(20);
	}
	
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);


// Add more cells with the details
$pdf->Cell(40,10,'Name',1,0,'C');
$pdf->Cell(50,10,$name,1,1,'C');

$pdf->Cell(40,10,'Email',1,0,'C');
$pdf->Cell(50,10,$email,1,1,'C');

$pdf->Cell(40,10,'Phone',1,0,'C');
$pdf->Cell(50,10,$phone,1,1,'C');

$pdf->Cell(40,10,'Arrival Date',1,0,'C');
$pdf->Cell(50,10,$a_date,1,1,'C');

$pdf->Cell(40,10,'Departure Date',1,0,'C');
$pdf->Cell(50,10,$d_date,1,1,'C');

$pdf->Cell(40,10,'Room Type',1,0,'C');
$pdf->Cell(50,10,$room_type,1,1,'C');

$pdf->Cell(40,10,'No. of People',1,0,'C');
$pdf->Cell(50,10,$people,1,1,'C');

$pdf->Cell(40,10,'Total Amount',1,0,'C');
$pdf->Cell(50,10,$total_amount,1,1,'C');

$pdf->Cell(40,10,'Payment Method',1,0,'C');
$pdf->Cell(50,10,$payment_method,1,1,'C');

// Add a thank you note
$pdf->Cell(190,10,'Thank you for your payment, Please do visit again !',0,1,'C');


// Output PDF file
$file_name = $name . '.pdf';
$pdf->Output($file_name, 'D');

// Output a message
echo 'Receipt generated and downloaded successfully!';

?>


