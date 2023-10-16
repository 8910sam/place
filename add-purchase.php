<?php
error_reporting(0);


 include("side.php"); ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Purchase</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="sale.php">Purchase</a></li>
<li class="breadcrumb-item active">Add purchase</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-12">
	<form method="post">
<h5 class="form-title"><span>Purchase Information</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">

<label >Choose Customer Name</label>
<select name="id" class="form-control" required>
  <option>Select Customer Name</option>
  <?php 
include("config.php");
  $sel=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
while($r=mysqli_fetch_array($sel)) {
  echo "<option value='$r[id]'>".$r["fname"]."</option>";


}
   ?>
</select>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">

<label >Product  Name</label>
<select name="name" class="form-control" required>
	<option>Select Product Name</option>
	<?php 
include("config.php");
	$se=$con->query("SELECT * FROM products WHERE id='$r[id]'")or die(mysqli_error());
while($rr=mysqli_fetch_array($se)) {
	echo "<option>".$rr["product_name"]."</option>";


}
	 ?>
</select>
</div>
</div>


<div class="col-12 col-sm-6">
<div class="form-group">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control" placeholder="Enter Products Quantity" required="required">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Price</label>
<input type="text" name="price" class="form-control" placeholder="Enter Products Price" required="required">
</div>
</div>

<div class="col-12">
	<div class="form-group">
<button type="submit" name="save" class="btn btn-primary">Save Purchase Records</button>
</div>
</div>
</div>
</div>
  </form>

</div>

 <?php
if(isset($_POST['save'])){
   $aa=$_POST["id"];
  $a=$_POST["name"];
  $c=$_POST["quantity"];
  $d=$_POST["price"];
  $tt=$d*$c;
  $in=$con->query("INSERT INTO purchase VALUES('','$aa','$a','$c','$d','$tt',now())")or die(mysqli_error());
  $s=$con->query("SELECT * FROM products WHERE product_name  ='$a'")or die(mysqli_error());
  $q=mysqli_fetch_array($s);
  if($q["product_name"]==$a){
    $t=$q["quantity"]+$c;
    $u=$con->query("UPDATE products SET quantity='$t' WHERE product_name ='$a'")or die(mysqli_error());
    echo"<script>alert('new item was recorded');window.location.replace('products.php')</script>";
  }
  else{
    echo"<script>alert('new item was not recorded');window.location.replace('products.php')</script>";

  }}
// }
 ?>