<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
							<li class="active">
                                <a href="#" aria-expanded="true"><i class="ti-palette"></i><span>Packages</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="form.php">Add Packages</a></li>
                                </ul>
								<ul class="collapse">
                                    <li class="active"><a href="deletepackage.php">Delete Packages</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" aria-expanded="true"><i class="ti-palette"></i><span>Gallery</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Add gallery</a></li>
                                </ul>
								<ul class="collapse">   
                                    <li><a href="#">Delete gallery</a></li>
                                </ul>
                            </li>
							
							<li>
                                <a href="#" aria-expanded="true"><i class="ti-palette"></i><span>User Details</span></a>
                                <ul class="collapse">
                                    <li><a href="admin_user.php">Users</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" aria-expanded="true"><i class="ti-palette"></i><span>Book package details</span></a>
                                <ul class="collapse">
                                    <li><a href="admin_book_package.php">admin_book_package</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="#" aria-expanded="true"><i class="ti-palette"></i><span>Contact Us details</span></a>
                                <ul class="collapse">
                                    <li><a href="admin_contactus.php"> admin Contact us </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                                <ul class="collapse">
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </li>
                         </ul>
                    </nav>
                </div>
            </div>
        </div>
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>	
                    </div>
                </div>
            </div>


<?php
						
						@$cat_id=$_GET['cat_id'];	
						//echo $cat_id;
						//$cat_name=$_GET['cat_name'];
						mysql_connect("localhost","root","");
						mysql_select_db("product");
						$q="delete from `cat_tbl` where cat_id='$cat_id'";
						mysql_query($q);
						mysql_close();
						header("Location:cat.php");
						
?>