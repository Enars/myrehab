<?php
session_start();
include("include/models/db.php");
		if(isset($_POST['post'])) {
			$mysqli = db_connect();
			$userid = $mysqli->real_escape_string($_SESSION['UserID']);
			$post = $mysqli->real_escape_string($_POST['post']);
			$result = db_query("INSERT INTO Post VALUES ('','$userid','$post')");
			header('location:index.php');
		}
?>