<?php
if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    require_once 'connection.inc.php';

    // Delete the file record from the database
    $query = mysqli_prepare($con, "DELETE FROM file WHERE id = ?");
    mysqli_stmt_bind_param($query, "i", $fileId);
    mysqli_stmt_execute($query);

    if (mysqli_stmt_affected_rows($query) > 0) {
        header("Location: ../home.php?error=NONE");
    } else {
        header("Location: ../home.php?error=DELETE_FAILED");
    }

    mysqli_stmt_close($query);
}
?>