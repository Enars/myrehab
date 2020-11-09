<?php include("include/bootstrap.php"); 
isLoggedIn();
?>

<div class="content">
    <div class="left-col">
        <?php echo printGroupMembers(); ?>
    </div>
    
    <div class="middle-col">
    
        <div class="main">
            <div class ="profilecomments"> <?php include ("ProfileComment.php");?></div>
        </div>
    </div>
    <div class="right-col">
        <div class="training">
          <table>
            <tr>
              <td>Stå på händer</td>
              <td>Tisdagar</td>
              <td>10:00</td>
            </tr>
            <tr>
              <td>Nån annan träning</td>
              <td>Fredagar</td>
              <td>12:00</td>
            </tr>
          </table>
        </div>
        <div class="social">
          <table>
            <tr>
              <td>Fika</td>
              <td>Tisdag 3/3</td>
              <td>10:00</td>
            </tr>
            <tr>
              <td>Mindfulness</td>
              <td>Fredag 21/3</td>
              <td>13:00</td>
            </tr>
            <tr>
              <td>Nåt mer typ</td>
              <td>Torsdag 23/5</td>
              <td>11:00</td>
            </tr>
          </table>
        </div>
    </div>
</div>
<div class="footer"></div>