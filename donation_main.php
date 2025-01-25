<?php
include('config/db_connection.php');

// $donation_type = 'Nutritional Support Fund';
// $sql = "SELECT amount FROM donation WHERE donation_type = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("s", $donation_type);
// $stmt->execute();
// $result = $stmt->get_result();

// $fund_raised = 0;
// if ($row = $result->fetch_assoc()) {
//     $fund_raised = $row['amount'];
// }

$sql = "SELECT donation_type, amount FROM donation";
$result = $conn->query($sql);

$donations = []; // Store donation data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $donations[$row['donation_type']] = $row['amount'];
    }
}

// $stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
    <link rel="stylesheet" href="Style/donation_main_style.css">
    <link rel="stylesheet" href="Style/payment_modal.css">
    <script src="your-javascript-file.js" defer></script> 
    

</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>
    <section class="campaign-section">
    <div class="campaign-card">
        <img class="card_img" src="image/special_need_fund.png" alt="Special Needs Funds">
        <h3>Special Need Funds</h3>
        <p>Fund raised: $<?php echo number_format($donations['Special Need Funds'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>

    <div class="campaign-card">
        <img class="card_img" src="image/general_operating_fund.webp" alt="General Operating Funds">
        <h3>General Operating Funds</h3>
        <p>Fund raised: $<?php echo number_format($donations['General Operating Funds'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>

    <div class="campaign-card">
        <img class="card_img" src="image/health_care.jpg" alt="Health Care Funds">
        <h3>Health Care Funds</h3>
        <p>Fund raised: $<?php echo number_format($donations['Health Care Funds'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>

    <div class="campaign-card">
        <img src="image/elder_caring_fund.webp" alt="Elder Care Funding">
        <h3>Elder Care Funding</h3>
        <p>Fund raised: $<?php echo number_format($donations['Elder Care Funding'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>

    <div class="campaign-card">
        <img src="image/central_improvement_fund.jpg" alt="Capital Improvement Fund">
        <h3>Capital Improvement Fund</h3>
        <p>Fund raised: $<?php echo number_format($donations['Capital Improvement Fund'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>

    <div class="campaign-card">
        <img src="image/nutration_support.jpeg" alt="Nutritional Support Fund">
        <h3>Nutritional Support Fund</h3>
        <p>Fund raised: $<?php echo number_format($donations['Nutritional Support Fund'] ?? 0, 2); ?></p>
        <button class="donate-btn" onclick="openPaymentModal(event)">Donate</button>
    </div>
</section>


    <!-- Modal for Payment -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePaymentModal()">&times;</span>
            <h2>Select a Payment Method</h2>
            <div class="payment-options">
                <div class="payment-option" onclick="selectPaymentMethod('Bkash')">
                    <img src="image/bkash.svg" alt="Bkash">
                    <p>Bkash</p>
                </div>
                <div class="payment-option" onclick="selectPaymentMethod('PayPal')">
                    <img src="image/paypal.png" alt="PayPal">
                    <p>PayPal</p>
                </div>
                <div class="payment-option" onclick="selectPaymentMethod('Visa')">
                    <img src="image/visa.jpeg" alt="Visa">
                    <p>Visa</p>
                </div>
            </div>

            <!-- Payment Forms -->
            <div id="paymentForms" style="margin-top: 20px; display: none;">
                <!-- Bkash Form -->
                <div id="bkashForm" class="payment-form" style="display: none;">
                    <h3>Bkash Payment</h3>
                    <label for="bkash-phone">Phone Number:</label>
                    <input type="text" id="bkash-phone" name="bkash-phone" placeholder="Enter your phone number">
                    <label for="bkash-amount-input">Enter Amount:</label>
                    <input type="number" id="bkash-amount-input" name="bkash-amount-input" placeholder="Enter the amount" min="1" required>
                </div>

                <!-- PayPal Form -->
                <div id="paypalForm" class="payment-form" style="display: none;">
                    <h3>PayPal Payment</h3>
                    <label for="paypal-email">Email:</label>
                    <input type="email" id="paypal-email" name="paypal-email" placeholder="Enter your email">
                    <label for="paypal-amount-input">Enter Amount:</label>
                    <input type="number" id="paypal-amount-input" name="paypal-amount-input" placeholder="Enter the amount" min="1" required>
                </div>

                <!-- Visa Form -->
                <div id="visaForm" class="payment-form" style="display: none;">
                    <h3>Visa Payment</h3>
                    <label for="visa-number">Card Number:</label>
                    <input type="text" id="visa-number" name="visa-number" placeholder="Enter your Visa card number">
                    <label for="visa-expiry">Expiry Date:</label>
                    <input type="month" id="visa-expiry" name="visa-expiry">
                    <label for="visa-cvv">CVV:</label>
                    <input type="text" id="visa-cvv" name="visa-cvv" placeholder="Enter CVV">
                    <label for="visa-amount-input">Enter Amount:</label>
                    <input type="number" id="visa-amount-input" name="visa-amount-input" placeholder="Enter the amount" min="1" required>
                </div>
            <button class="btn" onclick="confirmPayment()">Confirm Payment</button>
        </div>
    </div>
    </div>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
    
    <!-- <script src="payment-modal.js"></script> -->
    <script>
    // Open the modal when the "Donate" button is clicked
    function openPaymentModal(evt) {
        // Get the closest form or relevant element where you want to submit data later
        formEl = evt.target.closest('.campaign-card').querySelector('.booking-form');
        document.getElementById('paymentModal').style.display = 'block'; // Show the modal
    }

    // Close the modal
    function closePaymentModal() {
        document.getElementById('paymentModal').style.display = 'none';
        formEl = null;
    }

    // Select a payment method and show the corresponding form
    function selectPaymentMethod(method) {
        // Show the payment forms container
        document.getElementById('paymentForms').style.display = 'block';
        // Hide all forms initially
        document.getElementById('bkashForm').style.display = 'none';
        document.getElementById('paypalForm').style.display = 'none';
        document.getElementById('visaForm').style.display = 'none';

        // Show the selected payment form
        if (method === 'Bkash') {
            document.getElementById('bkashForm').style.display = 'block';
        } else if (method === 'PayPal') {
            document.getElementById('paypalForm').style.display = 'block';
        } else if (method === 'Visa') {
            document.getElementById('visaForm').style.display = 'block';
        }
    }

    // Confirm payment and process accordingly
    function confirmPayment() {
        const bkashPhone = document.getElementById('bkash-phone');
        const paypalEmail = document.getElementById('paypal-email');
        const visaNumber = document.getElementById('visa-number');

        if (bkashPhone && bkashPhone.value) {
            formEl.submit(); // Submit the form if Bkash fields are filled
        } else if (paypalEmail && paypalEmail.value) {
            formEl.submit(); // Submit the form if PayPal fields are filled
        } else if (visaNumber && visaNumber.value) {
            formEl.submit(); // Submit the form if Visa fields are filled
        } else {
            alert('Please fill out the required fields.');
        }

        // Close modal after confirmation
        closePaymentModal();
    }
</script>


</body>
</html>
