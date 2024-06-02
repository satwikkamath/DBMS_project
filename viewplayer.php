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
      "; ?>
  </div>
  <div class="container">
    <h2>View Players</h2>

    <div class="filters">
      Filters
      <form action="" method="POST">
        <div class="myform">
        <input type="text" name="country" id="" placeholder="Country" />
        </div>
        <input type="submit" name="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Player</th>
        <th>Position</th>
        <th>Team</th>
        <th>Age</th>
        <th>Club</th>
        <th>Birth Year</th>
        <th>Games</th>
        <th>Games Starts</th>
        <th>Minutes</th>
        <th>Goals</th>
        <th>Assists</th>
        <th>Goal Penalties</th>
        <th>Penalties Made</th>
        <th>Yellow Cards</th>
        <th>Red Cards</th>
        <th>Goals Per 90</th>
        <th>Assists Per 90</th>
        <th>Goal Penalties Per 90</th>
        <th>G/A per 90</th>
        <th>Actions</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {
        $country = $_POST['country'];
        $conditions = [];
        if (!empty($country)) {
          $conditions[] = "team = '" . $con->real_escape_string($country) . "'";
        }

        $sql = "SELECT * FROM `player_stats`";
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $con->query($sql);
        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="player" value="<?php echo $value['player']; ?>" />
              <td><?php echo $value['player']; ?></td>
              <td><?php echo $value['position']; ?></td>
              <td><?php echo $value['team']; ?></td>
              <td><?php echo $value['age']; ?></td>
              <td><?php echo $value['club']; ?></td>
              <td><?php echo $value['birth_year']; ?></td>
              <td><?php echo $value['games']; ?></td>
              <td><?php echo $value['games_starts']; ?></td>
              <td><?php echo $value['minutes']; ?></td>
              <td><?php echo $value['goals']; ?></td>
              <td><?php echo $value['assists']; ?></td>
              <td><?php echo $value['goals_pens']; ?></td>
              <td><?php echo $value['pens_made']; ?></td>
              <td><?php echo $value['cards_yellow']; ?></td>
              <td><?php echo $value['cards_red']; ?></td>
              <td><?php echo $value['goals_per90']; ?></td>
              <td><?php echo $value['assists_per90']; ?></td>
              <td><?php echo $value['goals_pens_per90']; ?></td>
              <td><?php echo $value['goals_assists_pens_per90']; ?></td>
              <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
            </form>
          </tr>
          <?php
        }
      }

      if (isset($_POST['delete_submit'])) {
        $player = $_POST['player'];
        $sql = "DELETE FROM `player_stats` WHERE player = '" . $con->real_escape_string($player) . "'";
        $con->query($sql);

        // Refresh the data after deletion
        $sql = "SELECT * FROM `player_stats`";
        $result = $con->query($sql);
        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="player" value="<?php echo $value['player']; ?>" />
              <td><?php echo $value['player']; ?></td>
              <td><?php echo $value['position']; ?></td>
              <td><?php echo $value['team']; ?></td>
              <td><?php echo $value['age']; ?></td>
              <td><?php echo $value['club']; ?></td>
              <td><?php echo $value['birth_year']; ?></td>
              <td><?php echo $value['games']; ?></td>
              <td><?php echo $value['games_starts']; ?></td>
              <td><?php echo $value['minutes']; ?></td>
              <td><?php echo $value['goals']; ?></td>
              <td><?php echo $value['assists']; ?></td>
              <td><?php echo $value['goals_pens']; ?></td>
              <td><?php echo $value['pens_made']; ?></td>
              <td><?php echo $value['cards_yellow']; ?></td>
              <td><?php echo $value['cards_red']; ?></td>
              <td><?php echo $value['goals_per90']; ?></td>
              <td><?php echo $value['assists_per90']; ?></td>
              <td><?php echo $value['goals_pens_per90']; ?></td>
              <td><?php echo $value['goals_assists_pens_per90']; ?></td>
              <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
            </form>
          </tr>
          <?php
        }
      }

      if (isset($_POST['edit_submit'])) {
        $player = $_POST['player'];
        ?>
        <tr>
          <form action="" method="POST">
            <input type="hidden" name="player" value="<?php echo $player; ?>" />
            <td><?php echo $player; ?></td>
            <td><input type="text" name="position" required /></td>
            <td><input type="text" name="team" required /></td>
            <td><input type="text" name="age" required /></td>
            <td><input type="text" name="club" required /></td>
            <td><input type="number" name="birth_year" required /></td>
            <td><input type="number" name="games" required /></td>
            <td><input type="number" name="games_starts" required /></td>
            <td><input type="number" name="minutes" required /></td>
            <td><input type="number" name="goals" required /></td>
            <td><input type="number" name="assists" required /></td>
            <td><input type="number" name="goals_pens" required /></td>
            <td><input type="number" name="pens_made" required /></td>
            <td><input type="number" name="cards_yellow" required /></td>
            <td><input type="number" name="cards_red" required /></td>
            <td><input type="number" step="0.01" name="goals_per90" required /></td>
            <td><input type="number" step="0.01" name="assists_per90" required /></td>
            <td><input type="number" step="0.01" name="goals_pens_per90" required /></td>
            <td><input type="number" step="0.01" name="goals_assists_pens_per90" required /></td>
            <td><input type="submit" name="save_submit" value  = "Save"/></td>

          </form>
        </tr>
        <?php
      }

      if (isset($_POST['save_submit'])) {
        $player = $_POST['player'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $age = $_POST['age'];
        $club = $_POST['club'];
        $birth_year = $_POST['birth_year'];
        $games = $_POST['games'];
        $games_starts = $_POST['games_starts'];
        $minutes = $_POST['minutes'];
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

        $updates = [];
        if (!empty($position)) {
          $updates[] = "position = '" . $con->real_escape_string($position) . "'";
        }
        if (!empty($team)) {
          $updates[] = "team = '" . $con->real_escape_string($team) . "'";
        }
        if (!empty($age)) {
          $updates[] = "age = '" . $con->real_escape_string($age) . "'";
        }
        if (!empty($club)) {
          $updates[] = "club = '" . $con->real_escape_string($club) . "'";
        }
        if (!empty($birth_year)) {
          $updates[] = "birth_year = '" . $con->real_escape_string($birth_year) . "'";
        }
        if (!empty($games)) {
          $updates[] = "games = '" . $con->real_escape_string($games) . "'";
        }
        if (!empty($games_starts)) {
          $updates[] = "games_starts = '" . $con->real_escape_string($games_starts) . "'";
        }
        if (!empty($minutes)) {
          $updates[] = "minutes = '" . $con->real_escape_string($minutes) . "'";
        }
        if (!empty($goals)) {
          $updates[] = "goals = '" . $con->real_escape_string($goals) . "'";
        }
        if (!empty($assists)) {
          $updates[] = "assists = '" . $con->real_escape_string($assists) . "'";
        }
        if (!empty($goals_pens)) {
          $updates[] = "goals_pens = '" . $con->real_escape_string($goals_pens) . "'";
        }
        if (!empty($pens_made)) {
          $updates[] = "pens_made = '" . $con->real_escape_string($pens_made) . "'";
        }
        if (!empty($cards_yellow)) {
          $updates[] = "cards_yellow = '" . $con->real_escape_string($cards_yellow) . "'";
        }
        if (!empty($cards_red)) {
          $updates[] = "cards_red = '" . $con->real_escape_string($cards_red) . "'";
        }
        if (!empty($goals_per90)) {
          $updates[] = "goals_per90 = '" . $con->real_escape_string($goals_per90) . "'";
        }
        if (!empty($assists_per90)) {
          $updates[] = "assists_per90 = '" . $con->real_escape_string($assists_per90) . "'";
        }
        if (!empty($goals_pens_per90)) {
          $updates[] = "goals_pens_per90 = '" . $con->real_escape_string($goals_pens_per90) . "'";
        }
        if (!empty($goals_assists_pens_per90)) {
          $updates[] = "goals_assists_pens_per90 = '" . $con->real_escape_string($goals_assists_pens_per90) . "'";
        }

        if (!empty($player) && count($updates) > 0) {
          $sql = "UPDATE `player_stats` SET " . implode(', ', $updates) . " WHERE player = '" . $con->real_escape_string($player) . "'";
          $con->query($sql);
        }

        // Refresh the data after update
        $sql = "SELECT * FROM `player_stats`";
        $result = $con->query($sql);
        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="hidden" name="player" value="<?php echo $value['player']; ?>" />
              <td><?php echo $value['player']; ?></td>
              <td><?php echo $value['position']; ?></td>
              <td><?php echo $value['team']; ?></td>
              <td><?php echo $value['age']; ?></td>
              <td><?php echo $value['club']; ?></td>
              <td><?php echo $value['birth_year']; ?></td>
              <td><?php echo $value['games']; ?></td>
              <td><?php echo $value['games_starts']; ?></td>
              <td><?php echo $value['minutes']; ?></td>
              <td><?php echo $value['goals']; ?></td>
              <td><?php echo $value['assists']; ?></td>
              <td><?php echo $value['goals_pens']; ?></td>
              <td><?php echo $value['pens_made']; ?></td>
              <td><?php echo $value['cards_yellow']; ?></td>
              <td><?php echo $value['cards_red']; ?></td>
              <td><?php echo $value['goals_per90']; ?></td>
              <td><?php echo $value['assists_per90']; ?></td>
              <td><?php echo $value['goals_pens_per90']; ?></td>
              <td><?php echo $value['goals_assists_pens_per90']; ?></td>
              <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
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
