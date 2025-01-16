function calculateTotalPrice(input, pricePerMonth) {
    const room = input.closest('.room'); // Get the parent room element
    const duration = parseInt(input.value) || 1; // Ensure it's at least 1 month
    const totalPrice = duration * pricePerMonth;

    // Update the total price for this specific room
    const totalPriceElement = room.querySelector('.total-price');
    if (totalPriceElement) {
      totalPriceElement.textContent = ` $${totalPrice} `; // Update with the actual price
    }
  }

  // Booking function triggered when the "Book" button is clicked
function bookRoom(roomType, pricePerMonth) {
    // Get the duration value dynamically based on the room type
    const duration = document.getElementById(`duration-${roomType}`).value;
    if (!duration || duration <= 0) {
      alert("Please enter a valid duration.");
      return;
    }

    // Calculate the total cost dynamically based on room type and duration
    const totalCost = pricePerMonth * duration;

    // Open the payment modal with the calculated total cost
    openPaymentModal(totalCost);
}

  // Open the payment modal with the total price
function openPaymentModal(totalCost) {
    document.getElementById("payment-modal").style.display = "block";
    document.getElementById("amount").value = totalCost; // Set the amount in the payment form
}

  // Close the payment modal
  function closePaymentModal() {
    document.getElementById("payment-modal").style.display = "none";
    document.getElementById("payment-form").classList.add("hidden");
    document.getElementById("confirmation-message").classList.add("hidden");
  }

  // Show the payment form based on the selected method
  function showPaymentForm(method) {
    document.getElementById("payment-form").classList.remove("hidden");
    document.getElementById("confirmation-message").classList.add("hidden");
    alert("Selected payment method: " + method); // Optional
  }

  // Confirm payment (simulate confirmation)
  function confirmPayment() {
    const phoneNumber = document.getElementById("phone-number").value;

    if (!phoneNumber) {
      alert("Please enter your phone number.");
      return;
    }

    // Simulate successful payment (you can implement your server-side logic here)
    alert("Payment Successful!");
    document.getElementById("confirmation-message").classList.remove("hidden");
  }




