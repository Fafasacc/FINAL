<?php
header('Content-Type: application/json');

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; // Your RDS endpoint
$dbUsername = "admin"; // Your AWS RDS username
$dbPassword = "Lorax_290"; // Your AWS RDS password
$dbname = "product_managements"; // Your AWS RDS database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit;
}

// Get the JSON input and parse it
$inputData = file_get_contents("php://input");
$data = json_decode($inputData, true);

// Validate the data format
if (!isset($data['owner_name'], $data['pet_name'], $data['pet_breed'], $data['pet_markings'], $data['history']) || !is_array($data['history'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data format.']);
    exit;
}

// Start a transaction
$conn->begin_transaction();
$success = true;
$errorMessages = [];

// Step 1: Insert Owner Information
$stmtOwner = $conn->prepare("INSERT INTO CUSTOMER (OWNER_NAME, ADDRESS, TEL_PHONE_NO) VALUES (?, ?, ?)");
$stmtOwner->bind_param("sss", $data['owner_name'], $data['owner_address'], $data['owner_phone']);

if (!$stmtOwner->execute()) {
    $success = false;
    $errorMessages[] = 'Insert owner failed: ' . $stmtOwner->error;
}

// Get the inserted owner's ID
$ownerId = $stmtOwner->insert_id;
$stmtOwner->close();

// Step 2: Insert Pet Information
$stmtPet = $conn->prepare("INSERT INTO PATIENT_RECORD (OWNER_ID, PETS_NAME, SPECIES, BREED, MARKINGS, AGE, GENDER, DATE_OF_BIRTH) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmtPet->bind_param("issssiss", $ownerId, $data['pet_name'], $data['pet_species'], $data['pet_breed'], $data['pet_markings'], $data['pet_age'], $data['pet_gender'], $data['pet_dob']);

if (!$stmtPet->execute()) {
    $success = false;
    $errorMessages[] = 'Insert pet failed: ' . $stmtPet->error;
}

// Get the inserted pet's ID
$petsId = $stmtPet->insert_id;
$stmtPet->close();

// Step 3: Insert History Records
$stmtHistory = $conn->prepare("INSERT INTO PATIENT_HISTORY (PETS_ID, DATE, WT_KGS, TEMP_C, MEDICAL_HISTORY, TREATMENT_PRESCRIPTION) VALUES (?, ?, ?, ?, ?, ?)");
$stmtHistory->bind_param("isssss", $petsId, $date, $weight, $temp, $complaints, $treatment);

// Loop through history records using the new structure
foreach ($data['history'] as $row) {
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

    // Execute insert for each history record
    if (!$stmtHistory->execute()) {
        $success = false;
        $errorMessages[] = 'Insert failed for PETS_ID ' . $petsId . ': ' . $stmtHistory->error;
    }
}

// Commit or rollback transaction based on success
if ($success) {
    $conn->commit();
    echo json_encode('Records inserted successfully');
} else {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Some records failed to insert', 'errors' => $errorMessages]);
}

// Close the statements and connection
$stmtHistory->close();
$conn->close();
?>
