<?php 
// error_reporting(0);

 ?>
 <!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Place Managment System - Dashboard</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="shortcut icon" href="assets/img/favicon.png">
   
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
<h1>Register</h1>
<p class="account-subtitle">Access to our dashboard</p>

<form  method="post">
<div class="form-group">

    <button class="col-sm-12 btn btn-outline-success mr-2" id="generateCode">Generate Customer Sign in Code </button>
</div>
<?php
function generateVerificationCode($length = 4) {
    $characters = '0123456789';
    $code = 'CS';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

$verificationCode = generateVerificationCode();


    ?>

<div class="form-group">
<input class="form-control" type="text" name="username" value="<?php echo " $verificationCode";?>" placeholder="Customer" required>
</div>
    <div class="form-group">

<input class="form-control" type="text" name="name"  placeholder="enter  full name" required>

</div>
<div class="form-group">
<input class="form-control" type="password" name="password"  placeholder="enter  password" required>

</div>

<span id="matchMessage" style="color: red;"></span>
<div class="form-group mb-0">
<button class="btn btn-outline-success mr-2" name="login" type="submit">Register</button>
  <span id="validationResult"></span>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>

<?php
include("config.php");
if(isset($_POST['login'])){

    $a=$_POST['username'];
    $b=$_POST['name'];
    $c=md5($_POST['password']);
    $sql=$con->query("INSERT INTO customer VALUES('','$a','$b','$c')")or die(mysqli_error());

if ($sql==true) {
    echo "<script>alert('well')</script>";
}
else{
echo "<script>alert('noo')</script>";
}
}
 ?>