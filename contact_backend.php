<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $serviceRequest = htmlspecialchars($_POST['service-request']);
    $message = htmlspecialchars($_POST['message']);
    $guestUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; 

    $stmt = $conn->prepare("INSERT INTO Contact (name, email, message, service_request, fk_guest_user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $email, $message, $serviceRequest, $guestUserId);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
