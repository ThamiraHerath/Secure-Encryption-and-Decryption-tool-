<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="Register.css">
</head>
<body>
<form class="form" action="php/register.inc.php" method="post">
    <p class="title">Register </p>
    <p class="message">Signup now </p>
        <div class="flex">
        <label>
            <input class="input" type="text" placeholder="" required=""name="firstname">
            <span>Firstname</span>
        </label>

        <label>
            <input class="input" type="text" placeholder="" required="" name="lastname">

            <span>Lastname</span>
        </label>
    </div> 
    
    <label>
        <input class="input" type="text" placeholder="" required=""name="employeeid">
        <span>Employee ID</span>
    </label>
            
    <label>
        <input class="input" type="email" placeholder="" required=""name="email">
        <span>Email</span>
    </label> 
        
    <label>
        <input class="input" type="password" placeholder="" required=""name="password">
        <span>Password</span>
    </label>
    <label>
        <input class="input" type="password" placeholder="" required="" name="cpassword">
        <span>Confirm password</span>
    </label>
    <button class="submit"name="submit" >Submit</button>
    <p class="signin">Already have an acount ? <a href="login.php">Sign in </p></a>
</form>
</body>
</html>