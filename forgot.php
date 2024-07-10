<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"  href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h3>Trouble logging in?</h3>
            <h6>Enter your email, phone, or username and we'll send you a link to get back into your account.</h6>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Email, Phone, or Username" required>
                <button type="submit">Send login link</button>
            </form>
            <a href="forgot.php" class="forgot">Can't reset your password?</a>
        </div>
        <div class="login">
            <a href="login.php">Back to login</a>
        </div>
    </div>
</body>
</html>
