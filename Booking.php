<?php
include ('config/db_connect.php');

if (isset('$_POST['submit']')){




}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Travel Booking</title>
  <link rel="stylesheet" href="assets/css/booking.css">
   <script src="assets/js/booking.js " defer></script>
</head>
<?php include('header.php') ?>

<body>
  <h1>Travel Booking</h1>
  <form id="bookingForm" action="booking.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" required><br>
   
    <label for="pax">Number of people:</label>
    <input type="number" id="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" required><br>

    <label for="destination">Destination:</label>
    <input type="text" id="destination" required><br>

    <label for="date">Date:</label>
    <input type="date" id="date" required><br>

    <button type="submit" name="submit">Book Now</button>
  </form>

  <div id="bookingStatus"></div>

  <script src="script.js"></script>

  <?php include('footer.php')?>

  </html>