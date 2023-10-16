<?php
error_reporting(0);
 include("side.php");
include("config.php");
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Report Of All Sales</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="purchase.php">Purchase</a></li>
<li class="breadcrumb-item"><a href="add-sale.php">Sales</a></li>

<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item active">Products</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="#" class="btn btn-outline-success mr-2"><i class="fas fa-download"></i> Download</a>
<a href="add-sale.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
</div>
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
<th>Customer Code</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total Price</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<?php 
include("config.php");
$ss="SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'";
$ch=$con->query($ss);
	$we=mysqli_fetch_array($ch);
	$co=$we["id"];
$sel=$con->query("SELECT * from sale  INNER JOIN customer ON customer.id   WHERE   customer.id=sale.id")or die(mysqli_error());
$n=1;
while($row=mysqli_fetch_array($sel)){
	if ($co==$row["id"]) {

?>
<tbody>
<tr>
<td><?php echo $n; ?></td>
	<td><?php echo $row["cust_code"]; ?></td>
	<td><?php echo $row["product_name"]; ?></td>
	<td><?php echo $row["quantity"]; ?></td>
	<td><?php echo $row["pprice"]."&nbsp;&nbsp;rwf"; ?></td>	
	<td><?php echo $row["ttprice"]; ?></td>
	<td><?php echo $row["date"]; ?></td>	
<td>
<div class="actions">
 </span>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="edit-sale.php?sal_id=<?php echo $row['sal_id']; ?>" class="btn btn-sm bg-warning-light mr-2">
<i class="fas fa-pen">check update</i></a>


</div>
</td>
</tr>
<?php $n++;}} ?>
</tbody>
</table>
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