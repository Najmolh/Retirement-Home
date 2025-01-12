<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/login.css">
</head>
<body>
        <video autoplay muted loop id="myVideo">
            <source src="video/login_video.mp4" type="video/mp4">
            Your browser does not support <HTM></HTM>L5 video.
          </video>
        <div class="main">  	
            <input type="checkbox" id="chk">
            <div class="signup">
                <form action="signup_user.php" method="post">
                    <label for="chk">Sign Up</label>
                    <input type="text" name="username" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <input type="text" name="role" placeholder="Your role? ex: resident / admin" required="">
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="login">
                <form action="login_user.php" method="post">
                        <label for="chk">Login</label>
                        <input type="email" name="email" placeholder="Email" required="">
                        <input type="password" name="Password" placeholder="Password" required="">
                        <button>Login</button>
                    </form>
            </div>
        </div>
</body>
</html>
