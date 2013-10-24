<?php
$config = array(
'DB_HOST' => 'localhost',
'DB_USER' => 'root',
'DB_PASSWORD' => '',
'DB_NAME' => 'books_comments'
	);

$connection = mysqli_connect($config['DB_HOST'], 
	$config['DB_USER'], 
	$config['DB_PASSWORD'], 
	$config['DB_NAME'])
	or die('Cannot connect to database');