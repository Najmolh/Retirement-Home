<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

include('config/db_connection.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT name, email FROM user WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['name'] ?? ''; 
$email = $user['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="Style/update_info.css">
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>
    <div id="update_form_container">
        <form action="update_info_backend.php" method="post">
            <h1>Update Your Information</h1>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>" readonly>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" readonly>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
            <input type="submit" value="Update Information">
        </form>
    </div>
    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>
