<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection variables for AWS RDS
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session to access session variables
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Access denied. Please log in first.'); window.location.href = 'login.html';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmNewPassword = $_POST['confirm_new_password'] ?? '';

    // Check if new passwords match
    if ($newPassword !== $confirmNewPassword) {
        echo "<script>alert('New password and confirmation do not match.'); window.location.href = 'administration.php';</script>";
        exit();
    }

    // Get the logged-in username from the session
    $username = $_SESSION['username'];

    // Fetch the current password from the database
    $stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the current password
        if (password_verify($currentPassword, $hashedPassword)) {
            // Hash the new password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateStmt = $conn->prepare("UPDATE admin_users SET password = ? WHERE username = ?");
            $updateStmt->bind_param("ss", $newHashedPassword, $username);

            if ($updateStmt->execute()) {
                // Display success message and redirect to reset the form
                echo "<script>alert('Password successfully updated.'); window.location.href = 'administration.php';</script>";
            } else {
                echo "<script>alert('Error updating password: " . $conn->error . "'); window.location.href = 'administration.php';</script>";
            }

            $updateStmt->close();
        } else {
            echo "<script>alert('Current password is incorrect.'); window.location.href = 'administration.php';</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.location.href = 'administration.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
