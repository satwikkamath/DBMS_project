<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$standings_url = "standings.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Data</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo " <a href=$index_url>Home</a>
     <a href=$standings_url>Standings</a>
      <a href=$insert_url>Insert</a>
      <a href=$view_url>View</a>
     "; ?>
  </div>
  <div class="container">
    <h2>Edit Data</h2>
    <form action="edit.php" method="post">
      <label for="id">ID:</label>
      <input type="number" id="id" name="id" required />

      <label for="name">New Name:</label>
      <input type="text" id="name" name="name" required />

      <label for="age">New Age:</label>
      <input type="number" id="age" name="age" required />

      <input type="submit" value="Edit" />
    </form>
  </div>
</body>

</html>