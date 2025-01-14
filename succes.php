<?php 
if (isset($_GET['message'])) {
    $message = $_GET['message']; 
} else {
    $message = "No message provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f3f4f6;
}

.success-container {
    background-color: #fff;
    border-radius: 10px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 60%;
    max-width: 600px;
}

.success-message {
    margin-bottom: 20px;
}

.icon-success {
    font-size: 50px;
    color: #4CAF50;
}

.message {
    font-size: 20px;
    color: #333;
    margin-top: 20px;
}

.btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    margin-top: 20px;
    font-size: 16px;
}

.btn:hover {
    background-color: #45a049;
}

    </style> 
</head>
<body>

    <div class="success-container">
        <div class="success-message">
            <i class="icon-success">&#x2705;</i> 
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        </div>
        <a href="home.php" class="btn">Go Back to Home</a>
    </div>

</body>
</html>
