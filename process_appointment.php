<?php
include('config/db_connection.php');

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

    // Insert data into the database
    $sql = "INSERT INTO appointments (fullname, mobile, health_issue, appointment_date, area, city, state, postal_code)
            VALUES ('$fullname', '$mobile', '$health_issue', '$appointment_date', '$area', '$city', '$state', '$postal_code')";

    if ($conn->query($sql) === TRUE) {
        
        include('appoinment_success.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
