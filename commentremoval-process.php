<?php
session_start();
include ('include/models/db.php');
include ('include/models/user.php');
$mysqli = db_connect();
if(isset($_POST['removecomment'])) {
	$commentid = $mysqli->real_escape_string($_POST['commentid']);
	
	db_query("DELETE FROM Comments WHERE '$commentid' = CommentID");
	header('location: index.php?p=profile&user=' .$_POST['activeUserName']);
	exit();
}
header('location: index.php?p=profile&user=' .$_POST['activeUserName']);
exit();
?>