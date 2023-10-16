<?php 
error_reporting(0);

include("config.php");
$sel=$con->query("DELETE FROM purchase WHERE pur_id=$_GET[pur_id]")or die(mysqli_error());
if ($sel==true) {
	echo "<script>alert('delete well');window.location.replace('purchase.php')</script>";
}
else{
	echo "<script>alert('sorry please try again!!');window.location.replace('purchase.php')</script>";

}
?>