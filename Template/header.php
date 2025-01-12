<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="Style/header.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1 class="logo"><a href="home.php">Retirement<span>Home</span></a></h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#">Rooms</a>
                        <div class="mega-menu">
                            <a href="room_type.php">Room Booking</a>
                            <!-- <a href="room_booking.php">Room Booking</a> -->
                            <a href="availability.php">Availability</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Medical History</a>
                        <div class="mega-menu">
                            <a href="health_info_form.php">Health Info Form</a>
                            <a href="detail_medical_record.php">Detailed Medical Record</a>
                            <a href="appointment.php">Appointment Scheduling</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Food Preferences</a>
                        <div class="mega-menu">
                            <a href="meal_plan.php">Meal Plan</a>
                            <a href="customize.php">Customization</a>
                            <a href="feedback.php">Feedback</a>
                        </div>
                    </li>
                    <li><a href="donation_main.php">Donations</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="dropdown">
                            <a href="#">Hello, <?php echo htmlspecialchars($_SESSION['name']); ?></a>
                            <div class="mega-menu">
                                <a href="update_info.php">Profile</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li><a href="login.php" class="login-signup">Sign Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
