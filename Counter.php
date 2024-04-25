

<?php
session_start();



        function listAllTeamPlayersName($teamname)
{     
    
  

    include 'db.php';
        // SQL query to fetch player names from the player table
            $sql = "SELECT name FROM player where teamname='$teamname'";
            $result = $conn->query($sql);

            // Check if there are rows in the result set
            if ($result->num_rows > 0) {
                echo '<select id="player" name="player">';

                // Iterate through each row in the result set
                while ($row = $result->fetch_assoc()) {
                    // Create an option element for each player name
                    echo '<option value="' . htmlspecialchars($row['name']) . '">' . htmlspecialchars($row['name']) . '</option>';
                }

                echo "</select>";

            } else {
                echo '<option value="">No players found</option>';
            }

            // Close the database connection
            $conn->close();
        
        }


        function currentBattingOrBowlingTeam($BattingOrBowlingTeam)
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



       


   

      

            ?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Score Counter</title>
<style>
    body {
        background-color: #fff;
        color: #000;
        font-family: Arial, sans-serif;
        text-align: center;
    }
    .button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin: 5px;
    }
    .green {
        background-color: #4CAF50;
        color: white;
    }
    .blue {
        background-color: #008CBA;
        color: white;
    }
    .red {
        background-color: #f44336;
        color: white;
    }
    .h2 {
        margin: 10px 0;
    }
    hr {
        width: 50%;
        margin: auto;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }
</style>
</head>
<body>
<h1>Score Counter</h1>
<hr>
<button class="button green">Batting: <?php echo currentBattingOrBowlingTeam("current_batting_team");?></button><?php listAllTeamPlayersName(currentBattingOrBowlingTeam("current_batting_team"));?>
 vs 
<button class="button blue">Bowling: <?php echo currentBattingOrBowlingTeam("current_bowling_team");?></button><?php listAllTeamPlayersName(currentBattingOrBowlingTeam("current_bowling_team"));?>
<hr>
<button class="button green">Recent Score = 0 1 0 4 3 5</button>
<button class="button blue">Total Score = 13</button>
<button class="button red">Out = 2</button>
<hr>
<h2 class="h2">Boundary</h2>
<hr>
<button class="button">4</button>
<button class="button">6</button>
<hr>
<h2 class="h2">Runs</h2>
<hr>
<button class="button">1</button>
<button class="button">2</button>
<button class="button">3</button>
<button class="button">4</button>
<button class="button">5</button>
<button class="button">6</button>
<hr>
<h2 class="h2">Extra</h2>
<hr>
<button class="button">No Ball</button>
<button class="button">Wide Ball</button>
<button class="button">Leg Ball</button>
<hr>
<h2 class="h2">Wicket</h2>
<hr>
<button class="button">Bowled</button>
<button class="button">Catch Out</button>
<button class="button">Run Out</button>
<button class="button">Stump Out</button>
</body>
</html>
