    <?php
  include ('../partials/header.php');
  include ('../public/connection.php');

  session_start();
  $errors = '';
  $success ='';
  $warning='';
  $salt = "Skrivennovell%&";


  if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];

  $find = array('"', "'");
  $username = str_replace($find, "" , $username);
  $pass = str_replace($find, "" , $pass);


    if(!empty($username) and !empty($pass)){

      $check = mysqli_query($connection, "SELECT * FROM users WHERE name = '$username'");

      if(mysqli_num_rows($check)==1){
  $loggedinPerson = mysqli_fetch_array($check);


  // Get username from check
  $pass = hash("sha256", $salt . $pass . $loggedinPerson['name'] );


        //Check if check == pass
        if ($loggedinPerson['password'] == $pass) {
          //ok password, login
          $_SESSION['member_name'] = $loggedinPerson['name'];
          $_SESSION['member_id'] = $loggedinPerson['id'];
           header('Location: ../start/index.php');

        }
        else{
          $warning='<div class="alert alert-warning"><strong>The username or password is incorrect, please try again</strong></div>';
      }
      }
      else{
        $warning='<div class="alert alert-warning"><strong>The username or password is incorrect, please try again</strong></div>';
    }

  }
  }
   ?>
   <div class="container">
       <div class="row">
           <div class="col-sm-6 col-md-4 col-md-offset-4">
               <?php echo $warning;

    if(isset($_SESSION['newMember'])) {
         echo $_SESSION['newMember'];
         }
      unset($_SESSION['newMember']);
                ?>
                 <div class="account-wall">
                  <div class=text-center>
                  <i class=" text-center fa fa-user-circle-o fa-4x" aria-hidden="true" ></i>
                  </div>
                   <form class="form-signin" method="post">
                  <div class="form-group">
                     <input type="text" class="form-control" name="username" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                   <button class="btn btn-lg btn-primary btn-block" name="loginBtn" type="submit">Login</button>
                   </form>
               </div>
               <a href="register.php" class="text-center new-account">Create new account </a>
           </div>
       </div>
   </div>


  <?php
  include '../partials/footer.php';
   ?>
