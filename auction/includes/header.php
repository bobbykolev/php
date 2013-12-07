<?php ob_start(); 
mb_internal_encoding('UTF-8');
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $pageTitle; ?></title>
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
<script src="styles/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row-fluid">
<div class="span12">
<header>
  <div class="navbar"><!--start of menu-->
    <div class="navbar-inner">
      <div class="container"> 
        <!-- .btn-navbar is used as the toggle for collapsed navbar content --> 
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> </a> 
        <!-- Be sure to leave the brand out there if you want it shown --> 
        <a class="brand" href="index.php">php exam auction</a> 
        <div class="nav-collapse collapse">
									<ul class="nav">
										<li class="divider-vertical"></li>
										<li><a href="index.php">HOME</a></li>	
                                        <li class="divider-vertical"></li>
                                        <?php echo (isset($_SESSION['username']))? 
                                        '<li><a href="add-auction.php">ADD AUCTION</a></li>'.
                                        '<li class="divider-vertical"></li>': ""?>
									</ul>
                                    <ul id="out" class="nav login-nav">
                                    <li class="divider-vertical"></li>
                                        <li><a href="#"><strong><?php echo (isset($_SESSION['username']))? trim($_SESSION['username']) : "guest"; ?> </strong></a></li>	
                                        <li class="divider-vertical"></li>
                                        <li><a href="logout.php">Logout</a></li>	
									</ul>
									<ul id="reg" class="nav login-nav">
                                        <li class="divider-vertical"></li>
										<li><a href="register-form.php">Register</a></li>
                                        <li class="divider-vertical"></li>
										<li><a href="login-form.php">Login</a></li>
                                    </ul>	
									<ul id="reg" class="nav search-nav">
										<li>
                                             <form name="search" method="post" action="search.php">
                                             <input type="submit" name="search" value="Search" class="btn btn-small btn-success" />
                                             <input type="text" name="find" placeholder="search..." />
                                             <input type="hidden" name="searching" value="yes" />
                                             </form> 
                                         </li>
                                    </ul>								
         </div>
      </div>
    </div>
  </div>
  <!--end of menu--> 
</header>
<div id="content">
