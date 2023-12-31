<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
include ('config/db_connect.php');

if (!isset($_COOKIE['userid'])){
    header('location: signin.php');
}

$errors=['departureDate'=>'', 'returnDate'=>'', 'pax'=>'', 'destination'=>''];

if (isset($_POST['submit'])){
    
 
      $departureDate= $_POST['departureDate'] ;
      $returnDate= $_POST['returnDate'];
      $pax=$_POST['pax'];
      $destination=$_POST['destination'];
      
      $sql="INSERT INTO Booking (bookerId, departureDate,returnDate,pax,destination,updatedAt) VALUES ({$_COOKIE['userid']}, '$departureDate', '$returnDate', '$pax', $destination, now())";

      
      if(mysqli_query($conn, $sql)){
        header("location:index.php");
      }else{
        echo 'query error: ' . mysqli_error();
      }
    
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
    
    <form id="bookingForm"  method="post">
        <h1 id="title">Travel Booking</h1>
        <label for="departureDate">Departure date:</label>
        <input type="date" name="departureDate" required><br>

        <label for="returnDate">Return date:</label>
        <input type="date" name="returnDate" required><br>

        <label for="pax">Number of people:</label>
        <input type="number" name="pax" required><br>

        <label for="destination">Destination:</label>

        <select name="destination" id="select">
            <?php 
                $sql="SELECT * FROM SupportedDestinations";
                $result=mysqli_query($conn,$sql);
                $destinations= mysqli_fetch_all($result, MYSQLI_ASSOC);

                
                mysqli_close($conn);
                ?>

            <?php foreach($destinations as $destination){ ?>
            <option value='<?php echo $destination['id'];?>'><?php echo $destination['city']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit" id="submit"> Book now </button>
    </form>

    <div id="bookingStatus"></div>


    <?php include('footer.php')?>

</html>