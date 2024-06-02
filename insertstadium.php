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
        $stadium_id  = $_POST['stadium_id'];
        $stadium_name  = $_POST['stadium_name'];
        $round = $_POST['round'];
        $location = $_POST['location'];
        $attendance = $_POST['attendance'];
        $match_id = $_POST['match_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO wcstadiums (stadium_id, stadium_name, round, location, attendance, match_id) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);

        // Bind parameters with correct types
        $stmt->bind_param("ssssii", $stadium_id, $stadium_name, $round, $location, $attendance, $match_id);

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
      <label for="stadium_id">Stadium ID:</label>
      <input type="text" id="stadium_id" name="stadium_id" required><br><br>
      <label for="stadium_name">Stadium Name:</label>
      <input type="text" id="stadium_name" name="stadium_name" required><br><br>
      <label for="round">Round:</label>
      <input type="text" id="round" name="round" required><br><br>
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required><br><br>
      <label for="attendance">Attendance:</label>
      <input type="text" id="attendance" name="attendance" required><br><br>
      <label for="match_id">Match ID:</label>
      <input type="text" id="match_id" name="match_id" required><br><br>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>

</html>
