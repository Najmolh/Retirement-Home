<?php
session_start();
include('config/db_connection.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in.']);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

    // Validate inputs
    if (empty($payment_method) || empty($amount)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    // Insert into payment table
    $stmt = $conn->prepare("INSERT INTO payment (payment_method, amount, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $payment_method, $amount, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Payment successfully recorded.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
