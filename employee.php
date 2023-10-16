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
<h3 class="page-title">Employees Information</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">employee's</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="#" class="btn btn-outline-success mr-2"><i class="fas fa-download"></i> Download</a>
<a href="add-emp.php" class="btn btn-outline-success mr-2"><i class="fas fa-plus"></i></a>
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
<th>Employee Code</th>
<th>Password</th>
<th class="text-right">Operation</th>
</tr>
</thead>
<tbody>

<?php 
$sel=$con->query("SELECT * from employee INNER JOIN customer ON customer.id  WHERE employee.id = customer.id")or die(mysqli_error());
$n=1;
while($row=mysqli_fetch_array($sel)){

?>
<tr>
<td><?php echo $n; ?></td>
	<td><?php echo $row["cust_code"]; ?></td>
	<td><?php echo $row["emp_code"]; ?></td>
	<td><?php echo $row["password"]; ?></td>	
<td>
<a href="edit-emp.php?emp_id=<?php echo $row['emp_id']; ?>" class="btn btn- bg-warning-light mr-2">
<i class="fas fa-pen"></i>
</a>
<a href="delete.php?emp_id=<?php echo $row['emp_id']; ?>" class="btn btn-outline-success mr-2">
<i class="fas fa-trash"></i>
</a>
</div>
</td>
</tr>
<?php $n++;} ?>
</tbody>
</table>
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
</body>
</html>