<?php
// AWS RDS MySQL connection parameters
$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com"; 
$dbUsername = "admin"; 
$dbPassword = "Lorax_290"; 
$dbname = "product_managements";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if transaction_id is set
if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    // SQL query to fetch transaction details, related products, and void reason
    $sql = "
        SELECT 
            t.transaction_id, 
            t.transaction_date, 
            t.total_amount, 
            t.payment_method, 
            t.status,
            t.void_reason, -- Fetching the void reason
            t.voided_at, -- Fetching the voided timestamp
            p.product_name, -- Fetching the product name
            td.quantity,
            td.price,
            td.subtotal
        FROM 
            transactions t
        LEFT JOIN 
            transaction_details td ON t.transaction_id = td.transaction_id
        LEFT JOIN 
            product p ON td.product_id = p.product_id -- Joining with product table
        WHERE 
            t.transaction_id = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $transaction = [
        'details' => [],
        'summary' => []
    ];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Store transaction summary
            if (empty($transaction['summary'])) {
                $transaction['summary'] = [
                    'transaction_id' => $row['transaction_id'],
                    'transaction_date' => $row['transaction_date'],
                    'total_amount' => $row['total_amount'],
                    'payment_method' => $row['payment_method'],
                    'status' => $row['status'],
                    // Include void reason and timestamp if the transaction is voided
                    'void_reason' => $row['status'] === 'voided' ? $row['void_reason'] : null,
                    'voided_at' => $row['status'] === 'voided' ? $row['voided_at'] : null
                ];
            }

            // Store transaction details
            $transaction['details'][] = [
                'product_name' => $row['product_name'], // Store product name
                'quantity' => $row['quantity'],
                'price' => $row['price'],
                'subtotal' => $row['subtotal']
            ];
        }
        echo json_encode($transaction);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
}

$conn->close();
?>
