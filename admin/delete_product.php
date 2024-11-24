<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin"; 
$dbPassword = "Lorax_290"; 
$dbname = "product_managements"; 

// Set content type to JSON
header('Content-Type: application/json');

// Create a connection to the database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit; // Stop further execution
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if 'productId' parameter is present
if (isset($data['productId'])) {
    $productId = intval($data['productId']); // Ensure ID is an integer

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Check if the product exists in the product table
        $checkProductSql = "SELECT product_id FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($checkProductSql);
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement for checking product: " . $conn->error);
        }
        
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows === 0) {
            throw new Exception("No product found with ID: $productId");
        }
        
        $stmt->close();

        // Delete from stocks table
        $deleteStocksSql = "DELETE FROM stocks WHERE product_id = ?";
        $stmt = $conn->prepare($deleteStocksSql);
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement for deleting stocks: " . $conn->error);
        }
        
        // Bind the parameter
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->close();

        // Now, delete from product table
        $deleteProductSql = "DELETE FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($deleteProductSql);
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement for deleting product: " . $conn->error);
        }

        // Bind the parameter
        $stmt->bind_param("i", $productId);

        // Execute and check the result
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) { // Check if any rows were deleted
                echo json_encode(["status" => "success", "message" => "Product deleted successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "No product found with the given ID."]);
            }
        } else {
            throw new Exception("Failed to delete product: " . $stmt->error);
        }

        $stmt->close();
        
        // Commit transaction
        $conn->commit();
        
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
    
} else {
    echo json_encode(["status" => "error", "message" => "Product ID not provided."]);
}

// Close the database connection
$conn->close();
?>
