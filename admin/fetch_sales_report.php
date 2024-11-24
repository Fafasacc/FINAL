<?php
// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin"; 
$dbPassword = "Lorax_290"; 
$dbname = "product_managements";

// Get date range from GET request
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch transactions and their details within the specified date range,
    // excluding voided transactions (status != 'voided')
    $stmt = $conn->prepare("
        SELECT 
            t.transaction_id, 
            t.transaction_date, 
            t.total_amount, 
            t.payment_method, 
            t.status, 
            p.product_name,  -- Fetch product name
            td.quantity, 
            td.price AS sale_price, 
            p.product_cost,  -- Fetch product cost
            td.subtotal
        FROM transactions t
        JOIN transaction_details td ON t.transaction_id = td.transaction_id
        JOIN product p ON td.product_id = p.product_id  -- Join with the product table to get product details
        WHERE t.transaction_date BETWEEN :start_date AND :end_date
        AND t.status != 'voided'  -- Exclude voided transactions
    ");

    // Bind parameters for the date range
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();

    // Fetch the data
    $sales_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // If there are no records found, return an empty JSON array
    if (empty($sales_data)) {
        echo json_encode(['sales_data' => [], 'total_revenue' => 0, 'total_transactions' => 0]);
        exit;
    }

    // Calculate total revenue and total transactions
    $total_revenue = array_sum(array_column($sales_data, 'subtotal'));
    $total_transactions = count(array_unique(array_column($sales_data, 'transaction_id')));

    // Prepare the response
    $response = [
        'total_revenue' => $total_revenue,
        'total_transactions' => $total_transactions,
        'sales_data' => $sales_data,
    ];

    // Return the response as JSON
    echo json_encode($response);

} catch(PDOException $e) {
    // Return error message if there's an issue
    echo json_encode(['error' => $e->getMessage()]);
}

// Close the connection
$conn = null;
?>
