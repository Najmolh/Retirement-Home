<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];

include('config/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $variety = $_POST['variety'];
    $portion = $_POST['portion'];
    $expectations = $_POST['expectations'];
    $improvements = isset($_POST['improvements']) ? $_POST['improvements'] : NULL;
    $specific_dishes = isset($_POST['specific-dishes']) ? $_POST['specific-dishes'] : NULL;
    $comments = isset($_POST['comments']) ? $_POST['comments'] : NULL;
    $rating = intval($_POST['rating']);

    // Insert data into the table
    $sql = "INSERT INTO feedback (user_id, variety, `portion`, expectations, improvements, specific_dishes, comments, rating)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssi", $user_id, $variety, $portion, $expectations, $improvements, $specific_dishes, $comments, $rating);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
