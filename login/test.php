<?php
echo "Hello alla";
$connection = mysqli_connect("cpsrv18.misshosting.com", "tbevjqfq_jorgen", "#JorgenN01", "tbevjqfq_mydatabase");
if($connection){
  echo 'successs';
}
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = mysqli_query($connection,'SELECT * FROM users');

if ($query->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
        echo "id: " . $row["Id"]. " - age: " . $row["age"]. "name". $row['name']. "<br>";
    }
} else {
    echo "0 results";
}
$connection->close();
 ?>

 <h1>Min phpsida</h1>
<p>
  Hello!!!
</p>
