<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
include('config/db_connect.php');

$sql="SELECT p.id as id, p.name, p.description, days, pax, p.image as image, price,  sd.country, sd.city as destination, avg(star) as star, count(star) as review_count
FROM Packages p 
JOIN SupportedDestinations sd on p.destination = sd.id
LEFT JOIN PackageReviews pr on pr.reviewedPackage = p.id
GROUP BY p.name, p.description, p.days, p.pax, p.image, p.price, sd.country, sd.city, p.id
";

$result= mysqli_query($conn, $sql);

$packages= mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close ($conn);

?>


<!DOCTYPE html>
<?php include('header.php') ?>

<section class="package" id="package">
    <div class="container">


        <p class="section-subtitle">Popular Packages</p>

        <h2 class="h2 section-title">Checkout Our Packages</h2>

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

                        <form action='bookingPackage.php' method="POST"><button type='submit' name='bookPackage' class="btn btn-secondary">Book Now</button>
                                <input type="hidden" value='<?php echo $package['id'];?>' name='packageId'/>
                    </form>

                    </div>

                </div>
            </li>



            <?php } ?>

        </ul>


    </div>
</section>


<?php include ('footer.php') ?>

</html>