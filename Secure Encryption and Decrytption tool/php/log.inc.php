<?php
if (isset($_POST["submit"])){
 
    $employeeid= $_POST["username"];
    $password= $_POST["password"];

    require_once'connection.inc.php';
    require_once'func.inc.php';


    $UnameExists = UnameExists($con,$employeeid);
 
    if($UnameExists === false){
      header("location: ../login.php?error=wrongLogin");
      exit();
    }

    $hashedpwd = $UnameExists["password"];
    $checkpwd = password_verify($password, $hashedpwd);

    if ($checkpwd === false){
        header("location:../login.php?error=wrongpwd");
        exit();
      }
      else if($checkpwd === true){
        session_start();
   
        $_SESSION["U_ID"] = $UnameExists["userid"];
        $_SESSION["username"] = $UnameExists["employeeid"];
   
        header("location:../home.php");
        exit();
      }
    }