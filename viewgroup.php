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
  <title>View Groups</title>
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
    <h2>View Groups</h2>

    <div class="filters">
      Filters
      <form action="" method="POST">
        <div class="myform">
        <input type="text" name="group_id" id="" placeholder="Group ID" />
        <input type="text" name="team_name" id="" placeholder="Team Name" />
        <input type="text" name="points_gained" id="" placeholder="Points Gained" />
        <input type="text" name="positions" id="" placeholder="positions" />
        <input type="text" name="status" id="" placeholder="Status" />
        <input type="text" name="team_id" id="" placeholder="Team ID" />
        </div>
        <input type="submit" name="submit"></input>
      </form>
    </div>

    <table>
      <tr>
        <th>Group ID</th>
        <th>Team Name</th>
        <th>Points Gained</th>
        <th>positions</th>
        <th>Status</th>
        <th>Team ID</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      $con = new mysqli("localhost", "root", "", "fifa");

      if (isset($_POST['submit'])) {

        $group_id = $_POST['group_id'];
        $team_name = $_POST['team_name'];
        $points_gained = $_POST['points_gained'];
        $positions = $_POST['positions'];
        $status = $_POST['status'];
        $team_id = $_POST['team_id'];

        $conditions = [];
        if (!empty($group_id)) {
          $conditions[] = "group_id = '" . $con->real_escape_string($group_id) . "'";
        }
        if (!empty($team_name)) {
          $conditions[] = "team_name LIKE '%" . $con->real_escape_string($team_name) . "%'";
        }
        if (!empty($points_gained)) {
          $conditions[] = "points_gained = '" . $con->real_escape_string($points_gained) . "'";
        }
        if (!empty($positions)) {
          $conditions[] = "positions = '" . $con->real_escape_string($positions) . "'";
        }
        if (!empty($status)) {
          $conditions[] = "status LIKE '%" . $con->real_escape_string($status) . "%'";
        }
        if (!empty($team_id)) {
          $conditions[] = "team_id = '" . $con->real_escape_string($team_id) . "'";
        }

        $sql = "SELECT * FROM `wcgroup`";
        if (count($conditions) > 0) {
          $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="text" hidden name="group_id" value="<?php echo $value['group_id']; ?>" />
              <input type="text" hidden name="team_id" value="<?php echo $value['team_id']; ?>" />
              <td><?php echo $value['group_id']; ?></td>
              <td><?php echo $value['team_name']; ?></td>
              <td><?php echo $value['points_gained']; ?></td>
              <td><?php echo $value['positions']; ?></td>
              <td><?php echo $value['status']; ?></td>
              <td><?php echo $value['team_id']; ?></td>
              <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
            </form>
          </tr>
          <?php
        }
      }

      if (isset($_POST['delete_submit'])) {
        $group_id = $_POST['group_id'];
        $sql = "DELETE FROM `wcgroup` WHERE group_id = '$group_id'";
        $result = $con->query($sql);

        $sql = "SELECT * FROM `wcgroup`";
        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="text" hidden name="group_id" value="<?php echo $value['group_id']; ?>" />
              <input type="text" hidden name="team_name" value="<?php echo $value['team_name']; ?>" />
              <input type="text" hidden name="points_gained" value="<?php echo $value['points_gained']; ?>" />
              <input type="text" hidden name="positions" value="<?php echo $value['positions']; ?>" />
              <input type="text" hidden name="status" value="<?php echo $value['status']; ?>" />
              <input type="text" hidden name="team_id" value="<?php echo $value['team_id']; ?>" />
              <td><?php echo $value['group_id']; ?></td>
              <td><?php echo $value['team_name']; ?></td>
              <td><?php echo $value['points_gained']; ?></td>
              <td><?php echo $value['positions']; ?></td>
              <td><?php echo $value['status']; ?></td>
              <td><?php echo $value['team_id']; ?></td>
              <td> <input type='submit' name='edit_submit' value='Edit'></td>
              <td> <input type='submit' name='delete_submit' value='Delete'></td>
            </form>
          </tr>
          <?php
        }
      }

      if (isset($_POST['edit_submit'])) {
        $group_id = $_POST['group_id'];
        $team_id = $_POST['team_id'];
        ?>
        <tr>
          <form action="" method="POST">
            <input type="text" hidden name="group_id" value="<?php echo $group_id; ?>" />
            <input type="text" hidden name="team_id" value="<?php echo $team_id; ?>" />
            <td><?php echo $group_id; ?></td>
            <td><input type="text" name="team_name" /></td>
            <td><input type="text" name="points_gained" /></td>
            <td><input type="text" name="positions" /></td>
            <td><input type="text" name="status" /></td>
            <td><?php echo $team_id; ?></td>
            <td><input type="submit" name="save_submit" value  = "Save"/></td>
          </form>
        </tr>
        <?php
      }

      if (isset($_POST['save_submit'])) {
        $group_id = $_POST['group_id'];
        $team_name = $_POST['team_name'];
        $points_gained = $_POST['points_gained'];
        $positions = $_POST['positions'];
        $status = $_POST['status'];
        $team_id = $_POST['team_id'];

        $updates = [];
        if (!empty($team_name)) {
          $updates[] = "team_name = '" . $con->real_escape_string($team_name) . "'";
        }
        if (!empty($points_gained)) {
          $updates[] = "points_gained = '" . $con->real_escape_string($points_gained) . "'";
        }
        if (!empty($positions)) {
          $updates[] = "positions = '" . $con->real_escape_string($positions) . "'";
        }
        if (!empty($status)) {
          $updates[] = "status = '" . $con->real_escape_string($status) . "'";
        }
        if (!empty($team_id)) {
          $updates[] = "team_id = '" . $con->real_escape_string($team_id) . "'";
        }

        if (!empty($group_id) && count($updates) > 0) {
          $sql = "UPDATE `wcgroup` SET " . implode(', ', $updates) . " WHERE group_id = '" . $con->real_escape_string($group_id) . "'";
          $con->query($sql);
        }

        $sql = "SELECT * FROM `wcgroup`";
        $result = $con->query($sql);

        foreach ($result as $value) {
          ?>
          <tr>
            <form action="" method="POST">
              <input type="text" hidden name="group_id" value="<?php echo $value['group_id']; ?>" />
              <input type="text" hidden name="team_name" value="<?php echo $value['team_name']; ?>" />
              <input type="text" hidden name="points_gained" value="<?php echo $value['points_gained']; ?>" />
              <input type="text" hidden name="positions" value="<?php echo $value['positions']; ?>" />
              <input type="text" hidden name="status" value="<?php echo $value['status']; ?>" />
              <input type="text" hidden name="team_id" value="<?php echo $value['team_id']; ?>" />
              <td><?php echo $value['group_id']; ?></td>
              <td><?php echo $value['team_name']; ?></td>
              <td><?php echo $value['points_gained']; ?></td>
              <td><?php echo $value['positions']; ?></td>
              <td><?php echo $value['status']; ?></td>
              <td><?php echo $value['team_id']; ?></td>
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
