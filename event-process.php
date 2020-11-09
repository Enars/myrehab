<?php
session_start();
include ('include/models/db.php');
$mysqli = db_connect();
if(isset($_POST['Day'])) {
	$day = $mysqli->real_escape_string($_POST['Day']);
	$time = $mysqli->real_escape_string($_POST['Time']);
	$event = $mysqli->real_escape_string($_POST['createevent']);
	$activitysort = $mysqli->real_escape_string($_POST['activitysort']);
	$group =  $_SESSION['GroupID'];
	$creator =  $_SESSION['UserID'];
	db_query("INSERT INTO Events VALUES ('','$group','$creator','$event','$day','$time','$activitysort')");
	header( "location: index.php?p=admin" );
}
?>