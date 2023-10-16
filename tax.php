<?php
error_reporting(0);
include("side.php");
 ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Check Tax You have To Pay</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="products.php">Products</a></li>
<li class="breadcrumb-item active">Total </li>
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
<h5 class="form-title"><span>Find Total  Information</span></h5>
</div>



<div class="col-12 col-sm-6">
<div class="form-group">
<label>Date Start</label>
<input type="date" name="start" class="form-control" required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>End Date</label>
<input type="date" name="end" class="form-control"  required>
</div>
</div>
</div>
<div class="col-12">
	<div class="form-group">
<button type="submit" name="check" class="btn btn-primary"><i class="fas fa-search"></button></i>
</div>
</div>
</form>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Quality</th>
<th>Price</th>
<th>Total Price</th>

<th>Date</th>
</tr>
</thead>
  <tbody>
<tr>
<?php
include("config.php");

if (isset($_POST['check'])) {
	$a=$_POST['start'];
	$b=$_POST['end'];
	$ss="SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'";
	$ch=$con->query($ss);
	$sql =$con->query("SELECT product_name,quantity,pprice,ttprice,date,sum(ttprice) as total FROM sale WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
$sum = 0;
$n=1;
if ($ch==$sql) {

while ($row=mysqli_fetch_array($sql)) {
      $tt=$row['total'];
        ?>

	<td><?php echo $n; ?></td>
	<td><?php echo $row['product_name']; ?></td>
	<td><?php echo $row['quantity']; ?></td>
	<td><?php echo $row['pprice']; ?></td>	
	<td><?php echo $row['ttprice']; ?></td>	
	<td><?php echo $row['date']; ?></td>
</tr>

<?php 
$n++;
}
}
}
?>

</tbody>

</table>
<div class="card-body">
	<span class="text-success"> <i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;THis Is Sum Of Sale <?php echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $tt."&nbsp;&nbsp;&nbsp;"."Rwf"; ?></span>	
</div>
</div>
</div>
</div>
</div>
</div>
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

<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>