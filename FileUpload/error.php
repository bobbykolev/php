<?php
$pageTitle = "Error";
include 'includes/header.php';
?>
<div class="hero-unit">
<p class="lead">Error occured. redirecting...</p>
<?php
header("refresh:2;url=index.php");
?>
</div>
<?php
include 'includes/footer.php';
?>