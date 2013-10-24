<?php
$pageTitle = "Login";
include 'includes/header.php';
include 'includes/functions.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle ?></h1>

<?php
if (isset($_POST['loginForm'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    
    if (is_valid_user($username, $password, $connection)) {
        $_SESSION['username'] = $username;
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Successfull login.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
		header("refresh:5;url=index.php");
		include 'includes/footer.php';
		exit;
    } 
	else 
	{
        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Username and password don\'t match.</p></div>';
    }
}
?>

<form method="post">
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