.<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
    <link rel="stylesheet" href="Style/donation_main_style.css">
</head>
<body>
    <header>
        <?php include('Template/header.php'); ?>
    </header>

    <section class="campaign-section">
        <div class="campaign-card">
            <img class="card_img" src="image/special_need_fund.png" alt="Special Needs Funds">
            <h3>Special Need Funds</h3>
            <p>Goal: $40,000.00</p>
            <!-- <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div> -->
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
            <!-- <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div> -->
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
            <!-- <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div> -->
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="Health Care Funds">
                <button type="submit">Donate</button>
            </form>
        </div>

        <div class="campaign-card">
            <img src="image/elder_caring_fund.webp" alt="Elder Care Funding">
            <h3>Elder Care Funding</h3>
            <p>Goal: $40,000.00</p>
            <!-- <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div> -->
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="Elder Care Funding">
                <button type="submit">Donate</button>
            </form>
        </div>

        <div class="campaign-card">
            <img src="image/central_improvement_fund.jpg" alt="Capital Improvement Fund">
            <h3>Capital Improvement Fund</h3>
            <p>Goal: $40,000.00</p>
            <!-- <div class="progress-bar">
                <div class="progress" style="width: 37.5%;"></div>
            </div> -->
            <p>Fund raised: $15,000</p>
            <form action="donation_payment.php" method="GET">
                <input type="hidden" name="fund_type" value="Capital Improvement Fund">
                <button type="submit">Donate</button>
            </form>
        </div>
    </section>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>
