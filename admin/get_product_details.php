<?php
// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; // Your RDS endpoint
$dbUsername = "admin"; // Your AWS RDS username
$dbPassword = "Lorax_290"; // Your AWS RDS password
$dbname = "product_managements"; // Your AWS RDS database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the product ID from the request
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$sql = "
    SELECT 
        p.product_name, 
        p.category, 
        p.brand, 
        p.product_cost, 
        s.supplier, 
        p.product_price, 
        p.stock_alert, 
        s.product_quantity, 
        p.product_unit, 
        s.shelf, 
        p.notes,
        s.active,        -- Include active status
        s.reactive       -- Include reactive status
    FROM 
        product p 
    LEFT JOIN 
        stocks s ON p.product_id = s.product_id 
    WHERE 
        p.product_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

// Check if any product details were found
if ($result->num_rows > 0) {
    // Fetch the product details as an associative array
    $productDetails = $result->fetch_assoc();
    // Return the product details as a JSON response

    
    echo json_encode($productDetails);
} else {
    // Return an empty JSON response if no product details were found
    echo json_encode([]);
}


$stmt->close();
$conn->close();
?>
