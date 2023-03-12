<?php
// start session
session_start();

// check if user is logged in
if (!isset($_SESSION['username'])) {
    // user is not logged in, redirect to login page
    header("Location: userForm.php");
    exit;
}

// display welcome message
echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <p>This is the dashboard page. Only logged-in users can see this page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
