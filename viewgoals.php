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
  <title>View Goals</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo "<a href=$index_url>Home</a>
      <a href=$insert_url>Insert</a>
      <a href=$view_url>View</a>
      "?>;

  </div>
  <div class="container">
    <h2>View Goals</h2>

    <div class="filters">
      Filters
      <form action="" method="post" class="myform">
        <input type="text" name="goal_id" placeholder="Goal ID" />
        <input type="text" name="goal_scorer" placeholder="Goal Scorer" />
        <input type="text" name="scored_against" placeholder="Scored Against" />
        <input type="text" name="Round" placeholder="Round" />
        <input type="text" name="goal_minute" placeholder="Goal Minute" />
        <input type="text" name="minute_format" placeholder="Minute Format" />
        <input type="text" name="team_id" placeholder="Team ID" />
        <input type="text" name="match_id" placeholder="Match ID" />
        <input type="submit" name="submit" value="Filter">
      </form>
    </div>

    <table>
      <tr>
        <th>Goal ID</th>
        <th>Goal Scorer</th>
        <th>Scored Against</th>
        <th>Round</th>
        <th>Goal Minute</th>
        <th>Minute Format</th>
        <th>Team ID</th>
        <th>Match ID</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {
        $goal_id = $_POST['goal_id'];
        $goal_scorer = $_POST['goal_scorer'];
        $scored_against = $_POST['scored_against'];
        $Round = $_POST['Round'];
        $goal_minute = $_POST['goal_minute'];
        $minute_format = $_POST['minute_format'];
        $team_id = $_POST['team_id'];
        $match_id = $_POST['match_id'];

        $conditions = [];
        if (isset($goal_id) && !empty($goal_id)) {
          $conditions[] = "goal_id = '" . $con->real_escape_string($goal_id) . "'";
        }
        if (isset($goal_scorer) && !empty($goal_scorer)) {
          $conditions[] = "goal_scorer LIKE '%" . $con->real_escape_string($goal_scorer) . "%'";
        }
        if (isset($scored_against) && !empty($scored_against)) {
          $conditions[] = "scored_against LIKE '%" . $con->real_escape_string($scored_against) . "%'";
        }
        if (isset($Round) && !empty($Round)) {
          $conditions[] = "Round = '" . $con->real_escape_string($Round) . "'";
        }
        if (isset($goal_minute) && !empty($goal_minute)) {
          $conditions[] = "goal_minute = '" . $con->real_escape_string($goal_minute) . "'";
        }
        if (isset($minute_format) && !empty($minute_format)) {
          $conditions[] = "minute_format LIKE '%" . $con->real_escape_string($minute_format) . "%'";
        }
        if (isset($team_id) && !empty($team_id)) {
          $conditions[] = "team_id = '" . $con->real_escape_string($team_id) . "'";
        }
        if (isset($match_id) && !empty($match_id)) {
          $conditions[] = "match_id = '" . $con->real_escape_string($match_id) . "'";
        }

        $sql = "SELECT * FROM wcgoals";
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $con->query($sql);

        if ($result) {
          while ($value = $result->fetch_assoc()) {
            echo "<tr>
                    <form action='' method='POST'>
                      <input type='hidden' name='goal_id' value='{$value['goal_id']}'>
                      <input type='hidden' name='match_id' value='{$value['match_id']}'>
                      <td>{$value['goal_id']}</td>
                      <td>{$value['goal_scorer']}</td>
                      <td>{$value['scored_against']}</td>
                      <td>{$value['Round']}</td>
                      <td>{$value['goal_minute']}</td>
                      <td>{$value['minute_format']}</td>
                      <td>{$value['team_id']}</td>
                      <td>{$value['match_id']}</td>
                      
                      <td> <input type='submit' name='edit_submit' value='Edit'></td>
                      <td> <input type='submit' name='delete_submit' value='Delete'></td>
                    </form>
                  </tr>";
          }
        }
      }

      if (isset($_POST['delete_submit'])) {
        $goal_id = $_POST['goal_id'];
        $sql = "DELETE FROM wcgoals WHERE goal_id = '$goal_id'";
        $con->query($sql);

        // Fetch the updated list of goals after deletion
        $sql = "SELECT * FROM wcgoals";
        $result = $con->query($sql);

        while ($value = $result->fetch_assoc()) {
          echo "<tr>
                  <form action='' method='POST'>
                    <input type='hidden' name='goal_id' value='{$value['goal_id']}'>
                    <input type='hidden' name='match_id' value='{$value['match_id']}'>
                    <td>{$value['goal_id']}</td>
                    <td>{$value['goal_scorer']}</td>
                    <td>{$value['scored_against']}</td>
                    <td>{$value['Round']}</td>
                    <td>{$value['goal_minute']}</td>
                    <td>{$value['minute_format']}</td>
                    <td>{$value['team_id']}</td>
                    <td>{$value['match_id']}</td>
                    <td> <input type='submit' name='edit_submit' value='Edit'></td>
                      <td> <input type='submit' name='delete_submit' value='Delete'></td>
                  </form>
                </tr>";
        }
      }

      if (isset($_POST['edit_submit'])) {
        $goal_id = $_POST['goal_id'];
        $match_id = $_POST['match_id'];
        ?>
        <tr>
          <form action="" method="POST">
            <input type="hidden" name="goal_id" value="<?php echo $goal_id; ?>" />
            <input type="hidden" name="match_id" value="<?php echo $match_id; ?>" />
            <td><?php echo $goal_id; ?></td>
            <td><input type="text" name="goal_scorer" /></td>
            <td><input type="text" name="scored_against" /></td>
            <td><input type="text" name="Round" /></td>
            <td><input type="text" name="goal_minute" /></td>
            <td><input type="text" name="minute_format" /></td>
            <td><input type="text" name="team_id" /></td>
            <td><?php echo $match_id; ?></td>
            <td><input type="submit" name="save_submit" value  = "Save"/></td>
          </form>
        </tr>
        <?php
      }

      if (isset($_POST['save_submit'])) {
        $goal_id = $_POST['goal_id'];
        $goal_scorer = $_POST['goal_scorer'];
        $scored_against = $_POST['scored_against'];
        $Round = $_POST['Round'];
        $goal_minute = $_POST['goal_minute'];
        $minute_format = $_POST['minute_format'];
        $team_id = $_POST['team_id'];
        $match_id = $_POST['match_id'];

        $updates = [];
        if (isset($goal_scorer) && !empty($goal_scorer)) {
          $updates[] = "goal_scorer = '" . $con->real_escape_string($goal_scorer) . "'";
        }
        if (isset($scored_against) && !empty($scored_against)) {
          $updates[] = "scored_against = '" . $con->real_escape_string($scored_against) . "'";
        }
        if (isset($Round) && !empty($Round)) {
          $updates[] = "Round = '" . $con->real_escape_string($Round) . "'";
        }
        if (isset($goal_minute) && !empty($goal_minute)) {
          $updates[] = "goal_minute = '" . $con->real_escape_string($goal_minute) . "'";
        }
        if (isset($minute_format) && !empty($minute_format)) {
          $updates[] = "minute_format = '" . $con->real_escape_string($minute_format) . "'";
        }
        if (isset($team_id) && !empty($team_id)) {
          $updates[] = "team_id = '" . $con->real_escape_string($team_id) . "'";
        }
        if (isset($match_id) && !empty($match_id)) {
          $updates[] = "match_id = '" . $con->real_escape_string($match_id) . "'";
        }

        if (count($updates) > 0) {
          $sql = "UPDATE `wcgoals` SET " . implode(', ', $updates) . " WHERE goal_id = '" . $con->real_escape_string($goal_id) . "'";
          $con->query($sql);
        }

        // Fetch the updated list of goals after updating
        $sql = "SELECT * FROM wcgoals";
        $result = $con->query($sql);

        while ($value = $result->fetch_assoc()) {
          echo "<tr>
                  <form action='' method='POST'>
                    <input type='hidden' name='goal_id' value='{$value['goal_id']}'>
                    <input type='hidden' name='match_id' value='{$value['match_id']}'>
                    <td>{$value['goal_id']}</td>
                    <td>{$value['goal_scorer']}</td>
                    <td>{$value['scored_against']}</td>
                    <td>{$value['Round']}</td>
                    <td>{$value['goal_minute']}</td>
                    <td>{$value['minute_format']}</td>
                    <td>{$value['team_id']}</td>
                    <td>{$value['match_id']}</td>
                    <td> <input type='submit' name='edit_submit' value='Edit'></td>
                      <td> <input type='submit' name='delete_submit' value='Delete'></td>
                  </form>
                </tr>";
        }
      }

      $con->close();
      ?>
    </table>
  </div>
</body>

</html>
