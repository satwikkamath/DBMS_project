<?php
$index_url = "index.php";
$insert_url = "insert.php";
$view_url = "view.php";
$edit_url = "edit.php";
$delete_url = "delete.php";
$standings_url = "standings.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Standings</title>
  <link rel="stylesheet" href="styles2.css" />
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
  <h1>FIFA World Cup 2022</h1>
  
  <div class = "round"> 
    <h2>Group - A</h2>
  <div class="group-table">
    <table>
      <thead>
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>MP</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GF</th>
          <th>GA</th>
          <th>GD</th>
          <th>Pts</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img class="flag" src="./flags/nl-lgflag.gif" alt="Netherlands Flag"> Netherlands</td>
          <td>3</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>5</td>
          <td>1</td>
          <td>4</td>
          <td>7</td>
        </tr>
        <tr>
          <td>2</td>
          <td><img class="flag" src="./flags/sg-lgflag.gif" alt="Senegal Flag"> Senegal</td>
          <td>3</td>
          <td>2</td>
          <td>0</td>
          <td>1</td>
          <td>5</td>
          <td>4</td>
          <td>1</td>
          <td>6</td>
        </tr>
        <tr>
          <td>3</td>
          <td><img class="flag" src="./flags/ec-lgflag.gif" alt="Ecuador Flag"> Ecuador</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>4</td>
          <td>3</td>
          <td>1</td>
          <td>4</td>
        </tr>
        <tr>
          <td>4</td>
          <td><img class="flag" src="./flags/qa-lgflag.gif" alt="Qatar Flag"> Qatar</td>
          <td>3</td>
          <td>0</td>
          <td>0</td>
          <td>3</td>
          <td>1</td>
          <td>7</td>
          <td>-6</td>
          <td>0</td>
        </tr>
      </tbody>
    </table>
  </div>
 </div>

 <div class = "round"> 
  <h2>Group B</h2>
<div class="group-table">
  <table>
    <thead>
      <tr>
        <th>Pos</th>
        <th>Team</th>
        <th>MP</th>
        <th>W</th>
        <th>D</th>
        <th>L</th>
        <th>GF</th>
        <th>GA</th>
        <th>GD</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><img class="flag" src="./flags/en-lgflag.gif" alt="England Flag"> England</td>
        <td>3</td>
        <td>2</td>
        <td>1</td>
        <td>0</td>
        <td>9</td>
        <td>2</td>
        <td>7</td>
        <td>7</td>
      </tr>
      <tr>
        <td>2</td>
        <td><img class="flag" src="./flags/us-lgflag.gif" alt="USA Flag"> USA</td>
        <td>3</td>
        <td>1</td>
        <td>2</td>
        <td>0</td>
        <td>2</td>
        <td>1</td>
        <td>1</td>
        <td>5</td>
      </tr>
      <tr>
        <td>3</td>
        <td><img class="flag" src="./flags/ir-lgflag.gif" alt="Iran Flag"> Iran</td>
        <td>3</td>
        <td>1</td>
        <td>0</td>
        <td>2</td>
        <td>4</td>
        <td>7</td>
        <td>-3</td>
        <td>3</td>
      </tr>
      <tr>
        <td>4</td>
        <td><img class="flag" src="./flags/wls-lgflag.gif" alt="Wales Flag"> Wales</td>
        <td>3</td>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>1</td>
        <td>6</td>
        <td>-5</td>
        <td>1</td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<div class = "round"> 
  <h2>Group C</h2>
<div class="group-table">
  <table>
    <thead>
      <tr>
        <th>Pos</th>
        <th>Team</th>
        <th>MP</th>
        <th>W</th>
        <th>D</th>
        <th>L</th>
        <th>GF</th>
        <th>GA</th>
        <th>GD</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><img class="flag" src="./flags/ar-lgflag.gif" alt="Argentina Flag"> Argentina</td>
        <td>3</td>
        <td>2</td>
        <td>0</td>
        <td>1</td>
        <td>5</td>
        <td>2</td>
        <td>3</td>
        <td>6</td>
      </tr>
      <tr>
        <td>2</td>
        <td><img class="flag" src="./flags/pl-lgflag.gif" alt="Poland Flag"> Poland</td>
        <td>3</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>2</td>
        <td>2</td>
        <td>0</td>
        <td>4</td>
      </tr>
      <tr>
        <td>3</td>
        <td><img class="flag" src="./flags/mx-lgflag.gif" alt="Mexico Flag"> Mexico</td>
        <td>3</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>-1</td>
        <td>4</td>
      </tr>
      <tr>
        <td>4</td>
        <td><img class="flag" src="./flags/sa-lgflag.gif" alt="Saudi Arabia Flag"> Saudi Arabia</td>
        <td>3</td>
        <td>1</td>
        <td>0</td>
        <td>2</td>
        <td>3</td>
        <td>5</td>
        <td>-2</td>
        <td>3</td>
      </tr>
    </tbody>
  </table>
</div>
</div>


<div class = "round"> 
  <h2>Group D</h2>
<div class="group-table">
  <table>
    <thead>
      <tr>
        <th>Pos</th>
        <th>Team</th>
        <th>MP</th>
        <th>W</th>
        <th>D</th>
        <th>L</th>
        <th>GF</th>
        <th>GA</th>
        <th>GD</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><img class="flag" src="./flags/fr-lgflag.gif" alt="France Flag"> France</td>
        <td>3</td>
        <td>2</td>
        <td>0</td>
        <td>1</td>
        <td>6</td>
        <td>3</td>
        <td>3</td>
        <td>6</td>
      </tr>
      <tr>
        <td>2</td>
        <td><img class="flag" src="./flags/as-lgflag.gif" alt="Australia Flag"> Australia</td>
        <td>3</td>
        <td>2</td>
        <td>0</td>
        <td>1</td>
        <td>3</td>
        <td>4</td>
        <td>-1</td>
        <td>6</td>
      </tr>
      <tr>
        <td>3</td>
        <td><img class="flag" src="./flags/tu-lgflag.gif" alt="Tunisia Flag"> Tunisia</td>
        <td>3</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>0</td>
        <td>4</td>
      </tr>
      <tr>
        <td>4</td>
        <td><img class="flag" src="./flags/da-lgflag.gif" alt="Denmark Flag"> Denmark</td>
        <td>3</td>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>1</td>
        <td>3</td>
        <td>-2</td>
        <td>1</td>
      </tr>
    </tbody>
  </table>
</div>
</div>


<div class="round">
  <h2>Group E</h2>
  <div class="group-table">
    <table>
      <thead>
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>MP</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GF</th>
          <th>GA</th>
          <th>GD</th>
          <th>Pts</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img class="flag" src="./flags/ja-lgflag.gif" alt="Japan Flag"> Japan</td>
          <td>3</td>
          <td>2</td>
          <td>0</td>
          <td>1</td>
          <td>4</td>
          <td>3</td>
          <td>1</td>
          <td>6</td>
        </tr>
        <tr>
          <td>2</td>
          <td><img class="flag" src="./flags/sp-lgflag.gif" alt="Spain Flag"> Spain</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>9</td>
          <td>3</td>
          <td>6</td>
          <td>4</td>
        </tr>
        <tr>
          <td>3</td>
          <td><img class="flag" src="./flags/gm-lgflag.gif" alt="Germany Flag"> Germany</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>6</td>
          <td>5</td>
          <td>1</td>
          <td>4</td>
        </tr>
        <tr>
          <td>4</td>
          <td><img class="flag" src="./flags/cs-lgflag.gif" alt="Costa Rica Flag"> Costa Rica</td>
          <td>3</td>
          <td>1</td>
          <td>0</td>
          <td>2</td>
          <td>3</td>
          <td>11</td>
          <td>-8</td>
          <td>3</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="round">
  <h2>Group F</h2>
  <div class="group-table">
    <table>
      <thead>
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>MP</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GF</th>
          <th>GA</th>
          <th>GD</th>
          <th>Pts</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img class="flag" src="./flags/mo-lgflag.gif" alt="Morocco Flag"> Morocco</td>
          <td>3</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>4</td>
          <td>1</td>
          <td>3</td>
          <td>7</td>
        </tr>
        <tr>
          <td>2</td>
          <td><img class="flag" src="./flags/croatia.png" alt="Croatia Flag"> Croatia</td>
          <td>3</td>
          <td>1</td>
          <td>2</td>
          <td>0</td>
          <td>4</td>
          <td>1</td>
          <td>3</td>
          <td>5</td>
        </tr>
        <tr>
          <td>3</td>
          <td><img class="flag" src="./flags/be-lgflag.gif" alt="Belgium Flag"> Belgium</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>2</td>
          <td>-1</td>
          <td>4</td>
        </tr>
        <tr>
          <td>4</td>
          <td><img class="flag" src="./flags/ca-lgflag.gif" alt="Canada Flag"> Canada</td>
          <td>3</td>
          <td>0</td>
          <td>0</td>
          <td>3</td>
          <td>2</td>
          <td>7</td>
          <td>-5</td>
          <td>0</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="round">
  <h2>Group G</h2>
  <div class="group-table">
    <table>
      <thead>
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>MP</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GF</th>
          <th>GA</th>
          <th>GD</th>
          <th>Pts</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img class="flag" src="./flags/br-lgflag.gif" alt="Brazil Flag"> Brazil</td>
          <td>3</td>
          <td>2</td>
          <td>0</td>
          <td>1</td>
          <td>3</td>
          <td>1</td>
          <td>2</td>
          <td>6</td>
        </tr>
        <tr>
          <td>2</td>
          <td><img class="flag" src="./flags/sz-lgflag.gif" alt="Switzerland Flag"> Switzerland</td>
          <td>3</td>
          <td>2</td>
          <td>0</td>
          <td>1</td>
          <td>4</td>
          <td>3</td>
          <td>1</td>
          <td>6</td>
        </tr>
        <tr>
          <td>3</td>
          <td><img class="flag" src="./flags/cm-lgflag.gif" alt="Cameroon Flag"> Cameroon</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>4</td>
          <td>4</td>
          <td>0</td>
          <td>4</td>
        </tr>
        <tr>
          <td>4</td>
          <td><img class="flag" src="./flags/si-lgflag.gif" alt="Serbia Flag"> Serbia</td>
          <td>3</td>
          <td>0</td>
          <td>1</td>
          <td>2</td>
          <td>5</td>
          <td>8</td>
          <td>-3</td>
          <td>1</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>




<div class="round">
  <h2>Group H</h2>
  <div class="group-table">
    <table>
      <thead>
        <tr>
          <th>Pos</th>
          <th>Team</th>
          <th>MP</th>
          <th>W</th>
          <th>D</th>
          <th>L</th>
          <th>GF</th>
          <th>GA</th>
          <th>GD</th>
          <th>Pts</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><img class="flag" src="./flags/po-lgflag.gif" alt="Portugal Flag"> Portugal</td>
          <td>3</td>
          <td>2</td>
          <td>0</td>
          <td>1</td>
          <td>6</td>
          <td>4</td>
          <td>2</td>
          <td>6</td>
        </tr>
        <tr>
          <td>2</td>
          <td><img class="flag" src="./flags/ks-lgflag.gif" alt="South Korea Flag"> South Korea</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>4</td>
          <td>4</td>
          <td>0</td>
          <td>4</td>
        </tr>
        <tr>
          <td>3</td>
          <td><img class="flag" src="./flags/uy-lgflag.gif" alt="Uruguay Flag"> Uruguay</td>
          <td>3</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>2</td>
          <td>2</td>
          <td>0</td>
          <td>4</td>
        </tr>
        <tr>
          <td>4</td>
          <td><img class="flag" src="./flags/gh-lgflag.gif" alt="Ghana Flag"> Ghana</td>
          <td>3</td>
          <td>1</td>
          <td>0</td>
          <td>2</td>
          <td>5</td>
          <td>7</td>
          <td>-2</td>
          <td>3</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


    <div class="round1">
      <h2>Quarter-finals</h2>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/nl-lgflag.gif" alt="Netherlands Flag">
          <span class="name">Netherlands</span>
        </div>
        <div class="score">2 (3) </div>
        <div class="result winner">2 (4)</div>
        <div class="team">
          <img class="flag" src="./flags/ar-lgflag.gif" alt="Argentina Flag">
          <span class="name">Argentina</span>
        </div>
      </div>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/croatia.png" alt="Croatia Flag">
          <span class="name">Croatia</span>
        </div>
        <div class="result winner">1 (4)</div>
        <div class="score">1 (2)</div>
        <div class="team">
          <img class="flag" src="./flags/br-lgflag.gif" alt="Brazil Flag">
          <span class="name">Brazil</span>
        </div>
      </div>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/en-lgflag.gif" alt="England Flag">
          <span class="name">England</span>
        </div>
        <div class="score">1</div>
        <div class="result winner">2</div>
        <div class="team">
          <img class="flag" src="./flags/fr-lgflag.gif" alt="France Flag">
          <span class="name">France</span>
        </div>
      </div>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/mo-lgflag.gif" alt="Morocco Flag">
          <span class="name">Morocco</span>
        </div>
        <div class="result winner">1</div>
        <div class="score">0</div>
        <div class="team">
          <img class="flag" src="./flags/po-lgflag.gif" alt="Portugal Flag">
          <span class="name">Portugal</span>
        </div>
      </div>
    </div>
    <div class="round1">
      <h2>Semi-finals</h2>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/ar-lgflag.gif" alt="Argentina Flag">
          <span class="name">Argentina</span>
        </div>
        <div class="result winner">3</div>
        <div class="score">0</div>
        <div class="team">
          <img class="flag" src="./flags/croatia.png" alt="Croatia Flag">
          <span class="name">Croatia</span>
        </div>
      </div>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/fr-lgflag.gif" alt="France Flag">
          <span class="name">France</span>
        </div>
        <div class="result winner">2</div>
        <div class="score">0</div>
        <div class="team">
          <img class="flag" src="./flags/mo-lgflag.gif" alt="Morocco Flag">
          <span class="name">Morocco</span>
        </div>
      </div>
    </div>
    <div class="round1">
      <h2>Final</h2>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/ar-lgflag.gif" alt="Argentina Flag">
          <span class="name">Argentina</span>
        </div>
        <div class="result winner">3 (4)</div>
        <div class="score">3 (2)</div>
        <div class="team">
          <img class="flag" src="./flags/fr-lgflag.gif" alt="France Flag">
          <span class="name">France</span>
        </div>
      </div>
    </div>

    <div class="round1">
      <h2>Third place play-off</h2>
      <div class="match">
        <div class="team">
          <img class="flag" src="./flags/croatia.png" alt="Croatia Flag">
          <span class="name">Croatia</span>
        </div>
        <div class="result winner">2</div>
        <div class="score">1</div>
        <div class="team">
          <img class="flag" src="./flags/mo-lgflag.gif" alt="Morocco Flag">
          <span class="name">Morocco</span>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>