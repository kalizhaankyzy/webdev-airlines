<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn&SignUp</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    
  <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
  </head>
  <body>
  <?php
    require('../connection.php');
    session_start();
    $errMsg="";
    if (isset($_POST['login-submit'])) {
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($mysqli, $username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($mysqli, $password);
      $query = "SELECT * FROM `customer` WHERE full_name='$username' AND password='$password'";
      $result = mysqli_query($mysqli, $query) or die(mysql_error());
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
          echo 'Success';
          $_SESSION['login'] = 1;
          header("Location: http://localhost/webdev-airlines/front/main.php");
      } 
      else {
        $errMsg = "Invalid Data";
      }
    }
    if (isset($_REQUEST['register-submit'])) {
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($mysqli, $username);
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($mysqli, $email);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($mysqli, $password);
      $phone_no = stripslashes($_REQUEST['phone-no']);
      $phone_no = mysqli_real_escape_string($mysqli, $phone_no);
      $address = stripslashes($_REQUEST['address']);
      $address = mysqli_real_escape_string($mysqli, $address);

      if($username != '' && $email != '' && $password != '' && $phone_no != '' && $address != ''){
        $query = "INSERT INTO `customer` (`full_name`, `email`, `password`, `phone_no`, `address`) VALUES ('$username','$email','$password','$phone_no','$address')";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
          echo $result;
          $_SESSION['login'] = 1;
          header("Location: http://localhost/webdev-airlines/front/login/");
        }else{
          $errMsg = "Invalid Data";
        }
      }else{
        $errMsg = "Invalid Data";
      }
      
    }
  ?>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="post">
            <h2 class="title">Log In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" name="login-submit" class="btn solid" />
            <span style="color:red;"><?php echo $errMsg ?></span>
          </form>


          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Phone number" name="phone-no"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Address" name="address"/>
            </div>
            <input type="submit" value="Sign Up" class="btn solid" name="register-submit"/>
            <span style="color:red;"><?php echo $errMsg ?></span>
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>Don’t have an account yet?</h3>
                <p>Manage your bookings and receive our latest news and offers just for you</p>
                <button class="btn transparent" id="sign-up-btn">Create a new account</button>
            </div>
            <img src="./img/" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us?</h3>
                <p>Manage your bookings and receive our latest news and offers just for you</p>
                <button class="btn transparent" id="sign-in-btn">Log In</button>
            </div>
            <img src="./img/" class="image" alt="">
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
  </body>
</html>