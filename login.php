<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Place - Login</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <div class="loginbox">
                  <div class="login-left">
                     <img class="img-fluid" src="assets/img/logo-small.png" alt="Logo">
                  </div>
                  <div class="login-right">
                     <div class="login-right-wrap">
                      
                        <center><span  class="btn btn-outline-success btn-block">Place Management System Login
                           
                        </span></a></center><br>

                        <form method="post">
                           <div class="form-group">
                              <input class="form-control" type="text" name="username" placeholder="Username">
                           </div>
                           <div class="form-group">
                              <input class="form-control" type="password" name="password" placeholder="Password">
                           </div>
                           <div class="form-group">
                              <button class="btn btn-outline-success btn-block" name="login" type="submit">Login</button>
                           </div>
                        </form>
                              
                        
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <!-- <script src="assets/js/popper.min.js"></script> -->
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
</html>
<?php
error_reporting(0);
include("config.php");


if (isset($_REQUEST['login'])) {
    $username = $_REQUEST["username"];
    $password = md5($_REQUEST["password"]);
    $se=$con->query("SELECT * FROM employee WHERE emp_code='$username' AND password='$password'")or die(mysqli_error());
      $m=mysqli_num_rows($se);
$sel=$con->query("SELECT * FROM customer WHERE cust_code='$username' AND password='$password'")or die(mysqli_error());
  $mn=mysqli_num_rows($sel);
    if ($mn>0) {
      session_start();
        $_SESSION["cust_code"] = $username;
        // $_SESSION["password"] = $password;

        header("Location: index.php"); // Redirect to dashboard after successful login
        exit();
    } 
       if ($m>0) {
      session_start();
        $_SESSION["emp_code"] = $username;
        // $_SESSION["password"] = $password;

        header("Location:employee/"); 
        exit();
    } else {
        echo "<script>alert('Invalid username or password.')</script>";
    }
}
?>

