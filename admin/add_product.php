<?php
// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements"; 

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get product data from the form
    $product_name = $_POST['product-name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $product_cost = $_POST['product-cost'];
    $product_price = $_POST['product-price'];
    $product_unit = $_POST['product-unit'];
    $stock_alert = $_POST['stock-alert'];
    $notes = $_POST['notes'];

    // Prepare the SQL statement for inserting product data
    $stmt_product = $conn->prepare("INSERT INTO product (product_name, category, brand, product_cost, product_price, product_unit, stock_alert, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_product->bind_param("sssddsss", $product_name, $category, $brand, $product_cost, $product_price, $product_unit, $stock_alert, $notes);

    // Execute the product insert query
    if ($stmt_product->execute()) {
        // Get the last inserted product ID
        $product_id = $stmt_product->insert_id;

        // Handle stock data from the form
        $shelf = $_POST['shelf'];
        $supplier = $_POST['supplier'];
        $product_quantity = $_POST['product-quantity'];
        $active = isset($_POST['active']) ? 1 : 0;
        $reactive = isset($_POST['reactive']) ? 1 : 0;

        // Prepare the SQL statement for inserting stock data
        $stmt_stock = $conn->prepare("INSERT INTO stocks (product_id, shelf, supplier, product_quantity, active, reactive) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_stock->bind_param("issiii", $product_id, $shelf, $supplier, $product_quantity, $active, $reactive);

        // Execute the stock insert query
        if ($stmt_stock->execute()) {
            echo "<script>showSuccessMessage();</script>"; // Call JavaScript function for success message
        } else {
            echo "Error inserting stock data: " . $stmt_stock->error; // Improved error handling
        }

        // Close the stock statement
        $stmt_stock->close();
    } else {
        echo "Error inserting product data: " . $stmt_product->error; // Improved error handling
    }

    // Close the product statement
    $stmt_product->close();
}

// Close the database connection
$conn->close();
?>
