<?php
function is_logged_in() {
	return isset($_SESSION['username']);
}

function data($file)
{
	if (file_exists($file)) {
    $users = file($file);
	}
	return $users;
}

function is_valid_user($username, $password) {
    $users =  data('users.txt');
	
    foreach ($users as $user) {
        $userData = explode('!', $user);
		if(trim($userData[0]) == $username && trim($userData[1]) == $password){
				return true;
			}
		}
		return false;
	}	


function is_new_user($username) {
    $users =  data('users.txt');

    foreach ($users as $user) {
        $userData = explode('!', $user);
		if(trim($userData[0]) == $username){
			return false; 
			}
		}
		return true;
}

# Snippet from PHP Share: http://www.phpshare.org

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}