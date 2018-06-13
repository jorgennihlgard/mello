	<?php 
	include('../public/connection.php');
	include('../partials/header.php');

	

	 ?>



	<h1>Lägg till nytt nummer</h1>

	<div class="container">
		<div class="row">
			<div class="col-md-4">

				<form action="create.php" method="post">
	<select name="name">
	<?php 
	$query = 'SELECT * FROM artists';
	$result = mysqli_query($connection, $query);
	
	while($row = mysqli_fetch_assoc($result)){
		echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
		
	}
	 ?>
		</select>

			</div>
			<div class="col-md-4">
	<select name="city">
	<?php 
	$query = 'SELECT * FROM cities';
	$result = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){
		echo '<option value="' . $row['id'] . '">' . $row['city'] . '</option>';
		
	}
	 ?>
		</select>

			</div>
			<div class="col-md-4">
				<input type="date" name="performdate">

			</div>

			<input type="submit" name ="submit" value="Spara nummer">
			</form>
		</div>

	</div>