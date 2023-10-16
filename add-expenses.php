<?php 
error_reporting(0);

include("side.php"); ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Expenses</h3>
<ul class="breadcrumb">Expenses</a></li>
<li class="breadcrumb-item active">Products</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="post">
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Expenses  Information</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">

<label >Customer  Name</label>
<select name="nme" class="form-control">
	<option>Select Customer Code</option>
	<?php 
include("config.php");
	$sel=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
$r=mysqli_fetch_array($sel);
$cs=$r["id"];
	echo "<option value='$r[id]'>".$r["fname"]."</option>";
	 ?>
</select>
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>expanse name</label>
<input type="text" name="expanse_name" class="form-control" placeholder="Enter expanse name">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>amount</label>
<input type="text" name="amount" class="form-control" placeholder="Enter amount" required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Reason</label>
<input type="text" name="reason" class="form-control" placeholder="Enter Reason">
</div>
</div>

<div class="col-12">
	<div class="form-group">
<button type="submit" name="save" class="btn btn-primary">Save Sale Records</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
<?php

if(isset($_POST['save'])){
    $a=$_POST['nme'];
	$b=$_POST['expanse_name'];
	$c=$_POST['amount'];
	$d=$_POST['reason'];
  $in=$con->query("INSERT INTO expenses VALUES('','$a','$b','$c','$d',now())")or die(mysqli_error());
		if($in==true){
		echo"<script>alert('new expanse was recorded');window.location.replace('expense.php')</script>";
	}

	else{
		echo"<script>alert('somothing went wrong!!!');window.location.replace('add-expenses.php')</script>";

	}
}
 ?>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>