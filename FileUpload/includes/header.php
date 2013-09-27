<?php ob_start(); 
include 'includes/constants.php';
mb_internal_encoding('UTF-8');
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
        <a class="brand" href="index.php">php Files System</a> 
        <div class="nav-collapse collapse">
									<ul class="nav">
										<li class="divider-vertical"></li>
										<li><a href="files.php">Files</a></li>	
                                        <li class="divider-vertical"></li>
                                        <li><a href="file-upload.php">Upload</a></li>	
                                        <li class="divider-vertical"></li>	
									</ul>
                                    <ul class="nav login-nav">
										<li class="divider-vertical"></li>
										<li><a href="login-form.php">Login</a></li>
                                        <li class="divider-vertical"></li>
										<li><a href="register-form.php">Register</a></li>	
                                        <li class="divider-vertical"></li>
                                        <li><a href="logout.php">Logout</a></li>	
                                        <li class="divider-vertical"></li>
									</ul>
								</div>
        
      </div>
    </div>
  </div>
  <!--end of menu--> 
</header>
<div id="content">
