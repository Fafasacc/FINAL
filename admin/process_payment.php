<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "database-1.c3eugumi2vrq.ap-southeast-1.rds.amazonaws.com";
$dbUsername = "admin";
$dbPassword = "Lorax_290";
$dbname = "product_managements";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$data = json_decode(file_get_contents('php://input'), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input: ' . json_last_error_msg()]);
    error_log('Invalid JSON: ' . json_last_error_msg()); // Log the error
    exit;
}

// Log the received JSON
error_log("Received JSON: " . print_r($data, true));

// Check for required fields
$cartItems = $data['cart'] ?? [];
$totalAmount = $data['total'] ?? 0;
$paymentMethod = $data['paymentType'] ?? 'Cash';
$receivedAmount = $data['receivedAmount'] ?? 0;

if (empty($cartItems)) {
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty.']);
    exit;
}


try {
    $conn->begin_transaction();

    $sql = "INSERT INTO transactions (total_amount, payment_method) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $totalAmount, $paymentMethod);
    $stmt->execute();
    $transactionId = $conn->insert_id;

    foreach ($cartItems as $item) {
        $productId = (int) $item['productId'];
        $quantity = (int) $item['quantity'];
        $price = (float) $item['price'];

        $sql = "INSERT INTO transaction_details (transaction_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiid", $transactionId, $productId, $quantity, $price);
        $stmt->execute();
    }

    $sql = "INSERT INTO transaction_history (transaction_id, action) VALUES (?, 'created')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transactionId);
    $stmt->execute();

    $conn->commit();
    echo json_encode(['status' => 'success', 'transactionId' => $transactionId]);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => 'Transaction failed: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
