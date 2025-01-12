<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config/db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);
$phone = htmlspecialchars($phone);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$user_id = $_SESSION['user_id'];

$sql = "UPDATE user SET name = ?, email = ?, password = ?, phone_number = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $email, $hashed_password, $phone, $user_id);

if ($stmt->execute()) {
    header("Location: user_dashboard.php?success=info_updated");
} else {
    header("Location: update_info.php?error=update_failed");
}

$stmt->close();
$conn->close();
?>
