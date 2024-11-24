<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = getenv('DB_SERVER') ?: "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$username = getenv('DB_USER') ?: "admin";
$password = getenv('DB_PASS') ?: "Lorax_290";
$dbname = getenv('DB_NAME') ?: "product_managements";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die(json_encode(["success" => false, "error" => "Database connection failed."]));
}

// Get the product ID from the query string
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id <= 0) {
    echo json_encode(["success" => false, "error" => "Invalid product ID."]);
    exit();
}

// Get the JSON input from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Check if data is received
if ($data) {
    // Debug: Log the raw JSON data before updating
    error_log("Received data: " . json_encode($data));

    // Prepare data for updating the product table
    $productCost = isset($data['product_cost']) ? (float)$data['product_cost'] : 0.0;
    $productPrice = isset($data['product_price']) ? (float)$data['product_price'] : 0.0;
    $stockAlert = isset($data['stockAlert']) ? $data['stockAlert'] : '';
    $notes = isset($data['notes']) ? $data['notes'] : '';

    // Prepare data for updating the stocks table
    $quantity = isset($data['quantity']) ? (int)$data['quantity'] : 0;
    $shelf = isset($data['shelf']) ? (int)$data['shelf'] : 0;
    $status = isset($data['Status']) ? (int)$data['Status'] : 1; // Default to active

    // Start a transaction
    $conn->begin_transaction();

    error_log("Script started.");

    try {
        // Update the product details
        $stmt1 = $conn->prepare("UPDATE product SET product_cost = ?, product_price = ?, stock_alert = ?, notes = ? WHERE product_id = ?");
        if (!$stmt1) {
            throw new Exception("Failed to prepare statement for product update: " . $conn->error);
        }
        $stmt1->bind_param("dsssi", $productCost, $productPrice, $stockAlert, $notes, $product_id);
        
        if (!$stmt1->execute()) {
            throw new Exception("Failed to update product: " . $stmt1->error);
        }

        // Update the stock details including the status
        $stmt2 = $conn->prepare("UPDATE stocks SET product_quantity = ?, shelf = ?, active = ?, reactive = ? WHERE product_id = ?");
        if (!$stmt2) {
            throw new Exception("Failed to prepare statement for stock update: " . $conn->error);
        }
        
        // Set active/reactive based on the received Status
        $active = ($status == 1) ? true : false;
        $reactive = !$active;
        
        $stmt2->bind_param("iiiii", $quantity, $shelf, $active, $reactive, $product_id);
        
        if (!$stmt2->execute()) {
            throw new Exception("Failed to update stock: " . $stmt2->error);
        }

        // Commit the transaction
        $conn->commit();

        echo json_encode(["success" => true, "message" => "Product and stock updated successfully!"]);
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $conn->rollback();
        error_log("Error occurred: " . $e->getMessage());
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    } finally {
        // Close the statements
        if (isset($stmt1)) {
            $stmt1->close();
        }
        if (isset($stmt2)) {
            $stmt2->close();
        }
        // Close the database connection
        $conn->close();
    }
} else {
    error_log("No data received or invalid input.");
    echo json_encode(["success" => false, "error" => "Invalid input data"]);
}
