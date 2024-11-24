<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php'; // Load PhpSpreadsheet

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

// Check if file is uploaded
if (isset($_FILES['importFile']['tmp_name'])) {
    $file = $_FILES['importFile']['tmp_name'];

    // Load the Excel file  
    try {
        $spreadsheet = IOFactory::load($file);
    } catch (Exception $e) {
        die(json_encode(["status" => "error", "message" => "Error loading file: " . $e->getMessage()])); 
    }

    $worksheet = $spreadsheet->getActiveSheet();
    $highestRow = $worksheet->getHighestRow(); // Get the highest row number

    $messages = [];

    // Loop through each row in the Excel file (start from row 2 to skip headers)
    for ($row = 2; $row <= $highestRow; $row++) {
        // Fetch product data
        $product_name = $worksheet->getCell('A' . $row)->getValue();
        $category = $worksheet->getCell('B' . $row)->getValue();
        $brand = $worksheet->getCell('C' . $row)->getValue();
        $product_cost = $worksheet->getCell('D' . $row)->getValue();
        $product_price = $worksheet->getCell('E' . $row)->getValue();
        $product_unit = $worksheet->getCell('F' . $row)->getValue();
        $stock_alert = $worksheet->getCell('G' . $row)->getValue();
        $notes = $worksheet->getCell('H' . $row)->getValue();

        // Fetch stock data
        $shelf = $worksheet->getCell('I' . $row)->getValue();
        $supplier = $worksheet->getCell('J' . $row)->getValue();
        $product_quantity = $worksheet->getCell('K' . $row)->getValue();
        $active = $worksheet->getCell('L' . $row)->getValue();
        $reactive = $worksheet->getCell('M' . $row)->getValue();

        // Check if the product already exists in the database
        $sql_check_product = "SELECT product_id FROM product WHERE product_name = ? AND category = ? AND brand = ?";
        $stmt_check_product = $conn->prepare($sql_check_product);
        $stmt_check_product->bind_param('sss', $product_name, $category, $brand);
        $stmt_check_product->execute();
        $result_check_product = $stmt_check_product->get_result();

        if ($result_check_product->num_rows > 0) {
            // Product exists, get the product ID
            $product_id = $result_check_product->fetch_assoc()['product_id'];
            $messages[] = "Product '$product_name' already exists. Updating details and stock.";

            // Update product details
            $sql_update_product = "UPDATE product SET 
                product_cost = ?, 
                product_price = ?, 
                product_unit = ?, 
                stock_alert = ?, 
                notes = ? 
                WHERE product_id = ?";
            
            $stmt_update_product = $conn->prepare($sql_update_product);
            $stmt_update_product->bind_param('ddsssi', $product_cost, $product_price, $product_unit, $stock_alert, $notes, $product_id);

            if (!$stmt_update_product->execute()) {
                $messages[] = "Error updating product for product ID $product_id: " . $stmt_update_product->error;
            } else {
                $messages[] = "Product updated for product ID $product_id.";
            }

            // Update stock information
            $sql_update_stock = "UPDATE stocks SET shelf = ?, supplier = ?, product_quantity = ?, active = ?, reactive = ? WHERE product_id = ?";
            $stmt_update_stock = $conn->prepare($sql_update_stock);
            $stmt_update_stock->bind_param('ssiiii', $shelf, $supplier, $product_quantity, $active, $reactive, $product_id);

            if (!$stmt_update_stock->execute()) {
                $messages[] = "Error updating stock for product ID $product_id: " . $stmt_update_stock->error;
            } else {
                $messages[] = "Stock updated for product ID $product_id.";
            }

        } else {
            // Product does not exist, insert new product
            $messages[] = "Product '$product_name' does not exist. Adding new product.";

            // Insert data into the product table
            $sql_product = "INSERT INTO product (product_name, category, brand, product_cost, product_price, product_unit, stock_alert, notes) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt_product = $conn->prepare($sql_product);
            $stmt_product->bind_param('sssdssss', $product_name, $category, $brand, $product_cost, $product_price, $product_unit, $stock_alert, $notes);
            
            if (!$stmt_product->execute()) {
                $messages[] = "Error executing product statement: " . $stmt_product->error;
                continue; // Skip to the next row if there's an error
            }

            // Get the last inserted product_id
            $product_id = $stmt_product->insert_id;

            // Insert data into the stocks table
            $sql_stocks = "INSERT INTO stocks (product_id, shelf, supplier, product_quantity, active, reactive) 
                           VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt_stocks = $conn->prepare($sql_stocks);
            $stmt_stocks->bind_param('issiii', $product_id, $shelf, $supplier, $product_quantity, $active, $reactive);
            
            if (!$stmt_stocks->execute()) {
                $messages[] = "Error executing stocks statement for product ID $product_id: " . $stmt_stocks->error;
            } else {
                $messages[] = "Stock entry added for product ID $product_id.";
            }
        }
    }

    // Store success message in session and redirect
    session_start();
    $_SESSION['import_message'] = "Product import successful. " . count($messages) . " records processed.";
    
    // Redirect to another page
    header("Location: inventory.php");
    exit;

} else {
    echo json_encode(["status" => "error", "message" => "No file selected."]);
}

$conn->close();
?>
