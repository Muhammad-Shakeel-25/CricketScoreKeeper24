<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Match</title>
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
    .create-match-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .create-match-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #000;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .create-match-container input[type="submit"] {
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
<div class="create-match-container">
  

<center>
<h1>Create Match</h1>
<form action="Create Match db.php" method="POST">
    <!-- Team 1 input field -->
    <div>
        <label for="team_1">Team 1:</label>
        <input placeholder="Team1" type="text" id="team_1" name="team_1" required>
    </div>

    <!-- Team 2 input field -->
    <div>
        <label for="team_2">Team 2:</label>
        <input placeholder="Team3" type="text" id="team_2" name="team_2" required>
    </div>

    <!-- Total Over input field (number input with range from 1 to 50) -->
    <div>
        <label for="total_over">Total Over:</label>
        <input value="5" type="number" id="total_over" name="total_over" min="1" max="50" required>
    </div>
<br>
    <!-- Batting Team input field -->
    <div>
        <label for="current_batting_team">Current Batting Team:</label>
        <input placeholder="Team1" type="text" id="current_batting_team" name="current_batting_team" required>
    </div>
<!-- current_bowling_team input field -->
<div>
        <label for="current_bowling_team">Current Bowling Team:</label>
        <input placeholder="Team3" type="text" id="current_bowling_team" name="current_bowling_team" required>
    </div>
    <!-- Submit button -->
    <div>
        <input type="submit" value="Create Match">
    </div>
</form>

</center>



</div>
</body>
</html>
