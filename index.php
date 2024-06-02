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
  <title>Home</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="navbar">
    <?php echo "<a href='$index_url'>Home</a>
    <a href=$standings_url>Standings</a>
      <a href='$insert_url'>Insert</a>
      <a href='$view_url'>View</a>"; ?>
  </div>
  <div class="container">
    <h2>Welcome to the FIFA World Cup 2022 Database Management</h2>
    <p>This website is designed to help you manage the database for the FIFA World Cup 2022. You can easily view, insert, edit, and delete data related to the World Cup.</p>
    
    <h3>Features:</h3>
    <div class="features-boxes">
      <div class="feature-box">
        <h4>Viewing Data</h4>
        <ul>
          <li>Goals scored by individuals</li>
          <li>Groups in the World Cup</li>
          <li>Matches to be played</li>
          <li>Individual player data</li>
          <li>Stadiums hosting the matches</li>
          <li>Teams participating</li>
        </ul>
      </div>
      <div class="feature-box">
        <h4>Editing Data</h4>
        <p>Edit the data directly from the view pages.</p>
      </div>
      <div class="feature-box">
        <h4>Deleting Data</h4>
        <p>Delete data directly from the view pages.</p>
      </div>
      <div class="feature-box">
        <h4>Inserting Data</h4>
        <ul>
          <li>Goals scored by individuals</li>
          <li>Groups in the World Cup</li>
          <li>Matches to be played</li>
          <li>Individual player data</li>
          <li>Stadiums hosting the matches</li>
          <li>Teams participating</li>
        </ul>
      </div>
    </div>
    
    <h3>Meet Our Team</h3>
    <div class="team-boxes">
      <div class="team-box">
        <img src="" alt="Satwik Kamath" />
        <p><strong>Satwik Kamath</strong></p>
      </div>
      <div class="team-box">
        <img src="" alt="Shreesha T.P" />
        <p><strong>Shreesha T.P</strong></p>
      </div>
      <div class="team-box">
        <img src="" alt="Shreeya R" />
        <p><strong>Shreeya R</strong></p>
      </div>
      <div class="team-box">
        <img src="" alt="Shreya P Manchala" />
        <p><strong>Shreya P Manchala</strong></p>
      </div>
    </div>
  </div>
</body>

</html>
