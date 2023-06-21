<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
include('config/db_connect.php');

if (isset($_COOKIE['userid'])){
  header('location: index.php');
}

if(isset($_POST['submit'])){
   
  $sql="SELECT id FROM User u
  WHERE (u.email='{$_POST['userName']}' or u.username='{$_POST['userName']}') and u.password=SHA2('{$_POST['password']}', 256)";

  
  $res=mysqli_query($conn, $sql);
  $cookie=mysqli_fetch_all($res, MYSQLI_ASSOC);

  if ($res && !$cookie){
    echo 'wrong credentials';
  }else{
  
    setcookie('userid', $cookie[0]["id"], time() + 270000);
    header('location: index.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en"> 

  <?php include ('header.php'); ?>

    <link rel="stylesheet" href="assets/css/auth.css" />
    <link rel="stylesheet" href="assets/css/auth-media-query.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <main class="a">
      <section class="container1 flex1">
        <form class="flex1" id="forma" method="POST">
          <div class="form-title1 flex1">
            <h2>Login</h2>
          </div>

          <div class="user-info1 flex1">
            <div class="user-box1">
              <input type="text" required="" name="userName" />
              <label>Username</label>
            </div>
            <div class="user-box1">
              <input type="password" required="" name="password" />
              <label>Password</label>
            </div>
          </div>

          <div class="wrapper1 flex1">
            <button class="flex1" type="submit" name="submit">
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