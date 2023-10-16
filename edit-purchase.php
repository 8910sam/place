<?php 
error_reporting(0);

include("side.php"); ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Update Purchase</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="purchase.php">Purchase</a></li>
<li class="breadcrumb-item active">Purchase</li>
</ul>
</div>
</div>
</div>
<form method="post">
<?php
include("config.php");

  $fin=$con->query("SELECT * FROM purchase  INNER JOIN customer ON customer.id WHERE pur_id='$_GET[pur_id]'")or die(mysqli_error());
$ro=mysqli_fetch_array($fin);
 ?>
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Purchase Update Information</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">

<label >Choose Customer Name</label>
<select name="id" class="form-control" required>
  <?php echo "<option value='$ro[id]'>".$ro["fname"]."</option>"; ?>
  <?php 
  $sel=$con->query("SELECT * FROM customer")or die(mysqli_error());
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
	<option><?php echo $ro["product_name"]; ?></option>
	<?php 
include("config.php");
	$se=$con->query("SELECT * FROM products")or die(mysqli_error());
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
<input type="text" name="quantity" class="form-control" value="<?php echo $ro["quantity"] ?>" required="required">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Price</label>
<input type="text" name="price" class="form-control" value="<?php echo $ro["price"] ?>" required="required">
</div>
</div>

<div class="col-12">
	<div class="form-group">
<button type="submit" name="save" class="btn btn-outline-success mr-2">Save Purchase Records</button>
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
  $in=$con->query("UPDATE purchase SET id='$aa',product_name='$a',quantity='$c',price='$d',total='$tt' WHERE pur_id='$_GET[pur_id]'")or die(mysqli_error());
  $s=$con->query("SELECT * FROM products WHERE product_name  ='$a'")or die(mysqli_error());
  $q=mysqli_fetch_array($s);
  if($q["product_name"]==$a){
    $t=$q["quantity"]-$c;
    $u=$con->query("UPDATE products SET quantity='$t' WHERE product_name ='$a'")or die(mysqli_error());
    echo"<script>alert('item was removed');window.location.replace('purchase.php')</script>";
  }
  else{
    echo"<script>alert('item was not removed');window.location.replace('edit-purchase.php')</script>";

  }}
// }
 ?>