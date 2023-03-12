<?php
session_start();
var_dump($_POST);
if (isset($_POST['submit'])) {
	require_once "userDB.php";
	$_SESSION['error'] = "NO errors";

	 var_dump($_POST);
	// include database connection


	// get username and password from form
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$userRol = $_POST['rol'];

	$userDB = new USER_DB();
	$userDB->registration($username, $password,$name,$userRol);
}else{
	$_SESSION['error'] = "Empty form";
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration Form</title>
</head>

<body>
	<h2>Registration Form</h2>
	<?php if (isset($_SESSION['error'])) { echo '<p>'.$_SESSION['error'].'</p>'; } ?>
	<form action="" method="post">
		<label>Username:</label>
		<input type="text" name="username" required>
		<br>
		<label>Password:</label>
		<input type="password" name="password" required>
		<br>
		<label>Name</label>
		<input type="name" name="name" required>
		<input type="rol" name="rol" hidden value="customer">
		<br>
		<button type="submit" name="submit" value="registration">Register</button>
	</form>
</body>

</html>