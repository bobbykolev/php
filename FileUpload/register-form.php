<?php
$pageTitle = "Register Form";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle ?></h1>
<form action="register.php" method="post">
	<div>
			<label class="label label-success" for="username">Username: </label>
			<input type="text" id="username" name="username">
	</div><div>
			<label class="label label-success" for="password">Password: </label>
			<input type="password" id="password" name="password">
	</div><div>
			<input class="btn btn-success" type="submit" value="Register" name="regForm">	
	</div>
    <div class="label forbidden">forbidden symbols: !, &lt;, &gt;</div>
</form>
</div>
<?php
include 'includes/footer.php';
?>