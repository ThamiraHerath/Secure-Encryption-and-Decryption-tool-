<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SDSP LOGIN</title>
        <link rel="stylesheet" href="login.css">
  <title>Login Page</title>
  </head>
  <body>
  <div class="logintext">
  <h2><center>PPDSP LOGIN</center></h2>
  </div>
  <div class="container">
    <div class="form">
      <form class="login-form" action="php/log.inc.php" method="post">
        <input type="text" placeholder="Enter User name" name="username">
        <input type="password" placeholder="Enter Password" name="password">
        <button type="submit" class="submit" name="submit" >Login</button>
        <p class="message">Not registered? <a href="Register.php">Create an account</a></p>
      </form>
    </div>
  </div>
</body>
</html>