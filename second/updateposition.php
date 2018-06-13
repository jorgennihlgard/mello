<?php
include('../public/connection.php');
if(isset($_POST['submitPosition'])){

  $finalist1 =  $_POST['finalist1'];
  //$userId = $_SESSION['member_id'];
  $votesFinalist = $finalist1;
 

  	$query = "UPDATE performances SET positionid = 1 WHERE $votesFinalist = id "; 
  	$result = mysqli_query($connection,$query);

  if($result){
    header('Location: createpoints.php');
    exit();
  }
}

?>