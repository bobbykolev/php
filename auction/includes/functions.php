<?php
require 'connection.php';

function connect ($connection) {
	mysqli_set_charset($connection, 'utf8');
	return $connection;
}

function is_Valid_Email($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_logged_in()
{
    return isset($_SESSION['username']);
}

function is_valid_user($username, $password, $connection)
{
	connect($connection);
    $selectQuery = "select email, password, user_id from users";
	$q = mysqli_query($connection, $selectQuery);
	
     while ($row = $q->fetch_assoc()) {
            if (!($row['email'] == $username)) 
			{
                continue;
            } 
			else 
			{
				if($row['password'] == md5($username.$password.$username)."abcdefgh")
				{
					$_SESSION['user_id'] = $row['user_id'];
					return true;	
				}
                return false;
            }
        }
    return false;
}

function is_unique_user($username, $connection)
{
	connect($connection);
    $selectQuery = "select email from users";
	$q = mysqli_query($connection, $selectQuery);
	
     while ($row = $q->fetch_assoc()) {
            if (!($row['email'] == $username)) 
			{
                continue;
            } 
			else
			 {
                return false;
            }
        }
    return true;
}