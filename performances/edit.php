<?php
include('../partials/header.php');
include('../public/connection.php');

$id = $_GET['id'];
var_dump($_GET);
//$query = "SELECT * FROM performances WHERE id = '$id'";
$query = "SELECT name, city, performdate, performances.cityid as cid, performances.artistid as aid FROM  performances INNER JOIN artists on performances.artistid = artists.id inner join cities on cities.id=performances.cityid WHERE performances.id = '$id'";
$result = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($result);
mysqli_close($connection);
 ?>

 <div class="container">
   <div class="text-center"><h1>Edit story</h1></div>
 <form  action="update.php" method="post">
 <div class="row">
   <div class="col-md-3 col-md-offset-1">
   <div class="form-group">
     <label for="name">Artist</label>
     <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" placeholder="Namn" required>
   </div>
   </div>
    <div class="col-md-3 col-md-offset-1">
       <div class="form-group">
         <label for="city">Stad</label>
         <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city']?>" placeholder="Stad" required>
       </div>
       </div>
       <div class="col-md-3 col-md-offset-1">
       <div class="form-group">
         <label for="date">Datum</label>

         <input type="date" class="form-control" name="performdate" id="performdate" value="<?php echo $row['performdate']?>" placeholder="Datum" required>
       </div>
       </div>
       </div>
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
   <input type="hidden" name="aid" value="<?php echo $row['aid']; ?>">


 <div class="row">
       <div class="btn-lg text-center">
   <button type="submit" class="btn btn-success" name="editArtist">Spara ändringar</button>
   </div>
   </div>
 </form>
 </div>
 