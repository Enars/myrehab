<?php
include ("incl/bootstrap.php");          
session_unset();
session_destroy();
redirect("login.php", false);
?>   