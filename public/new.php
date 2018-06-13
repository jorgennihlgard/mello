  <?php
  include('../partials/header.php');
  include('../public/connection.php');
  session_start();
  if(!isset($_SESSION['member_id'])){
    header('Location:../login/login.php');
    exit;
  }
if(isset($_SESSION['duplicates'])) {
         echo $_SESSION['duplicates'];
         }
         unset($_SESSION['duplicates']);
      
   ?>
  <div class="container">
    <div class="text-center"><h1>Lägg dina röster</h1></div>
  <form action="create.php" method="post">
  <div class="row">
    <h2>Direkt vidare</h2>
    <div class="col-md-5 col-md-offset-1">
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

      <div class="col-md-5">
      <div class="form-group">
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
        <h2>Till andra chansen</h2>
    <div class="col-md-5 col-md-offset-1">
    <div class="form-group">
       <select class="form-control" name="andra1">
    <?php 
    //$query = "SELECT performances.id, artists.name FROM performances INNER JOIN artists ON performances.artistid = artists.id  WHERE DATE(performdate) = CURDATE()";
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
          <select class="form-control" name="andra2">
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
