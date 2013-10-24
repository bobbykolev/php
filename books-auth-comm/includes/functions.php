<?php
require 'connection.php';

function connect ($connection) {
	mysqli_set_charset($connection, 'utf8');
	return $connection;
}

function query ($query, $connection) {
	$result = mysqli_query($connection, $query);

	if ($result) {
		$rows = array();

		while ($row = mysqli_fetch_object($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
	return false;
}

function is_logged_in()
{
    return isset($_SESSION['username']);
}

function is_valid_user($username, $password, $connection)
{
	connect($connection);
    $selectQuery = "select username, password from users";
	$q = mysqli_query($connection, $selectQuery);
	
     while ($row = $q->fetch_assoc()) {
            if (!($row['username'] == $username)) 
			{
                continue;
            } 
			else 
			{
				if($row['password'] == md5($username.$password.$username))
				{
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
    $selectQuery = "select username from users";
	$q = mysqli_query($connection, $selectQuery);
	
     while ($row = $q->fetch_assoc()) {
            if (!($row['username'] == $username)) 
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