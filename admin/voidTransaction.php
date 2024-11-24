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

// Check if the transaction ID and void reason are provided
if (isset($_POST['transaction_id']) && isset($_POST['void_reason'])) {
    $transactionId = intval($_POST['transaction_id']);
    $voidReason = $conn->real_escape_string($_POST['void_reason']);
    
    // Begin transaction to ensure data integrity
    $conn->begin_transaction();
    
    // Update the transaction status to 'voided'
    $updateSql = "UPDATE transactions SET status = 'voided', void_reason = '$voidReason', voided_at = NOW() WHERE transaction_id = $transactionId";
    if ($conn->query($updateSql) === TRUE) {

        // Fetch the products and their quantities associated with this transaction
        $fetchDetailsSql = "SELECT product_id, quantity FROM transaction_details WHERE transaction_id = $transactionId";
        $result = $conn->query($fetchDetailsSql);

        if ($result->num_rows > 0) {
            // Loop through each product and update the stock
            while ($row = $result->fetch_assoc()) {
                $productId = $row['product_id'];
                $quantity = $row['quantity'];

                // Update the product's stock by adding back the sold quantity
                $updateStockSql = "UPDATE stocks SET product_quantity = product_quantity + $quantity WHERE product_id = $productId";
                if (!$conn->query($updateStockSql)) {
                    // Rollback if updating stock fails
                    $conn->rollback();
                    echo json_encode(["status" => "error", "message" => "Error updating stock: " . $conn->error]);
                    $conn->close();
                    exit;
                }
            }

            // Record the action in transaction_history
            $historySql = "INSERT INTO transaction_history (transaction_id, action, action_reason) VALUES ($transactionId, 'voided', '$voidReason')";
            if ($conn->query($historySql) === TRUE) {
                // Commit the transaction if everything is successful
                $conn->commit();
                echo json_encode(["status" => "success", "message" => "Transaction voided and stock updated successfully."]);
            } else {
                // Rollback if inserting into transaction history fails
                $conn->rollback();
                echo json_encode(["status" => "error", "message" => "Error recording transaction history: " . $conn->error]);
            }

        } else {
            // Rollback if no products are found for this transaction
            $conn->rollback();
            echo json_encode(["status" => "error", "message" => "No products found for this transaction."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error voiding transaction: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

$conn->close();
?>
