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
<title>Add Team</title>
<style>
    body {
        background-color: #fff;
        color: #000;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .add-team-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .add-team-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #000;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .add-team-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #000;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="add-team-container">
    <h1>Add Team</h1>
    <form action="Add Team db.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <br>
        <input type="text" name="country" placeholder="Country">
        <br>
        <input type="text" name="city" placeholder="City">
        <br>
        <input type="text" name="color" placeholder="color">
        <br>
        <input value="<?php echo $email; ?>" type="text" name="email" placeholder="email" disabled>
        <br>
        <input type="submit" value="Add Team">
    </form>
</div>
</body>
</html>
