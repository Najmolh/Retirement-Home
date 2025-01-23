<?php
// Database connection
include('config/db_connection.php');

if (isset($_POST['assign'])) {
    $id = $_POST['assign']; 
    $doctor_name = $_POST['doctor_name'][$id];
    $time_slot = $_POST['time_slot'][$id]; 

    // Update the database with assigned doctor_name and time_slot
    $query = "UPDATE appointments SET doctor_name = ?, time_slot = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $doctor_name, $time_slot, $id); // Bind `id` here

    if ($stmt->execute()) {
        echo "Appointment updated successfully!";
        // Redirect after successful update
        header("Location: admin_manage_users.php");
        exit();
    } else {
        echo "Error updating appointment: " . $stmt->error;
    }
}
?>
