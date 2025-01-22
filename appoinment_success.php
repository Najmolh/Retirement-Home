<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config/db_connection.php');

$user_id = $_SESSION['user_id'] ?? null;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$query = "SELECT created_at, doctor_name, time_slot FROM appointments WHERE user_id = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Error preparing the statement: " . $conn->error);
}

// Bind the user_id parameter
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

// Bind the result to variables
$stmt->bind_result($created_at, $doctor_name, $time_slot);

// Initialize default values
$appointment_date = 'Not Available';
// $appointment_time = 'Not Available';
// $doctor_name_display = 'Not Available';

// Fetch the data and format if available
if ($stmt->fetch()) {
    $appointment_date = date('Y-m-d', strtotime($created_at)); 
    // $appointment_time = date('H:i', strtotime($time_slot));  
    // $doctor_name_display = $doctor_name;                     
    $doctor_name = $_GET['doctor_name'] ?? $doctor_name?? 'Not Provided'; 
    $appointment_time = $_GET['appointment_time'] ?? $time_slot ?? 'Not Provided'; 
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <link rel="stylesheet" href="Style/appointment_success.css">
    <style>
        /* Styling for the appointment details page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-container {
            text-align: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px 40px;
            width: 90%;
            max-width: 500px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.8rem;
            color: #4CAF50;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
        }

        .details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            text-align: left;
            font-size: 0.95rem;
        }

        .details p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <img src="image/success.png" alt="Success Icon" class="success-icon">
        <h1>Appointment Details</h1>
        <p>Here are the details of your appointment:</p>

        <div class="details">
            <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($appointment_date); ?></p>
            <p><strong>Appointment Time:</strong> <?php echo htmlspecialchars($appointment_time); ?></p>
            <p><strong>Doctor Name:</strong> <?php echo htmlspecialchars($doctor_name); ?></p>
        </div>

        <a href="home.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
