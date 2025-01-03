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
    <form action="#" method="post">
            <h1>Contact Us</h1>
            <p>Please take a moment to get in touch, we will get back to you shortly.</p>

            <div class="column">
                <label for="the-name">Your Name</label>
                <input type="text" name="name" id="the-name">

                <label for="the-email">Email Address</label>
                <input type="email" name="email" id="the-email">

                <label for="the-phone">Phone Number</label>
                <input type="tel" name="phone" id="the-phone">

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
                <textarea name="message" id="the-message"></textarea>
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
