<?php
session_start();
include("include/models/db.php");
		if(isset($_POST['comment'])) {
			$mysqli = db_connect();
			$userid = $mysqli->real_escape_string($_SESSION['UserID']);
			$comment = $mysqli->real_escape_string($_POST['comment']);
			$postid = $mysqli->real_escape_string($_POST['id']);
			$result = db_query("INSERT INTO Comments VALUES ('','$postid','$userid','$comment')");
			//Länkar tillbaka till sidan du kom ifrån
			header('location: index.php?p=profile&user=' . $_POST['user']);
		}
?>