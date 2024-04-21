<?php
// Include the db.php file
require_once('db.php');
// Assuming you have already established a connection to the database named "cricketscorekeeper"

$users = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL
)";


$team = "CREATE TABLE IF NOT EXISTS team (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  country VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  color VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
)";

if ($conn->query($team) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
