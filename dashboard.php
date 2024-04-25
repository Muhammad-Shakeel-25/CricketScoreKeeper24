<?php

// Start the session (if not already started)
session_start();

// Check if email is stored in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {
  // Set a default value or leave it empty if no email in session
  $email = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Cricket Management System</h2>
        <div class="options">
        <div>Login as : <?php echo $email; ?></div>    
        <hr>
            <button onclick="location.href='Add%20Team.php';">Create Team</button>
            <button onclick="location.href='Add Player.php';">Add Player</button>
            <button onclick="location.href='Create Match.php';">Create Match</button>
            <button onclick="location.href='Start Match.php';">Start Match</button>
            <button onclick="location.href='#';">Update Profile</button>
        </div>
    </div>
</body>
</html>