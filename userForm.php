<?php
// start session
session_start();

// check if user is logged in
if (isset($_SESSION['username'])) {
    // user is logged in, redirect to dashboard
    header("Location: index.php");
    exit;
}

// check if login form was submitted
if (isset($_POST['submit'])) {
    // include database connection
    require_once "userDB.php";

    // get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userDB = new USER_DB();
    $userDB->login($username,$password);

  
    
   
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($_SESSION['error'])) { echo '<p>'.$_SESSION['error'].'</p>'; } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
