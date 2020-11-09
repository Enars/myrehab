<?php
session_start();
include ('include/models/db.php');
		$mysqli = db_connect();
		if(isset($_POST['removepost'])) {
        $postid = $mysqli->real_escape_string($_POST['postid']);
		db_query("DELETE FROM Post WHERE '$postid' = PostID");
        header( "location: index.php" );

		}
?>