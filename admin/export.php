<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet as PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the product and stocks tables
$sql = "SELECT 
            p.product_name, 
            p.category, 
            p.brand, 
            p.product_cost, 
            p.product_price, 
            p.product_unit, 
            p.stock_alert, 
            p.notes,
            s.shelf,
            s.supplier,
            s.product_quantity,
            s.active,
            s.reactive,
            s.added_at
        FROM 
            product p
        LEFT JOIN 
            stocks s ON p.product_id = s.product_id";

$result = $conn->query($sql);

// Create a new Spreadsheet
$spreadsheet = new PhpSpreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set headers in the first row
$headers = ['Product Name', 'Category', 'Brand', 'Product Cost', 'Product Price', 'Product Unit', 'Stock Alert', 'Notes', 'Shelf', 'Supplier', 'Product Quantity', 'Active', 'Reactive', 'Added At'];
foreach ($headers as $key => $header) {
    $sheet->setCellValue(chr(65 + $key) . '1', $header);
}

// Populate the spreadsheet with data
if ($result->num_rows > 0) {
    $rowNumber = 2; // Start from row 2
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            // Check for supplier value and handle it
            if ($key === 'supplier') {
                // Check if supplier is empty or zero
                if (empty($value) || $value === '0') {
                    error_log("Row: $rowNumber, Supplier is empty or zero");
                    $value = 'No Supplier'; // Provide a default value or handle accordingly
                }
            }
            $sheet->setCellValue(chr(65 + array_search($key, array_keys($row))) . $rowNumber, $value);
        }
        $rowNumber++;
    }
}

// Create an Excel file (XLSX format) for download
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="products.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

$conn->close();
?>
