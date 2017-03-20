
<?PHP
require("includes/config.php");
require("includes/connect.php");

$validInputs = false; 
$username = $email = $password1 = $password2 = '';
$errors = array();

if (isset($_POST['register'])){
  
  if(!empty($_POST['username'])) {
    $username = $_POST['username'];
    if(strlen(trim($username)) === 0) {
      $errors['username'] = "Please enter a valid Username";
    }
    else if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
      $errors['username'] = "Username must consist of letters and numbers";
    }
  }
  else {
    $errors['username'] = "Please enter a valid Username";
  }
  
  if(!empty($_POST['email'])) {
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Please enter a valid Email address";
    }
  }
  else {
    $errors['email'] = "Please enter a valid Email address";
  }
  if (!empty($_POST['password1'])) {
    $password1 = $_POST['password1'];
    if (strlen(trim($password1)) === 0) {
      $errors['password1'] = "Please enter a valid password";
    }
    else if(!preg_match("/^[a-zA-Z0-9!@#$%^&*]{8,}$/", $password1)) {
      $errors['password1'] = "Passwords can only contain letters and numbers";
    }
  }
  else {
      $errors['password1'] = "Password is a required field";
  }

  if (isset($_POST['password2'])) {
    $password2 = $_POST['password2'];
    if($password1 != $password2) {
      $errors['password2'] = "Passwords do not match";
    }
  }
  else {
    $errors['password2'] = "Plese re-enter you password";
  }

  $errorCount_register = count($errors);
  if ($errorCount_register > 0) {
    print "<small class='errorText'>There are errors. Please make corrections and try again</small>";
    $validImputs = false;
  }

  // ---- Check DB for username ---- //
  else {

    $query = "SELECT USERNAME
                FROM FAVORITE_USERS
                WHERE USERNAME = '$username'";

    $result = mysqli_query($db, $query);

    if(!$result) {
      // results is an object that is the return val from the db call.
      echo mysqli_err($db);
    }
    else {
      $numRows = mysqli_num_rows($result);
      if ($numRows > 0) {
        // the username is already in use
        $errors['username'] = "Username already taken.";
      }
      else {

        $hashed_password = password_hash($password1, 1);

        // passwords matched, input passed validation, and username is free
        $query = "INSERT INTO FAVORITE_USERS
                    (USERNAME, EMAIL, PASSWORD)
                    VALUES ('$username', '$email', '$hashed_password')";

        $result = mysqli_query($db, $query);

        if (!$result) {
          echo "INSERT error:" . mysqli_error($db);
        }
        else {
          // User gets link to go to login page.
          $loginMessage = "<p class='errorText'>Thank you for registering. Please <a href=\"login.php?username=$username\">login.</a></p>";
          echo "<p>Thank you for registering. Please <a href=\"login.php?username=$username\">login.</a></p>";  
        unset($_POST);


        }
      }
    }
  }
  if (count($errors) == 0) {
    $validImputs = true;
  }
}
if (!$validInputs) {
   

 ?>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="rmodal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <?PHP
        if (isset($_POST['register'])){
        print_r($_POST);
       
        }    
      ?>
    
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span>Create Account</h4>
        </div>
        
        <div class="modal-body" style="padding:40px 50px;">
          
          <form role="form" method="post" >
            
            <div class="form-group">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username" value="<?PHP echo (isset($_POST['username']) ? $_POST['username'] : "") ?>" required>
              <small class="errorText"><?PHP echo array_key_exists('username', $errors) ? $errors['username'] : '' ?></small>
            </div>
            
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?PHP echo (isset($_POST['email']) ? $_POST['email'] : '') ?>" required>
              <small class="errorText"><?PHP echo array_key_exists('email', $errors) ? $errors['email'] : '' ?></small>
            </div>
            
            <div class="form-group">
              <label for="psw1"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password1" id="psw1" placeholder="Enter password"required>
              <small class="errorText"><?PHP echo array_key_exists('password1', $errors) ? $errors['password1'] : '' ?></small>
            </div>
            
            <div class="form-group">
              <label for="psw2"><span class="glyphicon glyphicon-eye-open"></span>Repeat Password</label>
              <input type="password" class="form-control" name="password2" id="psw2" placeholder="Re-enter password"required>
              <small class="errorText"><?PHP echo array_key_exists('password2', $errors) ? $errors['password2'] : '' ?></small>
            </div>
            
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              
            <button type="submit" name="register" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
              
            <p class="errorText">
                 <!-- <?PHP echo $connect_message ?> -->
            </p>
          </form>
        </div>
        <div class="modal-footer">

          <button type="submit" name="register" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#rmodal-btn").click(function(){
        $("#rmodal").modal();
    });
});
</script>

<!-- <?PHP
}
?> -->