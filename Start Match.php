<center>
<h1>Match To Start</h1>


<?php
require_once('db.php');
   // Fetch data from the player table

   session_start();
   $email=$_SESSION['email'];

   

$sql = "SELECT * from `cricket_match` where email='$email'"; // Modify the SQL query as needed to select specific columns
$result = $conn->query($sql);

// Check if there are rows to display
if ($result->num_rows > 0) {
    // Start an HTML table
    echo '<table border="1">';
    
    // Generate the header row
    echo '<tr>';
    echo '<th>Team1</th>';
    echo '<th>Team2</th>';
    echo '<th>Total_over</th>';
    echo '<th>Batting team</th>';
    echo '<th>Id</th>';
  
    // Add more column headers as needed
    echo '</tr>';
    
    // Iterate through each row in the result set
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['team_1']) . '</td>';
        echo '<td>' . htmlspecialchars($row['team_2']) . '</td>';
        echo '<td>' . htmlspecialchars($row['total_over']) . '</td>';
        echo '<td>' . htmlspecialchars($row['current_batting_team']) . '</td>';
        echo '<td><a href="counter.php?match=' . htmlspecialchars($row['id']) . '">Start Match ' . htmlspecialchars($row['id']) . '</a></td>';
        
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