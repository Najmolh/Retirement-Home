<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

include('config/db_connection.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT name, email,phone_number FROM user WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['name'] ?? ''; 
$email = $user['email'] ?? '';
$phone_number= $user['phone_number']?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="Style/contact.css">
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>

    <div id="contact_container">
    <form action="contact_information.php" method="post">
            <h1>Contact Us</h1>
            <p>Please take a moment to get in touch, we will get back to you shortly.</p>

            <div class="column">
                <label for="the-name">Your Name</label>
                <input type="text" name="name" id="the-name" value="<?php echo htmlspecialchars($name); ?>">

                <label for="the-email">Email Address</label>
                <input type="email" name="email" id="the-email" value="<?php echo htmlspecialchars($email);?>">

                <label for="the-phone">Phone Number</label>
                <input type="tel" name="phone" id="the-phone" value="<?php echo htmlspecialchars($phone_number);?>">

                <label for="service-request">How can we assist you?</label>
                <select name="service-request" id="service-request">
                    <option value="">Choose one</option>
                    <option value="healthcare">I want to schedule a healthcare appointment</option>
                    <option value="contact-admin">I need to contact the administration</option>
                    <option value="emergency-assistance">I need emergency assistance</option>
                    <option value="general-inquiry">I have a general inquiry</option>
                </select>
            </div>
            <div class="column">
                <label for="the-message">Message</label>
                <textarea name="message" id="the-message" required></textarea>
                <input type="submit" value="Send Message">
            </div>
        </form>  
        <div><img src="image/contact_image.jpg" width="400px" height="400px"></div>      
    </div>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>
