<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login_styles.css">
  <title>Login</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="login.php" class="form" method="POST">
     <h2>Login</h2> 
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      <img src="avatar.png" alt="">
      
      <div class="input-group">
        <input type="text" name="uname" autocomplete="off" required>
        <label for="loginUser">User Id</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" required>
        <label for="loginPassword">Password</label>
      </div>
      <button type="submit" class="submit-btn">Login</button>
      <!-- <input type="submit" name ="submit"> -->
      <!-- <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a> -->
    </form>

    <!-- <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email"  autocomplete="off" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div> -->
  </div>
  
</body>
</html>