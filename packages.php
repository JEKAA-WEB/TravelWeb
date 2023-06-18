<?php
include('config/db_connect.php');

$sql="SELECT  FROM packages";

$result= mysqli_query($conn, $sql);

$packages= mysqli_fetch_all($results, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close ($conn);

?>
<!DOCTYPE html>
<?php include('header.php') ?>
    
    <section class="package" id="package">
    <div class="container">
    
   
      <p class="section-subtitle">Popular Packeges</p>

      <h2 class="h2 section-title">Checkout Our Packeges</h2>

      <p class="section-text">
        Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium.
        Sit ornare
        mollitia tenetur, aptent.
      </p>

    <ul class="package-list">
      
      <?php foreach($packages as $package) { ?>
      
        <li>
          <div class="package-card">

            <figure class="card-banner">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo $package['image']; ?>" alt="Summer Holiday To The Oxolotan River" loading="lazy">
            </figure>

            <div class="card-content">

              <h3 class="h3 card-title"><?php echo $package['name']; ?></h3>

              <p class="card-text"> <?php echo $package['description']; ?> </p>

              <ul class="card-meta-list">

                <li class="card-meta-item">
                  <div class="meta-box">
                    <ion-icon name="time"></ion-icon>

                    <p class="text"><?php echo $package['days']; ?></p>
                  </div>
                </li>

                <li class="card-meta-item">
                  <div class="meta-box">
                    <ion-icon name="people"></ion-icon>

                    <p class="text"><?php echo $package['pax']; ?></p>
                  </div>
                </li>

                <li class="card-meta-item">
                  <div class="meta-box">
                    <ion-icon name="location"></ion-icon>

                    <p class="text"><?php echo $package['destination'].",".$package['country'] ; ?></p>
                  </div>
                </li>

              </ul>

            </div>

            <div class="card-price">

              <div class="wrapper">

              <?php for($i=o; $i<$package['stars']; $i++) { ?>
               
               <?php echo '
                <div class="card-rating">
                  <ion-icon name="star"></ion-icon>
                </div>';
                ?>
             
                <?php } ?>
              </div>

              <p class="price">
               
              <?php echo $package['price']; ?>
                
                <span>/ per person</span>
              </p>

              <button class="btn btn-secondary">Book Now</button>

            </div>

          </div>
        </li>

        
        
     <?php } ?>

    </ul>
     

    </div>
  </section>


    <?php include ('footer.php') ?>
</html>