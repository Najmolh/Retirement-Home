<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/donation_payment_css.css">
    <title>Donation Form</title>
</head>
<body>
    <section class="donation-form">
        <?php
        $fund_type = isset($_GET['fund_type']) ? htmlspecialchars($_GET['fund_type']) : 'General Donation';
        ?>
        <h2>Donate to: <?php echo $fund_type; ?></h2>
        </div>
        <p class="notice">Notice: Please try to provide your valid information</p>

        <form action="verify_otp.php" method="POST">
            <input type="hidden" name="fund_type" value="<?php echo htmlspecialchars($fund_type); ?>">

            <div class="form-group">
                <label for="amount">Enter Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount" min="1" step="0.01" required>
                <small>Please Enter The Amount</small>
            </div>

            <div class="form-group">
                <label>Select Payment Method</label>
                <div class="payment-methods">
                    <label><input type="radio" name="payment" value="offline" required> Offline Donation</label>
                    <label><input type="radio" name="payment" value="test" required> Test Donation</label>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Personal Info</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <button type="submit" class="donate-btn">Donate Now</button>
        </form>
    </section>
</body>
</html>