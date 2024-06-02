<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$standings_url = "standings.php";

$edit_data_url = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Stadiums</title>
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
    <h2>View Stadiums</h2>

    <div class="filters">
      Filters
      <form action="" method="POST">
        <div class="myform">
        <input type="text" name="stadium_id" id="" placeholder="Stadium ID" />
        <input type="text" name="stadium_name" id="" placeholder="Stadium Name" />
        <input type="text" name="round" id="" placeholder="Round" />
        <input type="text" name="location" id="" placeholder="Location" />
        <input type="text" name="attendance" id="" placeholder="Attendance" />
        <input type="text" name="match_id" id="" placeholder="Match ID" />
        </div>
        <input type="submit" name="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Stadium ID</th>
        <th>Stadium Name</th>
        <th>Round</th>
        <th>Location</th>
        <th>Attendance</th>
        <th>Match ID</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {

        $stadium_id = $_POST['stadium_id'];
        $stadium_name = $_POST['stadium_name'];
        $round = $_POST['round'];
        $location = $_POST['location'];
        $attendance = $_POST['attendance'];
        $match_id = $_POST['match_id'];

        $conditions = [];
        if (!empty($stadium_id)) {
          $conditions[] = "stadium_id = '" . $con->real_escape_string($stadium_id) . "'";
        }
        if (!empty($stadium_name)) {
          $conditions[] = "stadium_name LIKE '%" . $con->real_escape_string($stadium_name) . "%'";
        }
        if (!empty($round)) {
          $conditions[] = "round = '" . $con->real_escape_string($round) . "'";
        }
        if (!empty($location)) {
          $conditions[] = "Location LIKE '%" . $con->real_escape_string($location) . "%'";
        }
        if (!empty($attendance)) {
          $conditions[] = "attendance = '" . $con->real_escape_string($attendance) . "'";
        }
        if (!empty($match_id)) {
          $conditions[] = "match_id = '" . $con->real_escape_string($match_id) . "'";
        }

        $sql = "SELECT * FROM `wcstadiums`";
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
                                      <tr>
                                        <form action="" method="POST">
                                          <input type="text" hidden name="stadium_id" value="<?php echo $value['stadium_id']; ?>" />
                                          <input type="text" hidden name="match_id" value="<?php echo $value['match_id']; ?>" />
                                          <td><?php echo $value['stadium_id']; ?></td>
                                          <td><?php echo $value['stadium_name']; ?></td>
                                          <td><?php echo $value['round']; ?></td>
                                          <td><?php echo $value['Location']; ?></td>
                                          <td><?php echo $value['attendance']; ?></td>
                                          <td><?php echo $value['match_id']; ?></td>
                                          <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
                                        </form>
                                      </tr>
                                      <?php
        }
      }

      if (isset($_POST['delete_submit'])) {
        $stadium_id = $_POST['stadium_id'];
        $sql = "DELETE FROM `wcstadiums` WHERE stadium_id = '$stadium_id'";
        $result = $con->query($sql);

        $sql = "SELECT * FROM `wcstadiums`";
        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
                                      <tr>
                                        <form action="" method="POST">
                                          <input type="text" hidden name="stadium_id" value="<?php echo $value['stadium_id']; ?>" />
                                          <input type="text" hidden name="stadium_name" value="<?php echo $value['stadium_name']; ?>" />
                                          <input type="text" hidden name="round" value="<?php echo $value['round']; ?>" />
                                          <input type="text" hidden name="Location" value="<?php echo $value['Location']; ?>" />
                                          <input type="text" hidden name="attendance" value="<?php echo $value['attendance']; ?>" />
                                          <input type="text" hidden name="match_id" value="<?php echo $value['match_id']; ?>" />
                                          <td><?php echo $value['stadium_id']; ?></td>
                                          <td><?php echo $value['stadium_name']; ?></td>
                                          <td><?php echo $value['round']; ?></td>
                                          <td><?php echo $value['Location']; ?></td>
                                          <td><?php echo $value['attendance']; ?></td>
                                          <td><?php echo $value['match_id']; ?></td>
                                          <td> <input type='submit' name='edit_submit' value='Edit'></td>
                                          <td> <input type='submit' name='delete_submit' value='Delete'></td>
                                        </form>
                                      </tr>
                                      <?php
        }
      }

      if (isset($_POST['edit_submit'])) {
        $stadium_id = $_POST['stadium_id'];
        $match_id = $_POST['match_id'];
        ?>
                      <tr>
                        <form action="" method="POST">
                        <input type="text" hidden name="stadium_id" value="<?php echo $stadium_id; ?>" />
                        <input type="text" hidden name="match_id" value="<?php echo $match_id; ?>" />
                        <input type="text" hidden name="match_id"  />
                          <td><?php echo $stadium_id; ?></td>
                          <td><input type="text" name="stadium_name"  /></td>
                          <td><input type="text" name="round"  /></td>
                          <td><input type="text" name="Location"  /></td>
                          <td><input type="text" name="attendance" /></td>
                          <td><?php echo $match_id; ?></td>
                          <td><input type="submit" name="save_submit" value  = "Save"/></td>
                        </form>
                      </tr>
                      <?php
      }

      if (isset($_POST['save_submit'])) {
        $stadium_id = $_POST['stadium_id'];
        $stadium_name = $_POST['stadium_name'];
        $round = $_POST['round'];
        $location = $_POST['Location'];
        $attendance = $_POST['attendance'];
        $match_id = $_POST['match_id'];

        $updates = [];
        if (!empty($stadium_name)) {
          $updates[] = "stadium_name = '" . $con->real_escape_string($stadium_name) . "'";
        }
        if (!empty($round)) {
          $updates[] = "round = '" . $con->real_escape_string($round) . "'";
        }
        if (!empty($location)) {
          $updates[] = "Location = '" . $con->real_escape_string($location) . "'";
        }
        if (!empty($attendance)) {
          $updates[] = "attendance = '" . $con->real_escape_string($attendance) . "'";
        }
        if (!empty($match_id)) {
          $updates[] = "match_id = '" . $con->real_escape_string($match_id) . "'";
        }

        if (!empty($stadium_id) && count($updates) > 0) {
          $sql = "UPDATE `wcstadiums` SET " . implode(', ', $updates) . " WHERE stadium_id = '" . $con->real_escape_string($stadium_id) . "'";
          $con->query($sql);
        }

        $sql = "SELECT * FROM `wcstadiums`";
        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
                                      <tr>
                                        <form action="" method="POST">
                                          <input type="text" hidden name="stadium_id" value="<?php echo $value['stadium_id']; ?>" />
                                          <input type="text" hidden name="stadium_name" value="<?php echo $value['stadium_name']; ?>" />
                                          <input type="text" hidden name="round" value="<?php echo $value['round']; ?>" />
                                          <input type="text" hidden name="Location" value="<?php echo $value['Location']; ?>" />
                                          <input type="text" hidden name="attendance" value="<?php echo $value['attendance']; ?>" />
                                          <input type="text" hidden name="match_id" value="<?php echo $value['match_id']; ?>" />
                                          <td><?php echo $value['stadium_id']; ?></td>
                                          <td><?php echo $value['stadium_name']; ?></td>
                                          <td><?php echo $value['round']; ?></td>
                                          <td><?php echo $value['Location']; ?></td>
                                          <td><?php echo $value['attendance']; ?></td>
                                          <td><?php echo $value['match_id']; ?></td>
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
