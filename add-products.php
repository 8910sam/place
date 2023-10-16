<?php 
error_reporting(0);

include("side.php"); ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Products</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="products.php">Products</a></li>
<li class="breadcrumb-item active">Add Purchase</li>
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
<h5 class="form-title"><span>Products Information</span></h5>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">

<label >Product  Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter Products Name">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Customer Name</label>
<select class="form-control" name="ref" >
	<option>Choose Customer Namw </option>
	<?php 
include("config.php");
	$sel=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
while ($r=mysqli_fetch_array($sel)) {
	echo "<option value='$r[id]'>".$r["cust_code"]."</option>";
}
	 ?>
</select>
</div>
</div>


<div class="col-12">
	<div class="form-group">
<button type="submit" name="save" class="btn btn-primary">Save Products Records</button>
</div>
</div>
</form>
</div>
<?php
include("config.php");
if(isset($_POST['save'])){

	$a=$_POST['name'];
	$b=$_POST['ref'];
	$sql = $con->query("INSERT INTO products VALUES('','$b','$a','')");

if ($sql==true) {
	echo "<script>alert('well')</script>";
}
else{
echo "<script>alert('noo')</script>";
}
}
 ?>
</div>
</div>
</div>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>