<?php
session_start();


// if post request received then regester new user
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST['email'];
$password = $_POST['password'];

// check if user click on regester or login page
if(isset($_GET['register']))
{
saveUser($email, $password);
}




if(isset($_GET['login']))
{


    if (loginUser($email, $password)) {
        $_SESSION['email'] = $email;
        echo "Login successful! <br>";
        echo $_SESSION['email'];
        echo '<br><a href="dashboard.php">Go to dashboard</a>';
    } else {
        echo "Invalid password.";
        echo '<br><a href="index.php">Go to Login page</a>';
    }



}




}


function saveUser($email, $password) {
   
// Include the db.php file
require_once('db.php');
    // Escape special characters to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user into the "user" table
    $sql = "INSERT INTO users (email, password, type) VALUES ('$email', '$hashedPassword', 'end_user')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}




if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['check_email'])) {
    // Retrieve the email from the query string
    $email = $_GET['check_email'];

if (isEmailExists($email)) {
    echo "Email exists > Simply Login";
} else {
    echo "New Email > Simply Register";
}

}






function isEmailExists($email) {
   // Include the db.php file
require_once('db.php');

    // Escape special characters to prevent SQL injection
    $email = $conn->real_escape_string($email);

    // SQL query to check if the email exists in the "users" table
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email exists in the database
        $conn->close();
        return true;
    } else {
        // Email does not exist in the database
        $conn->close();
        return false;
    }
}



function loginUser($email, $password) {
    
// Include the db.php file
require_once('db.php');
        //echo $email."<br>";
        //echo $password."<br>";
   // Escape special characters to prevent SQL injection
   $email = $conn->real_escape_string($email);

   // SQL query to select user with matching email
   $sql = "SELECT email, password FROM users WHERE email = '$email'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       // User with provided email exists, fetch the row
       $row = $result->fetch_assoc();
       
       // Verify the password using password_verify() function with debugging
       if (password_verify($password, $row['password'])) {
           // Password is correct, return the user ID
           // echo "Hashed password: " . $row['password'] . "<br>";
           // echo "Input password: " . $password . "<br>";
           $conn->close();
           return $row['email'];
       } else {
           // Debugging: Output the hashed password for comparison with debugging
           // echo "Hashed password: " . $row['password'] . "<br>";
           // echo "Input password: " . $password . "<br>";
       }
   } else {
       // Debugging: Output a message if the email is not found
       echo "Email not found<br>";
   }

   // Either user doesn't exist or password is incorrect
   $conn->close();
   return false;
}