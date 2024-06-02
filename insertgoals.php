<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$edit_data_url = "";
$standings_url = "standings.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insert Data</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo " <a href=$index_url>Home</a>
    <a href=$standings_url>Standings</a>
      <a href=$insert_url>Insert</a>
      <a href=$view_url>View</a>"; ?>
  </div>
  <div class="container">
    <h2>Insert Goals Of Indivisual Players</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Create connection
        $con = new mysqli("localhost", "root", "", "fifa");

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // Get form data
        $goal_id = $_POST['goal_id'];
        $goal_scorer = $_POST['goal_scorer'];
        $scored_against = $_POST['scored_against'];
        $round = $_POST['Round'];
        $goal_minute = $_POST['goal_minute'];
        $minute_format = $_POST['minute_format'];
        $team_id = $_POST['team_id'];
        $match_id = $_POST['match_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO wcgoals (goal_id, goal_scorer, scored_against, Round, goal_minute, minute_format, team_id, match_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);
          // "ssi" means string, string, integer
        $stmt->bind_param("isssssii", $goal_id, $goal_scorer, $scored_against, $round, $goal_minute, $minute_format, $team_id, $match_id);

        // Execute statement
        if ($stmt->execute()) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $con->error . "</p>";
        }

        // Close statement and connection
        $stmt->close();
        $con->close();
    }
    ?>


    <form action="" method="post">
      <div class="myform">
        <input type="text" id="goal_id" placeholder="Goal ID" name="goal_id" required>
        
        <input type="text" id="goal_scorer" placeholder="Goal Scorer" name="goal_scorer" required>
        
        <input type="text" id="scored_against" placeholder="Scored Against" name="scored_against" required>

        <input type="text" id="Round" placeholder="Round" name="Round" required>

        <input type="text" id="goal_minute" placeholder="Goal Minute" name="goal_minute" required>

        <input type="text" id="minute_format" placeholder="Minute Format" name="minute_format" required>
        <input type="text" id="team_id" placeholder="Team ID" name="team_id" required>

        <input type="text" id="match_id" placeholder="Match ID" name="match_id" required>
        </div>
        <input type="submit" value="Insert"  name="insert-button">
    </form>
  </body>
  </html>
   