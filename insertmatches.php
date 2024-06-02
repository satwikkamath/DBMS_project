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
    <?php echo "<a href='$index_url'>Home</a>
    <a href=$standings_url>Standings</a>
      <a href='$insert_url'>Insert</a>
      <a href='$view_url'>View</a>"; ?>
  </div>
  <div class="container">
    <h2>Insert Matches</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Create connection
        $con = new mysqli("localhost", "root", "", "fifa");

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Get form data
        $match_id = $_POST['match_id'];
        $Date = $_POST['Date'];
        $round = $_POST['round'];
        $home_team = $_POST['home_team'];
        $away_team = $_POST['away_team'];
        $Result = $_POST['Result'];
        $stadium_name = $_POST['stadium_name'];
        $stadium_id = $_POST['stadium_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO wcmatches (match_id, Date, round, home_team, away_team, Result, stadium_name, stadium_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);

        // Bind parameters with correct types
        // match_id and stadium_id are integers, the rest are strings
        $stmt->bind_param("isssssss", $match_id, $Date, $round, $home_team, $away_team, $Result, $stadium_name, $stadium_id);

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
      <input type="text" placeholder="Match ID" id="match_id" name="match_id" required>
      <input type="date" placeholder="Date" id="Date" name="Date" required>
      <input type="text" placeholder="Round" id="round" name="round" required>
      <input type="text" placeholder="Home Team" id="home_team" name="home_team" required>
      <input type="text" placeholder="Away Team" id="away_team" name="away_team" required>
      <input type="text" placeholder="Result" id="Result" name="Result" required>
      <input type="text" placeholder="Stadium Name" id="stadium_name" name="stadium_name" required>
      <input type="text" placeholder="Stadium ID" id="stadium_id" name="stadium_id" required>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>
