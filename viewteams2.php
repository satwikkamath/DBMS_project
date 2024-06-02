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
      <form action="" method="POST" class="myform">
        <input type="text" name="team_id" placeholder="Team ID" />
        <input type="text" name="team_name" placeholder="Team Name" />
        <input type="text" name="wins" placeholder="Wins" />
        <input type="text" name="losses" placeholder="Losses" />
        <input type="text" name="draws" placeholder="Draws" />
        <input type="text" name="goals_scored" placeholder="Goals Scored" />
        <input type="text" name="goals_conceded" placeholder="Goals Conceded" />
        <input type="text" name="clean_sheets" placeholder="Clean Sheets" />
        <input type="text" name="yellow_cards" placeholder="Yellow Cards" />
        <input type="text" name="red_cards" placeholder="Red Cards" />
        <input type="text" name="highest_finish" placeholder="Highest Finish" />
        <input type="text" name="group_id" placeholder="Group ID" />
        <input type="submit" name="submit" value="Filter">
      </form>
    </div>

    <table>
      <tr>
        <th>Team ID</th>
        <th>Team Name</th>
        <th>Wins</th>
        <th>Losses</th>
        <th>Draws</th>
        <th>Goals Scored</th>
        <th>Goals Conceded</th>
        <th>Clean Sheets</th>
        <th>Yellow Cards</th>
        <th>Red Cards</th>
        <th>Highest Finish</th>
        <th>Group ID</th>
        <th>Actions</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {
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

        $conditions = [];
        if (!empty($team_id)) {
          $conditions[] = "team_id = '" . $con->real_escape_string($team_id) . "'";
        }
        if (!empty($team_name)) {
          $conditions[] = "team_name LIKE '%" . $con->real_escape_string($team_name) . "%'";
        }
        if (!empty($wins)) {
          $conditions[] = "wins = '" . $con->real_escape_string($wins) . "'";
        }
        if (!empty($losses)) {
          $conditions[] = "losses = '" . $con->real_escape_string($losses) . "'";
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
          $conditions[] = "highest_finish LIKE '%" . $con->real_escape_string($highest_finish) . "%'";
        }
        if (!empty($group_id)) {
          $conditions[] = "group_id LIKE '%" . $con->real_escape_string($group_id) . "%'";
        }

        $sql = "SELECT * FROM wcteams";
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $con->query($sql);

        if ($result) {
          foreach ($result as $value) {
            ?>
            <tr>
              <form action="" method="POST">
                <input type="hidden" name="team_id" value="<?php echo $value['team_id']; ?>">
                <input type="hidden" name="group_id" value="<?php echo $value['group_id']; ?>">
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
                <td>
                  <button type="submit" name="delete_submit">Delete</button>
                  <button type="submit" name="edit_submit">Edit</button>
                </td>
              </form>
            </tr>
            <?php
          }
        }
      }

      if (isset($_POST['delete_submit'])) {
        $team_id = $_POST['team_id'];
        $sql = "DELETE FROM wcteams WHERE team_id = '$team_id'";
        $con->query($sql);

        $sql = "SELECT * FROM wcteams";
        $result = $con->query($sql);

        if ($result) {
          foreach ($result as $value) {
            ?>
            <tr>
            <form action="" method="POST">
                <input type="hidden" name="team_id" value="<?php echo $value['team_id']; ?>">
                <input type="hidden" name="group_id" value="<?php echo $value['group_id']; ?>">
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
                <td>
                  <button type="submit" name="delete_submit">Delete</button>
                  <button type="submit" name="edit_submit">Edit</button>
                </td>
              </form>
            </tr>
            <?php
          }
          }
      }

      if (isset($_POST['edit_submit'])) {
        $team_id = $_POST['team_id'];
        $group_id = $_POST['group_id'];
        ?>
                      <tr>
                        <form action="" method="POST">
                        <input type="text" hidden name="team_id" value="<?php echo $team_id; ?>" />
                        <input type="text" hidden name="group_id" value="<?php echo $group_id; ?>" />
                       
                          <td><?php echo $team_id; ?></td>
                          <td><input type="text" name="team_name"  /></td>
                          <td><input type="text" name="wins"  /></td>
                          <td><input type="text" name="losses"  /></td>
                          <td><input type="text" name="draws"  /></td>
                          <td><input type="text" name="goals_scored" /></td>
                          <td><input type="text" name="goals_conceded" /></td>
                          <td><input type="text" name="clean_sheets" /></td>
                          <td><input type="text" name="yellow_cards" /></td>
                          <td><input type="text" name="red_cards" /></td>
                          <td><input type="text" name="highest_finish" /></td>
                          <td><input type="text" name="group_id" /></td>
                          <td><?php echo $group_id; ?></td>
                          <td><button type='submit' name='save_submit'>Save</button></td>
                        </form>
                      </tr>
                      <?php
      }

      if (isset($_POST['save_submit'])) {
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

        $updates = [];
        if (!empty($team_name)) {
            $updates[] = "team_name = '" . $con->real_escape_string($team_name) . "'";
        }
        if (!empty($wins)) {
            $updates[] = "wins = '" . $con->real_escape_string($wins) . "'";
        }
        if (!empty($losses)) {
            $updates[] = "losses = '" . $con->real_escape_string($losses) . "'";
        }
        if (!empty($draws)) {
            $updates[] = "draws = '" . $con->real_escape_string($draws) . "'";
        }
        if (!empty($goals_scored)) {
            $updates[] = "goals_scored = '" . $con->real_escape_string($goals_scored) . "'";
        }
        if (!empty($goals_conceded)) {
            $updates[] = "goals_conceded = '" . $con->real_escape_string($goals_conceded) . "'";
        }
        if (!empty($clean_sheets)) {
            $updates[] = "clean_sheets = '" . $con->real_escape_string($clean_sheets) . "'";
        }
        if (!empty($yellow_cards)) {
            $updates[] = "yellow_cards = '" . $con->real_escape_string($yellow_cards) . "'";
        }
        if (!empty($red_cards)) {
            $updates[] = "red_cards = '" . $con->real_escape_string($red_cards) . "'";
        }
        if (!empty($highest_finish)) {
            $updates[] = "highest_finish = '" . $con->real_escape_string($highest_finish) . "'";
        }
        if (!empty($group_id)) {
            $updates[] = "group_id = '" . $con->real_escape_string($group_id) . "'";
        }

        if (!empty($team_id) && count($updates) > 0) {
            $sql = "UPDATE `wcteams` SET " . implode(",", $updates) . " WHERE team_id = '" . $con->real_escape_string($team_id) . "'";
            $con->query($sql);
        }

 


        $sql = "SELECT * FROM `wcteams`";
        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
                                      <tr>
                                        <form action="" method="POST">
                                          <input type="text" hidden name="team_id" value="<?php echo $value['team_id']; ?>" />
                                          <input type="text" hidden name="team_name" value="<?php echo $value['team_name']; ?>" />
                                          <input type="text" hidden name="wins" value="<?php echo $value['wins']; ?>" />
                                          <input type="text" hidden name="losses" value="<?php echo $value['losses']; ?>" />
                                          <input type="text" hidden name="draws" value="<?php echo $value['draws']; ?>" />
                                          <input type="text" hidden name="goals_scored" value="<?php echo $value['goals_scored']; ?>" />
                                          <input type="text" hidden name="goals_conceded" value="<?php echo $value['goals_conceded']; ?>" />
                                          <input type="text" hidden name="clean_sheets" value="<?php echo $value['clean_sheets']; ?>" />
                                          <input type="text" hidden name="yellow_cards" value="<?php echo $value['yellow_cards']; ?>" />
                                          <input type="text" hidden name="red_cards" value="<?php echo $value['red_cards']; ?>" />
                                          <input type="text" hidden name="highest_finish" value="<?php echo $value['highest_finish']; ?>" />
                                          <input type="text" hidden name="group_id" value="<?php echo $value['group_id']; ?>" />
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
                                          <td><button type='submit' name='delete_submit'>Delete</button></td>
                                          <td><button type='submit' name='edit_submit'>Edit</button></td>
                                        </form>
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
