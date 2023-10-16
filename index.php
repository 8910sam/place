<?php include("side.php");
include("config.php");
error_reporting(0);
?>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                                 <h3>        <?php 
   $ss="SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'";
$ch=$con->query($ss);
   $we=mysqli_fetch_array($ch);
   $co=$we["id"];
                                 $rs=$con->query("SELECT  * from  employee")or die(mysqli_error());
                                 
$coun = mysqli_fetch_array($rs);
if ($coun["id"]==$co) {
   $fd=count($coun);
 echo $fd;}
?></h3>
                                 <h6>Employees</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-shopping-cart"></i>
                              </div>
                              <div class="db-info">
                                 <h3>        <?php
                                  $re=$con->query("SELECT  * from  Purchase")or die(mysqli_error());
                                  
$cout = mysqli_fetch_array($re);
if ($cout["id"]==$co) {
   $ew=count($cout);
 echo $ew;}
?></h3>
                                 <h6>Purchase</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-three w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <div class="db-info">
                                 <h3>        <?php
                                  $es=$con->query("SELECT  * from  sale")or die(mysqli_error());
                                 
$cont = mysqli_fetch_array($es);
if ($cont["id"]==$co) {
   $tr=count($cont);
 echo $tr;
}
?></h3>
                                 <h6>Sales</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-four w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-building"></i>
                              </div>
                              <div class="db-info">
                                 <h3>
                                    <?php
                                     $res=$con->query("SELECT  * from  products")or die(mysqli_error());
                                     
$count = mysqli_fetch_array($res);
if ($count["id"]==$co) {
   $hj=count($count);
 echo $hj;
}
?>
</h3>
                                 <h6>Products</h6>
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
  
   </body>
   

   
</html>
<?php include("footer.php"); ?>
