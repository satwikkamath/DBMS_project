<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$goal_url = "viewgoals.php";
$group_url = "viewgroup.php";
$match_url = "viewmatch.php";
$player_url = "viewplayer.php";
$stadium_url = "viewstadium.php";
$team_url = "viewteams.php";
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
      "?>;
  </div>
  <div class="container">
    <h2>View Data</h2>
    <table class="view-table">
      <tr>
        <td><a href="<?php echo $group_url; ?>">View Groups</a></td>
        <td><a href="<?php echo $match_url; ?>">View Matches</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo $player_url; ?>">View Players for a Country</a></td>
        <td><a href="<?php echo $goal_url; ?>">View Goals by Players</a></td>
      </tr>
      <tr>
        <td><a href="<?php echo $stadium_url; ?>">View Schedule</a></td>
        <td><a href="<?php echo $team_url; ?>">View Team History</a></td>
      </tr>
    </table>
  </div>
</body>

</html>