<?php
// Include database connection
include('config/db_connection.php');

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

// Initialize variables
$email = '';
$otp = '';
$fund_type = '';
$amount = 0.00;
$payment_method = '';
$name = '';

// Handle form submission from donation_payment.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['otp'])) {
    $fund_type = htmlspecialchars($_POST['fund_type']);
    $amount = floatval($_POST['amount']);
    $payment_method = htmlspecialchars($_POST['payment']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $transaction_date = date('Y-m-d H:i:s');
    $verification_token = bin2hex(random_bytes(16)); // Generate a unique token
    $otp = rand(100000, 999999); // Generate a 6-digit OTP
    $otp_expiry = date('Y-m-d H:i:s', strtotime('+10 minutes')); // OTP expiry time

    // Insert unverified donation into the database
    $sql = "INSERT INTO donation (donation_type, amount, fund_purpose, payment_method, transaction_date, email, verification_token, otp, otp_expiry, donor_name)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sdssssssss", $fund_type, $amount, $fund_type, $payment_method, $transaction_date, $email, $verification_token, $otp, $otp_expiry, $name);
        if ($stmt->execute()) {
            // Send OTP email
            $subject = "Donation OTP Verification";
            $message = "Dear $name,\n\nThank you for your donation. Your OTP is: $otp\n\nBest regards,\nYour Organization";

            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->SMTPAuth = true;
                $mail->Username = 'mabedin221455@bscse.uiu.ac.bd'; // Your email address
                $mail->Password = 'iammdsazzad'; // Your app-specific password

                //Recipients
                $mail->setFrom('mabedin221455@bscse.uiu.ac.bd', 'Your Organization');
                $mail->addAddress($email, $name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = nl2br($message);
                $mail->AltBody = strip_tags($message);

                $mail->send();
                
            } catch (Exception $e) {
                echo "<h3>Error: Failed to send verification email. Mailer Error: {$mail->ErrorInfo}</h3>";
            }
        } else {
            echo "<h3>Error: Unable to save your donation. Please try again.</h3>";
        }
        $stmt->close();
    }
}

// Handle OTP verification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Verify the OTP
    $sql = "SELECT otp, otp_expiry FROM donation WHERE email = ? AND otp = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $email, $otp);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_otp, $db_otp_expiry);
        $stmt->fetch();

        if ($stmt->num_rows > 0 && strtotime($db_otp_expiry) > time()) {
            // OTP is correct and not expired, update the donation status
            $update_sql = "UPDATE donation SET verified = 1 WHERE email = ?";
            if ($update_stmt = $conn->prepare($update_sql)) {
                $update_stmt->bind_param("s", $email);
                $update_stmt->execute();
                $update_stmt->close();
                
                include('donation_success.php');
            }
        } else {
            echo "<h3>Invalid or expired OTP. Please try again.</h3>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="Style/verify_otp.css">
</head>
<body>
    <div class="otp-container">
        <form action="verify_otp.php" method="POST">
            <h2>OTP Verification</h2>
            <p>We have sent an OTP to your email. Please enter it below to complete your donation.</p>
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="form-group">
                <label for="otp">Enter OTP</label>
                <input type="text" id="otp" name="otp" placeholder="Enter 6-digit OTP" maxlength="6" required>
            </div>
            <button type="submit" class="verify-btn">Verify OTP</button>
        </form>
    </div>
</body>
</html>