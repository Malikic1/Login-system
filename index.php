<?php
include "config.php";
session_start();
error_reporting(0);
if(isset($_SESSION['user_id'])){
  header("Location: welcome.php");
}

if(isset($_POST["register"])){
  $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
  $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
  $email = mysqli_real_escape_string($conn, $_POST["reg_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["reg_password"]));
  $checkEmail= mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));

  if ($checkEmail > 0) {
    echo
      "<script>alert('Email already exist');</script>";
  }else{
    $sql = "INSERT INTO users (first_name,last_name,email,password) VALUES ('$firstName','$lastName','$email','$password')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $_POST['firstName'] = "";
      $_POST['lastName'] = "";
      $_POST['reg_email'] = "";
      $_POST['reg_password'] = "";
      echo "<script>alert('registration successful');</script>";
    }else{
      echo
      "<script>alert('failed');</script>";
    }
  }

}


if(isset($_POST["login"])){
  $email = mysqli_real_escape_string($conn, $_POST["log_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["log_password"]));
  $checkEmail= mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password ='$password'");

  if (mysqli_num_rows($checkEmail) > 0) {
    $row = mysqli_fetch_assoc($checkEmail);
    $_SESSION["user_id"] = $row['id'];
    header("Location: welcome.php");
  }else{
      echo "<script>alert('Login details is incorrect. Please try again.');</script>";
    }
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <title>product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="index.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container1">
      <div class="content1">
        <h2>
          Learn to code by<br />
          watching others
        </h2>
        <p class="f-s">
          See how experienced developers solve<br class="m-br" />
          problems in real time.
          <br class="d-br" />
          Watching<br class="m-br" />
          scripted tutorial is great, but<br class="m-br" />
          understanding how <br class="d-br" />developer think is<br
            class="m-br"
          />
          invaluable.
        </p>
        <div>
          <button class="btn registerBtn">Join Us</button>
          <button class="btn loginBtn">Login Here</button>
        </div>
      </div>
      <div class="content2">
        <button class="btn-1 f-s">
          <b>Try it free 7 days</b> then<br class="m-br" />
          $20/mon thereafter

        </button>
        <br />
        <br />
        <form action="" method="post" class="reg">
          <input class="input1 mg-t" type="text" placeholder="First Name" name="firstName" value='<?php echo $_POST['firstName']; ?>' required/><br />
          <input class="input1" type="text" placeholder="Last Name" name="lastName" value='<?php echo $_POST['lastName']; ?>' required/><br />
          <input class="input1" type="email" placeholder="Email Address" name="reg_email" value='<?php echo $_POST['reg_email']; ?>'required/><br />
          <input class="input1" type="password" placeholder="Password" name="reg_password" value='<?php echo $_POST['reg_password'] ?>' required/>
            <br />
          <input type="submit" name="register" class="input1 btn-2 f-s" value="CLAIM YOUR FREE TRIAL"/><br />
          <input class="input2" type="checkbox" required/><span class="fs-2">
            By clicking the button, you are agreeing to<br class="m-br" />
            our <span class="c">Terms and Services</span>
          </span>
        </form>

        <form action="" method="post" class="log">
          <br />
          <input class="input1" type="email" placeholder="Email Address" name="log_email"  value='<?php echo $_POST['log_email']; ?>' required/>
          <br />
          <input class="input1" type="password" placeholder="Password" name="log_password"  value='<?php echo $_POST['log_password']; ?>' required/>
          <br /><br />
          <input type="checkbox" /><span class="f-s">Remember me</span> <br />
          <input type="submit" name="login" class="input1 btn-2 f-s" value="SIGN IN"/><br />
          <p class="forgot"><u>forgot password</u></p>
        </form>
      </div>
    </div>
    <br />
    <script src="index.js"></script>
  </body>
</html>
