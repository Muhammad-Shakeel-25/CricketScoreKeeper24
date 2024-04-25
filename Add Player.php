<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Player</title>
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
  

<center>
<h1>Player added</h1>


<?php
require_once('db.php');
   // Fetch data from the player table

   session_start();
   $email=$_SESSION['email'];

   

$sql = "SELECT team.name AS teamname, player.name, player.type
FROM team
INNER JOIN player ON team.name = player.teamname
WHERE team.email = '".$email."' ORDER BY teamname ASC"; // Modify the SQL query as needed to select specific columns
$result = $conn->query($sql);

// Check if there are rows to display
if ($result->num_rows > 0) {
    // Start an HTML table
    echo '<table border="1">';
    
    // Generate the header row
    echo '<tr>';
    echo '<th>Team Name</th>';
    echo '<th>Player Name</th>';
    echo '<th>Team Name</th>';
  
    // Add more column headers as needed
    echo '</tr>';
    
    // Iterate through each row in the result set
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['teamname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['type']) . '</td>';
        
        // Add more cells for other columns as needed
        echo '</tr>';
    }
    
    // Close the HTML table
    echo '</table>';
} else {
    echo 'No players found in the database.';
}

?>


</center>

<h1>Add Player</h1>




   <?php
   require_once('db.php');
// Fetch team names from the team table
$team_names = [];
$email=$_SESSION['email'];
$sql = "SELECT name FROM team where email='".$email."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $team_names[] = $row['name'];
}
}
// Close the database connection
$conn->close();

// HTML form containing the table
echo '<form method="POST" action="Add Player db.php">';

// Create the HTML table
echo '<table border="1">';
echo '<tr>';
echo '<th>Team Name</th>';
echo '<th>Player Name</th>';
echo '<th>Player Type</th>';
echo '</tr>';

// Create a single row in the table
echo '<tr>';

// Team name drop-down list
echo '<td>';
echo '<select name="teamname">';
foreach ($team_names as $team_name) {
    echo '<option value="' . htmlspecialchars($team_name) . '">' . htmlspecialchars($team_name) . '</option>';
}
echo '</select>';
echo '</td>';

// Player name input field
echo '<td>';
echo '<input type="text" name="name" required>';
echo '</td>';

// Player type drop-down list
echo '<td>';
echo '<select name="type">';
echo '<option value="batsman">Batsman</option>';
echo '<option value="bowler">Bowler</option>';
echo '<option value="all rounder">All Rounder</option>';
echo '<option value="captain">Captain</option>';
echo '</select>';
echo '</td>';

echo '</tr>';
echo '</table>';

// Submit button
echo '<input type="submit" value="Add Player">';

// Close the form
echo '</form>';
?>




</div>
</body>
</html>
