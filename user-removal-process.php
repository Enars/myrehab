<?php
session_start();
require('include/models/db.php');
if($_SESSION['UserRole'] == 1) {
    if(array_key_exists('delete',$_GET)) {
        echo "kommer hit";
        $conn = db_connect();
        $deleteID = mysqli_real_escape_string($conn, strip_tags($_GET['delete']));
        if($deleteID != 51) { //adminkontot
            if(db_query("DELETE from UsersP where UserID = '$deleteID'")) {
                if(db_query("DELETE from UsersPGroup where UserID = '$deleteID'")) {
                    header( "location: index.php?p=admin" );
                }
            }
        }
    }
}
header( "location: index.php?p=admin" );
?>