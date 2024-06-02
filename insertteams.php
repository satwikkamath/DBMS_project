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
      <a href=$view_url>View</a>
      <a href=$edit_url>Edit</a>
      <a href=$delete_url>Delete</a>"; ?>
  </div>
  <div class="container">
    <h2>Insert Data</h2>
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
    <label for="team_id">Team ID:</label>
        <input type="text" id="team_id" name="team_id" required>
        
        <label for="team_name">Team Name:</label>
        <input type="text" id="team_name" name="team_name" required>
        
        <label for="wins">Wins:</label>
        <input type="text" id="wins" name="wins" required>

        <label for="losses">Losses:</label>
        <input type="text" id="losses" name="losses" required>

        <label for="draws">Draws:</label>
        <input type="text" id="draws" name="draws" required>

        <label for="goals_scored">Goals Scored:</label>
        <input type="text" id="goals_scored" name="goals_scored" required>

        <label for="goals_conceded">Goals Conceded:</label>
        <input type="text" id="goals_conceded" name="goals_conceded" required>

        <label for="clean_sheets">Clean Sheets:</label>
        <input type="text" id="clean_sheets" name="clean_sheets" required>

        <label for="yellow_cards">Yellow Cards:</label>
        <input type="text" id="yellow_cards" name="yellow_cards" required>

        <label for="red_cards">Red Cards:</label>
        <input type="text" id="red_cards" name="red_cards" required>

        <label for="highest_finish">Highest Finish:</label>
        <input type="text" id="highest_finish" name="highest_finish" required>

        <label for="group_id">Group ID:</label>
        <input type="text" id="group_id" name="group_id">
        
        <input type="submit" value="Insert" name="insert-button">
    </form>
  </body>
  </html>
   