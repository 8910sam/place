<?php 
error_reporting(0);

include ("config.php");
include("side.php");

?>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Register</h1>
<p class="account-subtitle">Access to our dashboard</p>

<form action="action.php" method="post" onsubmit="return checkPasswordMatch();">
<div class="form-group">

	<button class="col-sm-12 btn btn-danger" id="generateCode">Generate Employee Sign in Code </button>
</div>
<?php
function generateVerificationCode($length = 6) {
    $characters = '0123456789';
    $code = 'PL';

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
while ($r=mysqli_fetch_array($sel)) {
    echo "<option>".$r["cust_code"]."</option>";
}
    ?>
</select>

</div>
<div class="form-group">
<input class="form-control" type="password" name="password" id="password" placeholder="enter Strong  password" required>

</div>
<div class="form-group">
<input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" required>
</div>
<span id="matchMessage" style="color: red;"></span>
<div class="form-group mb-0">
<button class="btn btn-primary btn-block" name="login" type="submit">Register</button>
  <span id="validationResult"></span>
</div>
</form>
   <?php
   include("config.php");
if (isset($_POST["login"])) {
  
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
   
   // validation strong password
    $minLength = 8;
    $hasUppercase = preg_match('/[A-Z]/', $password);
    $hasLowercase = preg_match('/[a-z]/', $password);
    $hasNumber = preg_match('/[0-9]/', $password);
    $hasSpecialChar = preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/', $password);

    if (strlen($password) >= $minLength && $hasUppercase && $hasLowercase && $hasNumber && $hasSpecialChar) {

    } else {
        echo "<p style='color:red'>Password is not strong!</p>";
    }


}

?>
<script>
        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                document.getElementById("matchMessage").innerHTML = "Passwords do not match.";
                return false;
            } else {
                document.getElementById("matchMessage").innerHTML = "";
                return true;
            }
        }
    </script>

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