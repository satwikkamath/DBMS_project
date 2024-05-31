<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Data</title>
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
    <h2>View Matches</h2>

    <div class="filters">
      Filters
      <form action="" class="myform" method = "POST">
        <input type="text" name="match_id" id="" placeholder="Match ID" />
        <input type="text" name="date" id="" placeholder="Date" />
        <input type="text" name="round" id="" placeholder="Round" />
        <input type="text" name="home_team" id="" placeholder="Home Team" />
        <input type="text" name="away_team" id="" placeholder="Away Team" />
        <input type="text" name="result" id="" placeholder="Result" />
        <input type="text" name="stadium_name" id="" placeholder="Stadium Name" />
        <input type="text" name="stadium_id" id="" placeholder="Stadium ID" />
        <input type="submit" name = "submit"></input>
      </form>
    </div>
    <table>
      <tr>
        <th>Match ID</th>
        <th>Date</th>
        <th>Round</th>
        <th>Home Team</th>
        <th>Away Team</th>
        <th>Result</th>
        <th>Stadium Name</th>
        <th>Stadium ID</th>
      </tr>
      <?php

      $con = new mysqli("localhost", "root", "", "fifa");  // same for all
      
      if (isset($_POST['submit'])) {

        $match_id = $_POST['match_id'];       // use variable names as given in the "name" attribute above
        $date = $_POST['date'];
        $round = $_POST['round'];
        $home_team = $_POST['home_team'];
        $away_team = $_POST['away_team'];
        $result = $_POST['result'];
        $stadium_name = $_POST['stadium_name'];
        $stadium_id = $_POST['stadium_id'];

        $conditions = [];
        if (!empty($match_id)) {
          $conditions[] = "match_id = '" . $con->real_escape_string($match_id) . "'";   // change the variable inside string according to the column name in database
        }
        if (!empty($date)) {
          $conditions[] = "Date '" . $con->real_escape_string($date) . "'";
        }
        if (!empty($round)) {
          $conditions[] = "round = '" . $con->real_escape_string($round) . "'";
        }
        if (!empty($home_team)) {
          $conditions[] = "home_team '" . $con->real_escape_string($home_team) . "'";
        }
        if (!empty($away_team)) {
          $conditions[] = "away_team = '" . $con->real_escape_string($away_team) . "'";
        }
        if (!empty($result)) {
          $conditions[] = "Result = '" . $con->real_escape_string($Result) . "'";
        }
        if (!empty($stadium_name)) {
          $conditions[] = "stadium_name = '" . $con->real_escape_string($stadium_name) . "'";
        }
        if (!empty($stadium_id)) {
          $conditions[] = "stadium_id = '" . $con->real_escape_string($stadium_id) . "'";
        }
        $sql = "SELECT * FROM `wcmatches`";    //change table name accordingly
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);   //same
        }

        $result = $con->query($sql);
        foreach ($result as $value) { // use variable names same as the column names in the database
          ?>
              <tr>
                <td><?php echo $value['match_id']; ?></td>
                <td><?php echo $value['Date']; ?></td>
                <td><?php echo $value['round']; ?></td>
                <td><?php echo $value['home_team']; ?></td>
                <td><?php echo $value['away_team']; ?></td>
                <td><?php echo $value['Result']; ?></td>
                <td><?php echo $value['stadium_name']; ?></td>
                <td><?php echo $value['stadium_id']; ?></td>
              </tr>
              <?php
        }
      }

      mysqli_close($con);
      ?>
    </table>
  </div>
</body>

</html>