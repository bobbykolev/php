<?php
$pageTitle = "Login";
include 'includes/header.php';
include 'functions.php';

session_start();

if (isset($_POST['regForm'])) {
    if (is_logged_in()) {
        session_destroy();
        $_SESSION = array();
    }
    $error    = false;
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (mb_strlen($username) < 4) {
        echo '<p class="hero-unit red offset1 span4">The username is too short.</p>';
        header("refresh:2;url=register-form.php");
        $error = true;
    }
    
    if (!ctype_alnum($username)) {
        echo '<p class="hero-unit red offset1 span4">The username must consist of letters and numbers only.</p>';
        header("refresh:2;url=register-form.php");
        $error = true;
    }
    
    if (!strpos($password, '<') == false || !strpos($password, '!') == false || !strpos($password, '>') == false || strpos($password, '<') == 0 || strpos($password, '!') == 0 || strpos($password, '>') == 0) {
        echo '<p class="hero-unit red offset1 span4">The pasword cannot contain !, &lt;, &gt;.</p>';
        header("refresh:2;url=register-form.php");
        $error = true;
    }
    
    if (mb_strlen($password) < 6) {
        echo '<p class="hero-unit red offset1 span4">The pasword is too short.</p>';
        header("refresh:2;url=register-form.php");
        $error = true;
    }
    
    if (!is_new_user($username)) {
        echo '<p class="hero-unit red offset1 span4">The username already exist.</p>';
        header("refresh:2;url=register-form.php");
        $error = true;
    }
    
    
    if (!$error) {
        $result = $username . '!' . $password;
        if (file_put_contents('users.txt', $result, FILE_APPEND)) {
            echo '<p class="hero-unit green offset1 span4">"' . $username . '" successfully registered.</p>';
            header("refresh:1;url=login-form.php");
        }
    }
}
include 'includes/footer.php';