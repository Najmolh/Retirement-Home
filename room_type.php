<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Booking System</title>
  <!-- <link rel="stylesheet" href="Style/room_type.css"> -->
  <link rel="stylesheet" type="text/css" href="Style/room_type.css?v=1" />
  <script src="price_calculation.js"></script>
  <style>
   /* Modal Background */
   .modal {
    display: block;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow-y: auto; /* Enable vertical scrolling */
}


/* Modal Content */
.modal-content {
    background: #fff;
    margin: 5% auto;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    position: relative;
    text-align: center;
}

/* Close Button */
.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: #333;
}

/* Payment Options */
.payment-options {
    display: flex;
    justify-content: space-around;
    margin: 20px 0;
}

.payment-option {
    cursor: pointer;
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 100px;
    transition: all 0.3s;
}

.payment-option img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 5px;
}

.payment-option:hover {
    background: #f7f7f7;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Payment Forms */
.payment-form {
    text-align: left;
    margin: 20px auto;
    width: 90%; /* Ensure the form is responsive */
}

.payment-form h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.payment-form label {
    font-size: 14px;
    display: block;
    margin: 10px 0 5px;
}

.payment-form input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

/* Confirm Button */
.btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
}

.btn:hover {
    background-color: #45a049;
}

  </style>
</head>
<body>
<header>
    <?php include('Template/header.php'); ?>
</header>

<!-- Your Room Selection page -->
<div class="room-selection">
    <h1>All Rooms</h1>
    <div class="rooms">

    <div class="room">
    <img src="image/single.jpeg" alt="Single Room">
    <h3>Single Room</h3>
    <p>Price: $1500/month</p>
    <!-- Start Month Option -->
    <label for="start-month">Start Month:</label>
    <select class="start-month" id="start-month" name="start-month" class="start-month">
        <option value="" disabled selected>Select</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>

    <!-- Duration -->
    <label for="duration" id="duration">Duration (months):</label>
    <input type="number" class="duration" value="1" min="1" onchange="calculateTotalPrice(this, 1500)">

    <!-- Total Price -->
    <p>Total Price: <span class="total-price"> $1500</span></p>

    <!-- Hidden Form for Booking -->
    <form action="insert_book_room.php" method="POST" class="booking-form" id="bookingForm">
                <input type="hidden" name="room_type" value="Single Room">
                <input type="hidden" name="start_month" class="start-month-hidden" id="start-month-hidden">
                <input type="hidden" name="duration" class="duration-hidden" id="duration-hidden">
                <input type="hidden" name="payment_method" id="payment-method-hidden">
                <input type="hidden" name="total-price" class="total-price-hidden" id="total-price-hidden">

                <button type="submit" class="book-room" onclick="openPaymentModal(event)">Book</button>
        </form>
</div>
        <!-- Standard Room -->
        <div class="room">
            <img src="image/standard.jpg" alt="Standard Room">
            <h3>Standard Room</h3>
            <p>Price: $3000/month</p>

            <label for="start-month">Start Month:</label>
            <select class="start-month" id="start-month" name="start-month" class="start-month">
                <option value="" disabled selected>Select</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <!-- Duration -->
            <label for="duration" id="duration">Duration (months):</label>
            <input type="number" class="duration" value="1" min="1" onchange="calculateTotalPrice(this, 3000)">

            <!-- Total Price -->
            <p>Total Price: <span class="total-price"> $3000</span></p>
            <form action="insert_book_room.php" method="POST" class="booking-form" id="bookingForm">
                <input type="hidden" name="room_type" value="Standard Room">
                <input type="hidden" name="start_month" class="start-month-hidden" id="start-month-hidden">
                <input type="hidden" name="duration" class="duration-hidden" id="duration-hidden">
                <input type="hidden" name="payment_method" id="payment-method-hidden">
                <input type="hidden" name="total-price" class="total-price-hidden" id="total-price-hidden">

                <button type="submit" class="book-room" onclick="openPaymentModal(event)">Book</button>
            </form>
        </div>

        <!-- Premium Room -->
        <div class="room">
            <img src="image/premium.jpeg" alt="Premium Room">
            <h3>Premium Room</h3>
            <p>Price: $6000/month</p>

            <label for="start-month">Start Month:</label>
            <select class="start-month" id="start-month" name="start-month" class="start-month">
                <option value="" disabled selected>Select</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <label for="duration" id="duration">Duration (months):</label>
            <input type="number" class="duration" value="1" min="1" onchange="calculateTotalPrice(this, 6000)">

            <p>Total Price: <span class="total-price">$6000</span></p>
            <form action="insert_book_room.php" method="POST" class="booking-form" id="bookingForm">
                <input type="hidden" name="room_type" value="Premium Room">
                <input type="hidden" name="start_month" class="start-month-hidden" id="start-month-hidden">
                <input type="hidden" name="duration" class="duration-hidden" id="duration-hidden">
                <input type="hidden" name="payment_method" id="payment-method-hidden">
                <input type="hidden" name="total-price" class="total-price-hidden" id="total-price-hidden">

                <button type="submit" class="book-room" onclick="openPaymentModal(event)">Book</button>
            </form>
        </div>

        <!-- Double Room -->
        <div class="room">
            <img src="image/double.jpeg" alt="Double Room">
            <h3>Double Room</h3>
            <p>Price: $4500/month</p>

            <label for="start-month">Start Month:</label>
            <select class="start-month" id="start-month" name="start-month" class="start-month">
                <option value="" disabled selected>Select</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <label for="duration" id="duration">Duration (months):</label>
            <input type="number" class="duration" value="1" min="1" onchange="calculateTotalPrice(this, 4500)">

            <p>Total Price: <span class="total-price">$4500</span></p>
            <form action="insert_book_room.php" method="POST" class="booking-form" id="bookingForm">
                <input type="hidden" name="room_type" value="Double Room">
                <input type="hidden" name="start_month" class="start-month-hidden" id="start-month-hidden">
                <input type="hidden" name="duration" class="duration-hidden" id="duration-hidden">
                <input type="hidden" name="payment_method" id="payment-method-hidden">
                <input type="hidden" name="total-price" class="total-price-hidden" id="total-price-hidden">

                <button type="submit" class="book-room" onclick="openPaymentModal(event)">Book</button>
        </form>
        </div>

        <!-- Suite Room -->
        <div class="room">
            <img src="image/suite.jpeg" alt="Suite Room">
            <h3>Suite Room</h3>
            <p>Price: $3600/month</p>

            <label for="start-month">Start Month:</label>
            <select class="start-month" id="start-month" name="start-month" class="start-month">
                <option option value="" disabled selected>Select</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

            <label for="duration" id="duration">Duration (months):</label>
            <input type="number" class="duration" value="1" min="1" onchange="calculateTotalPrice(this, 3600)">

            <p>Total Price: <span class="total-price">$3600</span></p>
            <form action="insert_book_room.php" method="POST" class="booking-form" id="bookingForm">
                <input type="hidden" name="room_type" value="Suit Room">
                <input type="hidden" name="start_month" class="start-month-hidden" id="start-month-hidden">
                <input type="hidden" name="duration" class="duration-hidden" id="duration-hidden">
                <input type="hidden" name="payment_method" id="payment-method-hidden">
                <input type="hidden" name="total-price" class="total-price-hidden" id="total-price-hidden">

                <button type="submit" class="book-room" onclick="openPaymentModal(event)">Book</button>
        </form>
        </div>
    </div>
</div>

<footer>
    <?php include('Template/footer.php'); ?>
</footer>


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
                <label for="bkash-amount">Amount:</label>
                <input type="number" id="bkash-amount" class="amount" readonly>
            </div>

            <!-- PayPal Form -->
            <div id="paypalForm" class="payment-form" style="display: none;">
                <h3>PayPal Payment</h3>
                <label for="paypal-email">Email:</label>
                <input type="email" id="paypal-email" name="paypal-email" placeholder="Enter your email">
                <label for="paypal-amount">Amount:</label>
                <input type="number" id="paypal-amount" name="paypal-amount" placeholder="Enter amount">
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
                <label for="visa-amount">Amount:</label>
                <input type="number" id="visa-amount" name="visa-amount" placeholder="Enter amount">
            </div>
        </div>

        <button class="btn" onclick="confirmPayment()">Confirm Payment</button>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
    // Loop through all rooms
    const rooms = document.querySelectorAll(".room");

    rooms.forEach((room) => {
        const startMonthDropdown = room.querySelector(".start-month");
        const hiddenStartMonthInput = room.querySelector(".start-month-hidden");

        const durationInput = room.querySelector(".duration");
        const hiddenDurationInput = room.querySelector(".duration-hidden");

        const RoomTotalPrice = room.querySelector(".total-price");
        const hiddenRoomTotalPriceInput = room.querySelector(".total-price-hidden");

        // Get the monthly price from the displayed text
        const monthlyPriceText = room.querySelector("p").textContent;
        const monthlyPrice = parseInt(monthlyPriceText.match(/\d+/)[0], 10); // Extract price from "$3600/month"

        // Update start month hidden input when dropdown changes
        startMonthDropdown.addEventListener("change", (event) => {
            const selectedMonth = event.target.value;
            hiddenStartMonthInput.value = selectedMonth;
        });

        // Update duration hidden input and calculate total price
        durationInput.addEventListener("input", () => {
            const duration = parseInt(durationInput.value, 10) || 1; // Default to 1 if invalid
            const totalPrice = duration * monthlyPrice;

            // Update displayed total price
            RoomTotalPrice.textContent = `$${totalPrice}`;

            // Update hidden inputs
            hiddenDurationInput.value = duration;
            hiddenRoomTotalPriceInput.value = totalPrice;
        });
    });
});



    // Run updateTotalPrice function when the page loads to set the initial values
    window.onload = updateTotalPrice;


    // Open the modal
    function openPaymentModal() {
        document.getElementById('paymentModal').style.display = 'block';
    }

    // Close the modal
    function closePaymentModal() {
        document.getElementById('paymentModal').style.display = 'none';
    }

    // Select a payment method
    function selectPaymentMethod(method) {
        alert('You selected ' + method + ' as your payment method.');
    }

    // Confirm payment
    function confirmPayment() {
        alert('Payment confirmed! Redirecting to a confirmation page...');
        window.location.href = "confirmation.php"; // Redirect to confirmation page
    }

    // select payment method and open particular form 
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

function confirmPayment() {
    const bkashPhone = document.getElementById('bkash-phone');
    const paypalEmail = document.getElementById('paypal-email');
    const visaNumber = document.getElementById('visa-number');

    if (bkashPhone && bkashPhone.value) {
        alert(`Bkash Payment Confirmed for Phone: ${bkashPhone.value}`);
    } else if (paypalEmail && paypalEmail.value) {
        alert(`PayPal Payment Confirmed for Email: ${paypalEmail.value}`);
    } else if (visaNumber && visaNumber.value) {
        alert(`Visa Payment Confirmed for Card: ${visaNumber.value}`);
    } else {
        alert('Please fill out the required fields.');
    }

    // Close modal after confirmation
    closePaymentModal();
}

function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
}

</script>

<!-- <script>
// Store the selected room price
let selectedPrice = 0;

// Open the payment modal with selected room price
function openPaymentModal(price) {
  selectedPrice = price;  // Store the price
  document.getElementById("payment-modal").style.display = "block";
  document.getElementById("amount").value = selectedPrice; // Set price in the payment form
}

// Close the payment modal
function closePaymentModal() {
  document.getElementById("payment-modal").style.display = "none";
  document.getElementById("payment-form").classList.add("hidden");
  document.getElementById("confirmation-message").classList.add("hidden");
}

// Show the payment form based on selected method
function showPaymentForm(method) {
  document.getElementById("payment-form").classList.remove("hidden");
  document.getElementById("confirmation-message").classList.add("hidden");
  alert("Selected payment method: " + method);
}

// Confirm the payment and proceed with OTP
function confirmPayment() {
  const phoneNumber = document.getElementById("phone-number").value;

  if (!phoneNumber) {
    alert("Please enter your phone number.");
    return;
  }

  // Simulate sending OTP (In a real application, integrate backend for OTP)
  alert("OTP sent to your phone. Please check your messages.");
  document.getElementById("confirmation-message").classList.remove("hidden");
  document.getElementById("payment-form").classList.add("hidden");

  // Final booking action (e.g., saving booking in the database) can be done here
  // You can send the booking details (user_id, room_type, start_month, etc.) to your server here
  console.log("Booking confirmed for price: " + selectedPrice);
}
</script> -->

</body>
</html>
