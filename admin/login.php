<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// AWS RDS MySQL connection parameters
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

// Start the session to track user state
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted login credentials
    $inputUsername = $_POST['username'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();

    // Check if the username exists in the database
    if ($stmt->num_rows == 1) {
        // Bind the password result
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the entered password against the hashed password in the database
        if (password_verify($inputPassword, $hashedPassword)) {
            // Set session variables upon successful login
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $inputUsername;

            // Redirect to the dashboard on successful login
            echo "<script>
                    sessionStorage.setItem('username', '$inputUsername'); // Store in sessionStorage
                    localStorage.setItem('username', '$inputUsername');  // Store in localStorage
                    window.location.href = 'index.php'; // Redirect to dashboard
                  </script>";
            exit();
        } else {
            // Show an error message for invalid password
            echo "<script>alert('Invalid password.'); window.location.href = 'login.html';</script>";
        }
    } else {
        // Show an error message for invalid username
        echo "<script>alert('Invalid username.'); window.location.href = 'login.html';</script>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
