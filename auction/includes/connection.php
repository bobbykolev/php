<?php
$config = array(
'DB_HOST' => 'localhost',
'DB_USER' => 'telerik',
'DB_PASSWORD' => 'qwerty',
'DB_NAME' => 'auction'
	);

$connection = mysqli_connect($config['DB_HOST'], 
	$config['DB_USER'], 
	$config['DB_PASSWORD'], 
	$config['DB_NAME'])
	or die('Cannot connect to database');