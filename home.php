<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Style/home.css">
    <link rel="stylesheet" href="Style/review_load.css">
    <link rel="stylesheet" href="Style/donation_main_style.css">
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
            <form action="donation_main.php" method="get">
                <button class="button" type="submit">Donate</button>
            </form>
        </div>
        </div>
        <div class="mySlides fade">
        <img src="image/image-2.jpg" style="width:100%">
        <div class="hero_container_2">
            <h2 class="text">Together, Let's make everyday meaningful</h2>
            <form action="donation_main.php" method="get">
                <button class="button" type="submit">Donate</button>
            </form>
        </div>
        </div>
    </div>

    <div class="campaign_header">
        <img src="image/save.png" class="campaign_logo">
        <h1 class="campaign_text">Current Campaign</h1>
    </div>
    <section class="campaign-section">
        <div class="campaign-card">
            <img class="card_img" src="image/special_need_fund.png" alt="Special Needs Funds">
            <h3>Special Need Funds</h3>
            <p>Goal: $40,000.00</p>
            <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div>
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="Special Need Funds">
                <button type="submit">Donate</button>
            </form>
        </div>

        <div class="campaign-card">
            <img class="card_img" src="image/general_operating_fund.webp" alt="General Operating Funds">
            <h3>General Operating Funds</h3>
            <p>Goal: $40,000.00</p>
            <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div>
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="General Operating Funds">
                <button type="submit">Donate</button>
            </form>
        </div>

        <div class="campaign-card">
            <img class="card_img" src="image/health_care.jpg" alt="Health Care Funds">
            <h3>Health Care Funds</h3>
            <p>Goal: $40,000.00</p>
            <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div>
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="Health Care Funds">
                <button type="submit">Donate</button>
            </form>
        </div>
    </section>

    <div class="food_customization">
        <div class="food_customization_left">
            <img src="image/meal_customization_2.jpg" style="width: 45vw; height:350px">
        </div>
        <div class="food_customization_right">
            <div class="food_header">
                <img src="image/save.png" class="food_logo">
                <h1 class="food_text">Customized Meal Plans for Every Resident</h1>
                <form action="customize.php" method="get">
                    <button class="button_food_customize" type="submit">Click to Customize</button>
                </form>
            </div>
        </div>
    </div>

    <div id="reviews-section">
    <h2 class="campaign_text">User Reviews</h2>
    <div id="reviews-wrapper">
        <div id="reviews" class="loading">Loading reviews...</div>
    </div>
</div>




    <script>
    // Fetch user reviews and display them
fetch('review_load.php') // Replace with your PHP file path
    .then(response => response.json())
    .then(data => {
        const reviewsDiv = document.getElementById('reviews');
        reviewsDiv.classList.remove('loading'); // Remove the loading message

        if (data.length === 0) {
            reviewsDiv.innerHTML = '<p>No reviews available yet!</p>';
            return;
        }

        reviewsDiv.innerHTML = ''; // Clear the "Loading reviews..." message

        // Populate reviews
        data.forEach(review => {
            const reviewCard = document.createElement('div');
            reviewCard.className = 'review-card';
            reviewCard.innerHTML = `
                <h3>${review.name}</h3>
                <p>${review.comments}</p>
                <p class="rating">Rating: ${'⭐'.repeat(review.rating)}</p>
            `;
            reviewsDiv.appendChild(reviewCard);
        });

        // Clone reviews for seamless looping
        const clone = reviewsDiv.cloneNode(true);
        reviewsDiv.appendChild(...clone.childNodes);
    })
    .catch(error => {
        console.error('Error fetching reviews:', error);
        const reviewsDiv = document.getElementById('reviews');
        reviewsDiv.classList.remove('loading');
        reviewsDiv.innerHTML = '<p>Failed to load reviews. Please try again later.</p>';
    });



</script>


    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
    <script src="slider.js"></script>
</body>
</html>
