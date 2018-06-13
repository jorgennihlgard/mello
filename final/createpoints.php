<?php
include('../public/connection.php');
//include('../partials/header.php');
session_start();
$userId = $_SESSION['member_id'];


			$query = "UPDATE bets INNER JOIN performances on bets.performanceid = performances.id SET points = 3 WHERE DATE(performdate) = CURDATE() AND bets.positionid = performances.positionid";
$insert = mysqli_query($connection, $query);

header('Location:../votes/index.php');
exit();
?>