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
  $finalist3 =  $_POST['finalist3'];
  $finalist4 = $_POST['finalist4'];
  $finalist5 =  $_POST['finalist5'];
  $finalist6 =  $_POST['finalist6'];
  
  $votesFinalist = [$finalist1,$finalist2,$finalist3,$finalist4,$finalist5,$finalist6];
  $allVotes = [$finalist1,$finalist2,$finalist3,$finalist4,$finalist5,$finalist6];
    if( count($allVotes) !== count(array_unique($allVotes)))
    {
      $_SESSION['duplicates'] ='<div class="alert alert-warning">Kan bara rösta en gång på varje artist</div>';
      header('Location: new.php');
      exit();
    }
    $pos = 0;
  for ($i=0; $i < 6; $i++) { 
    $pos++;
  	$query = "INSERT INTO bets(userId, performanceid, positionid) VALUES ('$userId', '$votesFinalist[$i]','$pos')"; //$pos ska va 1
  	$result = mysqli_query($connection,$query);
  }
}
}
else if($row['nrOfVotes']>0){
 header('Location: error.php');
exit();
}
}
  header('Location: ../votes/index.php');
  ?>