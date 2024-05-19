<?php
if (isset($_POST["submit"])){
 
    $file1= $_POST["file1"];
    $receiverId= $_POST["receiverId"];
    $fileName= $_POST["fileName"];
    $notes= $_POST["notes"];



    require_once'connection.inc.php';
    require_once'func.inc.php';



    $skey = null;
    $query1 = mysqli_prepare($con, "SELECT skey FROM user WHERE employeeid = ?");
    mysqli_stmt_bind_param($query1, "s", $receiverId);
    mysqli_stmt_execute($query1);
    $result1 = mysqli_stmt_get_result($query1);
 
    if ($row = mysqli_fetch_assoc($result1)) {
    $skey = $row['skey'];
    }
 
 
    // Encrypt the content
    $encrypFile = openssl_encrypt($file1, 'aes-128-ecb', $skey, OPENSSL_RAW_DATA);
    
 
    // Insert the encrypted data into the database
    $sql = "INSERT INTO file (file, rcempid, filename, filespn) VALUES(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
 
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../home.php?error=STMT_FAILED!");
        exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ssss", $encrypFile, $receiverId, $fileName, $notes);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
 
    header("location:../home.php?error=NONE");

}

?>