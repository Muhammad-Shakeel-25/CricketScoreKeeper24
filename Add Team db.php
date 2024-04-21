<?php
session_start();
function saveToTeamTable($name, $country, $city, $color, $email) {
    require_once('db.php');

    // Sanitize input data to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $country = $conn->real_escape_string($country);
    $city = $conn->real_escape_string($city);
    $color = $conn->real_escape_string($color);

    // SQL query to insert data into the 'team' table
    
    $sql = "INSERT INTO team (name, country, city, color, email) VALUES ('$name', '$country', '$city', '$color', '$email')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}

// Example usage: Assuming the form fields are sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $color = $_POST['color'];
    $email=$_SESSION['email'];
    // Call the function to save the data to the 'team' table
    saveToTeamTable($name, $country, $city, $color,$email);
}