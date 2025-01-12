<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Booking System</title>
  <link rel="stylesheet" href="Style/room_type.css">
  <style>
    /* Modal styling */
    .modal {
      display: none; 
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      overflow: auto;
    }
    .modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
    }
    .close-button {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close-button:hover,
    .close-button:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    .hidden {
      display: none;
    }
    .payment-methods {
      display: flex;
      justify-content: space-around;
    }
    .payment-method {
      text-align: center;
      cursor: pointer;
    }
    .payment-method img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
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
      <!-- Example room card -->
      <div class="room">
        <img src="image/single.jpeg" alt="Single Room">
        <h3>Single Room</h3>
        <p>Price: $50/night</p>
        <p>Features: Garden View</p>
        <button class="select-room" data-price="50" onclick="openPaymentModal(50)">Select</button>
      </div>

      <div class="room">
        <img src="image/standard.jpg" alt="Standard Room">
        <h3>Standard Room</h3>
        <p>Price: $100/night</p>
        <p>Features: All facilities included</p>
        <button class="select-room" data-price="100" onclick="openPaymentModal(100)">Select</button>
      </div>

      <div class="room">
        <img src="image/premium.jpeg" alt="Premium Room">
        <h3>Premium Room</h3>
        <p>Price: $200/night</p>
        <p>Features: Garden View</p>
        <button class="select-room" data-price="200" onclick="openPaymentModal(200)">Select</button>
      </div>

      <div class="room">
        <img src="image/double.jpeg" alt="Double Room">
        <h3>Double Room</h3>
        <p>Price: $150/night</p>
        <p>Features: Private bathroom and living space</p>
        <button class="select-room" data-price="150" onclick="openPaymentModal(150)">Select</button>
      </div>

      <div class="room">
        <img src="image/suite.jpeg" alt="Suite Room">
        <h3>Suite Room</h3>
        <p>Price: $120/night</p>
        <p>Features: Sea View</p>
        <button class="select-room" data-price="120" onclick="openPaymentModal(120)">Select</button>
      </div>
    </div>
  </div>
  <footer>
        <?php include('Template/footer.php'); ?>
    </footer>

  <!-- Payment Modal -->
  <div id="payment-modal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="closePaymentModal()">&times;</span>
      <h1>Choose Payment Method</h1>
      <div class="payment-methods">
        <div class="payment-method" onclick="showPaymentForm('bkash')">
          <img class="logo" src="image/bkash.jpeg" alt="Bkash">
          <p>Bkash</p>
        </div>
        <div class="payment-method" onclick="showPaymentForm('nagad')">
          <img class="logo" src="image/nagad.jpeg" alt="Nagad">
          <p>Nagad</p>
        </div>
        <div class="payment-method" onclick="showPaymentForm('visa')">
          <img class="logo" src="image/visa.jpeg" alt="Visa">
          <p>Visa</p>
        </div>
      </div>

      <!-- Payment Form -->
      <form id="payment-form" class="hidden">
        <div class="form-group">
          <label for="phone-number">Phone Number:</label>
          <input type="text" id="phone-number" name="phone-number" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
          <label for="amount">Amount (Taka):</label>
          <input type="number" id="amount" name="amount" readonly>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="button" onclick="confirmPayment()" class="select-room">Confirm Payment</button>
      </form>

      <!-- Confirmation Message -->
      <div id="confirmation-message" class="hidden">
        <p>Payment Successful! Thank you for your booking.</p>
      </div>
    </div>
  </div>

  <script>
    let selectedPrice = 0; // Store the selected price

    // Open the payment modal and show selected price
    function openPaymentModal(price) {
      selectedPrice = price; // Store the price
      document.getElementById('payment-modal').style.display = "block";
      document.getElementById('amount').value = selectedPrice; // Show price in the payment form
    }

    // Close the payment modal
    function closePaymentModal() {
      document.getElementById('payment-modal').style.display = "none";
    }

    // Show the payment form based on selected method
    function showPaymentForm(method) {
      document.getElementById('payment-form').classList.remove('hidden');
      document.getElementById('confirmation-message').classList.add('hidden');
      // Optionally, you can display the selected method
      alert('Selected payment method: ' + method);
    }

    // Confirm payment and show success message
    function confirmPayment() {
      // Here you can add logic to handle the payment process (e.g., API call)
      document.getElementById('payment-form').classList.add('hidden');
      document.getElementById('confirmation-message').classList.remove('hidden');
    }
  </script>
</body>
</html>
