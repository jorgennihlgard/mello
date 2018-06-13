<?php
session_start();
include('../partials/header.php');
include('../public/connection.php');
if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit;
}

$cansee = 'SELECT numberfinal FROM semifinal';
$res = mysqli_query($connection, $cansee);
$number = mysqli_fetch_assoc($res);

$userId = $_SESSION["member_id"];

$canseebets = "SELECT COUNT(bets.userid) AS nrOfVotes
FROM bets INNER JOIN performances ON performances.id = bets.performanceid WHERE DATE(performdate) = CURDATE()  AND userid = $userId" ;

if($result1 = mysqli_query($connection, $canseebets)){
$ro = mysqli_fetch_assoc($result1);
if($ro['nrOfVotes']>0){    //==$number['numberfinal']ifall andra chansen

$query = "SELECT users.name AS username, artists.name AS artist, positions.position AS pos, bets.points AS points FROM users INNER JOIN bets ON 
users.id = bets.userid INNER JOIN performances ON bets.performanceid = performances.id INNER JOIN artists ON artists.id =
performances.artistid INNER JOIN positions ON bets.positionid = positions.id WHERE DATE(performdate) = CURDATE() ORDER BY users.name,pos DESC";
if($result2 = mysqli_query($connection, $query)){
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Användare</th>
            <th>Artist</th>
            <th>Placering</th>
            <th>Poäng</th>
          </tr>
      </thead>
      <tbody>

    <?php
      while($row = mysqli_fetch_assoc($result2)){

       echo '<tr>';
       echo '<td class="col-md-4">' . $row['username'] . '</td>';
       echo '<td class="col-md-4">' . $row['artist'] . '</td>';
       echo '<td class="col-md-4">' . $row['pos'] . '</td>';
       echo '<td class="col-md-4">' . $row['points'] . '</td>';
       
       
       echo '</tr>';
     }
       echo '</tbody>';
       echo '</table>';

  mysqli_close($connection);
}
}
else if($ro['nrOfVotes']==0){  //  ifall andra chansen $ro['nrOfVotes']<$number['numberfinal']
  echo '<p>Du måste lägga till dina egna röster innan du kan se andras röster</p>';
}
}

 ?>
    </div>
  </div>
</div>

<?php
include('../partials/footer.php');
 ?>
