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
    <h2>View Goals</h2>

    <div class="filters">
      Filters
      <form action="" class="myform">
        <input type="text" name="goal_id" id="" placeholder="Goal ID" />
        <input type="text" name="goal_scorer" id="" placeholder="Goal Scorer" />


        <input type="text" name="scored_against" id="" placeholder="Scored Against" />
        <input type="text" name="round" id="" placeholder="Round" />


        <input type="text" name="goal_minute" id="" placeholder="Goal Minute" />
        <input type="text" name="minute_format" id="" placeholder="Minute format" />


        <input type="text" name="team_id" id="" placeholder="Team ID" />
        <input type="text" name="match_id" id="" placeholder="Match ID" />

        <input type="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Goal ID</th>
        <th>Goal Scorer</th>
        <th>Scored Against</th>
        <th>Round</th>
        <th>Goal Minute</th>
        <th>Minute format</th>
        <th>Team ID</th>
        <th>Match ID</th>
      </tr>
    </table>
  </div>
</body>

</html>