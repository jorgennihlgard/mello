<?php
include ('../partials/header.php');
session_start();

session_destroy();
?>
<h2>Du är utloggad</h2>

<p><a href="login.php" class="btn btn-primary" >Logga in igen</a></p>

<?php
include '../partials/footer.php';
 ?>
