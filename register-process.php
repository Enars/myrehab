<?php
include("include/models/db.php");
include("include/models/authorizer.php");
//Creating/renewing connection
if (validateRegister($_POST['Email'], $_POST['GroupID'], $_POST['Password']) == true) { //$_POST['ProfilePicture'])
    if (pswStrengthPass($_POST['Password'])) {
        $mysqli = db_connect();
        //escaping user input
        $UserName = mysqli_real_escape_string($mysqli, $_POST['UserName']);
        $Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
        $GroupID = mysqli_real_escape_string($mysqli, $_POST['GroupID']);
        $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
        $ProfilePicture = mysqli_real_escape_string($mysqli, $_POST['ProfilePicture']);
        echo "kommer hit";
        $emailExists = db_query("SELECT * FROM UsersP WHERE Email='$Email'");
        if ($emailExists != false) {
            $salt = generateSalt();
            $hash = md5($Password . $salt);
            $sql = "INSERT INTO UsersP (UserName, Email, Password, Salt, GroupID, UserRole)
                    VALUES('$UserName', '$Email', '$hash', '$salt', '$GroupID', 0);";
            if(db_query($sql)) {
                $result = db_query("SELECT MAX(UserID) FROM UsersP");
                if ($result != false) {
                    foreach($result as $row) {
                    $last_id = $row['MAX(UserID)'];
                        $sql = "INSERT INTO UsersPGroup (UserID, GroupID) VALUES ('$last_id', '$GroupID')";
                        if (db_query($sql)) { 
                            header( "location: index.php?p=admin" );
                        }
                    }
                }
            }
            else {
            $output = "Kunde inte lägga till användare.";
            }
        }
        else {
        $output = "Användare existerar redan.";
        }
    }
    else {
        $output = "Lösenordet är för svagt.";
    }
}
else {
$output = "Fyll i alla fält. Email-adress måste vara giltig";
}
echo $output;
header( "refresh:2;url=index.php?p=admin" ); 
	

