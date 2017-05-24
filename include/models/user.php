<?php
//Redirect the user via header
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
		header('Location: '.'login.php');
		exit();
	}
	//If is sjukgymnast -> priviliges
	else if ($_SESSION['UserRole'] == 1) {

	}
}