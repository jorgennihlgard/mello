<?php
session_start();
include('../partials/header.php');
include('../public/connection.php');
if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit;
}

$final = $_POST['numberFinals'];

$query = "UPDATE semifinal SET numberfinal = $final"; 
  	$result = mysqli_query($connection,$query);

  if($result){
    header('Location: createpoints.php');
    exit();
  }