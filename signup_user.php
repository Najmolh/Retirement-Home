<?php
include('config/db_connection.php');

$name = $_POST['username'];
$email = $_POST['email'];
 
$password = password_hash($password, PASSWORD_DEFAULT);

$role = strtolower(trim($_POST['role']));

$valid_roles = ['resident', 'admin', 'stranger'];
if (!in_array($role, $valid_roles)) {
    die("Invalid role! Please enter one of the following roles: resident, admin, stranger.");
}

$sql = "INSERT INTO User (name, email, password, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $password, $role);

if ($stmt) {
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>