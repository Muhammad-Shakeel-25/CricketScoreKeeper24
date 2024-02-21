<?php
// Replace with your actual database credentials
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "cricketscorekeeper";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";


?>
