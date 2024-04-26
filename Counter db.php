<?php

// Call the function to add values to the inning table
// url like Counter%20db.php?match_id=4&ball_no=4&run=Out&type=Run&bowler=ABC&batsman=XYZ
if(isset($_GET['ball_no']))
            { 
addInningValues();
            }

            // url like ?getCurrentBallNo&match=4
            if(isset($_GET['getCurrentBallNo']))
            { 
                echo getCurrentBallNo($_GET['match']);
            }


// url like ?getSumOfRuns&match=4
if(isset($_GET['getSumOfRuns']))
{ 
    echo getSumOfRuns($_GET['match']);
}
            
// url like ?getTotalOver&match=4
if(isset($_GET['getTotalOver']))
{ 
    echo getTotalOver($_GET['match']);
}









function checkAuthtoMatch($BattingOrBowlingTeam)
        {        

            if(isset($_GET['match']))
            { 
                $match=$_GET['match'];
            // Check if email is stored in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  } else {
    // Set a default value or leave it empty if no email in session
    $email = "";
  }
  include 'db.php';
            
            $sql = "SELECT $BattingOrBowlingTeam FROM `cricket_match` WHERE id='$match' and email='$email'";
            $result = $conn->query($sql);
            //echo $sql;
           
            if ($result->num_rows > 0) {
                

                // Iterate through each row in the result set
                while ($row = $result->fetch_assoc()) {
                    
                    return htmlspecialchars($row[$BattingOrBowlingTeam]);
                }

                

            } 

            // Close the database connection
            $conn->close();
        }
        }





// Function to get the current ball_no from the inning table
function getCurrentBallNo($match_id) {
    // Database connection parameters
    include 'db.php';

    // SQL query to get the most recent ball_no
    $sql = "
        SELECT ball_no
        FROM inning
        WHERE match_id = ?
        ORDER BY timestamp DESC
        LIMIT 1
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the match_id parameter
    $stmt->bind_param("i", $match_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Initialize the current ball_no as null
    $current_ball_no = null;

    // Fetch the row
    if ($row = $result->fetch_assoc()) {
        $current_ball_no = $row['ball_no'];
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Return the current ball_no
    if($current_ball_no=="")
    return "0";
    else
    return $current_ball_no;
}

// Usage example:
// Assuming you have a specific match_id for which you want the current ball_no
//$match_id = 4; // Change this to the appropriate match_id you are interested in
//$current_ball_no = getCurrentBallNo($match_id);
//echo $current_ball_no;


// Function to add values to the inning table from a GET URL
function addInningValues() {
    // Get the values from the URL query string
    $match_id = isset($_GET['match_id']) ? (int) $_GET['match_id'] : null;
    $ball_no = isset($_GET['ball_no']) ? (int) $_GET['ball_no'] : null;
    $run = isset($_GET['run']) ? $_GET['run'] : null;
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $bowler = isset($_GET['bowler']) ? $_GET['bowler'] : null;
    $batsman = isset($_GET['batsman']) ? $_GET['batsman'] : null;

    // Validate the required parameters
    if ($match_id === null || $ball_no === null || $run === null || $type === null || $bowler === null || $batsman === null) {
        echo "Missing required parameters.";
        return;
    }

    // Database connection parameters
    include 'db.php';

    // SQL query to insert values into the inning table
    $sql = "
        INSERT INTO inning (match_id, ball_no, run, type, bowler, batsman)
        VALUES (?, ?, ?, ?, ?, ?)
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("iissss", $match_id, $ball_no, $run, $type, $bowler, $batsman);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Values added successfully to the inning table.";
    } else {
        echo "Error adding values: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}





// Function to get the sum of all runs from the inning table where type is Run, Boundary, or Extra and match_id = 4
function getSumOfRuns($match_id) {
    // Database connection parameters
    include 'db.php';

    // SQL query to calculate the sum of runs where type is Run, Boundary, or Extra and match_id is 4
    $sql = "
        SELECT SUM(run) AS total_runs
        FROM inning
        WHERE type IN ('Run', 'Boundary', 'Extra')
        AND match_id = ?
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the match_id parameter
    $stmt->bind_param("i", $match_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Initialize the total runs as null
    $total_runs = null;

    // Fetch the row and get the total runs
    if ($row = $result->fetch_assoc()) {
        $total_runs = $row['total_runs'];
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Return the total runs
    return $total_runs;
}



// Function to get the last six runs from the inning table and return them as a comma-separated string
function getLastSixRuns($match_id) {
    // Database connection parameters
   include "db.php";

    // SQL query to get the last six runs from the inning table
    $sql = "
        SELECT run
        FROM inning
        WHERE match_id = ?
        ORDER BY timestamp DESC
        LIMIT 6
    ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the match_id parameter
    $stmt->bind_param("i", $match_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Initialize an array to store the runs
    $runs = [];

    // Fetch the rows and add the run values to the array
    while ($row = $result->fetch_assoc()) {
        $runs[] = $row['run'];
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Reverse the order of the runs array to present them in chronological order
    $runs = array_reverse($runs);

    // Convert the runs array to a comma-separated string
    $runs_string = implode(',', $runs);

    // Return the comma-separated string
    return $runs_string;
}

// Example usage
//$match_id = 4; // Specify the match ID you are interested in
//$last_six_runs = getLastSixRuns($match_id);
//echo "The last six runs for match ID $match_id are: $last_six_runs";




// Function to get the last six runs from the inning table and return them as a comma-separated string
function getTotalOver($match_id) {
    // Database connection parameters
   include "db.php";

    // SQL query to get the last six runs from the inning table
    $sql = "SELECT total_over FROM cricket_match WHERE id =?";
// Database connection parameters
include 'db.php';


// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the match_id parameter
$stmt->bind_param("i", $match_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Initialize the total runs as null
$total_over = null;

// Fetch the row and get the total runs
if ($row = $result->fetch_assoc()) {
    $total_over = $row['total_over'];
}

// Close the statement and the connection
$stmt->close();
$conn->close();

// Return the total runs
return $total_over;

}

// Example usage:
//$match_id = 4;
//$total_over = getTotalOver($match_id);
//echo "Total overs in match $match_id: " . $total_over;