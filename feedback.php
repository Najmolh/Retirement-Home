<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="Style/feedback.css">
    
</head>
<body>
<header>
        <?php include('Template/header.php'); ?>
    </header>

    <div class="customization-plan">
        <div class="feedback-container">
            <h1>We Value Your Feedback</h1>
            <p>Help us improve our meal plans by sharing your thoughts</p>
            <hr> <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; color: rgb(28, 154, 112); text-align: center; font-size: 19px;">Please fill up the form</p><hr>

            <form action="feedback_backend.php" method="post">
                
                <div class="form-group">
                    <label>Do you feel there is enough variety in the meal plans?</label>
                    <div class="radio-group">
                        <label><input type="radio" name="variety" value="excellent" required> Excellent</label>
                        <label><input type="radio" name="variety" value="good"> Good</label>
                        <label><input type="radio" name="variety" value="average"> Average</label>
                        <label><input type="radio" name="variety" value="poor"> Poor</label>
                    </div>
                </div>
    
                <div class="form-group">
                    <label>Are the portion sizes adequate?</label>
                    <div class="radio-group">
                        <label><input type="radio" name="portion" value="too-large" required> Too Large</label>
                        <label><input type="radio" name="portion" value="just-right"> Just Right</label>
                        <label><input type="radio" name="portion" value="too-small"> Too Small</label>
                    </div>
                </div>
    
                <div class="form-group">
                    <label>Did the customized meal plan meet your expectations?</label>
                    <div class="radio-group">
                        <label><input type="radio" name="expectations" value="yes" required> Yes</label>
                        <label><input type="radio" name="expectations" value="no"> No</label>
                        <label><input type="radio" name="expectations" value="somewhat"> Somewhat</label>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="improvements">What improvements would you suggest for our meal plans?</label>
                    <textarea id="improvements" name="improvements" rows="3"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="specific-dishes">Are there any specific dishes you'd like to see on the menu?</label>
                    <textarea id="specific-dishes" name="specific-dishes" rows="3"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="comments">Do you have any other suggestions or comments?</label>
                    <textarea id="comments" name="comments" rows="3"></textarea>
                </div>

                <div class="form-group rating-container">
                    <label>Rate your overall satisfaction with the meals:</label>
                    <div class="rating">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0">
                    <div class="rating-description">
                        Hover over the stars to rate. Click to select your rating.
                    </div>
                </div>
                

                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>

    <footer>
        <?php include('Template/footer.php'); ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".star");
        const ratingInput = document.getElementById("rating");
    
        stars.forEach((star, index) => {
            star.addEventListener("mouseover", () => {
                highlightStars(index);
            });
    
            star.addEventListener("click", () => {
                selectRating(index + 1);
            });
    
            star.addEventListener("mouseout", resetHighlight);
        });
    
        function highlightStars(index) {
            stars.forEach((star, i) => {
                star.classList.toggle("hovered", i <= index);
            });
        }
    
        function selectRating(value) {
            ratingInput.value = value; // Update hidden input value
            stars.forEach((star, i) => {
                star.classList.toggle("selected", i < value);
            });
        }
    
        function resetHighlight() {
            stars.forEach((star) => {
                star.classList.remove("hovered");
            });
        }
    });

    </script>
</body>
</html>