<?php 
error_reporting(0);

include("side.php");
include("config.php");
?>
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="profile-header">
                        <div class="row align-items-center">
                           
                           <?php

$ss=$con->query("SELECT * FROM customer WHERE cust_code='$_SESSION[cust_code]'")or die(mysqli_error());
$r=mysqli_fetch_array($ss);
                            ?>
                           <div class="col ml-md-n2 profile-user-info">
                              <h4 class="user-name mb-0">Name:&nbsp;&nbsp;&nbsp;<?php echo $r["fname"]; ?></h4>
                              <h6 class="text-muted">Username:&nbsp;&nbsp;&nbsp;<?php echo $r["cust_code"]; ?></h6>
                      
                           </div>
                           <div class="col-auto profile-btn">
                              
                           </div>
                        </div>
                     </div>
                     <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                           <div class="row">
                              <div class="col-lg-9">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Personal Details</span>
                                          <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="far fa-edit mr-1"></i>Edit</a>
                                       </h5>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                          <p class="col-sm-9"><?php echo $r["fname"]; ?></p>
                                       </div>
                                  
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Campany Code</p>
                                          <p class="col-sm-9"><a href="https://preschool.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="711b1e191f151e14311409101c011d145f121e1c"><?php echo $r["cust_code"]; ?></a></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Username</p>
                                          <p class="col-sm-9"><?php echo $r["cust_code"]; ?></p>
                                       </div>
                                       <div class="row">
                                          <p class="col-sm-3 text-muted text-sm-right mb-0">PLACE</p>
                                          <p class="col-sm-9 mb-0">Managment System<br>
                                           
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Account Status</span>
                                       
                                       </h5>
                                       <button class="btn btn-outline-success mr-2" type="button"><i class="fe fe-check-verified"></i> Active</button>
                                    </div>
                                 </div>
                                 <div class="card">
                                    <div class="card-body">
                                       <h5 class="card-title d-flex justify-content-between">
                                          <span>Main  </span>
                                        
                                       </h5>
                                       <div class="skill-tags">
                                          <span>purchase</span>
                                          <span>sales</span>
                                          <span>profit/loss</span>
                                          <span>day report</span>
                                          <span>tax</span>
                                          <span>manage expense</span>
                                          <span>Check Sum Products</span>
                                          <span>Products Report</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="password_tab" class="tab-pane fade">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title">Change Password</h5>
                                 <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                       <form method="post">
                                          <div class="form-group">
                                             <label>Customer Code</label>
                                             <input type="text" name="cust" value="<?php echo $r['cust_code'];?>"class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>Cutomer  Name</label>
                                             <input type="text" name="name" value="<?php echo $r['fname'];?>"class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>New Password</label>
                                             <input type="password" name="Password"  value="<?php echo $r['password'];?>"class="form-control">
                                          </div>
                                       
                                          <button class="btn btn-outline-success mr-2" name="save" type="submit">Save Change</button>
                                       </form>
                                    </div>
                                    <?php

if(isset($_POST['save'])){
    $a=$_POST['cust'];
    $c=$_POST['name'];
  $b=md5($_POST['Password']);
  $in=$con->query("UPDATE customer SET cust_code='$a',fname='$c',password='$b' WHERE id='$r[id]'")or die(mysqli_error());
    if($in==true){
    echo"<script>alert('new update');window.location.replace('expense.php')</script>";
  }

  else{
    echo"<script>alert('somothing went wrong!!!');window.location.replace('edit-expenses.php')</script>";

  }
}
 ?>
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
      <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>

</html>