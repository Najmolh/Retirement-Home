<?php
session_start();

include('config/db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO contact (user_id, name, email, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $name, $email, $message);

if ($stmt->execute()) {
    header("Location: contact.php?success=message_sent");
} else {
    header("Location: contact.php?error=failed_to_send");
}

$stmt->close();
$conn->close();
?>
