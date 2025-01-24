<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

// Include database connection
require 'config/db_connection.php'; // Adjust this to your actual database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $entered_otp = $_POST['otp']; // OTP entered by the user

    try {
        // Retrieve the stored OTP from the database
        $query = "SELECT otp FROM user WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user) {
            throw new Exception('User not found.');
        }

        $stored_otp = $user['otp'];

        // Verify the entered OTP
        if ($entered_otp == $stored_otp) {
            $success_message = urlencode("OTP verified successfully!");
            header("Location: success.php?message=$success_message");
            exit();
        } else {
            echo "Invalid OTP. Please try again.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Database Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>