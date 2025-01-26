<?php
// Assume OTP verification logic here

// If verification is successful
header("Location: otp.php");
exit();
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

