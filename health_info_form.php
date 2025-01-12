<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config/db_connection.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$user_id = $_SESSION['user_id'];


$query = "SELECT * FROM user WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
} else {
    echo "User does not exist. Please register.";
    exit();
}
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Form</title>
    <link rel="stylesheet" href="Style/health_info_form.css">
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>
<div class="form-wrapper">
    <div class="form-container">
      <h2>Medical Questionnaire</h2>
      <form id="medical-form" action="insert_health_info.php" method="POST">
      <fieldset>
        <legend>Check the conditions that apply to you or your immediate relatives:</legend>
        <label><input type="checkbox" name="conditions" value="Asthma"> Asthma</label>
        <label><input type="checkbox" name="conditions" value="Cardiac Disease"> Cardiac disease</label>
        <label><input type="checkbox" name="conditions" value="Hypertension"> Hypertension</label>
        <label><input type="checkbox" name="conditions" value="Epilepsy"> Epilepsy</label>
        <label><input type="checkbox" name="conditions" value="Cancer"> Cancer</label>
        <label><input type="checkbox" name="conditions" value="Diabetes"> Diabetes</label>
        <label><input type="checkbox" name="conditions" value="Psychiatric Disorder"> Psychiatric disorder</label>
        <label><input type="checkbox" name="conditions" value="Other"> Other</label>
      </fieldset>

      <fieldset>
        <legend>Check the symptoms that you're currently experiencing:</legend>
        <label><input type="checkbox" name="symptoms" value="Chest Pain"> Chest pain</label>
        <label><input type="checkbox" name="symptoms" value="Neurological"> Neurological</label>
        <label><input type="checkbox" name="symptoms" value="Respiratory"> Respiratory</label>
        <label><input type="checkbox" name="symptoms" value="Cardiac Disease"> Cardiac disease</label>
        <label><input type="checkbox" name="symptoms" value="Gastrointestinal"> Gastrointestinal</label>
        <label><input type="checkbox" name="symptoms" value="Cardiovascular"> Cardiovascular</label>
        <label><input type="checkbox" name="symptoms" value="Genitourinary"> Genitourinary</label>
        <label><input type="checkbox" name="symptoms" value="Other"> Other</label>
      </fieldset>

      <label>
        Are you currently taking any medication?
        <select name="medication">
          <option value="Yes">Yes</option>
          <option value="No" selected>No</option>
          <option value="Not Sure">Not sure</option>
        </select>
      </label>

      <label>
        Please list them:
        <textarea name="medicationList" placeholder="Type here"></textarea>
      </label>

      <label>
        Do you have any medication allergies?
        <select name="medicationAllergies">
          <option value="Yes">Yes</option>
          <option value="No" selected>No</option>
          <option value="Not Sure">Not sure</option>
        </select>
      </label>

      <label>
        Do you use any kind of illegal drugs or have you ever used them?
        <select name="illegalDrugs">
          <option value="Yes">Yes</option>
          <option value="No" selected>No</option>
        </select>
      </label>

      <label>
        How often do you consume alcohol?
        <select name="alcoholConsumption">
          <option value="Daily">Daily</option>
          <option value="Weekly">Weekly</option>
          <option value="Monthly">Monthly</option>
          <option value="Occasionally">Occasionally</option>
          <option value="Never" selected>Never</option>
        </select>
      </label>

      <button type="submit">Submit</button>
      </form>
    </div>
  </div>
  <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
    <script src="slider.js"></script>
</body>
</html>
