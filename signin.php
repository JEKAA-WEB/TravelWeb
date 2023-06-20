<?php

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/auth-media-query.css" />
    <link rel="stylesheet" href="assets/css/auth.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>LoginForm</title>
  </head>
  <?php include ('header.php'); ?>
  
  <body>
    <main>
      <section class="container1 flex1">
        <form class="flex1" class="forma">
          <div class="form-title1 flex1">
            <h2>Login</h2>
          </div>

          <div class="user-info1 flex1">
            <div class="user-box1">
              <input type="text" required="" />
              <label>Username</label>
            </div>
            <div class="user-box1">
              <input type="password" required="" />
              <label>Password</label>
            </div>
          </div>

          <div class="wrapper1 flex1">
            <button class="flex1">
              <span>L</span>
              <span>o</span>
              <span>g</span>
              <span>i</span>
              <span>n</span>
            </button>
            <p>
              <span style="color: black; font-size: 10px"
                >Don't have an account?</span
              >
              <a href="signup.php" style="color: blue">SignUp</a>
            </p>
          </div>
        </form>
      </section>
    </main>
    <?php include ('footer.php'); ?>
  </body>
</html>