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
if (!isset($data['petId']) || !is_array($data['historyEntries'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data format.']);
    exit;
}

// Prepare the statement    
$stmt = $conn->prepare("INSERT INTO PATIENT_HISTORY (PETS_ID, DATE, WT_KGS, TEMP_C, MEDICAL_HISTORY, TREATMENT_PRESCRIPTION) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare statement failed: ' . $conn->error]);
    exit;
}

// Start a transaction
$conn->begin_transaction();

$success = true;
$errorMessages = [];

// Get petId from the input data
$petsId = $data['petId'];

// Insert each history record
foreach ($data['historyEntries'] as $row) {
    // Validate required fields
    if (!isset($row['date'], $row['weight'], $row['temp'], $row['complaints'], $row['treatment'])) {
        $errorMessages[] = 'All fields are required for each history entry.';
        $success = false;
        continue;
    }

    // Map input data to table columns
    $date = $row['date'];
    $weight = (float)$row['weight'];
    $temp = (float)$row['temp'];
    $complaints = $row['complaints'];
    $treatment = $row['treatment'];

    // Bind parameters and execute
    $stmt->bind_param("isddss", $petsId, $date, $weight, $temp, $complaints, $treatment);

    if (!$stmt->execute()) {
        $success = false;
        $errorMessages[] = 'Insert failed for PETS_ID ' . $petsId . ': ' . $stmt->error;
    }
}

// Commit or rollback transaction based on success
if ($success) {
    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Records inserted successfully']);
} else {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Some records failed to insert', 'errors' => $errorMessages]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
