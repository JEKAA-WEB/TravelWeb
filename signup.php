<?php

?>

<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="assets/css/auth.css" />
    <link rel="stylesheet" href="assets/css/auth-media-query.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<?php include ('header.php'); ?>
  

    <main class="a">
      <section class="container1 flex1">
        <form class="flex1" class="forma">

          <div class="form-title1 flex1">
            <h2>Sign Up</h2>
          </div>

          <div class="user-info1 flex1">

            <div class="user-box1">
              <input type="text" required="" />
              <label>Username</label>
            </div>

            <div class="user-box1">
                <input type="text" required="" />
                <label>First Name</label>
              </div>
              
            <div class="user-box1">
              <input type="text" required="" />
              <label>Last Name</label>
            </div>

            <div class="user-box1">
                <input type="email" required="" />
                <label>Email</label>
              </div>

            <div class="user-box1">
                <input type="password" required="" />
                <label>Password</label>
              </div>

          </div>

          <div class="wrapper1 flex1">
            <button class="flex1">
              <span>S</span>
              <span>i</span>
              <span>g</span>
              <span>n</span>
              <span>U</span>
              <span>p</span>
            </button>
            <p><span style="color:black; font-size:10px;">Already have an account?</span>   <a href="Signin.php" style="color:blue;">Signin</a></p>
          </div>
        </form>
      </section>
    </main>

<?php include ('footer.php'); ?>

</html>