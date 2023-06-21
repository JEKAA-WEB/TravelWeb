<?php

include('config/db_connect.php');

?>


<!DOCTYPE html>
<html lang="en">

<?php include('header.php') ?>

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Unleash Your Travel Dreams</h2>

          <p class="hero-text">
          It's time to break free from the mundane and unleash your 
          wildest travel dreams. Let your imagination soar and let us 
          craft the perfect itinerary to turn your wanderlust into reality
          </p>

          <div class="btn-group">
            <button class="btn btn-primary">Learn more</button>

            <button class="btn btn-secondary" id="booking2">Book now</button>
          </div>

        </div>
      </section>


      <!-- 
        - #DESTINATIONS
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Uncover places</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
          Step into a world of wonder and explore popular destinations that have 
          captivated the hearts of travelers worldwide. From the bustling streets of vibrant cities to serene natural landscapes, 
          these destinations offer an enchanting tapestry of experiences
          </p>

        <ul class="popular-list">
            
                      <?php 
                      $sql="SELECT sd.description, sd.image as image, sd.country, sd.city as city, COALESCE(avg(star), 0) as star, COALESCE(count(star), 0) as review_count
                      FROM SupportedDestinations sd 
                      LEFT JOIN DestinationReviews dr on dr.reviewedDestination = sd.id
                      GROUP BY sd.description, sd.image, sd.country, sd.city, sd.createdAt
                      ORDER BY sd.createdAt DESC
                      LIMIT 3";
                      
                      $result= mysqli_query($conn, $sql);
                      
                      $destinations= mysqli_fetch_all($result, MYSQLI_ASSOC);
                      
                      mysqli_free_result($result);
                      
                    
                      ?>

          <?php foreach ($destinations as $destination) {   ?>
                   
            <li>
              <div class="popular-card">

                 <div class="destination card-content">

                        <div class="card-rating">

                            <?php for ($i=0; $i<$destination['star']; $i++){ ?>
                            <ion-icon name="star" class="selected"></ion-icon>
                            <?php } ?>
                            <?php for ($i=0; $i<5-$destination['star']; $i++){ ?>
                            <ion-icon name="star"></ion-icon>
                            <?php } ?>

                        </div>

                        <p class="card-subtitle">
                            <a href="#"><?php echo $destination['country'];?></a>
                        </p>

                        <h3 class="h3 card-title">
                            <a href="#"><?php echo $destination['city'];?></a>
                        </h3>

                        <p class="destination card-text">
                            <?php echo $destination['description'];?>
                        </p>

                    </div>

                    <figure class="card-img">
                        <img src="<?php echo $destination['image'];?>" class="img-fluid?>" alt="Bale, Ethiopia"
                            loading="lazy">
                    </figure>

              </div>
            </li>
            
          <?php } ?>

        </ul>

          <button class="btn btn-primary" id="dest">More destinations</button>

        </div>
      </section>





      <!-- 
        - #PACKAGES
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Packages</p>

          <h2 class="h2 section-title">Checkout Our Packages</h2>

          <p class="section-text">
          Discover a world of possibilities with our diverse range of travel packages, 
          tailored to suit every wanderer's dream. From exhilarating escapades to cultural immersions, 
          we have thoughtfully crafted packages to cater to all travel styles and preferences
          </p>

          <ul class="package-list">
          
              <?php

                $sql="SELECT p.name, p.description, days, pax, p.image as image, price,  sd.country, sd.city as destination, avg(star) as star, count(star) as review_count
                FROM Packages p 
                JOIN SupportedDestinations sd on p.destination = sd.id
                LEFT JOIN PackageReviews pr on pr.reviewedPackage = p.id
                GROUP BY p.name, p.description, p.days, p.pax, p.image, p.price, sd.country, sd.city, p.createdAt
                ORDER BY p.createdAt DESC
                LIMIT 4
                ";

                $result= mysqli_query($conn, $sql);

                $packages= mysqli_fetch_all($result, MYSQLI_ASSOC);

                mysqli_free_result($result);
                mysqli_close ($conn);

              ?>

           <?php foreach($packages as $package) { ?>

            <li>
               <div class="package-card">

                    <figure class="card-banner">
                        <img src="<?php echo $package['image']; ?>" alt="Summer Holiday To The Oxolotan River"
                            loading="lazy">
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

                                    <p class="text"><?php echo $package['destination'].", ".$package['country'] ; ?></p>
                                </div>
                            </li>

                        </ul>

                    </div>

                    <div class="card-price">

                        <div class="wrapper">

                            <?php for($i=0; $i<$package['star']; $i++) { ?>

                            <?php echo '
                                      <div class="card-rating">
                                        <ion-icon name="star" class="selected"></ion-icon>
                                      </div>';
                            ?>

                            <?php } ?>
                            <?php for($i=0; $i<5-$package['star']; $i++) { ?>

                            <?php echo '
                                      <div class="card-rating">
                                        <ion-icon name="star"></ion-icon>
                                      </div>';
                            ?>

                            <?php } ?>
                            <?php echo "(".$package['review_count'].")"; ?>
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

          <button class="btn btn-primary" id="packages">View All Packages</button>

        </div>
      </section>





      <!-- 
        - #GALLERY
      -->

      <section class="gallery" id="gallery">
        <div class="container">

          <p class="section-subtitle">Photo Gallery</p>

          <h2 class="h2 section-title">Photo's From Travellers</h2>

          <p class="section-text">
          These captivating photos serve as a window into the extraordinary
          moments and breathtaking sights we encountered during our unforgettable vacations, offering a glimpse into the sheer beauty that awaited us
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/hammer.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/addis.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/ethio.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/blackwomen.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/takingPhoto.jpg" alt="Gallery image">
              </figure>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel? Remember Us!</h2>

            <p class="section-text">
              Unleash your wanderlust and embark on a transformative journey with our extraordinary travel experience.
              Discover captivating destinations, from breathtaking landscapes to vibrant cultures, as you immerse yourself in the wonders of the world.
              Our carefully crafted itineraries ensure every moment is filled with awe and excitement, connecting you with hidden gems and local communities. 
              Create cherished memories that will last a lifetime as you explore thrilling escapades, serene retreats, and cultural discoveries. Let us ignite 
              your sense of adventure and guide you on an unforgettable expedition that will redefine the way you see the world..
            </p>
          </div>

          <button class="btn btn-secondary">Contact Us !</button>

        </div>
      </section>

    </article>
  </main>


<?php include('footer.php') ?>
</html>


  