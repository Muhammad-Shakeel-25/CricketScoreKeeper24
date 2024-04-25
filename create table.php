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


$player = "CREATE TABLE IF NOT EXISTS player (
  id INT AUTO_INCREMENT PRIMARY KEY,
  teamname VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL
)";



$match = "CREATE TABLE IF NOT EXISTS cricket_match (
  id INT AUTO_INCREMENT PRIMARY KEY,
  team_1 VARCHAR(255) NOT NULL,
  team_2 VARCHAR(255) NOT NULL,
  total_over VARCHAR(255) NOT NULL,
  status VARCHAR(255) NOT NULL,
  current_batting_team VARCHAR(255) NOT NULL,
  current_bowling_team VARCHAR(255) NOT NULL,
  target VARCHAR(255) NOT NULL,
  chased VARCHAR(255) NOT NULL,
  won_details VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
)";

if ($conn->query($match) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
