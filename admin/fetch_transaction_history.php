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

// Get the search query parameter if it exists
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// SQL query to fetch transaction history including void reason, with optional search functionality
$sql = "
    SELECT 
        t.transaction_id, 
        t.transaction_date, 
        t.total_amount, 
        t.payment_method, 
        t.status,
        t.void_reason  -- Add this line to retrieve the void reason
    FROM 
        transactions t
    WHERE 
        t.transaction_id LIKE '%$search%' OR 
        DATE(t.transaction_date) LIKE '%$search%'
    ORDER BY t.transaction_date DESC
";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<tbody>"; // Start the tbody without headers

    while ($row = $result->fetch_assoc()) {
        // Calculate the time difference
        $transactionDate = new DateTime($row["transaction_date"], new DateTimeZone('UTC'));  // Assuming the time is in UTC
        $transactionDate->setTimezone(new DateTimeZone('Asia/Manila')); // Set the timezone to UTC-8 (Philippine Time)

        $currentDate = new DateTime();
        $interval = $currentDate->diff($transactionDate);

        echo "<tr>";
        echo "<td>" . $row["transaction_id"] . "</td>";
        echo "<td>" . $transactionDate->format('Y-m-d h:i A') . "</td>";  // Display the converted transaction date in 12-hour format (with AM/PM)
        echo "<td>" . $row["total_amount"] . "</td>";
        echo "<td>" . $row["payment_method"] . "</td>";

        // Set text color based on transaction status
        if ($row["status"] === "voided") {
            echo "<td style='color: red; font-weight:bold;'>" . $row["status"] . "</td>";
        } elseif ($row["status"] === "complete") {
            echo "<td style='color: green; font-weight:bold;'>" . $row["status"] . "</td>";
        } else {
            echo "<td style='font-weight:bold;'>" . $row["status"] . "</td>"; // Default style for other statuses
        }

        // Conditional rendering of buttons based on the transaction status and time since transaction
        if ($row["status"] === "voided") {
            // Show only the View button if the status is voided
            echo "<td>
                    <button class='btn btn-info btn-sm' onclick='viewTransaction(" . $row["transaction_id"] . ")'>View</button>
                  </td>";
        } elseif ($interval->days < 1) {
            // Show both View and Void buttons if the transaction is less than a day old and not voided
            echo "<td>
                    <button class='btn btn-info btn-sm' onclick='viewTransaction(" . $row["transaction_id"] . ")'>View</button>
                    <button class='btn btn-danger btn-sm' onclick='voidTransaction(" . $row["transaction_id"] . ")'>Void</button>
                  </td>";
        } else {
            // Show only the View button if the transaction is older than a day and not voided
            echo "<td>
                    <button class='btn btn-info btn-sm' onclick='viewTransaction(" . $row["transaction_id"] . ")'>View</button>
                  </td>";
        }

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>"; // Closing table tag should remain as it is
} else {
    echo "<tbody><tr><td colspan='6' class='text-center'>No transactions found.</td></tr></tbody>"; // Handling no data case
}

$conn->close();
?>
