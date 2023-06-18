<?php
include('config/db_connect.php');

$sql="SELECT  FROM destinations";

$result= mysqli_query($conn, $sql);

$destinations= mysqli_fetch_all($results, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close ($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>
    
    <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Uncover place</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium.
            Sit ornare
            mollitia tenetur, aptent.
          </p>

          <ul class="popular-list">
            
          <?php foreach($destinations as $destination) { ?>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/baleMt.jpg" alt="Bale, Ethiopia" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                   
                  <?php for ($i=0; $i<$destination['stars']; $i++){ ?>
                   <ion-icon name="star"></ion-icon>
                  <?php } ?>
                  
                   </div>

                  <p class="card-subtitle">
                    <a href="#"><?php echo $destination['country'];?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#"><?php echo $destination['city'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $destination['description'];?> 
                  </p>

                </div>

              </div>
            </li>
        
        <?php }?>
       
        </ul>
    </section>
 <?php include('footer.php'); ?>
</html>