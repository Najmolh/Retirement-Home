<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Gateway</title>
  <link rel="stylesheet" href="Style/payment.css">
</head>
<body>
  <div class="container">
    <h1>Choose Payment Method</h1>
    <div class="payment-methods">
      <div class="payment-method" onclick="showPaymentForm('bkash')">Bkash</div>
      <div class="payment-method" onclick="showPaymentForm('nagad')">Nagad</div>
      <div class="payment-method" onclick="showPaymentForm('visa')">Visa Card</div>
    </div>

    <form id="payment-form" class="hidden">
      <div id="bkash-form" class="payment-specific-form hidden">
        <div class="form-group">
          <label for="phone-number">Phone Number:</label>
          <input type="text" id="phone-number" name="phone-number" placeholder="Enter your phone number" required>
        </div>
      </div>
      
      <div id="nagad-form" class="payment-specific-form hidden">
        <div class="form-group">
          <label for="phone-number">Phone Number:</label>
          <input type="text" id="phone-number" name="phone-number" placeholder="Enter your phone number" required>
        </div>
      </div>

      <div id="visa-form" class="payment-specific-form hidden">
        <div class="form-group">
          <label for="card-number">Card Number:</label>
          <input type="text" id="card-number" name="card-number" placeholder="Enter your card number" required>
        </div>
        <div class="form-group">
          <label for="expiry-date">Expiry Date:</label>
          <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
        </div>
        <div class="form-group">
          <label for="cvv">CVV:</label>
          <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>
        </div>
      </div>

      <div class="form-group">
        <label for="amount">Amount (Taka):</label>
        <input type="number" id="amount" name="amount" placeholder="Enter the amount" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="button" onclick="confirmPayment()">Confirm Payment</button>
    </form>

    <div id="confirmation-message" class="confirmation-message hidden">Payment Successful! Thank you for your booking.</div>
  </div>

  <script>
    function showPaymentForm(method) {
      document.getElementById('payment-form').classList.remove('hidden');
      document.getElementById('bkash-form').classList.add('hidden');
      document.getElementById('nagad-form').classList.add('hidden');
      document.getElementById('visa-form').classList.add('hidden');

      if (method === 'bkash') {
        document.getElementById('bkash-form').classList.remove('hidden');
      } else if (method === 'nagad') {
        document.getElementById('nagad-form').classList.remove('hidden');
      } else if (method === 'visa') {
        document.getElementById('visa-form').classList.remove('hidden');
      }
    }

    function confirmPayment() {
      const phoneNumber = document.getElementById('phone-number').value;
      const amount = document.getElementById('amount').value;
      const password = document.getElementById('password').value;
      const cardNumber = document.getElementById('card-number') ? document.getElementById('card-number').value : '';
      const expiryDate = document.getElementById('expiry-date') ? document.getElementById('expiry-date').value : '';
      const cvv = document.getElementById('cvv') ? document.getElementById('cvv').value : '';

      if (!phoneNumber || !amount || !password || (method === 'visa' && (!cardNumber || !expiryDate || !cvv))) {
        alert('Please fill in all fields.');
        return;
      }

      document.getElementById('payment-form').classList.add('hidden');
      document.getElementById('confirmation-message').classList.remove('hidden');
    }
  </script>
</body>
</html>
