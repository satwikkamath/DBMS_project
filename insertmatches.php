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
    <?php echo "<a href='$index_url'>Home</a>
      <a href='$insert_url'>Insert</a>
      <a href='$view_url'>View</a>
      <a href='$edit_url'>Edit</a>
      <a href='$delete_url'>Delete</a>"; ?>
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
      <label for="match_id">Match ID:</label>
      <input type="text" id="match_id" name="match_id" required><br><br>
      <label for="Date">Date:</label>
      <input type="date" id="Date" name="Date" required><br><br>
      <label for="round">Round:</label>
      <input type="text" id="round" name="round" required><br><br>
      <label for="home_team">Home Team:</label>
      <input type="text" id="home_team" name="home_team" required><br><br>
      <label for="away_team">Away Team:</label>
      <input type="text" id="away_team" name="away_team" required><br><br>
      <label for="Result">Result:</label>
      <input type="text" id="Result" name="Result" required><br><br>
      <label for="stadium_name">Stadium Name:</label>
      <input type="text" id="stadium_name" name="stadium_name" required><br><br>
      <label for="stadium_id">Stadium ID:</label>
      <input type="text" id="stadium_id" name="stadium_id" required><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>
