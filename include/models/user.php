<?php
function redirect($url, $permanent = false) {
	if($permanent) {
		header('HTTP/1.1 301 Moved Permanently');
	}
	header('Location: '.$url);
	exit();
}

function isLoggedIn() {
	if (!isset($_SESSION['loggedin']) && !$_SESSION['loggedin'] == true) {
		//redirect
		redirect('login.php', false);
		exit();
	}
}

function getUserRole() {
	if (isset($_SESSION['UserRole'])) {
		return $_SESSION['UserRole'];
	} 
}

function getUserIdFromName($name) {
	$result = db_query("SELECT UserID FROM UsersP WHERE UserName = '$name'");
	if ($result !== false) {
		foreach($result as $row) {
			$UserID = $row['UserID'];
		}
		return $UserID;
	}
}
function getUserNameFromId($id) {
	$result = db_query("SELECT UserName FROM UsersP WHERE User = '$name'");
	if ($result !== false) {
		foreach($result as $row) {
			$UserID = $row['UserName'];
		}
		return $UserID;
	}
}
function getUserByName($p) {
    $result = db_query("SELECT * FROM UsersP WHERE UserName='$p'");
        if ($result !== false) {
                return $result;
        }
        else {
            return false;
        }
}
function getRoleInText($UserRole) {
	if ($UserRole == 1) {
		return "Fysioterapeut";
	}
	else {
		return "Patient";
	}
}
