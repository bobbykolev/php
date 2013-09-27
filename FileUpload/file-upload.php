<?php
$pageTitle = "Upload form";
include 'includes/header.php';
include 'functions.php';

session_start();

if ( !is_logged_in()) {
	header('location: login-form.php');
	die();
}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
        <div>
        <input type="file" name="upload"></div>
        <div><input class="btn btn-success upl-btn" type="submit" name="fileUpload" value="Submit"> </div>
    </form>
</div>
<?php
include 'includes/footer.php';
?>