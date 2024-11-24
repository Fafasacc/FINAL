<?php
// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin"; 
$dbPassword = "Lorax_290"; 
$dbname = "product_managements";

// Create a connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to fetch products and their stock levels
$sql = "
  SELECT p.product_id, p.product_name, s.product_quantity, p.stock_alert 
  FROM stocks s
  JOIN product p ON s.product_id = p.product_id
";

$result = $conn->query($sql);

$notifications = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Get the product quantity and stock alert threshold
    $quantity = $row['product_quantity'];
    $stock_alert = $row['stock_alert'];
    $product_name = $row['product_name'];

    $status = '';

    // Check stock level based on the product's stock_alert setting
    if ($stock_alert === 'Low' && $quantity <= 5) {
      $status = "Warning: Only $quantity units left of '$product_name'. Stock is low (Threshold: 5 or less).";  // Low stock alert
    } elseif ($stock_alert === 'Medium' && $quantity <= 10) {
      $status = "Notice: $quantity units remaining of '$product_name'. Stock is medium (Threshold: 10 or less).";  // Medium stock alert
    } elseif ($stock_alert === 'High' && $quantity <= 20) {
      $status = "Alert: $quantity units remaining of '$product_name'. Stock is high (Threshold: 20 or less).";  // High stock alert
    }

    // Only add to notifications if stock meets its alert criteria
    if ($status !== '') {
      $notifications[] = [
        'id' => $row['product_id'],
        'name' => $product_name,
        'quantity' => $quantity,
        
        'status' => $status // Display stock status
      ];
    }
  }
}

// Return notifications as JSON
header('Content-Type: application/json');
echo json_encode($notifications);

// Close the connection
$conn->close();
?>
