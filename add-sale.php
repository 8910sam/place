<?php 
error_reporting(0);

include("side.php"); ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Sales</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="sale.php">View All Sale</a></li>
<li class="breadcrumb-item active">Sales</li>
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
<h5 class="form-title"><span>Sales  Information</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">

<label >Customer  Code</label>
<select name="nme" class="form-control">
	<option>Select Customer Code</option>
	<?php 
include("config.php");
	$sel=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
$r=mysqli_fetch_array($sel);
$cs=$r["id"];
	echo "<option value='$r[id]'>".$r["cust_code"]."</option>";
	 ?>
</select>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">

<label >Product  Name</label>
<select name="name" class="form-control">
	<option>Choose Product Name</option>
	<?php 
	$s=$con->query("SELECT * FROM products WHERE id='$cs'")or die(mysqli_error());
while ($rr=mysqli_fetch_array($s)) {
	echo "<option>".$rr["product_name"]."</option>";
}
	 ?>
</select>
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control" placeholder="Enter Products Quantity">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Price</label>
<input type="text" name="price" class="form-control" placeholder="Enter Products Price" required>
</div>
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
	$b=$_POST['name'];
	$c=$_POST['quantity'];
	$d=$_POST['price'];
	$tt=$d*$c;
  $in=$con->query("INSERT INTO sale VALUES('','$a','$b','$c','$d','$tt',now())")or die(mysqli_error());

	$se=$con->query("SELECT * FROM products WHERE product_name ='$b'")or die(mysqli_error());
	$q=mysqli_fetch_array($se);
	if ($c>$q['quantity']) {
		echo"<script>alert('Please this quantity greathern you have')</script>";
	}
	else{
		if($q["product_name"]==$b){
		$t=$q["quantity"]-$c;
		$u="UPDATE products SET quantity='$t' WHERE product_name='$b'";
		$up=$con->query($u);
		echo"<script>alert('new item was recorded');window.location.replace('sale.php')</script>";
	}
	
	
	
	else{
		echo"<script>alert('Proccess to sales was not done well');window.location.replace('add-sale.php')</script>";

	}
}}
 ?>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>