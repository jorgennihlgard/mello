<?php
include('../public/connection.php');
$id = $_GET['id'];

$query = "DELETE FROM performances WHERE id = '$id'";

$result =$connection->query($query);

mysqli_close($connection);

if($result){
  header('Location:index.php');
}

 ?>
