<?php
include ('../public/connection.php');
  session_start();
$errors = '';
$success ='';
$warning='';
$salt = "Skrivennovell%&";

if(isset($_POST['registerBtn'])){

  $name = $_POST['name'];
  $pass = hash("sha256", $salt . $_POST['password'] . $_POST['name']);

  if(!empty($name) and !empty($pass)){

    $checkName= mysqli_query($connection, "SELECT * FROM users WHERE name = '$name'");
    if(mysqli_num_rows($checkName)>0){
        $warning='<div class="alert alert-warning">Namnet finns redan</div>';
    }

    else{
    $query = "INSERT INTO users SET
    id='',
    name = '$name',
    password = '$pass',
    date = NOW()";
    if(mysqli_query($connection, $query)){
    $_SESSION['newMember'] ='<div class="alert alert-success">Kontot är skapat, vänligen logga in</div>';
      header('Location: login.php');
      exit();
    }
  }
}
}
include ('../partials/header.php');
 ?>
 <div class="container">
     <div class="row">
         <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-4">
             <?php echo $warning;
             ?>
               <div class="account-wall">
                <div class=text-center>
                <i class=" text-center fa fa-user-circle-o fa-4x" aria-hidden="true" ></i>
                </div>
                 <form class="form-signin" method="post">
                   <div class="form-group">
                     <input type="text" class="form-control" name="name" placeholder="Namn" required autofocus>
                   </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Lösenord" required>
                </div>
                 <button class="btn btn-lg btn-primary btn-block" name="registerBtn" type="submit">Registrera</button>
                 </form>
             </div>
             <a href="login.php" class="text-center new-account">Logga in </a>
         </div>
     </div>
 </div>



<?php
include '../partials/footer.php';
 ?>
