<?php
$pageTitle = "Login";
include 'includes/header.php';
include 'functions.php';

session_start();

if (isset($_POST['loginForm'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (is_valid_user($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: files.php");
    } else {
        echo '<p class="hero-unit red offset1 span4">Incorrect login credentials!</p>';
        header("refresh:2;url=login-form.php");
    }
}
include 'includes/footer.php';
