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


function saveToPlayerTable($teamname, $name, $type) {
    require_once('db.php');

    // Sanitize input data to prevent SQL injection
    $teamname = $conn->real_escape_string($teamname);
    $name = $conn->real_escape_string($name);
    $type = $conn->real_escape_string($type);

    // SQL query to insert data into the 'player' table
    
    $sql = "INSERT INTO player (teamname, name, type) VALUES ('$teamname', '$name', '$type')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
        header("Location: Add%20Player.php");

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
    $teamname = $_POST['teamname'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    // Call the function to save the data to the 'team' table
    saveToPlayerTable($teamname, $name, $type);
}