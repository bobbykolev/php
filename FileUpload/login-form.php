<?php
$pageTitle = "Login Form";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle ?></h1>
<form action="login.php" method="post">
	<div>
			<label class="label label-success" for="username">Username: </label>
			<input type="text" id="username" name="username">
	</div><div>
			<label class="label label-success" for="password">Password: </label>
			<input type="password" id="password" name="password">
	</div><div>
			<input class="btn btn-success" type="submit" value="Login" name="loginForm">	
	</div>
</form>
</div>
<?php
include 'includes/footer.php';
?>