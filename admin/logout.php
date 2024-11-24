<?php
session_start();
// Destroy the session
session_destroy(); // Destroy the session itself

// Redirect to the login page
header("Location: index.php"); // Replace with the actual login page URL
exit(); // Ensure no further code runs after the redirect
?>
