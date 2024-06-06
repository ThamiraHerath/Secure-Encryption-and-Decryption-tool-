<?php
function pwdMatch($password,$cpassword){
    $results = null;
    if ($password !== $cpassword ){
      $results = true;
    }
    else{
      $results = false;
    }
    return $results;
  }

//loading the trainer 
$model = joblib_load ('password_strenght_model.pkl');
$vectorizer = joblib_load ('password_vectorizer.pkl');

function predictPasswordStrength($password) {
    global $model, $vectorizer;
    // Convert password to TF-IDF vector using the loaded vectorizer
    $password_vectorized = $vectorizer->transform([$password]);
    // Predict password strength using the loaded model
    $strength = $model->predict($password_vectorized);
    return $strength[0];
}

  function UnameExists($con,$employeeid){
    $sql = "SELECT * FROM user WHERE employeeid = ?; ";
    $stmt = mysqli_stmt_init($con);
 
    if (!mysqli_stmt_prepare($stmt,$sql)){
      header("location: ../Register.php?error=STMT_FAILED!");
      exit();
    }
 
    mysqli_stmt_bind_param($stmt, "s",$employeeid);
    mysqli_stmt_execute($stmt);
 
    $resultsData = mysqli_stmt_get_result($stmt);
 
    if($row = mysqli_fetch_assoc($resultsData)){
      return $row;
    }
    else{
      $result = false;
      return $result;
    }
 
   mysqli_stmt_close($stmt);

}

function displayfile($con, $id){
    
  $sql = "SELECT * FROM file WHERE rcempid = ?; ";
  $stmt = mysqli_stmt_init($con);

  if (!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../recivedfiles.php?error=STMT_FAILED!");
      exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $resultsData = mysqli_stmt_get_result($stmt);


  if(mysqli_num_rows($resultsData) > 0) {

      echo "<table>";
      echo "<tr><th>File ID</th><th>Receiver ID</th><th>File Name</th><th>File Special Notes</th><th>Actions</th></tr>";

      // Fetch and display each file
      while ($row = mysqli_fetch_assoc($resultsData)) {
          echo "<tr>";
          echo "<td>" . $row['fileid'] . "</td>";
          echo "<td>" . $row['rcempid'] . "</td>";
          echo "<td>" . $row['filename'] . "</td>";
          echo "<td>" . $row['filespn'] . "</td>";
          echo "<td>";
          echo "<a href='php/download.inc.php?fileID=" . $row['fileid'] . "'>Download</a> ";
          echo "<a href='php/delete.inc.php?fileID=" . $row['fileid'] . "'>Delete</a>";
          echo "</td>";
          echo "</tr>";
      }


      echo "</table>";
  } else {
      echo "No files found.";
  }
}
