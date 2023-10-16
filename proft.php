<?php
error_reporting(0);

include("side.php");
 ?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">

<h3 class="page-title">Check Profit And Loss</h3>
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
<button type="submit" name="check" class="btn btn-outline-success mr-2"><i class="fas fa-search"></button></i>
</div>
</div>
</form>
</div>
</div>

<div class="row">
	<h2>Campany reports</h2>
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>Purchase</th>
<th>Sales</th>
<th>Expenses</th>
<th>Remain</th>
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
	$ree=mysqli_fetch_array($ch);
	$ttt=$ree["id"];
	$sql =$con->query("SELECT id,product_name,quantity,price,total,date,sum(total) as total FROM purchase WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
	$sq =$con->query("SELECT id,product_name,quantity,pprice,ttprice,date,sum(ttprice) as t FROM sale WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
		$ql =$con->query("SELECT id,expanse_name,reason,amount,date,sum(amount) as tl FROM expenses WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
$rw=mysqli_fetch_array($sql);
      $t=$rw['total'];
$qw=mysqli_fetch_array($sq);
      $v=$qw['t'];

$row=mysqli_fetch_array($ql);

      $tt=$row['tl'];
 
$profitOrLoss=$t-$v-$tt;
if ($profitOrLoss > $t) {
    $result = "Profit";
} elseif ($profitOrLoss < $t) {
    $result = "Loss";
} else {
    $result = "No Profit, No Loss";
}

      	if ($row["id"]==$ttt && $rw["id"]==$ttt && $qw["id"]==$ttt) {
        ?>

	<td><?php echo $t."&nbsp;&nbsp;&nbsp;"."Rwf"; ?></td>
	<td><?php echo $v."&nbsp;&nbsp;&nbsp;"."Rwf"; ?></td>
	<td><?php echo $tt."&nbsp;&nbsp;&nbsp;"."Rwf"; ?></td>	
	<td><?php echo $profitOrLoss."&nbsp;&nbsp;&nbsp;"."Rwf";?></td>
	<td><?php echo $a."&nbsp;&nbsp;"."Up to"."&nbsp;&nbsp;".$b; ?></td>

</tr>


</tbody>

</table>

	<span class="text-danger"> <i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;Profit Or Loss on <?php echo $a; ?> to <?php echo $b; ?> <?php echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;you&nbsp;&nbsp;&nbsp;". $result; }}?></span>	<br><br>


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