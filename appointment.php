<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="Style/appointment.css">
<header>
    <?php include('Template/header.php'); ?>
    <div class="container">
        <div class="left-section">
            <h1>Book Your Slot Now and Save Your Time</h1>
            <p>An elder care home appointment is a scheduled meeting designed to connect caregivers, family members, or potential residents with the management and staff of a care facility. This appointment typically provides an opportunity to discuss care needs, tour the facility, and address any concerns about the services offered.</p>
            <p class="help-call">For Help Call: 666</p>
        </div>
        <div class="right-section">
            <h2>Book Appointment</h2>
            <form>
                <div class="form-group">
                    <label for="fullname">Enter Full Name</label>
                    <input 
                        type="text" 
                        id="fullname" 
                        name="fullname" 
                        placeholder="Enter Full Name" 
                        required 
                        pattern=".{3,}" 
                        title="Full Name must be at least 3 characters long">
                </div>
                <div class="form-group">
                    <label for="mobile">Enter Mobile Number</label>
                    <input 
                        type="text" 
                        id="mobile" 
                        name="mobile" 
                        placeholder="Enter Mobile Number" 
                        required 
                        pattern="\d{11}" 
                        title="Mobile Number must be a valid 11-digit number">
                </div>
                <div class="form-group">
                    <label for="address">Enter Your Address</label>
                    <input 
                        type="text" 
                        id="address" 
                        name="address" 
                        placeholder="Enter Your Address" 
                        required 
                        pattern=".{3,}" 
                        title="Address must be at least 3 characters long">
                </div>
                <div class="form-group">
                    <label for="appointment-date">Appointment Date</label>
                    <input 
                        type="date" 
                        id="appointment-date" 
                        name="appointment-date" 
                        required 
                        title="Please select an appointment date">
                </div>
                <h3>Address Details (optional)</h3>
                <div class="form-group inline">
                    <input type="text" placeholder="Enter Area">
                    
                </div>
                <div class="form-group inline">
                    <input type="text" placeholder="Enter City">
                </div>
                <div class="form-group inline">
                    <input type="text" placeholder="Enter State">
                    
                </div>
                <div class="form-group inline">
                    <input type="text" placeholder="Postal Code">
                </div>
                <button type="submit" class="submit-btn">Book Appointment</button>
            </form>
        </div>
    </div>
    <?php include('Template/footer.php'); ?>
</html>
