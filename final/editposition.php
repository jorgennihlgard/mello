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
    <div class="col-md-5 col-md-offset-1">
    <div class="form-group">
      <h5>1</h5>
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

      <div class="col-md-5">
      <div class="form-group">
        <h5>2</h5>
          <select class="form-control" name="finalist2">
    <?php 
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
     ?>
      </select>
      </div>
      </div>
       <div class="col-md-5">
      <div class="form-group">
        <h5>3</h5>
          <select class="form-control" name="finalist3">
    <?php 
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
     ?>
      </select>
      </div>
      </div>
       <div class="col-md-5">
      <div class="form-group">
        <h5>4</h5>
          <select class="form-control" name="finalist4">
    <?php 
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
     ?>
      </select>
      </div>
      </div>
       <div class="col-md-5">
      <div class="form-group">
        <h5>5</h5>
          <select class="form-control" name="finalist5">
    <?php 
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
     ?>
      </select>
      </div>
      </div>
        <div class="col-md-5">
      <div class="form-group">
        <h5>6</h5>
          <select class="form-control" name="finalist6">
    <?php 
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
