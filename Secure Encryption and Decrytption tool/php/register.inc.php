<?php
if (isset($_POST["submit"])){
 
    $firstname= $_POST["firstname"];
    $lastname= $_POST["lastname"];
    $employeeId= $_POST["employeeid"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    $skey= openssl_random_pseudo_bytes(16);

    require_once'connection.inc.php';
    require_once'func.inc.php';

    if (pwdMatch($password,$cpassword)!==false){
        header("location: ../Register.php?error=Password Dont Match");
        exit();
    }
    if (UnameExists($con,$employeeId) !== false){
        header("location: ../Register.php?error=Username Already Exists");
        exit();
    }

        $sql = "INSERT INTO user(firstname, lastname, employeeid, email, password, skey) VALUES(?,?,?,?,?,?) ; ";
        $stmt = mysqli_stmt_init($con);
     
        if (!mysqli_stmt_prepare($stmt,$sql)){
          header("location: ../Register.php?error=STMT_FAILED!");
          exit();
        }
     
        $skey=bin2hex($skey);
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
     
        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $employeeId, $email, $hashedpwd, $skey);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        header("location:../index.php?error=NONE");
    }