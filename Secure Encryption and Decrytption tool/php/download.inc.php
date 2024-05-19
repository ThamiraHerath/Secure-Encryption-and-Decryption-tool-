<?php
if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    require_once 'connection.inc.php';
    require_once 'func.inc.php';

    // Retrieve the file data from the database
    $query = mysqli_prepare($con, "SELECT file, rcempid, filename FROM file WHERE id = ?");
    mysqli_stmt_bind_param($query, "i", $fileId);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if ($row = mysqli_fetch_assoc($result)) {
        $encryptedFile = $row['file'];
        $receiverId = $row['rcempid'];
        $fileName = $row['filename'];

        // Retrieve the skey for the receiver
        $skeyQuery = mysqli_prepare($con, "SELECT skey FROM user WHERE employeeid = ?");
        mysqli_stmt_bind_param($skeyQuery, "s", $receiverId);
        mysqli_stmt_execute($skeyQuery);
        $skeyResult = mysqli_stmt_get_result($skeyQuery);

        if ($skeyRow = mysqli_fetch_assoc($skeyResult)) {
            $skey = $skeyRow['skey'];

            // Decrypt the file
            $decryptedFile = openssl_decrypt($encryptedFile, 'aes-128-ecb', $skey, OPENSSL_RAW_DATA);

            // Force file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
            header('Content-Length: ' . strlen($decryptedFile));
            echo $decryptedFile;
            exit();
        } else {
            echo "Security key not found.";
        }
    } else {
        echo "File not found.";
    }
}
?>
