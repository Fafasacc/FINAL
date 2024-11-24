<?php
session_start();
header('Content-Type: application/json');

// Get the raw POST data (you may need to update this part to handle the fetch correctly)
$requestData = json_decode(file_get_contents('php://input'), true);

// Check if the necessary data was received
if (!isset($requestData['phone']) || !isset($requestData['name'])) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit;
}

// Retrieve data from request
$loggedInUserPhone = $requestData['phone'];
$loggedInUserName = $requestData['name'];

// Database connection
$connection = new mysqli('your_host', 'your_username', 'your_password', 'your_database');

// Check connection
if ($connection->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Prepare a query to find the OWNER_ID based on phone number
$stmt = $connection->prepare("SELECT OWNER_ID FROM CUSTOMER WHERE TEL_PHONE_NO = ? AND OWNER_NAME = ?");
$stmt->bind_param("ss", $loggedInUserPhone, $loggedInUserName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ownerId = $row['OWNER_ID'];

    // Query to get pet details for this owner
    $stmt = $connection->prepare("SELECT * FROM PATIENT_RECORD WHERE OWNER_ID = ?");
    $stmt->bind_param("i", $ownerId);
    $stmt->execute();
    $petsResult = $stmt->get_result();

    $pets = [];
    while ($pet = $petsResult->fetch_assoc()) {
        $pets[] = $pet;
    }

    echo json_encode(['success' => true, 'pets' => $pets]);
} else {
    echo json_encode(['success' => false, 'message' => 'No matching user found']);
}

$stmt->close();
$connection->close();
?>
