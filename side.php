<?php
error_reporting(0);

session_start();
if (!isset($_SESSION["cust_code"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Place Managment System - Dashboard</title>
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="shortcut icon" href="assets/img/favicon.png">
   
   </head>
   <body>
      <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="index.php" >
           <h3 class="text-success" style="margin-left: 50%;margin-top: 10%;">Place</h3>
               </a>
               
            </div>
            <i class="fas fa-align-left"></i>
            </a>
                                       
            <div class="top-nav-search">
               <form>
                  <input type="text" class="form-control" placeholder="Search here">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
            </a>
           
         
         <div class="sidebar " id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                  
                      
                                    <li class="submenu">
                        <a href="products.php"><i class="fas fa-user"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="index.php">Admin Dashboard</a></li>
                          

                        </ul>
                     </li>
                        
                       
                     
                  
                       <li class="submenu">
                        <a href="products.php"><i class="fas fa-user"></i> <span> Products </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="products.php">Add Products</a></li>
                           <li><a href="purchase.php">Add Purchase</a></li>
                           <li><a href="sale.php">Add Sales</a></li>
                            <li><a href="expense.php">Expenses</a></li>

                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="employee.php">Add Employees</a></li>

                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-baseball-ball"></i> <span>Check</span> <span class="menu-arrow"></span></a>
                        <ul>
                        
                           <li><a href="proft.php">Profit | Loss</a></li>
                               <li><a href="find.php">Sales</a></li>
                           <li><a href="buy.php">Purchase</a></li>
            
                  

                             
                       
                          
                        </ul>
                     </li>
                    
                     <li>
                        <a href="seting.php"><i class="fas fa-cogs  "></i> <span>Setting</span></a>
                     </li>
                     <li>
                        <a href="logout.php"><i class="fas  fa-sign-out-alt"></i> <span>Logout</span></a>
                     </li>
                        </ul>
                     </li>
                    
                     
               </div>
            </div>
         </div>
