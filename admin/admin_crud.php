<?php
header("Content-Type: application/json");

// Database connection
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);  // Log the connection error
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// Set timezone
$conn->query("SET time_zone = '+08:00'");

// Determine the CRUD operation based on the `action` parameter
$action = $_GET['action'] ?? null;

// Fetch all admins
if ($action === "fetch") {
    $sql = "SELECT id, username, name, date_created FROM admin_users";  // Added 'name' and 'date_created' columns
    $result = $conn->query($sql);

    $admins = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }
    }
    echo json_encode($admins);
}

// Add a new admin
elseif ($action === "add") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $name = $_POST['name'] ?? null;

    // Basic validation
    if (!$username || !$password || !$name) {
        echo json_encode(["error" => "Username, password, and name are required"]);
        exit();
    }

    $username = htmlspecialchars($username); // Prevent XSS attacks
    $name = htmlspecialchars($name); // Prevent XSS attacks

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO admin_users (username, password, name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $hashedPassword, $name);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Admin added successfully"]);
    } else {
        error_log("Error adding admin: " . $conn->error);  // Log error for debugging
        echo json_encode(["error" => "Error adding admin"]);
    }
    $stmt->close();
}
// Update an admin
elseif ($action === "update") {
    $id = $_POST['id'] ?? null;
    $username = $_POST['username'] ?? null;
    $newPassword = $_POST['newPassword'] ?? null;
    $currentPassword = $_POST['currentPassword'] ?? null; // Added current password
    $name = $_POST['name'] ?? null;

    // Basic validation
    if (!$id || !$username || !$name || !$currentPassword) {
        echo json_encode(["error" => "ID, username, name, and current password are required"]);
        exit();
    }

    $username = htmlspecialchars($username);
    $name = htmlspecialchars($name);

    // Verify the current password
    $sql = "SELECT password FROM admin_users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!password_verify($currentPassword, $row['password'])) {
            echo json_encode(["error" => "Current password is incorrect"]);

            $stmt->close();
            exit();
        }
    } else {
        echo json_encode(["error" => "Admin not found"]);
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Update the admin details
    if ($newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE admin_users SET username = ?, password = ?, name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $username, $hashedPassword, $name, $id);
    } else {
        $sql = "UPDATE admin_users SET username = ?, name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $username, $name, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["message" => "Admin updated successfully"]);
    } else {
        error_log("Error updating admin: " . $conn->error);  // Log error for debugging
        echo json_encode(["error" => "Error updating admin"]);
    }
    $stmt->close();
}


// Delete an admin
elseif ($action === "delete") {
    $id = $_GET['id'] ?? null;
    $loggedInAdminId = $_SESSION['loggedInUsername'] ?? null; // Assuming the logged-in admin ID is stored in the session
   
    if (!$id) {
        echo json_encode(["error" => "ID is required"]);
        exit();
    }

    // Prevent deleting the logged-in account
    if ($id == $loggedInAdminId) {
        echo json_encode(["error" => "You cannot delete the currently logged-in account"]);
        exit();
    }

    $sql = "DELETE FROM admin_users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Admin deleted successfully"]);
    } else {
        error_log("Error deleting admin: " . $conn->error); // Log error for debugging
        echo json_encode(["error" => "Error deleting admin"]);
    }
    $stmt->close();
}

// Invalid or missing action
else {
    echo json_encode(["error" => "Invalid or missing action"]);
}

$conn->close();
?>
