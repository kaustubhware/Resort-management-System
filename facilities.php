<?php
include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Resort Facilities</title>
  <style>
  /* Add some style to the page */
 body {
background-color:#c9af98; /* Comfortably Tan:  */
}
  }
  .container {
    width: 80%;
    margin: 0 auto;
    text-align: center;
    background-color: #FFFFFF; /* White */
  }
  h1 {
    font-size: 36px;
    margin-bottom: 40px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #000000; /* Dark gray shade */
  }
  .facility {
    display: inline-block;
    width: 30%;
    margin: 40px;
    text-align: center;
    vertical-align: top;
    padding: 30px 20px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    background-color:#000000; /* Light green shade */
  }
  .facility h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #c9af98; /* Dark gray shade */
  }
  .facility p {
    font-size: 18px;
    margin-bottom: 20px;
    line-height: 1.5;
    text-align: justify;
    color: #c9af98; /* Light gray shade */
  }
  .facility img {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
    border-radius: 10px 10px 0px 0px;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Our Resort Facilities</h1>
    <!-- Add a section for each facility -->
    <div class="facility">
      <img src="img/pool.jpg" alt="Swimming Pool">
      <h2>Swimming Pool</h2>
      <p>Take a dip in our sparkling swimming pool and soak up the sun on the lounge chairs.</p>
    </div>
    <div class="facility">
      <img src="img/spa.jpg" alt="Spa and Wellness Center">
      <h2>Spa and Wellness Center</h2>
      <p>Relax and rejuvenate with a massage or treatment at our spa and wellness center.</p>
    </div>
    <div class="facility">
      <img src="img/gym.jpg" alt="Fitness Center">
      <h2>Fitness Center</h2>
      <p>Stay active with our state-of-the-art fitness center, complete with cardio and weight training equipment.</p>
    </div>
  </div>
</body>
</html>