

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

<style>
    .toast {
        visibility: hidden;
        min-width: 250px;
        margin: auto;
        background-color: #6fc0a6;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        transform: translateX(-50%);
    }
    .show {
        visibility: visible;
        -webkit-animation: fadeIn 0.5s, fadeOut 0.5s 2.5s;
        animation: fadeIn 0.5s, fadeOut 0.5s 2.5s;
    }
    @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
    }
    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    @-webkit-keyframes fadeOut {
        from {opacity: 1;} 
        to {opacity: 0;}
    }
    @keyframes fadeOut {
        from {opacity: 1;}
        to {opacity: 0;}
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
<button class="button green">Recent Balls = <div id="recent_balls"></div></button>
<button id="total_runs" class="button blue"></button>
<button class="button red">Out = 2</button>
<button id="balls_spent" class="button red"></button>
<hr>
<h2 class="h2">Boundary</h2>
<hr>
<button onclick="addRun(this.innerText,'Boundary')" class="button">4</button>
<button onclick="addRun(this.innerText,'Boundary')" class="button">6</button>
<hr>
<h2 class="h2">Runs</h2>
<hr>
<button onclick="addRun(this.innerText,'Run')" class="button">0</button>
<button onclick="addRun(this.innerText,'Run')" class="button">1</button>
<button onclick="addRun(this.innerText,'Run')" class="button">2</button>
<button onclick="addRun(this.innerText,'Run')" class="button">3</button>
<button onclick="addRun(this.innerText,'Run')" class="button">4</button>
<button onclick="addRun(this.innerText,'Run')" class="button">5</button>
<button onclick="addRun(this.innerText,'Run')" class="button">6</button>
<hr>
<h2 class="h2">Extra</h2>
<hr>
<button onclick="addRun('1','No Ball Extra')" class="button">No Ball</button>
<button onclick="addRun('1','Wide Ball Extra')" class="button">Wide Ball</button>
<button onclick="addRun('1','Leg Ball Extra')" class="button">Leg Ball</button>
<hr>
<h2 class="h2">Wicket</h2>
<hr>
<button onclick="addRun(this.innerText,'Out')" class="button">Bowled</button>
<button onclick="addRun(this.innerText,'Out')" class="button">Catch</button>
<button onclick="addRun(this.innerText,'Out')" class="button">Run</button>
<button onclick="addRun(this.innerText,'Out')" class="button">Stump</button>




<div id="toast" class="toast"></div>


<script>
var TotalOver=<?php   include_once  'Counter db.php';echo getTotalOver($_GET['match']);?>;

const ballsPerOver = 6;
const totalBalls = TotalOver * ballsPerOver;



var balls_spent=<?php   include_once  'Counter db.php';echo getCurrentBallNo($_GET['match']);?>;
document.getElementById("balls_spent").innerHTML="Balls Spent = "+balls_spent+"/"+totalBalls;
var total_runs=<?php   include_once  'Counter db.php';echo getSumOfRuns($_GET['match']);?>;
document.getElementById("total_runs").innerHTML="Total Runs = "+total_runs;
var recent_balls="<?php   include_once  'Counter db.php';echo getLastSixRuns($_GET['match']);?>";
document.getElementById("recent_balls").innerHTML=recent_balls;


if(totalBalls==balls_spent)
{
alert("Batting team now changed");
}




    function showToast(message) {
        var toast = document.getElementById("toast");
        toast.innerHTML = message;
        toast.classList.add("show");
        setTimeout(function(){
            // run after 3 seconds
            toast.classList.remove("show");
            window.location.reload();
        }, 3000);
    }

    function addRun(run,type)
    {

        var elements = document.querySelectorAll("#player");

// Access the second element (index 1) in the NodeList
var batsman = elements[0].value;
var bowler = elements[1].value;

// Now you can work with the elements


if(type=="Run")
{
console.log(batsman+" Hit "+run+" "+type+" to "+bowler);
showToast(batsman+" Hit "+run+" "+type+" to "+bowler);
saveRunToDB(run,type,bowler,batsman);
}
else if(type=="Boundary")
{
console.log(batsman+" Hit "+run+" "+type+" to "+bowler);
showToast(batsman+" Hit "+run+" "+type+" to "+bowler);
saveRunToDB(run,type,bowler,batsman);
}
else if(type=="Out")
{
console.log(batsman+" "+run+" "+type+" by "+bowler);
showToast(batsman+" "+run+" "+type+" by "+bowler);
saveRunToDB(run,type,bowler,batsman);
}
else if(type=="Leg Ball Extra")
{
console.log(type+" "+run+" by "+bowler);
showToast(type+" "+run+" by "+bowler);
saveRunToDB(run,type,bowler,batsman);
}
else  if(type=="No Ball Extra"||type=="Wide Ball Extra")
     {
        console.log(type+" "+run+" by "+bowler);
showToast(type+" "+run+" by "+bowler);
saveRunToDB(run,type,bowler,batsman);
     }



    }





    function saveRunToDB(run,type,bowler,batsman)
    {


        const matchValue = new URLSearchParams(window.location.search).get('match');
     if(type=="No Ball Extra"||type=="Wide Ball Extra")
     {
        balls_spent=balls_spent;
     }
     else
     {
        balls_spent=balls_spent+1;
    }
     
        url="Counter db.php?match_id="+matchValue+"&ball_no="+balls_spent+"&run="+run+"&type="+type+"&bowler="+bowler+"&batsman="+batsman;
     
     // Create a new XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Set up the request
xhr.open('GET', url, true);

// Set up a function to handle the success response
xhr.onreadystatechange = function() {
    // Check if the request is complete (readyState 4)
    // and the response status is 200 (success)
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Log the success response to the console
        console.log('Success:', xhr.responseText);
    }
};

// Send the request
xhr.send();
   console.log(url); 

    }




    
</script>

</body>
</html>
