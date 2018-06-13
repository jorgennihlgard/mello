<?php
include('../public/connection.php');
include('../partials/header.php');
session_start();
?>
<div class="wine backImg"><h1 class="text-center Big"><?php echo ' Välkommen <br>'. $_SESSION['member_name'] ?></h1></div
<?php
$query = "SELECT cities.city AS city,users.name, SUM(bets.points) AS sumperdate FROM users INNER JOIN bets ON 
users.id = bets.userid INNER JOIN performances ON bets.performanceid = performances.id INNER JOIN cities ON 
performances.cityid = cities.id GROUP BY performdate";

$result = mysqli_query($connection, $query);


$query2 = "SELECT name, SUM(points) AS sum FROM bets INNER JOIN  users on bets.userid = users.id"; //Totala poäng för varje användare
$result2 = mysqli_query($connection, $query2);
mysqli_close($connection);
$row = mysqli_fetch_assoc($result2); 
$sum = $row['sum'];

 ?>
<div class="wrapper">
 <h3>Lägg dina röster</h3>
 <p style="color:red;"><strong>Innan du lägger in dina röster, kontrollera att ditt namn står med på bilden ovan. Om inte, skriv in webadressen igen och logga in på nytt. </strong></p>
 <p>Gå in på "Lägg dina röster" från menyn längst upp.</p>
 <p>Välj vilka du tror går direkt vidare och vilka som går till andra chansen,
och spara sedan dessa med knappen "Spara mina röster".</p>
<p>En dialogruta ska poppa upp och fråga om du är helt säker.</p> 
<p>När du väl lagt dina röster kommer du till en sida där du kan se dina röster tillsammans med övrigas röster. Här kan du alltså
inte komma på bättre tankar och ändra dina röster. Ett stort slag för rättvisan.. :O)
</p>
</div>
<br><br><br>
<h3>Poäng</h3>
<p>Får du rätt artist på rätt plats, 2 poäng. <br>
Får du rätt artist men på fel plats, 1 poäng.
</p>

<div class="cake backImg"></div>

<h3>Lite allmänt</h3>
<p>Övriga sidor är mest för din information</p>
<p>Man kan endast rösta samma dag som deltävlingen är.</p>
<p>Det gäller även dagens röster som man endast kan se samma dag</p>
<p>Total poäng kan man alltid se</p>
<p>Har du varit ifrån sidan ett tag och sidan inte fungerar som den ska, logga ut eller slå in webbadressen igen och logga in på nytt.</p>
<p>Skulle något gå helt åt pipan (kanske slut på din surf....) får man ta det via samtal eller sms.</p>


<?php include('../partials/footer.php'); ?>