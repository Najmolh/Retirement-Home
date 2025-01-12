<?php
    include('config/db_connection.php');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> You must be logged in to submit the form.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
              </div>';
        exit(); 
    }
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conditions = mysqli_real_escape_string($conn, $_POST['conditions']);
        $symptoms = mysqli_real_escape_string($conn, $_POST['symptoms']);
        $medication = mysqli_real_escape_string($conn, $_POST['medication']);
        $medication_list = mysqli_real_escape_string($conn, $_POST['medicationList']);
        $medication_allergies = mysqli_real_escape_string($conn, $_POST['medicationAllergies']);
        $illegal_drugs = mysqli_real_escape_string($conn, $_POST['illegalDrugs']);
        $alcohol_consumption = mysqli_real_escape_string($conn, $_POST['alcoholConsumption']);

        $sql = "INSERT INTO `health_info` 
                (`conditions`, `symptoms`, `medication`, `medicationList`, 
                 `medicationAllergies`, `illegalDrugs`, `alcoholConsumption`, `current_at`, `user_id`) 
                VALUES 
                ('$conditions', '$symptoms', '$medication', '$medication_list', 
                 '$medication_allergies', '$illegal_drugs', '$alcohol_consumption', current_timestamp(), '$user_id')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> There was an issue submitting your entry: ' . mysqli_error($conn) . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </div>';
        }
    }
?>
