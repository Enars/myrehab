<?php
// Set default value
$currentPage = null;
$chosenUser = "";

// Change value if `page` is specified
if(array_key_exists('p',$_GET)) {
    $currentPage = strip_tags($_GET['p']);
}

function getContent($currentPage) {
    if (isset($_SESSION['UserID'])) {
    // Check page
    switch ($currentPage) {
        case 'about':
            include 'about.php';
            break;

        case 'admin':
        if (getUserRole() == 1){
            include 'admin.php';
        }
        else {
            include 'ProfileComment.php';
        }
            break;

        case 'profile':
            include 'ProfileComment.php';
            break;

        case 'deleteUser':
        include 'user-removal-process.php';
        break;

        default:
            include 'ProfileComment.php';
        
        }
    }
}
