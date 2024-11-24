<?php
// Required Libraries
require 'C:\Users\GILBERT\Downloads\KALB-QITTA_CASTONE HTML 2\KALB-QITTA_CASTONE HTML\vendor\autoload.php'; // Load PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; // Your RDS endpoint
$dbUsername = "admin"; // Your AWS RDS username
$dbPassword = "Lorax_290"; // Your AWS RDS password
$dbname = "product_managements"; // Your AWS RDS database name

// Establishing the connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT C.OWNER_NAME, C.ADDRESS, C.TEL_PHONE_NO, P.PETS_NAME, P.SPECIES, P.AGE, P.GENDER, P.DATE_OF_BIRTH, P.MARKINGS 
          FROM CUSTOMER C 
          JOIN PATIENT_RECORD P ON C.OWNER_ID = P.OWNER_ID";

$result = $conn->query($query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Patient Records');

// Set header row
$headers = ['Owner Name', 'Address', 'Phone No', 'Pet Name', 'Species', 'Age', 'Gender', 'Date of Birth', 'Markings'];
$sheet->fromArray($headers, NULL, 'A1');

// Populate data rows
if ($result->num_rows > 0) {
    $row = 2;
    while ($data = $result->fetch_assoc()) {
        $sheet->fromArray($data, NULL, 'A' . $row++);
    }
}

// Save the spreadsheet to a temporary file
$writer = new Xlsx($spreadsheet);
$temp_file = tempnam(sys_get_temp_dir(), 'export') . '.xlsx';
$writer->save($temp_file);

// Set headers for download
header('Content-Description: File Transfer');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="PatientRecords.xlsx"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($temp_file));

// Read the file and send it to the user
readfile($temp_file);
unlink($temp_file); // Delete the temporary file
$conn->close();
exit;
?>
