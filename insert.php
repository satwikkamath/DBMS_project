<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$goal_url = "insertgoals.php";
$group_url = "insertgroups.php";
$match_url = "insertmatches.php";
$player_url = "insertplayer.php";
$stadium_url = "insertstadium.php";
$team_url = "insertteams.php";
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
    <h2>Insert Data</h2>
    <table class="view-table">
      <tr>
        <td><a href="<?php echo $group_url; ?>">Insert Groups</a></td>
        <td><a href="<?php echo $match_url; ?>">Insert Matches</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo $player_url; ?>">Insert Players for a Country</a></td>
        <td><a href="<?php echo $goal_url; ?>">Insert Goals by Players</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo $stadium_url; ?>">Insert Schedule</a></td>
        <td><a href="<?php echo $team_url; ?>">Insert Team History</a></td>
      </tr>
    </table>
  </div>
</body>

</html>
