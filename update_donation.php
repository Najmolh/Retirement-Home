<?php
// Include the database connection
include('config/db_connection.php');

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

$donation_type = $data['donation_type'];
$amount = $data['amount'];

// Debug input data
error_log("Donation Type: " . $donation_type);
error_log("Amount: " . $amount);

// Validate input
if (empty($donation_type) || empty($amount) || $amount <= 0) {
    echo json_encode(['success' => false, 'error' => 'Invalid input data']);
    exit;
}

// Update the donation amount in the database
$sql = "UPDATE donation SET amount = amount + ? WHERE donation_type = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log("SQL Error: " . $conn->error);
    echo json_encode(['success' => false, 'error' => 'SQL preparation failed']);
    exit;
}

$stmt->bind_param('ds', $amount, $donation_type);

if ($stmt->execute()) {

} else {
    
    echo json_encode(['success' => false, 'error' => 'Database update failed']);
}

$stmt->close();
$conn->close();
header("Location: donation_otp.php?");
?>
