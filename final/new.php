<?php
 session_start();
  include('../public/connection.php');
  include('../partials/header.php');
  if(!isset($_SESSION['member_id'])){
    header('Location:../login/login.php');
    exit;
  }
if(isset($_SESSION['duplicates'])) {
         echo $_SESSION['duplicates'];
         }
        unset($_SESSION['duplicates']);

      /* if($_SESSION['member_id']==3){
    echo '<a href="okplay.php" class="btn btn-primary">På/Av spel</a>';
  }
  $votequery = "SELECT canVote FROM voteok";
  $result = mysqli_query($connection, $votequery);
  $row = mysqli_fetch_assoc($result); 
  if($row['canVote']==0){
    echo "can play";
    echo"
  <div class=\"container\">
    <div class=\"text-center\"><h1><div class=\"notok\"></div>För sent att rösta</h1></div>";
  }
  else {
    echo "can not play";
  echo"
  <div class=\"container\">
    <div class=\"text-center\"><h1><div class=\"ok\"></div>Lägg dina röster</h1></div>";
  }
  */

   ?>

  <div class="container">
  <form action="create.php" method="post">
    <p>Lägg in dina topp 6 röster av de 12 bidragen. 3 poäng för varje rätt placering, annars 0. Max 18 poäng att skrapa ihop men lite svårare kanske. Möjligen kan det röra om lite....</p>
  <div class="row">
    <h2>Final</h2>
    <div class="col-md-4 col-md-offset-4">
    <div class="form-group">
      <h4>1:a</h4>
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
      <div class="col-md-4 col-md-offset-4">
      <div class="form-group">
        <h4>2:a</h4>
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
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <div class="form-group">
        <h4>3:a</h4>
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
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <div class="form-group">
        <h4>4:a</h4>
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
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <div class="form-group">
        <h4>5:a</h4>
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
    </div>
     <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <div class="form-group">
        <h4>6:a</h4>
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
    <button type="submit" onclick="return confirm('Säker? Detta går inte att ångra!!!')" class="btn btn-success" name="submitVotes">Spara mina röster</button>
    </div>
    </div>
  </form>
  </div>
  <?php
  include('../partials/footer.php');
   ?>
