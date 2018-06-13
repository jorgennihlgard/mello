<?php
include('../public/connection.php');
include('../partials/header.php');
session_start();
if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit;
}
?>
<div class="container">
    <div class="text-center"><h1>Lägg till position</h1></div>
  <form action="updateposition.php" method="post">
  <div class="row">
    <h2>Direkt vidare</h2>
    <div class="col-md-4 col-md-offset-4">
    <div class="form-group">
       <select class="form-control" name="finalist1">
    <?php 
    $query = "SELECT performances.id, artists.name FROM performances INNER JOIN artists ON performances.artistid = artists.id  WHERE DATE(performdate) = CURDATE()";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
     ?>
      </select>

    </div>
    </div>
      </div>

      

  <div class="row">
        <div class="btn-lg text-center">
    <button type="submit" class="btn btn-success" name="submitPosition">Lägg till position till uppträde</button>
    </div>
    </div>
  </form>
  </div>
  <?php
  include('../partials/footer.php');
   ?>
