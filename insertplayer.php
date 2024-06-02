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
  <title>Insert Player Data</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo "<a href='$index_url'>Home</a>
      <a href='$insert_url'>Insert</a>
      <a href='$view_url'>View</a>"; ?>
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
        $player = $_POST['player'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $age = $_POST['age'];
        $club = $_POST['club'];
        $birth_year = $_POST['birth_year'];
        $games = $_POST['games'];
        $games_starts = $_POST['games_starts'];
        $minutes = $_POST['minutes'];
        $minutes_90s = $_POST['minutes_90s'];
        $goals = $_POST['goals'];
        $assists = $_POST['assists'];
        $goals_pens = $_POST['goals_pens'];
        $pens_made = $_POST['pens_made'];
        $cards_yellow = $_POST['cards_yellow'];
        $cards_red = $_POST['cards_red'];
        $goals_per90 = $_POST['goals_per90'];
        $assists_per90 = $_POST['assists_per90'];
        $goals_pens_per90 = $_POST['goals_pens_per90'];
        $goals_assists_pens_per90 = $_POST['goals_assists_pens_per90'];

        // Prepare SQL statement
        $sql = "INSERT INTO player_stats (player, position, team, age, club, birth_year, games, games_starts, minutes, minutes_90s, goals, assists, goals_pens, pens_made, cards_yellow, cards_red, goals_per90, assists_per90, goals_pens_per90, goals_assists_pens_per90) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);

        // Bind parameters with correct types
        // The types should match the columns in the table: strings for text fields, integers for integers, doubles for float fields
        $stmt->bind_param("sssisiiddiiiiiiiiidd", $player, $position, $team, $age, $club, $birth_year, $games, $games_starts, $minutes, $minutes_90s, $goals, $assists, $goals_pens, $pens_made, $cards_yellow, $cards_red, $goals_per90, $assists_per90, $goals_pens_per90, $goals_assists_pens_per90);

        // Execute statement
        if ($stmt->execute()) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close statement and connection
        $stmt->close();
        $con->close();
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="myform">
      <input type="text" placeholder="Player" id="player" name="player" required><br><br>
      <input type="text" placeholder="Position" id="position" name="position" required><br><br>
      <input type="text" placeholder="Team" id="team" name="team" required><br><br>
      <input type="text" placeholder="Age" id="age" name="age" required><br><br>
      <input type="text" placeholder="Club" id="club" name="club" required><br><br>
      <input type="text" placeholder="Birth Year" id="birth_year" name="birth_year" required><br><br>
      <input type="text" placeholder="Games" id="games" name="games" required><br><br>
      <input type="text" placeholder="Game_Starts" id="games_starts" name="games_starts" required><br><br>
      <input type="text" placeholder="Minutes" id="minutes" name="minutes" required><br><br>
      <input type="text" placeholder="Minutes_90" id="minutes_90s" name="minutes_90s" required><br><br>
      <input type="text" placeholder="Goals" id="goals" name="goals" required><br><br>
      <input type="text" placeholder="Assists" id="assists" name="assists" required><br><br>
      <input type="text" placeholder="Goals Penalties" id="goals_pens" name="goals_pens" required><br><br>
      <input type="text" placeholder="Pens Made" id="pens_made" name="pens_made" required><br><br>
      <input type="text" placeholder="Yellow Cards" id="cards_yellow" name="cards_yellow" required><br><br>
      <input type="text" placeholder="Red Cards" id="cards_red" name="cards_red" required><br><br>
      <input type="text" placeholder="Goals per 90" id="goals_per90" name="goals_per90" required><br><br>
      <input type="text" placeholder="Assists per 90" id="assists_per90" name="assists_per90" required><br><br>
      <input type="text" placeholder="Goal Penalties per 90" id="goals_pens_per90" name="goals_pens_per90" required><br><br>
      <input type="text" placeholder="Goal Assists per 90" id="goals_assists_pens_per90" name="goals_assists_pens_per90" required><br><br>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>
