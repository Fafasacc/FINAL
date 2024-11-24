<?php
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

// Get search input and category filter from the request
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'All';

// Base query
$sql = "SELECT p.product_id, p.product_name, p.category, p.product_price, p.stock_alert, s.product_quantity, s.supplier 
        FROM product p 
        LEFT JOIN stocks s ON p.product_id = s.product_id 
        WHERE 1=1"; // Always true to simplify appending conditions

// Add search condition if provided
if (!empty($search)) {
    $sql .= " AND (p.product_name LIKE '%$search%' OR p.brand LIKE '%$search%')";
}

// Add category condition if a specific category is selected
if ($category !== 'All') {
    $sql .= " AND p.category = '" . $conn->real_escape_string($category) . "'";
}

// Add sorting and limit
$sql .= " ORDER BY p.product_name ASC LIMIT 100";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["supplier"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["product_price"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["product_quantity"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stock_alert"]) . "</td>";
        echo "<td>
                  <button class='btn btn-info btn-sm me-2' data-id='" . htmlspecialchars($row["product_id"]) . "' onclick='showProductDetails(this)'>Review</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No products found</td></tr>";
}

$conn->close();
?>
