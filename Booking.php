<?php
include ('config/db_connect.php');


$errors=['departureDate'=>'', 'returnDate'=>'', 'pax'=>'', 'destination'=>''];

if (isset($_POST['submit'])){
    
    if(empty($_POST['departureDate'])){
        $errors['departureDate']='A departure date is required <br/>';
    } else{
        $departureDate = $_POST['departureDate'];
     
    }
    if(empty($_POST['returnDate'])){
        $errors['returnDate']= 'A return date is required <br/>';
    } else{
    $returnDate= $_POST['returnDate'];

    } 
 
    
    if(empty($_POST['pax'])){
        $errors['pax']='number of people is required <br/>';
    } else{
        $pax = $_POST['pax'];
       
    }
    if(empty($_POST['destination'])){
        $errors['destination']='You have not chosen a destination for your trip <br/>';
    } else{
        $destination = $_POST['destination'];
       
    }

    if (array_filter($errors)){
        echo 'there are errors in the form';
    } else{
      
      $departureDate= $_POST['departureDate'] ;
      $returnDate= $_POST['returnDate'];
      $pax=$_POST['pax'];
      $destination=$_POST['destination'];
      
      $sql="INSERT INTO Booking (departureDate,returnDate,pax,destination) VALUES ('$departureDate', '$returnDate', '$pax', '$destination')";

      
      if(mysqli_query($conn, $sql)){
        header('location: index.php');
      }else{
        echo 'query error: ' . mysqli_error();
      }
    
     
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
    <h1>Travel Booking</h1>
    <form id="bookingForm" action="booking.php" method="POST">
        <label for="departureDate">Departure date:</label>
        <input type="date" name="departureDate" required><br>

        <label for="returnDate">Return date:</label>
        <input type="date" name="returnDate" required><br>

        <label for="pax">Number of people:</label>
        <input type="number" name="pax" required><br>

        <label for="destination">Destination:</label>

        <select name="destination">
            <?php 
                $sql="SELECT city FROM SupportedDestinations";
                $result=mysqli_query($conn,$sql);
                $destinations= mysqli_fetch_all($result, MYSQLI_ASSOC);

                mysqli_free_result($result);
                mysqli_close($conn);
                ?>

            <?php foreach($destinations as $destination){ ?>
            <option><?php echo $destination['city']; ?></option>
            <?php } ?>
        </select>


        <button type="submit" name="submit">Book Now</button>
    </form>

    <div id="bookingStatus"></div>

    <script src="script.js"></script>

    <?php include('footer.php')?>

</html>