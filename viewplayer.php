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
    <h2>View Players</h2>

    <div class="filters">
      Filters
      <form action="" class="myform">

        <input type="text" name="country" id="" placeholder="Country" />
        <input type="submit"></input>
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
      </tr>
    </table>
  </div>
</body>

</html>