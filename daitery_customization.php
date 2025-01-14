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
    $spice_level = $_POST['spice-level'];
    $salt_level = $_POST['salt-level'];
    $sugar_level = $_POST['sugar-level']; 
    $user_id = $_SESSION['user_id'];

    $check_sql = "SELECT * FROM customize_meal_plan WHERE user_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $user_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $update_sql = "UPDATE customize_meal_plan SET spice_level = ?, salt_level = ?, sugar_level = ? WHERE user_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssi", $spice_level, $salt_level, $sugar_level, $user_id);

        if ($update_stmt->execute()) {
            header("Location: success.php?message=Preferences updated successfully.");
            exit();
        } else {
            header("Location: error.php?message=Error updating preferences.");
            exit();
        }

        $update_stmt->close();
    } else {
        $insert_sql = "INSERT INTO customize_meal_plan (user_id, spice_level, salt_level, sugar_level) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isss", $user_id, $spice_level, $salt_level, $sugar_level);

        if ($update_stmt->execute()) {
            header("Location: success.php?message=Preferences updated successfully.");
            exit();
        } else {
            header("Location: error.php?message=Error updating preferences.");
            exit();
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
}

$conn->close();
?>
