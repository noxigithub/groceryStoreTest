<?php
// start session
session_start();

// destroy session and redirect to login page
session_destroy();
header("Location: index.php");
exit;
?>