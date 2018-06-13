<?php
include('../public/connection.php');
//include('../partials/header.php');
session_start();
$userId = $_SESSION['member_id'];


			$query = "UPDATE bets INNER JOIN performances on bets.performanceid = performances.id SET points = 2 WHERE DATE(performdate) = CURDATE() AND bets.positionid = performances.positionid";
$insert = mysqli_query($connection, $query);


			$query2 = "UPDATE bets INNER JOIN performances on bets.performanceid = performances.id SET points = 1 WHERE DATE(performdate) = CURDATE() AND bets.positionid <> performances.positionid AND performances.positionid != 0";
$insert2 = mysqli_query($connection, $query2);

header('Location:../performances/index.php');
exit();
?>