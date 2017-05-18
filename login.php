<?php
include ("incl/bootstrap.php");
include ("login-process.php")          
?>      
        <div id="content">
            <?php if (isset($_SESSION['login'])) echo $_SESSION['login']; ?>
            <div id="login">
            <h2>Log in</h2>
            <form name="login" action="" method="post">
              <div class="container">
                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="login">Log in</button>
              </div>

              <div class="container" style="background-color:#f1f1f1">
                <a href="logout.php" class="button cancelbtn">Sign out</a>
                <span class="psw"><a href="register.php">Create new user</a></span>
                <?php if(isset($output)) echo $output; ?>
                </div>
                </form>

            <script>src="assets/js/script.js"</script>
            </div>
        </div>
<?php include("incl/footer.php"); ?>