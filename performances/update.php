<?php
include('../public/connection.php');

if(isset($_POST['editArtist'])){
    var_dump($_POST);
  $find = array('"', "'" );
  $id = $_POST['id'];
  $name = str_replace($find,"", $_POST['name']);
  $city = str_replace($find,"", $_POST['cid']);
  $artist = str_replace($find,"", $_POST['aid']);
  $performdate =str_replace($find,"", $_POST['performdate']);
  //$publishedYear = str_replace($find,"", $_POST['publishedYear']);
  //$description = str_replace($find,"", $_POST['description']);
  $message = "";
  var_dump($artist);


  

  $query = "UPDATE performances SET cityid = '$city', performdate = '$performdate', artistid = '$artist' WHERE id = '$id'";

  $result = mysqli_query($connection, $query);
  //mysqli_close($connection);
var_dump($result);
  if ($result) {
    $message .= "jej";
  }
  echo '<h4>' . $message . 'Go back and try again' . '</h4>';
}
?>
