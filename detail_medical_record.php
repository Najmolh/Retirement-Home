<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

include('config/db_connection.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT conditions, symptoms, medication, medicationList, medicationAllergies, illegalDrugs, alcoholConsumption FROM health_info WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conditions = $user['conditions'] ?? '';
$symptoms = $user['symptoms'] ?? '';
$medication = $user['medication'] ?? '';
$medicationList = $user['medicationList'] ?? '';
$illegalDrugs = $user['illegalDrugs'] ?? '';
$alcoholConsumption = $user['alcoholConsumption'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Information</title>
    <link rel="stylesheet" type="text/css" href="Style/detail_medical_record.css" />
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>
    
    <div class="container">
        <h1>Medical History</h1>
        
        <?php if ($user): ?>
            <div class="health-info-table">
                <table>
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Conditions</strong></td>
                            <td>
                                <?php
                                    $conditions = explode(",", $conditions);
                                    echo "<ul>";
                                    foreach ($conditions as $condition) {
                                        echo "<li>" . htmlspecialchars($condition) . "</li>";
                                    }
                                    echo "</ul>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Symptoms</strong></td>
                            <td>
                                <?php
                                    $symptoms = explode(",", $symptoms);
                                    echo "<ul>";
                                    foreach ($symptoms as $symptom) {
                                        echo "<li>" . htmlspecialchars($symptom) . "</li>";
                                    }
                                    echo "</ul>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Medication</strong></td>
                            <td><?php echo htmlspecialchars($medication); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Medication List</strong></td>
                            <td><?php echo htmlspecialchars($medicationList); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Medication Allergies</strong></td>
                            <td><?php echo htmlspecialchars($medicationAllergies); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Illegal Drug Use</strong></td>
                            <td><?php echo htmlspecialchars($illegalDrugs); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alcohol Consumption</strong></td>
                            <td><?php echo htmlspecialchars($alcoholConsumption); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="no-data-message">
                <p>No medical information is available at the moment. Please update your health records to view them here.</p>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>
