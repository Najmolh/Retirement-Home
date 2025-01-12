<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <link rel="stylesheet" href="Style/appointment_success.css">
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-container {
            text-align: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px 40px;
            width: 90%;
            max-width: 500px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.8rem;
            color: #4CAF50;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
        }

        .details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            text-align: left;
            font-size: 0.95rem;
        }

        .details p {
            margin: 5px 0;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <img src="image/success_icon.png" alt="Success Icon" class="success-icon">
        <h1>Congratulations!</h1>
        <p>Your appointment has been successfully booked. Below are the details:</p>

        <div class="details">
            <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($_GET['appointment_date'] ?? 'Not Provided'); ?></p>
            <p><strong>Appointment Time:</strong> <?php echo htmlspecialchars($_GET['appointment_time'] ?? 'Not Provided'); ?></p>
            <p><strong>Doctor:</strong> <?php echo htmlspecialchars($_GET['doctor_name'] ?? 'Not Provided'); ?></p>
        </div>

        <a href="home.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
