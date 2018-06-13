<?php 
	include('../public/connection.php');
	include('../partials/header.php');
		
		if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$city = $_POST['city'];
		$performdate = $_POST['performdate'];

		$query = "INSERT INTO performances (cityid, artistid, performdate) VALUES ('$city', '$name', '$performdate')";
		$insertRow = mysqli_query($connection, $query);	
		var_dump($insertRow);
			if($insertRow){
					header('Location:index.php');
			}
	}

	 ?>
