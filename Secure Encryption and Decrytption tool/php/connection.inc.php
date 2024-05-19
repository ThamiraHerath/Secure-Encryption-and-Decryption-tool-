<?php
  session_start();
  require 'PHPMailer/PHPMailerAutoload.php';
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "ppdsp";

  $con = mysqli_connect(  $serverName, $dBUsername, $dBPassword, $dBName);
 
  if(!$con){
    die("Connection faild: ". mysqli_connect_error() );
  }

  
?>