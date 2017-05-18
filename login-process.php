<?php
if (isset($_POST['login'])) {
	if (validate($_POST['email'], $_POST['password'])) { 
        //Creating/renewing connection
        $mysqli = db_connect();
        //escaping user input
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        $result = db_select("SELECT * FROM labb2 WHERE email='$email'");
        if ($result !== false)
        {
            foreach($result as $row){
                $passHash = $row['password'];
                $salt = $row['salt'];
                if (verifyPassword($password, $passHash, $salt) == true) {
                    $output = "User verified";
                    $_SESSION['login'] = $email;
                    $_SESSION['loggedin'] = true;
                    redirect('comment.php', false);
                }
                else {
                    $output = "Incorrect password";
                }
            }
        }
        else {
            $output = "Account does not exist";
        }
	}
}