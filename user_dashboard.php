<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Style/home.css">
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>
    <div class="slideshow-container">
        <div class="mySlides fade">
        <img src="image/image-1.jpg" style="width:100%">
        <div class="hero_container_1">
            <h2 class="text">A Place to Care and Share</h2>
            <button class="button">Donate</button>
        </div>
        </div>
        <div class="mySlides fade">
        <img src="image/image-2.jpg" style="width:100%">
        <div class="hero_container_2">
            <h2 class="text">Together, Let's make everyday meaningful</h2>
            <button class="button">Donate</button>
        </div>
        </div>
    </div>

    <div class="campaign_header">
        <img src="image/save.png" class="campaign_logo">
        <h1 class="campaign_text">Current Campaign</h1>
    </div>
    <div class="campaign">
        <div class="container">
            <h1>Medical Care Fund</h1>
            <p>Help us reach our target of <strong>$10,000</strong> for providing necessary medical equipment, services, and medications.
            </p>
            <div class="progress-bar">
                <div class="progress">0%</div>
            </div>
            <p>
                <strong>Donated:</strong> $<span id="donation-received">0</span> / $10,000<br>
                <strong>Remaining:</strong> $<span id="donation-remaining">10000</span>
            </p>

            <div class="donation-form">
                <button onclick="makeDonation()">Donate</button>
            </div>
        </div>
        <div class="container">
            <h1>Food and Nutrition Fund</h1>
            <p>Help us reach our target of <strong>$15,000</strong> for ensure healthy and balanced meals for residents.
            </p>
            <div class="progress-bar">
                <div class="progress">0%</div>
            </div>
            <p>
                <strong>Donated:</strong> $<span id="donation-received">0</span> / $15,000<br>
                <strong>Remaining:</strong> $<span id="donation-remaining">15000</span>
            </p>

            <div class="donation-form">
                <button onclick="makeDonation()">Donate</button>
            </div>
        </div>
        <div class="container">
            <h1>Housing and Infrastructure Fund</h1>
            <p>Help us reach our target of <strong>$20,000</strong> for Housing and comfortable living environment.
            </p>
            <div class="progress-bar">
                <div class="progress">0%</div>
            </div>
            <p>
                <strong>Donated:</strong> $<span id="donation-received">0</span> / $20,000<br>
                <strong>Remaining:</strong> $<span id="donation-remaining">20000</span>
            </p>

            <div class="donation-form">
                <button onclick="makeDonation()">Donate</button>
            </div>
        </div>
    </div>

    <div class="food_customization">
        <div class="food_customization_left">
            <img src="image/meal_customization_2.jpg" style="width: 45vw; height:350px">
        </div>
        <div class="food_customization_right">
            <div class="food_header">
                <img src="image/save.png" class="food_logo">
                <h1 class="food_text">Customized Meal Plans for Every Resident</h1>
                <button class="button_food_customize">Click to Customize</button>
            </div>
        </div>
    </div>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
    <script src="slider.js"></script>
</body>
</html>
