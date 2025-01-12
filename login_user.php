<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config/db_connection.php');

$email = $_POST['email'];
$user_password = $_POST['password'];

if (empty($email) || empty($password)) {
    header("Location: login.php?error=empty_fields");
    exit();
}

$sql = "SELECT * FROM User WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        echo($password);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['phone_number'] = $user['phone_number'];
        $_SESSION['resident_id'] = $user['resident_id'];
        $_SESSION['admin_id'] = $user['admin_id'];

        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
} else {
    header("Location: login.php?error=no_user_found");
    exit();
}

$conn->close();
?>
