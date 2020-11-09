<?php
$selfProfile = false;
$activeUserName = isset($_GET['user']) ? $_GET['user'] : $_SESSION['UserName'];
$activeUserID = getUserIdFromName($activeUserName);
echo printUserProfile($activeUserName);
if ($activeUserID == $_SESSION['UserID']) {
    $selfProfile = true;
    echo postForm();
}
if ($_SESSION['UserRole'] == 1) {
    $selfProfile = true;
}
//Skriver ut posts
$result_posts = db_query("SELECT Post.PostID, Post.UserID, Post.Post, UsersP.UserName, UsersP.ProfilePicture 
FROM Post join UsersP ON UsersP.UserID = Post.UserID WHERE '$activeUserID' = Post.UserID ORDER BY Post.Postid DESC");
//Loop through comments get the data and display it
while ($row = $result_posts->fetch_assoc()) {
    $postid = $row['PostID'];
    $post = $row['Post'];
            echo " 
            <div>
                <div class ='post'>
                <div class='divpic'>
                    <img class='postPic'src='data:image/jpeg;base64," . base64_encode($row['ProfilePicture']) . "'>
                    </div>
                        <div class='divpost'>
                            <b>$activeUserName säger:</b><br> ".$row['Post']."
                            <div class ='deletebuttoncontainer'>". deletepostbutton($selfProfile, $postid) . "</div>
                        </div>
                    </div>
                <input type='hidden' value='$postid'>
            </div>";

        //skriver ut kommentarer, skulle kunna göras bättre genom att bara göra en databas query där vi hämtar allt som behövs för att sedan skriva ut det med if-satser
    $result_comments = db_query("SELECT Comments.PostID, Comments.UserID, Comments.Comment,Comments.CommentID, UsersP.UserName, UsersP.ProfilePicture 
    FROM Comments join UsersP ON UsersP.UserID = Comments.UserID WHERE Comments.PostID ='$postid'");
    while ($row = $result_comments->fetch_assoc()) {
        $commentid = $row['CommentID'];
            echo "
            <div>
                <div class ='comment'>
                    <div class='divpic'>
                        <img class='commentPic' src='data:image/jpeg;base64," . base64_encode($row['ProfilePicture']) . "'>
                    </div>
                    <div class='divcomment'>
                        <b>" .$row['UserName']."  säger:</b><br>". $row['Comment'] ."
                        <div class ='deletebuttoncontainer'>". deletecommentbutton($activeUserName, $row['UserID'], $_SESSION['UserID'], $_SESSION['UserRole'], $selfProfile, $commentid) . "</div>
                    </div>
                </div>
                <input type='hidden' value=$postid>
            </div>";
        //Closes the Comments Reply Loop
        }
            echo 
                "<form method ='POST' action ='post_reply.php'>
                    <textarea class='commentTextArea' id='textbox' rows='4' name='comment' placeholder ='Skriv en kommentar' cols='50'></textarea>
                    <input type='hidden' name ='id' value='$postid'>
                    <input type='hidden' name ='user' value='$activeUserName'>
                    <input class='button' id='button' type='submit' value='Skicka'>
                </form>
            ";
    
    //Closes the Comments Loop
}

