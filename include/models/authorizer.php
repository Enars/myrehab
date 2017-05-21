<?php
function validate($email, $password) {
    if (!(empty(trim($email))) && !(empty(trim($password))) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
}

function verifyPassword($password, $passHash, $salt) {
    $attemptPass = md5($password . $salt);
    if ($attemptPass == $passHash)
        return true;
    else
        return false;
}

//Generate 10 letter long string for salt
function generateSalt() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $salt = '';
    for ($i = 0; $i < 10; $i++) {
        $salt .= $characters[rand(0, strlen($characters)-1)];
    }
    return $salt;
}

function pswStrengthPass($password) {
    //$checkPassword = '';
    if (strlen($password) < 8) {
        //$checkPassword .= "Password too short!";
        return false;
    }

    if (!preg_match("#[0-9]+#", $password)) {
        //$checkPassword .= "Password must include at least one number!";
        return false;
    }
}

    