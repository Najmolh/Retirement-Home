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

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Include database connection
require 'config/db_connection.php'; // Adjust this to your actual database connection file

// Get the user_id from the session
$user_id = $_SESSION['user_id'];

// Generate a random OTP
$otp = rand(100000, 999999);

try {
    // Collect the email and name from the user table using the session user_id
    $query = "SELECT email, name FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        throw new Exception('User details not found.');
    }

    $email = $user['email'];
    $name = $user['name'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to SMTP::DEBUG_SERVER for debugging
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = 'mabedin221455@bscse.uiu.ac.bd';
    $mail->Password = 'iammdsazzad'; // Use app-specific password if using Gmail

    // Recipients
    $mail->setFrom('mabedin221455@bscse.uiu.ac.bd', 'Your Organization');
    $mail->addAddress($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "Hello $name,<br><br>Your OTP is: <strong>$otp</strong><br><br>Thank you!";
    $mail->AltBody = "Hello $name,\n\nYour OTP is: $otp\n\nThank you!";

    // Send the email
    $mail->send();
    // echo 'OTP has been sent successfully.';

    // Optionally, you can store the OTP in the database for validation later
    $query = "UPDATE user SET otp = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $otp, $user_id);
    $stmt->execute();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} catch (mysqli_sql_exception $e) {
    echo "Database Error: " . $e->getMessage();
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style/verify_otp.css?v=1" />
    <title>OTP Verification</title>

</head>
<body>
    <div class="otp-container">
        <form action="otp_verification.php" method="POST">
            <h2>OTP Verification</h2>
            <p>We have sent an OTP to your email. Please enter it below to complete your donation.</p>

            <!-- Hidden field to store the user's email -->
            <input type="hidden" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <div class="form-group">
                <label for="otp">Enter OTP</label>
                <input type="text" id="otp" name="otp" placeholder="Enter 6-digit OTP" maxlength="6" required>
            </div>

            <button type="submit" class="verify-btn">Verify OTP</button>
            <p>Didn't receive the OTP? Click the button below to resend it.</p>

            <button type="button" id="resendOtpBtn" onclick="resendOtp()">Resend OTP</button>
            <p id="timer"></p>
    </div>


    <script>
        // Timer logic for resending OTP
        let timerElement = document.getElementById('timer');
        let resendButton = document.getElementById('resendOtpBtn');
        let timer = 30; // 30 seconds timer

        function startTimer() {
            resendButton.disabled = true; // Disable resend button
            let interval = setInterval(() => {
                timerElement.textContent = `You can resend OTP in ${timer--} seconds.`;
                if (timer < 0) {
                    clearInterval(interval);
                    timerElement.textContent = "";
                    resendButton.disabled = false; // Enable resend button
                    // timer = 10; // Reset timer
                }
            }, 1000);
        }

        function resendOtp() {
            alert("OTP has been resent to your email!");
            startTimer();
        }

        // Start timer initially
        startTimer();
    </script>
</body>
</html>

