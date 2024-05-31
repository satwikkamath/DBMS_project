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
    <h2>View Groups</h2>

    <div class="filters">
      Filters
      <form action="" class="myform">
        <input type="text" name="group_id" id="" placeholder="Group ID" />
        <input type="text" name="team_name" id="" placeholder="Team Name" />
        <input type="text" name="points_gained" id="" placeholder="Points Gained" />
        <input type="text" name="position" id="" placeholder="Position" />
        <input type="text" name="status" id="" placeholder="Status" />
        <input type="text" name="team_id" id="" placeholder="Team ID" />
        <input type="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Group ID</th>
        <th>Team Name</th>
        <th>Points Gained</th>
        <th>Position</th>
        <th>Status</th>
        <th>Team ID</th>
      </tr>
    </table>
  </div>
</body>

</html>