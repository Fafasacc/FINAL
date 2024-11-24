<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin"; 
$dbPassword = "Lorax_290"; 
$dbname = "product_managements"; 

// Connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for search input and prepare to escape the input
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Prepare the SQL statement to avoid SQL injection
if (!empty($search)) {
    $stmt = $conn->prepare("SELECT p.product_id, p.product_name, p.category, p.product_price, s.product_quantity 
                             FROM product p 
                             LEFT JOIN stocks s ON p.product_id = s.product_id 
                             WHERE p.product_name LIKE ? 
                             AND s.active = 1 
                             ORDER BY p.product_name ASC"); // Order by product_name
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("s", $searchTerm); // Bind the search term
} else {
    // Load all products if no search query, ordered alphabetically
    $stmt = $conn->prepare("SELECT p.product_id, p.product_name, p.category, p.product_price, s.product_quantity 
                             FROM product p 
                             LEFT JOIN stocks s ON p.product_id = s.product_id 
                             WHERE s.active = 1 
                             ORDER BY p.product_name ASC"); // Order by product_name
}

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Ensure product ID and quantity are integers
        $productId = (int)$row['product_id'];
        $productQuantity = (int)$row['product_quantity'];
        
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
        echo "<td>" . number_format($row["product_price"], 2) . "</td>";
        echo "<td>" . $productQuantity . "</td>"; // Display the stock quantity
        // Include stock as a data attribute
        echo "<td><button class='btn btn-success btn-sm add-to-cart-btn' 
                         data-id='" . $productId . "' 
                         data-stock='" . $productQuantity . "'>Add</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No products found</td></tr>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
