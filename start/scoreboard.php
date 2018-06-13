<?php
include('../partials/header.php');
include('../public/connection.php');

session_start();

if($_SESSION['member_id'] == 3){
  echo '<a href="../performances/editposition.php" class="btn btn-primary">Lägg in rätt resultat</a>';
  
  echo '<a href="../final/editposition.php" class="btn btn-primary">Lägg in rätt resultat finalplatser</a>';
  
  /*echo '<a href="../second/editposition.php" class="btn btn-primary">Lägg in rätt resultat Andra chansen</a>';
  
 echo '<form action="../second/cansee.php" method="post"><br><select class="form-control" name="numberFinals">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>';

echo '<input type="submit" value="Påbörja nästa delfinal" name = finalNumber></form>';  */
  
}

echo '<br>';
$query = "SELECT cities.city AS city,users.name, SUM(bets.points) AS sumperdate FROM users INNER JOIN bets ON 
users.id = bets.userid INNER JOIN performances ON bets.performanceid = performances.id INNER JOIN cities ON 
performances.cityid = cities.id GROUP BY performdate ORDER BY users.name";

$result = mysqli_query($connection, $query);

$query2 = "SELECT name, SUM(points) AS sum FROM bets INNER JOIN  users on bets.userid = users.id GROUP BY users.id ORDER BY sum DESC"; //Totala poäng för varje användare
$result2 = mysqli_query($connection, $query2);
mysqli_close($connection);

 ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

<table class="table table-striped">
	<thead>
		<tr>

<th>Namn</th>
<th>Poäng</th>
</tr>
</thead>
<tbody>

<?php 
while($rows = mysqli_fetch_assoc($result2)){

echo '<tr><td>' . $rows['name'] .'</td><td>' . $rows['sum'].'</td><td>'; if($rows['name']=="LordGolden"){echo '  (+2)';} '</td></tr>';

}
?>
</tbody>
</table>
</div>
</div>
</div>
<?php
include('../partials/footer.php');
?>