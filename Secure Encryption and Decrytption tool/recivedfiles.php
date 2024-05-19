

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SDSP LOGIN</title>
        <link rel="stylesheet" href="recived.css">
        <link rel="stylesheet" href="login.css">
  <title>Login Page</title>
  </head>

  <body>

  <div class="logintext">
  <h2><center> Received Files </center></h2>
  </div>
  <div class="card">

  <?php
  session_start();

  include_once 'php/connection.inc.php';
  include_once 'php/func.inc.php';

  $id =  $_SESSION["username"];
  
    displayfile($con, $id);

   ?>


  </div>
</body>
</html>
