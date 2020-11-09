<?php include("include/bootstrap.php"); 
isLoggedIn();
?>

<div class="content">
    <div class="left-col">
        <?php echo printGroupMembers(); ?>
    </div>
    <div class="middle-col">
        <div class="main">
       <div class = "Comment"> 
        <?php getContent($currentPage); ?></div>
        </div>
    </div>
    <div class="right-col">
        <?php include("EventSection.php"); ?>
    </div>
</div>
<div class="footer"></div>