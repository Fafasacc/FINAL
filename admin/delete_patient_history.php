<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$username = "admin";
$password = "Lorax_290";
$dbname = "product_managements";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Get the JSON input and parse it
$inputData = file_get_contents("php://input");
$data = json_decode($inputData, true);

// Validate the data format
if (!isset($data['petId']) || !isset($data['date'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data format.']);
    exit;
}

// Start a transaction
$conn->begin_transaction();

$success = true;

// Get petId and date from the input data
$petsId = $data['petId'];
$date = $data['date'];

// Prepare the delete statement
$stmt = $conn->prepare("DELETE FROM PATIENT_HISTORY WHERE PETS_ID = ? AND DATE = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare statement failed: ' . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("is", $petsId, $date);

// Execute the statement
if (!$stmt->execute()) {
    $success = false;
}

// Check if any rows were affected
if ($success && $stmt->affected_rows > 0) {
    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Patient History Deleted Successfully!.']);
} elseif ($success) {
    echo json_encode(['success' => false, 'message' => 'No matching record found to delete.']);
} else {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Failed to delete entry: ' . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
