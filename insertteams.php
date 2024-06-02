<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$edit_data_url = "";
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
      <a href=$insert_url>Insert</a>
      <a href=$view_url>View</a>"; ?>
  </div>
  <div class="container">
    <h2>Insert Team Data</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Create connection
        $con = new mysqli("localhost", "root", "", "fifa");

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // Get form data
        $team_id = $_POST['team_id'];
        $team_name = $_POST['team_name'];
        $wins = $_POST['wins'];
        $losses = $_POST['losses'];
        $draws = $_POST['draws'];
        $goals_scored = $_POST['goals_scored'];
        $goals_conceded = $_POST['goals_conceded'];
        $clean_sheets = $_POST['clean_sheets'];
        $yellow_cards = $_POST['yellow_cards'];
        $red_cards = $_POST['red_cards'];
        $highest_finish = $_POST['highest_finish'];
        $group_id = $_POST['group_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO wcteams (team_id, team_name, wins, losses, draws, goals_scored, goals_conceded, clean_sheets, yellow_cards, red_cards, highest_finish, group_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);
          // "ssi" means string, string, integer
        $stmt->bind_param("isiiiiiiiiss", $team_id, $team_name, $wins, $losses, $draws, $goals_scored, $goals_conceded, $clean_sheets, $yellow_cards, $red_cards, $highest_finish, $group_id);

        // Execute statement
        if ($stmt->execute()) {
            echo "<p>New record created successfully!</p>";
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
        <input type="text" placeholder="Team ID" id="team_id" name="team_id" required>
        
        <input type="text" placeholder="Team Name" id="team_name" name="team_name" required>
        
        <input type="text" placeholder="Wins" id="wins" name="wins" required>

        <input type="text" placeholder="Losses" id="losses" name="losses" required>

        <input type="text" placeholder="Draws" id="draws" name="draws" required>

        <input type="text" placeholder="Goals Scored" id="goals_scored" name="goals_scored" required>

        <input type="text" placeholder="Goals Conceded" id="goals_conceded" name="goals_conceded" required>

        <input type="text" placeholder="Clean Sheets" id="clean_sheets" name="clean_sheets" required>

        <input type="text" placeholder="Yellow Cards" id="yellow_cards" name="yellow_cards" required>

        <input type="text" placeholder="Red Cards" id="red_cards" name="red_cards" required>

        <input type="text" placeholder="Highest Finish" id="highest_finish" name="highest_finish" required>

        <input type="text" placeholder="Group ID" id="group_id" name="group_id">
        </div>
        <input type="submit" value="Insert" name="insert-button">
    </form>
  </body>
  </html>
   