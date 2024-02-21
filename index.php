<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form id="loginForm" action="user.php" method="post" >
        <h1>Cricket Score Keeper</h1>
        <hr>
        <h2>Login/Register</h2>
        <div class="error-message" id="errorEmail"></div>
        <input type="text" name="email" id="email" placeholder="Email" oninput="checkEmail(this.value)">
        <div id="emailStatus"></div>
        <div class="error-message" id="errorPassword"></div>
        <input type="password" name="password" id="password" placeholder="Password">
        <input id="submitButton" type="submit" value="Login/Regester">
    </form>

    <script src="script.js"></script>
</body>
</html>
