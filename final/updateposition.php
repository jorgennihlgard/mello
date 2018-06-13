<?php
include('../public/connection.php');
if(isset($_POST['submitPosition'])){

  $finalist1 =  $_POST['finalist1'];
  $finalist2 = $_POST['finalist2'];
  $finalist3 =  $_POST['finalist3'];
  $finalist4 = $_POST['finalist4'];
  $finalist5 =  $_POST['finalist5'];
  $finalist6 =  $_POST['finalist6'];
  
  //$userId = $_SESSION['member_id'];
  $votesFinalist = [$finalist1,$finalist2,$finalist3,$finalist4,$finalist5,$finalist6];
  

    $pos = 0;
  for ($i=0; $i < 6; $i++) { 
    $pos++;
  	$query = "UPDATE performances SET positionid = '$pos' WHERE $votesFinalist[$i] = id "; 
  	$result = mysqli_query($connection,$query);
  	
  }

  if($result){
    header('Location: createpoints.php');
    exit();
  }
}

?>