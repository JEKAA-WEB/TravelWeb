<?php
include('config/db_connect.php');

$sql="SELECT sd.description, sd.image as image, sd.country, sd.city as city, COALESCE(avg(star), 0) as star, COALESCE(count(star), 0) as review_count
FROM SupportedDestinations sd 
LEFT JOIN DestinationReviews dr on dr.reviewedDestination = sd.id
GROUP BY sd.description, sd.image, sd.country, sd.city";

$result= mysqli_query($conn, $sql);

$destinations= mysqli_fetch_all($result, MYSQLI_ASSOC);

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

            <?php }?>

        </ul>
</section>
<?php include('footer.php'); ?>

</html>