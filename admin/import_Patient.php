<?php
// Required Libraries
require 'C:\Users\GILBERT\Downloads\KALB-QITTA_CASTONE HTML 2\KALB-QITTA_CASTONE HTML\vendor\autoload.php'; // Load PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; // Your RDS endpoint
$dbUsername = "admin"; // Your AWS RDS username
$dbPassword = "Lorax_290"; // Your AWS RDS password
$dbname = "product_managements"; // Your AWS RDS database name

// Create a MySQLi connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

if (isset($_FILES['importFile']) && $_FILES['importFile']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['importFile']['tmp_name'];

    // Load spreadsheet and ensure it's an Excel file
    $spreadsheet = IOFactory::load($fileTmpPath);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    // Loop through rows in the spreadsheet
    foreach ($sheetData as $row) {
        // Ensure the row has the expected number of columns
        if (count($row) < 9) {
            continue; // Skip rows that don't have enough data
        }
        
        // Assuming columns are in the following order: OWNER_NAME, ADDRESS, TEL_PHONE_NO, PETS_NAME, SPECIES, AGE, GENDER, DATE_OF_BIRTH, MARKINGS
        $ownerName = $row[0];
        $address = $row[1];
        $telPhoneNo = $row[2];
        $petsName = $row[3];
        $species = $row[4];
        $age = $row[5];
        $gender = $row[6];
        $dateOfBirth = $row[7];
        $markings = $row[8];

        // Insert customer data
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (OWNER_NAME, ADDRESS, TEL_PHONE_NO) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ownerName, $address, $telPhoneNo);
        $stmt->execute();
        $ownerId = $stmt->insert_id; // Get the last inserted OWNER_ID

        // Insert patient record
        $stmt = $conn->prepare("INSERT INTO PATIENT_RECORD (OWNER_ID, PETS_NAME, SPECIES, AGE, GENDER, DATE_OF_BIRTH, MARKINGS) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississs", $ownerId, $petsName, $species, $age, $gender, $dateOfBirth, $markings);
        $stmt->execute();
    }

    echo "Data imported successfully.";
} else {
    echo "File upload error.";
}

$conn->close();
?>
