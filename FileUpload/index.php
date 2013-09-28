<?php
$pageTitle = "Files";
include 'includes/header.php';
include 'functions.php';

session_start();

if (!is_logged_in()) {
    header('location: login-form.php');
    die();
} else {
    header('location: files.php');
}