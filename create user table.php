<?php
// Include the db.php file
require_once('db.php');
// Assuming you have already established a connection to the database named "cricketscorekeeper"

$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Users table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
