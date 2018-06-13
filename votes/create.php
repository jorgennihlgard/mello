<?php
session_start();
include('../public/connection.php');
if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit();
}
$userId = $_SESSION['member_id'];

$haveVoted = "SELECT COUNT(bets.userid) AS nrOfVotes
FROM bets INNER JOIN performances ON performances.id = bets.performanceid WHERE DATE(performdate) = CURDATE() AND userid = $userId" ;

if($result1 = mysqli_query($connection, $haveVoted)){
$row = mysqli_fetch_assoc($result1);
if($row['nrOfVotes']==0){
 if(isset($_POST['submitVotes'])){
  $finalist1 =  $_POST['finalist1'];
  $finalist2 = $_POST['finalist2'];
  $andra1 = $_POST['andra1'];
  $andra2 = $_POST['andra2'];
  $votesFinalist = [$finalist1,$finalist2];
  $votesAndra = [$andra1, $andra2];
  $allVotes = [$finalist1,$finalist2, $andra1, $andra2];
    if( count($allVotes) !== count(array_unique($allVotes)))
    {
      $_SESSION['duplicates'] ='<div class="alert alert-warning">Kan bara rösta en gång på varje artist</div>';
      header('Location: new.php');
      exit();
    }
  for ($i=0; $i < 2; $i++) { 
  	$query = "INSERT INTO bets(userId, performanceid, positionid) VALUES ('$userId', '$votesFinalist[$i]',1)"; 
  	$result = mysqli_query($connection,$query);
  }
  for ($i=0; $i < 2; $i++) { 
  	$query = "INSERT INTO bets(userId, performanceid, positionid) VALUES ('$userId', '$votesAndra[$i]',2)"; 
  	$result = mysqli_query($connection,$query);
  }
}
}
else if($row['nrOfVotes']>0){
 header('Location: error.php');
exit();
}
}
  header('Location: index.php');
  ?>