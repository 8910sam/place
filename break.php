<?php
error_reporting(0);
include("side.php");
 ?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Check Break Even Point</h3>
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
<h5 class="form-title"><span>Break Even Point  Information</span></h5>
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
<th>Purchase </th>
<th>Selling </th>
<th>Expenses </th>
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
		$sl =$con->query("SELECT product_name,quantity,price,total,date,sum(total) as tl FROM purchase WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
		$l =$con->query("SELECT expanse_name,amount,reason,date,sum(amount) as sum FROM expenses WHERE `date` BETWEEN '$a' AND '$b' ")or die(mysqli_error());
$sum = 0;
$n=1;
if ($ch==$sql) {
	while($w=mysqli_fetch_array($l)){
	$variableCostsPerUnit=$w["sum"];
while($we=mysqli_fetch_array($sl)){
 $fixedCosts=$we['tl'];
while ($row=mysqli_fetch_array($sql)) {
      $sellingPricePerUnit=$row['total'];
        ?>

	<td><?php echo $n; ?></td>
	<td><?php echo $fixedCosts."&nbsp;&nbsp;"."Rwf"; ?></td>
	<td><?php echo $sellingPricePerUnit."&nbsp;&nbsp;"."Rwf"; ?></td>
	<td><?php echo $variableCostsPerUnit."&nbsp;&nbsp;"."Rwf"; ?></td>

	<td><?php echo $row['date']; ?></td>
</tr>

<?php 
$n++;
}
}
}
}
}
?>

</tbody>

</table>
<?php
$BP=$sellingPricePerUnit+$variableCostsPerUnit;
$BreakEvenPoint=$fixedCosts-$BP;

 ?>
<div class="card-body">
	<span class="text-success"> <i class="fas fa-bars"></i>&nbsp;&nbsp;&nbsp;THe Break Even Point Is <?php echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $BreakEvenPoint."&nbsp;&nbsp;&nbsp;"."Rwf"; ?></span>	
</div>
</div>
</div>
<div class="row">
<div class="col-12 col-lg-12 col-xl-8 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-6">
<h5 class="card-title">Break Even Point</h5>
</div>
<div class="col-6">
<ul class="list-inline-group text-right mb-0 pl-0">
<li class="list-inline-item">
<div class="form-group mb-0 amount-spent-select">
<select class="form-control form-control-sm" id="bar">
<option>Weekly</option>
<option>Monthly</option>
<option>Yearly</option>
</select>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="card-body">
<div id="apexcharts-area"></div>
</div>
</div>
</div>
<div class="col-12 col-lg-12 col-xl-4 d-flex">
<div class="card flex-fill">
<div class="card-header">
<h5 class="card-title">Purchase History</h5>
</div>
<div class="card-body">
<div class="teaching-card">
<ul class="activity-feed">
<li class="feed-item">
<div class="feed-date1"><?php echo $we["date"]; ?></div>
<span class="feed-text1"><a><?php echo $we["product_name"] ."&nbsp;&nbsp;Quantity&nbsp;&nbsp;".$we["quantity"]; ?></a></span>
<p><span>In Progress</span></p>
</li>

</ul>
</div>
</div>
</div>
</div>
</div>
<div class="row">

<div class="card-body">
<div id="apexcharts-area"></div>
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
</div>


</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>


<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>
<script src="assets/js/script.js"></script>

<script>
	'use strict';

$(document).ready(function() {

	// Area chart
	
	if ($('#apexcharts-area').length > 0) {
	var options = {
		chart: {
			height: 400,
			type: "area",
			toolbar: {
				show: true
			},
		},
		dataLabels: {
			enabled: true
		},
		stroke: {
			curve: "smooth",
			
		},
		series: [{
			name: "Purchase",
			data: []
		}, {
			name: "Sales",
			color: '#FFBC53',
			data:[]
		},{
			name: "Expenses",
			color: 'red',
			data: []
		}],
		xaxis: {
			categories: [10,20,30,40,50,60,70,80,90,100]
		}
	}
	var chart = new ApexCharts(
		document.querySelector("#apexcharts-area"),
		options
	);
	chart.render();
	}

	// Bar chart
	
	
  
	var chartBar = new ApexCharts(document.querySelector('#bar'), optionsBar);
	chartBar.render();
	}
  
);
</script>