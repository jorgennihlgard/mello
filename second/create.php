<?php
session_start();
include('../public/connection.php');
if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit();
}
$userId = $_SESSION['member_id'];
 $delfinal = $_POST['delfinal'];
$_SESSION['delfinalen'] = $delfinal;
$haveVoted = "SELECT COUNT(bets.userid) AS nrOfVotes
FROM bets INNER JOIN performances ON performances.id = bets.performanceid WHERE DATE(performdate) = CURDATE() AND userid = $userId AND $delfinal = second" ;

if($result1 = mysqli_query($connection, $haveVoted)){
$row = mysqli_fetch_assoc($result1);
if($row['nrOfVotes']==0){
 if(isset($_POST['submitVotes'])){
  $finalist1 =  $_POST['finalist1'];
  $votesFinalist = $finalist1;
  /*$allVotes = $finalist1;
    
    if( count($allVotes) !== count(array_unique($allVotes)))
    {
      $_SESSION['duplicates'] ='<div class="alert alert-warning">Kan bara rösta en gång på varje artist</div>';
      header('Location: new.php');
      exit();
    }*/
  
  	$query = "INSERT INTO bets(userId, performanceid, positionid) VALUES ('$userId', '$votesFinalist',1)"; 
  	$result = mysqli_query($connection,$query);
  
}
}
else if($row['nrOfVotes']>0){
 header('Location: error.php');
exit();
}
}
  header('Location: ../votes/index.php');
  ?>