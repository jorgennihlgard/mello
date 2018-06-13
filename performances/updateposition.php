<?php
include('../public/connection.php');
if(isset($_POST['submitPosition'])){

  $finalist1 =  $_POST['finalist1'];
  $finalist2 = $_POST['finalist2'];
  $andra1 = $_POST['andra1'];
  $andra2 = $_POST['andra2'];
  //$userId = $_SESSION['member_id'];
  $votesFinalist = [$finalist1,$finalist2];
  $votesAndra = [$andra1, $andra2];


  for ($i=0; $i < 2; $i++) { 
  	$query = "UPDATE performances SET positionid = 1 WHERE $votesFinalist[$i] = id "; 
  	$result = mysqli_query($connection,$query);
  	
  }
  for ($i=0; $i < 2; $i++) { 
  	$query = "UPDATE performances SET positionid = 2 WHERE $votesAndra[$i] = id"; 
  	$result = mysqli_query($connection,$query);
  }

  if($result){
    header('Location: ../votes/createpoints.php');
    exit();
  }
}

?>