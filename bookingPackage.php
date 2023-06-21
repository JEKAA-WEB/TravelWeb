<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
include ('config/db_connect.php');

if (!isset($_COOKIE['userid'])){
    header('location: signin.php');
}

$errors=['departureDate'=>'', 'returnDate'=>'', 'pax'=>'', 'destination'=>''];


$departureDate='';
$returnDate='';
$pax='';
$destination= '';
$destinationId= '';



if(isset($_POST['bookPackage'])){
    $sql="SELECT pax, sd.id as id, sd.city, days
    FROM Packages p 
    JOIN SupportedDestinations sd on sd.id=p.destination
    WHERE p.id={$_POST['packageId']}";

$res=mysqli_query($conn, $sql);
$packages=mysqli_fetch_all($res, MYSQLI_ASSOC);

$departureDate=date('Y-m-d');
$returnDate=date('Y-m-d', strtotime('+'.$packages[0]['days'].'days'));
$pax=$packages[0]['pax'];
$destination= $packages[0]['city'];
$destinationId=$packages[0]['id'];

}

if (isset($_POST['submit'])){
    
 
      
      $sql="INSERT INTO Booking (bookerId, departureDate,returnDate,pax,destination) VALUES ({$_COOKIE['userid']}, 'strtotime($departureDate)', '$returnDate', $pax, $destinationId)";

      
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
        <input type="date" name="departureDate" value="<?php echo $departureDate; ?>" required disabled><br>

        <label for="returnDate">Return date:</label>
        <input type="date" name="returnDate" value="<?php echo $returnDate; ?>"disabled required><br>

        <label for="pax">Number of people:</label>
        <input type="number" name="pax" value="<?php echo $pax; ?>" required disabled><br>

        <label for="destination">Destination:</label>

            <?php 
                $sql="SELECT * FROM SupportedDestinations where id=$destinationId";
                $result=mysqli_query($conn,$sql);
                $destinations= mysqli_fetch_all($result, MYSQLI_ASSOC);

                
                mysqli_close($conn);
            ?>
        <select name="destination" id="select" value="<?php echo $destinationId; ?>" disabled>

            <?php foreach($destinations as $destination){ ?>
            <option value='<?php echo $destination['id'];?>'><?php echo $destination['city']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit" id="submit"> Book now </button>
    </form>

    <div id="bookingStatus"></div>


    <?php include('footer.php')?>

</html>