<?php
header('Content-Type: application/json');
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the request body
$data = json_decode(file_get_contents('php://input'), true);

// Prepare to update stock quantities
if ($data) {
    $stmt = $conn->prepare("UPDATE stocks SET product_quantity = product_quantity - ? WHERE product_id = ?");
    
    foreach ($data as $item) {
        $quantity = $item['quantity'];
        $productId = $item['productId'];
        
        $stmt->bind_param("ii", $quantity, $productId);
        $stmt->execute();
    }

    $stmt->close();
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
}

$conn->close();
?>
