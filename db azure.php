<?php
// Replace with your actual database credentials
$servername = "cricketscorekeeper750.mysql.database.azure.com";
$username = "admin21924162";
$password = "cricketscorekeeper750!!";
$dbname = "cricketscorekeeper";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


?>
