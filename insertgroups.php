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
  <title>Insert Groups</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo " <a href=$index_url>Home</a>
    <a href=$standings_url>Standings</a>
      <a href=$insert_url>Insert</a>
      <a href=$view_url>View</a>;" ?>
  </div>
  <div class="container">
    <h2>Insert Group Data</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Create connection
        $con = new mysqli("localhost", "root", "", "fifa");

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // Get form data
        $group_id = $_POST['group_id'];
        $team_name = $_POST['team_name'];
        $points_gained = $_POST['points_gained'];
        $positions = $_POST['positions'];
        $status = $_POST['status'];
        $team_id = $_POST['team_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO wcgroup (group_id, team_name, points_gained, positions, status, team_id) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare and bind
        $stmt = $con->prepare($sql);
          // "ssi" means string, string, integer
        $stmt->bind_param("sssssi", $group_id, $team_name, $points_gained, $positions, $status, $team_id);

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
        <input type="text" id="group_id" placeholder="Group ID" name="group_id" required>
        
        <input type="text" id="team_name" placeholder="Team Name" name="team_name" required>
        
        <input type="text" id="points_gained" placeholder="Points Gained" name="points_gained" required>

        <input type="text" id="positions" placeholder="Positions" name="positions" required>

        <input type="text" id="status" placeholder="Status" name="status" required>

        <input type="text" id="team_id" placeholder="Team ID" name="team_id" required>
        </div>
        <input type="submit" value="Insert" name="insert-button">
    </form>
  </body>
  </html>
   