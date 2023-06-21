<?php
include('config/db_connect.php');

if (isset($_COOKIE['userid'])){
  header('location: index.php');
}

if (isset($_POST['submit'])){
     
      
      $userName= $_POST['userName'] ;
      $firstName= $_POST['firstName'];
      $lastName=$_POST['lastName'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      
      $sql="INSERT INTO User (userName,firstName,lastName,email,password,updatedAt) VALUES ('$userName', '$firstName', '$lastName', '$email','$password', now())";

      
      if(mysqli_query($conn, $sql)){
        header('location:index.php');
      }else{
        echo 'User name or email is taken please retry ' . mysqli_error();
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
            <h2>Sign Up</h2>
          </div>

          <div class="user-info1 flex1">

            <div class="user-box1">
              <input type="text" name="userName" required="" />
              <label>Username</label>
            </div>

            <div class="user-box1">
                <input type="text" name="firstName" required="" />
                <label>First Name</label>
              </div>
              
            <div class="user-box1">
              <input type="text" name="lastName" required="" />
              <label>Last Name</label>
            </div>

            <div class="user-box1">
                <input type="email" name="email" required="" />
                <label>Email</label>
              </div>

            <div class="user-box1">
                <input type="password" name= "password" required="" />
                <label>Password</label>
              </div>

          </div>

          <div class="wrapper1 flex1">
            <button class="flex1" name="submit">
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