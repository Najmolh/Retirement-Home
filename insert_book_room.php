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
    // Capture the form data
    $room_type = $_POST['room_type'];
    $start_month = $_POST['start_month'];
    $duration = $_POST['duration'];
    $payment_method = $_POST['payment_method'];
    $user_id = $_SESSION['user_id']; // Assuming user is logged in
    $total_price = $_POST['total-price'] ?? 0;

    // Display the values for debugging or confirmation
    // echo "<h2>Booking Details</h2>";
    // echo "Room Type: " . $room_type . "<br>";
    // echo "Start Month: " . $start_month . "<br>";
    // echo "Duration: " . $duration . " months<br>";
    // echo "Payment Method: " . $payment_method . "<br>";
    // echo "User ID: " . $user_id . "<br>";
    // echo "total_price: " . $total_price . "<br>";

    // Insert the data into the database
    $sql = "INSERT INTO room_booking (room_type, start_month, duration, payment_method, user_id,total_price)
            VALUES (?, ?, ?, ?, ?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssisis", $room_type, $start_month, $duration, $payment_method, $user_id,$total_price);
        
        if ($stmt->execute()) {
            header("Location: room_type.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
