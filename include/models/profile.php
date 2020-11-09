<?php
function printUserProfile($p) {
    $user = getUserByName($p);
    $html = '404 - profile not found';
    if ($user !== false) {
        $html = "";
        foreach($user as $row) {
            $html .=
            "
            <div class='profile'>
                <div class='profilePicture'>
                    <img class='mainPicture' src='data:image/jpeg;base64," . base64_encode($row['ProfilePicture']) . "'>
                    <div class ='profileLinks'>
                        <p>" . getRoleInText($row['UserRole']) . "
                        <p class='desc'>Om Mig:<br>
                        Från: Uppsala <br>
                        Medlem sedan: 10/7
                        <p class='desc'>Mina Länkar:
                        <a href='vårdguiden.se'>Vårdguiden.se</a><br>
                        <a href='index.php?p=profile'>Min favoritsida</a>
                    </div>
                </div>
                <div class='profileTitle'>
                    <h2>". $row['UserName'] . "</h2>
                </div>
                <div class ='profileDesc'>
                    <article>Hej! Jag heter " . $row['UserName'] . " och kommer från Uppsala. jag har det jättebra här på sidan. Det känns tufft med träningen, men det ska nog gå bra! tack för att du läste min profil, skriv gärna lite kommentarer på mina inlägg.</article> 
                </div>
            </div>
            ";
        }
    }
    return $html;
}

function postForm() { 
    $html = '';
    $html .=
        "
        <div class='newPostContainer'>
        <form class ='form' method ='POST' action ='post-process.php'>
            <textarea id='textbox' rows='4' name='post' placeholder ='Berätta om din senaste träning, ta gärna med vilken typ av träning det var.' cols='50' required></textarea><br>
            <button id='submitpost' type='submit'>Skicka</button>
        </form>
        </div>
        ";
    return $html;
}
function deletepostbutton($selfprofile, $postid){
	if ($selfprofile == true){
		echo 
		"<form method = 'POST' name ='deletepostform' action = 'postremoval-process.php'>
			<input type='hidden' name ='postid' value='$postid'>
			<div class = 'deletepostbutton'>
				<button type='submit' name ='removepost'>Ta bort</button>
			</div>
		</form>";
	}
}

function deletecommentbutton($activeUserName, $userID, $currentUserID, $UserRole, $selfprofile, $commentid){
	if ($userID == $currentUserID || $UserRole == 1){
		echo "<form method = 'POST' name='deletecommentform' action = 'commentremoval-process.php'>
		<input type='hidden' name='commentid' value='$commentid'>
        <input type='hidden' name='activeUserName' value='$activeUserName'>
		<div class = 'deletecommentbutton'><button type='submit' name ='removecomment'>Ta bort</button></div>
		</form>";
	}
}
?>