<?php

$mysqli = db_connect();
$groupid = $_SESSION['GroupID'];
$username = $_SESSION['UserName'];
$result = $mysqli->query("SELECT Activity, Day, Time, Activitysort FROM Events WHERE '$groupid'  = Events.GroupID");
//Loop through comments get the data and display it
echo "<h2>Träning</h2>
<div class='training'>
          <table>";
if ($result !== false){
  while ($row = $result->fetch_assoc()) {
    if ($row['Activitysort'] == 'training'){
  echo "
              <tr>
                <td>".$row['Activity']."</td>
                <td>".$row['Day']."</td>
                <td>".$row['Time']."</td>
              </tr>";
    }
  }
}
echo"
        </table>
        </div>";

echo"   <h2>Socialt</h2>    
        <div class='social'>
          <table>";
$result = $mysqli->query("SELECT Activity, Day, Time, Activitysort FROM Events WHERE '$groupid'  = Events.GroupID");
if ($result !== false){
  while ($row = $result->fetch_assoc()) {
    if ($row['Activitysort'] == 'social'){
  echo "
              <tr>
                <td>".$row['Activity']."</td>
                <td>".$row['Day']."</td>
                <td>".$row['Time']."</td>
              </tr>";
    }
  }
}
echo"
         </table>
        </div>";
      ?>