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
    $currentUsername = $_POST['current_username'] ?? '';
    $newUsername = $_POST['new_username'] ?? '';

    // Ensure the new username is not empty
    if (empty($newUsername)) {
        echo "<script>alert('New username cannot be empty.'); window.location.href = 'administration.php';</script>";
        exit();
    }

    // Get the logged-in username from the session
    $username = $_SESSION['username'];

    // Check if the current username matches the logged-in session username
    if ($currentUsername !== $username) {
        echo "<script>alert('Current username is incorrect.'); window.location.href = 'administration.php';</script>";
        exit();
    }

    // Fetch the current username from the database to verify the current one
    $stmt = $conn->prepare("SELECT username FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the current username matches
    if ($stmt->num_rows == 1) {
        // Update the username in the database
        $updateStmt = $conn->prepare("UPDATE admin_users SET username = ? WHERE username = ?");
        $updateStmt->bind_param("ss", $newUsername, $username);

        if ($updateStmt->execute()) {
            // Update session username and display success message
            $_SESSION['username'] = $newUsername;
            echo "<script>alert('Username successfully updated.'); window.location.href = 'administration.php';</script>";
        } else {
            echo "<script>alert('Error updating username: " . $conn->error . "'); window.location.href = 'administration.php';</script>";
        }

        $updateStmt->close();
    } else {
        echo "<script>alert('Current username is incorrect.'); window.location.href = 'administration.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
