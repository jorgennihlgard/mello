<?php
include('../partials/header.php');
include('../public/connection.php');


/*session_start();

if(!isset($_SESSION['member_id'])){
  header('Location:../login/login.php');
  exit;
}
$userId = $_SESSION["member_id"];*/

$query = "SELECT name, city, performdate, performances.id as perfid FROM  performances INNER JOIN artists on performances.artistid = artists.id inner join cities on cities.id=performances.cityid ORDER BY performdate";



if($result = mysqli_query($connection, $query)){

?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <h1>Alla veckornas deltävlingar</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Artist</th>
            <th>Datum</th>
            <th>Stad</th>
          </tr>
      </thead>
      <tbody>

    <?php
      while($row = mysqli_fetch_assoc($result)){
       echo '<tr>';
       echo '<td class="col-md-4">' . $row['name'] . '</td>';
       echo '<td class="col-md-4">' . $row['performdate'] . '</td>';
       echo '<td class="col-md-4">' . $row['city']  . '</td>';
    
      ?>
      <!-- <td><a href="show.php?id=<?php echo $row['perfid'];?>" class="btn btn-info pull-right">Detaljer</a></td>
        <td><a href="edit.php?id=<?php echo $row['perfid'];?>" class="btn btn-primary pull-right">Editera</a></td>
        <td><a  href="delete.php?id=<?php echo $row['perfid'];?>" class="btn btn-danger pull-right deleteBtn">Ta bort</a></td> -->

      <?php
       echo '</tr>';
     }
       echo '</tbody>';
       echo '</table>';

  mysqli_close($connection);
}

 ?>
    </div>
  </div>
</div>


<?php
include('../partials/footer.php');
 ?>
