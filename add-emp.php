<?php 
error_reporting(0);

include("side.php"); ?>
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

	<button class="col-sm-12 btn btn-success" id="generateCode">Generate Employee Sign in Code </button>
</div>
<?php
function generateVerificationCode($length = 6) {
    $characters = '0123456789';
    $code = 'EMP';

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
<select class="form-control" name="cust">
    <option>select your code</option>
    <?php 
    include("config.php");
$sel=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
$r=mysqli_fetch_array($sel) ;
    echo "<option value='$r[id]'>".$r["cust_code"]."</option>";

    ?>
</select>

</div>
<div class="form-group">
<input class="form-control" type="password" name="password"  placeholder="enter  password" required>

</div>

<span id="matchMessage" style="color: red;"></span>
<div class="form-group mb-0">
<button class="btn btn-primary btn-block" name="login" type="submit">Register</button>
  <span id="validationResult"></span>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>

<?php 
   include("config.php");

if (isset($_POST['login'])) {
     $a=$_POST['cust'];
    $username=$_POST['username'];

   
    $pas =md5($_POST["password"]);

$in="INSERT INTO employee VALUES('','$a','$username','$pas')";
$rew=$con->query($in);
if ($rew==true) {
    echo "<script>alert('new employee was saved');window.location.replace('employee.php')</script>";
}
else{
    echo "<script>alert('Username Or Passwords do not match');window.replace('add-emp.php')</script>";

}
}

?>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>

