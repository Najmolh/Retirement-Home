<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config/db_connection.php');

// Get the user ID from the session
$user_id = $_SESSION['user_id'] ?? null;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $health_issue = $conn->real_escape_string($_POST['address']);
    $appointment_date = $conn->real_escape_string($_POST['appointment-date']);
    $area = $conn->real_escape_string($_POST['area'] ?? '');
    $city = $conn->real_escape_string($_POST['city'] ?? '');
    $state = $conn->real_escape_string($_POST['state'] ?? '');
    $postal_code = $conn->real_escape_string($_POST['postal_code'] ?? '');

    // Insert data into the database, including user_id
    $sql = "INSERT INTO appointments (fullname, mobile, health_issue, appointment_date, area, city, state, postal_code,user_id)
            VALUES ('$fullname', '$mobile', '$health_issue', '$appointment_date', '$area', '$city', '$state', '$postal_code','$user_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: appoinment_success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
?>
