<?php 
error_reporting(0);

include("config.php");
$sel=$con->query("DELETE FROM employee WHERE emp_id=$_GET[emp_id]")or die(mysqli_error());
if ($sel==true) {
	echo "<script>alert('delete well');window.location.replace('employee.php')</script>";
}
else{
	echo "<script>alert('sorry please try again!!');window.location.replace('employee.php')</script>";

}
?>