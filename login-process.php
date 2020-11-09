<?php
include("include/bootstrap.php");
if (isset($_POST['login'])) {
	if (validate($_POST['email'], $_POST['password'])) { 
        //Creating/renewing connection
        $mysqli = db_connect();
        
        //escaping user input
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        $result = db_query("SELECT * FROM UsersP WHERE Email='$email'");
        if ($result !== false)
        {
            foreach($result as $row){
                $passHash = $row['Password'];
                $salt = $row['Salt'];     
                echo $passHash;
                if (verifyPassword($password, $passHash, $salt) == true) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['UserName'] = $row['UserName'];
                    $_SESSION['UserID'] = $row['UserID'];
                    $_SESSION['UserRole'] = $row['UserRole'];
                    $_SESSION['GroupID'] = $row['GroupID'];
                    $_SESSION['ProfilePicture'] = $row['ProfilePicture'];
                    redirect('index.php', false);
                }
                else {
                    $output = "Incorrect password";
                }
            }
        }
        else {
            $output = "Account does not exist";
            

        }
        $output = "Ett fel uppstod";
        
        
	}
    $output = "Please type email and password";

}
echo    '<div class="myError">
         <p>' .$output.'  </p>
        </div>';
header( "refresh:3;url=login.php" );
exit();