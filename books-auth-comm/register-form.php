<?php
$pageTitle = "Register";
include 'includes/header.php';
include 'includes/functions.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle ?></h1>

<?php
if (isset($_POST['regForm'])) {
    if (is_logged_in()) {
        session_destroy();
        $_SESSION = array();
    }
	
    $error    = false;
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
	
    if (mb_strlen($username) < 4) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The username is too short (3).</p></div>';
        $error = true;
    }
	
	if (mb_strlen($username) > 30) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The username is too long (30).</p></div>';
        $error = true;
    }
    
    if (!ctype_alnum($username)) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The username should consist of letters and numbers only.</p></div>';
        $error = true;
    }
    
    if (!(strpos($password, '<') == false) || !(strpos($password, '>') == false) || strpos($password, '<') === 0 || strpos($password, '>') === 0) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The pasword cannot contain: &lt;, &gt;.</p></div>';
        $error = true;
    }
    
    if (mb_strlen($password) < 6) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The pasword is too short.</p></div>';
        $error = true;
    }
    
   if(!is_unique_user($username, $connection))
		{
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The username already exist.</p></div>';
        $error = true;
    }
	
    if (!$error) {
		$_SESSION['username'] = $username;
		connect($connection);
		$qRegUser = "insert into users (username, password) values('" . mysqli_real_escape_string($connection, $username) . "', '".md5($username.$password.$username)."')";
		mysqli_query($connection, $qRegUser);
		
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Successfull registration.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
		header("refresh:5;url=index.php");
		include 'includes/footer.php';
		exit;
    }
}
?>
<span></span>
<form method="post">
	<div>
			<label class="label label-success" for="username">Username: </label>
			<input type="text" id="username" name="username" required>
	</div><div>
			<label class="label label-success" for="password">Password: </label>
			<input type="password" id="password" name="password" required>
	</div>
    <div>
			<label class="label label-success" for="password2">Confirm Password: </label>
			<input type="password" id="password2" name="password2" required>
	</div>
    <div>
			<input class="btn btn-success" type="submit" value="Register" name="regForm">	
	</div>
</form>
<script type="text/javascript">
	$( "form" ).submit(function( event ) {
  if ( $( "#password" ).val() === $( "#password2" ).val() ) {
    return;
  }
  $('span').html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The passwords didn\'t match.</p></div>');
  event.preventDefault();
});
</script>
</div>
<?php
include 'includes/footer.php';
?>