<?php
if(session_status() != PHP_SESSION_NONE) {
    if(getUserRole() == 1) {

        if(isset($_POST['searchUser'])) {
            $mysqli = db_connect();
            $search = mysqli_real_escape_string($mysqli,$_POST['search']);
            $searchResult = db_query("SELECT * FROM UsersP WHERE Username like '%$search%'");   //WHERE UserName = '$search'
        }
            $html = '
                <h2 class="headeradmin"> Administration av tjänst</h2>

                <div class="Search">
                <h2> Sök och ta bort patienter</h2>
                    <form method="POST" name="searchUser" id="EventForm" action="">
                    <input typ="text" placeholder="Sök" name="search" required>
                    <button id="submitevent1"  type="submit" name ="searchUser">Sök</button>
                    <div class="SearchBox">';

            if(isset($searchResult) && $searchResult != false) {
                $html .=
                    "<div class='group'>
                        <ul>";
                foreach($searchResult as $row) {
                    
                    $html .=
                            "<li>
                                <a href='user-removal-process.php?delete=" . ($row['UserID']) . "'>
                                    <img class='groupMenuProfilePicture' src='data:image/jpeg;base64," . base64_encode($row['ProfilePicture']) . "'>
                                    <div class='groupNameText'>  " . $row['UserName'] . "</div>
                                </a>
                            </li>";
                }
                $html .=
                    "</ul>
                </div>";
                $searchResult = $html;   
            }
            else if (isset($searchResult) && $searchResult == false || $searchResult =''){
                $html.="Inget resultat av sökning";
            }
            else {
                $html.="Sök efter användarkonto";
            }

            $html .= '
            </div>
            
            </form>
            </div>

        <div class="CreateEvent">
            <h2> Skapa nytt schema </h2>
            <form method="POST" id="EventForm" name="EventForm" action="event-process.php">
                <input for="postname" type="text"  placeholder="Eventnamn" name="createevent" required>
                <input for="postday" type="Dag" placeholder="Vilken dag?" name="Day" required>
                <input for="posttime" type="Tid" placeholder="Vilken tid?" name="Time" required>
                <button id="submitevent"  type="submit" value="Submit Event">Skapa</button>
                <label class="myCheckbox">
                    <input class="checkbox" id="social" name="activitysort" value="social" type="radio" required> Socialt
                    <input class="checkbox" id="training" name="activitysort" value="training" type="radio"> Träning

                    
                </label>
            </form>
        </div>


        <div class="newpatient">
            <h2> Lägg till patient </h2>
            <form method="POST" name="newPatient" action="register-process.php">
                <input type="text" placeholder="Namn på ny patient" name="UserName" required>
                <input type="text" placeholder="Email" name="Email" required>
                <input type="text" placeholder="GruppID" name="GroupID" required>
                <input type="text" placeholder="Password" name="Password" required>
                <input type="text" placeholder="Prolfilbild" name="ProfilePicture">
                <button id="submitevent"  type="submit">Lägg till</button>
            </form>
        </div>


        <div class="changegroup">
            <h2> Byte av grupp </h2>
            <form method="POST" id="changeform" name="changeform" action="">
            <input type="text" placeholder="Byt till grupp" name="changefrom" required>
            
            <button id="submitevent"  type="submit" value="Submit Event">Byt</button>
        </div>


        <div class="CreateGroup">
            <h2> Skapa ny grupp </h2>
            <form method="POST" id="GroupForm" name="GroupForm" >        
                <input for="postname" type="text"  placeholder="Gruppnamn" name="newgroup" required >
                <input for="postday" type="grupptyp" placeholder="Vilken typ av grupp?" name="grupptyp" required >
                <input for="posttime" type="Antal" placeholder="Antal medlemmar i gruppen?" name="Antal" required >
                <button id="submitevent"  type="submit" value="Submit Event">Skapa</button>
            </form>
        </div>


        <div class="MemberMod">
            <h2> Ändra patient </h2>
            <form method="POST" id="MemberForm" name="MemberForm" action="member-process">
                <input for="postname" type="text"  placeholder="Namn på patient" name="modmember" required>
                <input for="postday" type="Dag" placeholder="Från vilken grupp?" name="Day" required>
                <button id="submitevent"  type="submit" value="submitevent">Ändra</button>
            </form>
        </div>
        ';
        echo $html;
    }
}
else {
    echo "Access denied";
}
?>