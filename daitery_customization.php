<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

include('config/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $spice_level = $_POST['spice_level'];
    $salt_level = $_POST['salt_level'];
    $sugar_level = isset($_POST['sugar_level']) ? $_POST['sugar_level'] : NULL; // Fixed typo
    $user_id = $_SESSION['user_id']; // Get user ID from session

    // Insert data into the table
    $sql = "INSERT INTO customize_meal_plan (user_id, spice_level, salt_level, sugar_level)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $spice_level, $salt_level, $sugar_level);

    if ($stmt->execute()) {
        echo "Preferences submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
