<?php

// Start the session (if not already started)
session_start();




function saveToMatchTable($team_1, $team_2, $total_over,$current_batting_team,$current_bowling_team,$email) {
    require_once('db.php');

    // Sanitize input data to prevent SQL injection
    $team_1 = $conn->real_escape_string($team_1);
    $team_2 = $conn->real_escape_string($team_2);
    $total_over = $conn->real_escape_string($total_over);
    $batting_team = $conn->real_escape_string($batting_team);
    // SQL query to insert data into the 'player' table
    
    $sql = "INSERT INTO cricket_match (team_1, team_2, total_over, current_batting_team,current_bowling_team, email) VALUES ('$team_1', '$team_2', '$total_over', '$current_batting_team','$current_bowling_team', '$email')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
        header("Location: Start Match.php");

    // Terminate the script to prevent further code execution
    exit;
    
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}

// Example usage: Assuming the form fields are sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $team_1 = $_POST['team_1'];
    $team_2 = $_POST['team_2'];
    $total_over = $_POST['total_over'];
    $current_batting_team = $_POST['current_batting_team'];
    $current_bowling_team = $_POST['current_bowling_team'];


// Check if email is stored in the session
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {
  // Set a default value or leave it empty if no email in session
  $email = "";
}

    // Call the function to save the data to the 'team' table
    saveToMatchTable($team_1, $team_2, $total_over,$current_batting_team,$current_bowling_team,$email);
}