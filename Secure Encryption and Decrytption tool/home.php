<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure File Sharing System</title>
<link rel="stylesheet" href="home.css">
</head>
<body>

<div class="navbar">
  <a href="home.php">PRIVACY-PRESERVING DATA SHARING PLATFORM</a>
  <a href="login.php" class="right">CHANGE PROFILE</a>
  <a href="index.php" class="right">LOG OUT</a>
</div>



<div class="notification-container">
  <div class="notification">
    <div class="notiglow"></div>
    <div class="notiborderglow"></div>
    <div class="notititle"><h3>Hello User, Welcome!!</h3></div>
    <div class="notibody">Your Employee ID is: EMP002</div>
  </div>
</div>







  <div class="card shadow"  style="margin-left: 20%">
    <h3><center><b><h2>SHARE FILES</h2></b></center></h3>
    <div class="upload-area">
      <p>Drag and drop files here or <br> Choose a file</p>
      <input type="file" name="file1">
    </div>
    <form action="php/upload.inc.php" method="post">
      <div class="form-group">
        <label for="receiverId">Receiver's Employee ID</label>
        <input type="text" id="receiverId" name="receiverId">
      </div>
      <div class="form-group">
        <label for="fileName">File Name</label>
        <input type="text" id="fileName" name="fileName">
      </div>
      <div class="form-group">
        <label for="notes">Special Notes:</label>
        <textarea id="notes" name="notes"></textarea>
      </div>
      <div>
        <center>
        <button type="submit" name = "submit"  button class="subbutton" > UPLOAD</button>
        </center>
      </div>
      </form>
  </div>
</div>
<div class="button" id="rbutton">
<a href="recivedfiles.php"><button class="button">Recived Files</button></a>
</div>


</body>
</html>
