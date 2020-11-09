<?php
 include ("include/bootstrap.php");     
?>      
<form id="loginform" class="login" name="login" action="login-process.php" method="post">
    <h2> Welcome to MyRehab! </h2><br>
    <label id="email"><b>Email</b></label>
    <input type="text"  placeholder="Enter Email Address" name="email" required>

    <label id="password"><b>Password</b></label>
    <input type="password"  placeholder="Enter Password" name="password" required>

    <button type="submit" id="buttonloggin" name="login">Log in</button><br>
    <br>
    
    
    <br>
    <label id="forgotPassword"><b> Forgot you password? Press <u>here</u> to recieve a new!</label>

  <div class="container" >
    <?php
      if(isset($output)) echo $output; ?>
    </div>
    
    </form>
<?php
 include("include/views/footer.php");
?>