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
  <title>View Teams</title>
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
    <h2>View Teams</h2>

    <div class="filters">
      Filters
      <form action="" class="myform" method = "POST" >
        <input type="text" name="team_id" id="" placeholder="Team ID" />
        <input type="text" name="team_name" id="" placeholder="Team Name" />
        <input type="text" name="wins" id="" placeholder="Wins" />
        <input type="text" name="losses" id="" placeholder="Losses" />
        <input type="text" name="draws" id="" placeholder="Draws" />
        <input type="text" name="goals_scored" id="" placeholder="Goals Scored" />
        <input type="text" name="goals_conceded" id="" placeholder="Goals Conceded" />
        <input type="text" name="clean_sheets" id="" placeholder="Clean Sheets" />
        <input type="text" name="yellow_cards" id="" placeholder="Yellow Cards" />
        <input type="text" name="red_cards" id="" placeholder="Red Cards" />
        <input type="text" name="highes_finish" id="" placeholder="Highest Finish" />
        <input type="text" name="group_id" id="" placeholder="Group ID" />
        <input type="submit" name="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Team ID</th>
        <th>Team Name</th>
        <th>Wins</th>
        <th>Losses</th>
        <th>Draws</th>
        <th>Goal Scored</th>
        <th>Goals Conceded</th>
        <th>Clean Sheets</th>
        <th>Yellow Cards</th>
        <th>Red Cards</th>
        <th>Highest Finish</th>
        <th>Group ID</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {

        $team_id = $_POST['team_id'];       // use variable names as given in the "name" attribute above
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

        $conditions = [];
        if (!empty($team_id)) {
          $conditions[] = "team_id = '" . $con->real_escape_string($team_id) . "'";   // change the variable inside string according to the column name in database
        }
        if (!empty($team_name)) {
          $conditions[] = "team_name LIKE '%" . $con->real_escape_string($team_name) . "%'";
        }
        if (!empty($wins)) {
          $conditions[] = "wins = '" . $con->real_escape_string($wins) . "'";
        }
        if (!empty($losses)) {
          $conditions[] = "losses '" . $con->real_escape_string($losses) . "'";
        }
        if (!empty($draws)) {
          $conditions[] = "draws = '" . $con->real_escape_string($draws) . "'";
        }
        if (!empty($goals_scored)) {
          $conditions[] = "goals_scored = '" . $con->real_escape_string($goals_scored) . "'";
        }
        if (!empty($goals_conceded)) {
          $conditions[] = "goals_conceded = '" . $con->real_escape_string($goals_conceded) . "'";
        }
        if (!empty($clean_sheets)) {
          $conditions[] = "clean_sheets = '" . $con->real_escape_string($clean_sheets) . "'";
        }
        if (!empty($yellow_cards)) {
          $conditions[] = "yellow_cards = '" . $con->real_escape_string($yellow_cards) . "'";
        }
        if (!empty($red_cards)) {
          $conditions[] = "red_cards = '" . $con->real_escape_string($red_cards) . "'";
        }
        if (!empty($highest_finish)) {
          $conditions[] = "highest_finish = '" . $con->real_escape_string($highest_finish) . "'";
        }
        if (!empty($group_id)) {
          $conditions[] = "group_id = '" . $con->real_escape_string($group_id) . "'";
        }

        $sql = "SELECT * FROM `wcteams`";    //change table name accordingly
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);   //same
        }

        $result = $con->query($sql);

        foreach ($result as $value) { // use variable names same as the column names in the database
          ?>
                  <tr>
                    <td><?php echo $value['team_id']; ?></td>
                    <td><?php echo $value['team_name']; ?></td>
                    <td><?php echo $value['wins']; ?></td>
                    <td><?php echo $value['losses']; ?></td>
                    <td><?php echo $value['draws']; ?></td>
                    <td><?php echo $value['goals_scored']; ?></td>
                    <td><?php echo $value['goals_conceded']; ?></td>
                    <td><?php echo $value['clean_sheets']; ?></td>
                    <td><?php echo $value['yellow_cards']; ?></td>
                    <td><?php echo $value['red_cards']; ?></td>
                    <td><?php echo $value['highest_finish']; ?></td>
                    <td><?php echo $value['group_id']; ?></td>
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