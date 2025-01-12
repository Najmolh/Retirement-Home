<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="Style/meal_plan.css">
    
</head>
<body>
<header>
        <?php include('Template/header.php'); ?>
    </header>

    <div class="picture">
        <img src="image/senior-friends-spending-time-together 1.jpeg" alt="senior-friends-spending-time-together">

    </div>

    <div class="main-banner">
        <h1>Elderly Nutrition</h1>
        <p>At our service, we provide balanced, nutritious meals tailored to meet the dietary needs of our residents.</p>
    </div>

    

    <div class="container" id="schedule-container">
        <div id="saturday" class="day-schedule">
            <h2>Saturday</h2>
            <p><strong>Breakfast:</strong> Paratha with vegetable curry and lassi.</p>
            <p><strong>Lunch:</strong> Chicken biryani, cucumber raita, and salad.</p>
            <p><strong>Dinner:</strong> Dal fry, steamed rice, and sautéed spinach.</p>
        </div>
        <div id="sunday" class="day-schedule">
            <h2>Sunday</h2>
            <p><strong>Breakfast:</strong> Idli, scrambled egg, and fruit juice.</p>
            <p><strong>Lunch:</strong> Vegetable kofta, basmati rice, and salad.</p>
            <p><strong>Dinner:</strong> Chapati, paneer curry, and vegetable stir-fry.</p>
        </div>
        <div id="monday" class="day-schedule">
            <h2>Monday</h2>
            <p><strong>Breakfast:</strong> Upma and coffee.</p>
            <p><strong>Lunch:</strong> Mixed veg curry and rice.</p>
            <p><strong>Dinner:</strong> Roti, dal, and sautéed broccoli.</p>
        </div>
        <div id="tuesday" class="day-schedule">
            <h2>Tuesday</h2>
            <p><strong>Breakfast:</strong> Poha and tea.</p>
            <p><strong>Lunch:</strong> Rajma and rice.</p>
            <p><strong>Dinner:</strong> Chapati, aloo gobi, and salad.</p>
        </div>
        <div id="wednesday" class="day-schedule">
            <h2>Wednesday</h2>
            <p><strong>Breakfast:</strong> Dosa and chutney.</p>
            <p><strong>Lunch:</strong> Sambar rice and papad.</p>
            <p><strong>Dinner:</strong> Roti, chana masala, and greens.</p>
        </div>
        <div id="thursday" class="day-schedule">
            <h2>Thursday</h2>
            <p><strong>Breakfast:</strong> Puri and bhaji.</p>
            <p><strong>Lunch:</strong> Veg biryani and curd.</p>
            <p><strong>Dinner:</strong> Chapati, palak paneer, and salad.</p>
        </div>
        <div id="friday" class="day-schedule">
            <h2>Friday</h2>
            <p><strong>Breakfast:</strong> Bread and butter.</p>
            <p><strong>Lunch:</strong> Dal rice and pickle.</p>
            <p><strong>Dinner:</strong> Roti, mixed veg, and curd.</p>
        </div>
    </div>

    <script>
        const today = new Date().toLocaleString('en-us', { weekday: 'long' }).toLowerCase();
        const container = document.getElementById('schedule-container');
        const days = Array.from(container.children);
        const todayIndex = days.findIndex(day => day.id === today);

        if (todayIndex !== -1) {
            const reorderedDays = [...days.slice(todayIndex), ...days.slice(0, todayIndex)];
            container.innerHTML = '';
            reorderedDays.forEach(day => container.appendChild(day));
        }
    </script>


    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>
</body>
</html>