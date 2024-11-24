<?php
// File: dashboard.php

// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; // Your RDS endpoint
$dbUsername = "admin"; // Your AWS RDS username
$dbPassword = "Lorax_290"; // Your AWS RDS password
$dbname = "product_managements"; // Your AWS RDS database name

// Create a connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total products count
$totalProductsQuery = "SELECT COUNT(*) AS total FROM product";
$totalProductsResult = $conn->query($totalProductsQuery);
$totalProducts = $totalProductsResult->fetch_assoc()['total'] ?? 0;

// Fetch low stock products count based on quantity less than 5
$lowStockQuery = "SELECT COUNT(*) AS low_stock FROM stocks 
                  JOIN product ON stocks.product_id = product.product_id
                  WHERE stocks.product_quantity <= 5";
$lowStockResult = $conn->query($lowStockQuery);
$lowStockProducts = $lowStockResult->fetch_assoc()['low_stock'] ?? 0;

// Fetch out-of-stock products count
$outOfStockQuery = "SELECT COUNT(*) AS out_of_stock FROM stocks 
                    WHERE product_quantity = 0";
$outOfStockResult = $conn->query($outOfStockQuery);
$outOfStockProducts = $outOfStockResult->fetch_assoc()['out_of_stock'] ?? 0;

// Fetch total sales
$totalSalesQuery = "SELECT SUM(total_amount) AS total_sales FROM transactions WHERE status = 'completed'";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'] ?? 0;

// Fetch sales today
$today = date('Y-m-d'); // Get today's date
$salesTodayQuery = "SELECT SUM(total_amount) AS sales_today FROM transactions 
                     WHERE DATE(transaction_date) = '$today' AND status = 'completed'";
$salesTodayResult = $conn->query($salesTodayQuery);
$salesToday = $salesTodayResult->fetch_assoc()['sales_today'] ?? 0;

// System Status Checks
$systemHealth = "All Systems Operational"; // Assume all systems are running fine; adjust as needed.
$databaseStatus = ($conn->ping()) ? "Connected" : "Disconnected"; // Check if the database connection is active.

// Close the database connection
$conn->close();
?>
