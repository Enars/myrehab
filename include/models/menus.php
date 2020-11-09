<?php
//Left Group Menu
function getGroupMembers() {
    $connection = db_connect();
    $result = db_query("SELECT * FROM UsersP WHERE GroupID=(" . $_SESSION['GroupID'] . ") ORDER BY UserRole");
    return $result;
}
function printGroupMembers() {
    $result = getGroupMembers();
    if ($result !== false) {
        $html = "";
        $html .=
            "<div class='group'>
                <h2>Grupp " . $_SESSION['GroupID'] . "</h2>
                <ul>";
        foreach($result as $row) {
            
            $html .=
                    "<li>
                        <a href='?p=profile&user=" . ($row['UserName']) . "'>
                            <img class='groupMenuProfilePicture' src='data:image/jpeg;base64," . base64_encode($row['ProfilePicture']) . "'>
                            <div class='groupNameText'>  " . $row['UserName'] . "</div>
                        </a>
                    </li>";
        }
        $html .=
                "</ul>
            </div>";
        return $html;   
    }
}
//Top Nav Bar
//If logged in print navbar based on user privilege
function printNav() {
    $html = "";
    if (isset($_SESSION['loggedin'])) {
      $html .= 
      "<nav>
            <a class='title' href='index.php'><img class='logopic' src='assets/img/logo.png'><div class='logotext'>MyRehab</div></a>
                <ul>
                    <li><a href='?p=profile'>Profil</a></li>
                    <li><a href='?p=about'>Om</a></li>
                    <li><a href='?p=change-profile'>Ändra Profil</a></li>
                    <li><a href='?p=events'>Evenemang</a></li>";
        if($_SESSION['UserRole'] == 1) {
            $html .= 
                    "<li><a href='?p=admin'>Administration</a></li>";
        }
        $html .= 
                    "<li>
                        <a href='logout-process.php'>
                            Logga ut " . $_SESSION['UserName'] . "
                            <img class='logoutProfilePicture' src='data:image/jpeg;base64," . base64_encode($_SESSION['ProfilePicture']) . "'>
                        </a>
                    </li>
                </ul>
		</nav>
        ";
    }
    else { 
        $html .= "
        <nav>
                <a class='title' href='login.php'><img class='logopic' src='assets/img/logo.png'><div class='logotext'>MyRehab</div></a>
                <ul>
                </ul>
        </nav>
            ";
    }
    return $html;
}
