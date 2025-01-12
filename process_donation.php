<?php

include('db_connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fund_type = isset($_POST['fund_type']) ? htmlspecialchars($_POST['fund_type']) : 'General Donation';
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.00;
    $payment_method = isset($_POST['payment']) ? htmlspecialchars($_POST['payment']) : 'N/A';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Anonymous';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'N/A';
    $transaction_date = date('Y-m-d H:i:s');
    $verification_token = bin2hex(random_bytes(16));

    if ($amount > 0 && !empty($payment_method) && !empty($name) && !empty($email)) {
       
        $sql = "INSERT INTO donation (donation_type, amount, fund_purpose, payment_method, transaction_date, verified, email, verification_token)
        VALUES (?, ?, ?, ?, ?, 0, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sdsssss", $fund_type, $amount, $fund_type, $payment_method, $transaction_date, $email, $verification_token);

            if ($stmt->execute()) {
              
                $verification_link = "http://yourdomain.com/verify_donation.php?token=" . $verification_token;
                $subject = "Donation Verification";
                $headers = "From: no-reply@yourdomain.com";

            
                ini_set('SMTP', 'smtp.yourdomain.com');
                ini_set('smtp_port', '25');
                ini_set('sendmail_from', 'no-reply@yourdomain.com');

                if (mail($email, $subject, $message, $headers)) {
                    echo "<h3>A verification email has been sent to $email. Please verify your email to complete the donation.</h3>";
                } else {
                    echo "<h3>Error: Failed to send verification email.</h3>";
                }
            }
             else {
                echo "<h3>Error: Unable to save your donation. Please try again.</h3>";
            }
            $stmt->close();
        } else {
            echo "<h3>Error: Unable to prepare the database query.</h3>";
        }
    } else {
        echo "<h3>Error: Invalid input. Please fill all required fields and try again.</h3>";
    }
    $conn->close();
} else {
    echo "<h3>Invalid request method.</h3>";
}
?>
