<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-content {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  width: 40%;
  position: relative;
}

.hidden {
  display: none;
}

.close-button {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
  color: #333;
}

.payment-methods {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.payment-method {
  cursor: pointer;
  text-align: center;
}

.logo {
  width: 80px;
  height: 50px;
}
</style>

<body>
<div id="payment-modal" class="modal hidden">
  <div class="modal-content">
    <span class="close-button">&times;</span>
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
      <button type="button" onclick="confirmPayment()">Confirm Payment</button>
    </form>
    <div id="confirmation-message" class="hidden">
      <p>Payment Successful! Thank you for your booking.</p>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", () => {
  const selectRoomButtons = document.querySelectorAll(".select-room");
  const paymentModal = document.getElementById("payment-modal");
  const closeModalButton = document.querySelector(".close-button");
  const paymentForm = document.getElementById("payment-form");
  const confirmationMessage = document.getElementById("confirmation-message");

  // Show modal when "Select" button is clicked
  selectRoomButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const roomPrice = button.getAttribute("data-price");

      // Pre-fill the amount in the payment form
      document.getElementById("amount").value = roomPrice;

      // Show the modal
      paymentModal.style.display = "flex";
    });
  });

  // Close the modal when the close button is clicked
  closeModalButton.addEventListener("click", () => {
    paymentModal.style.display = "none";
    paymentForm.classList.add("hidden");
    confirmationMessage.classList.add("hidden");
  });

  // Show payment form when a payment method is selected
  window.showPaymentForm = (method) => {
    console.log(`Payment method selected: ${method}`);
    paymentForm.classList.remove("hidden");
  };

  // Handle payment confirmation
  window.confirmPayment = () => {
    const phoneNumber = document.getElementById("phone-number").value;
    const amount = document.getElementById("amount").value;
    const password = document.getElementById("password").value;

    if (!phoneNumber || !amount || !password) {
      alert("Please fill in all fields.");
      return;
    }

    // Simulate payment confirmation
    paymentForm.classList.add("hidden");
    confirmationMessage.classList.remove("hidden");
  };
});

</script>
</body>