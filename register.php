<?PHP
/**
 * In a nutshell 
 * 1. include files - register.php to hold login info - connect.php to hold the db connection script
 * 2. init variables for script
 * 3. Check if $_POST is set
 * 4. If yes, validate info, and store in short names for use.
 * 5. If validate errors is no, Write SQL command to DB to see if username is used. If so error message.
 * 6. If uname is ok, write sql insert command.
 * 7. Check for errors again, if none, set valid = true
 * 8. If false, display form
 */

include "header.php";
require("includes/config.php");
require("includes/connect.php");

$validInputs = false; 
$username = $email = $password1 = $password2 = $loginMessage = '';
$errors = array();

// Reset post array and form fields on Reset btn
if(isset($_POST['reg_reset'])) {
	unset($_POST);
}

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
      $errors['password1'] = "Passwords must be at least 8 characters long.";
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
    //print "<small class='errorText'>There are errors. Please make corrections and try again</small>";
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
          $loginMessage = "<p class='successText'><a href=\"login.php?username=$username\"><button class='btn btn-info'>Login</button></a>  Thank you for registering.</p>";
          // echo "<p>Thank you for registering. Please <a href=\"login.php?username=$username\">login.</a></p>";  
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
<!-- Start Nav Bar -->
<nav class="navbar navbar-default top-nav">
	<div class="container" >
		
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
				<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span> 
			</button>
	      	<a class="navbar-brand"  href="#" id="brand">myFavoriteThings</a>
		</div>
		<div class="collapse navbar-collapse" id="my-navbar">
				
		    <ul class="nav navbar-nav hov-green">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Tunes</a></li>
				
				<!-- <li class="show"><a href="fishing.php">Fish Fun</a></li> -->
		        <li><a href="trout.php">Trout</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right hov-green">
		    	<li class="active2">
		      	<a href="register.php"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a>
		        </li>

		        <!-- This li activated a bootstrap modal -->
		        <!-- <li><a href="#" id="rmodal-btn"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a></li> -->
						<!-- Trigger the modal with a button -->

				<li><a href="login.php" class="sans" id="login"><span class="glyphicon glyphicon-log-in glyph-space-right"></span><span class="sans">LogIn</span></a></li>
				<li class="dropdown">
		      		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Drop Content <span class="caret"></span></a>
		      
		      		<ul class="dropdown-menu">
		            	<li><a href="#">drop page 1</a></li>
			            <li><a href="#">drop page 2</a></li>
			            <li><a href="#">drop page 3</a></li>
		            </ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- End Nav Bar -->

<div class="container">
	<div class="row">
		<div class="jumbotron reg-jumbo col-sm-12">
			<!-- <h2>Create an account</h2> -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" role="form" method="post" action="register.php" style="padding: 1em;">
			<fieldset>
				<legend>Create an account</legend>

				<div class="form-group">
	              <label class="control-label col-sm-2" for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
					<div class="col-sm-10">
	      				<input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username" value="<?PHP echo (isset($_POST['username']) ? $_POST['username'] : "") ?>"  required >
	      				<small class="errorText"><?PHP echo array_key_exists('username', $errors) ? $errors['username'] : '' ?></small>		
	    			</div>					
            	</div>
            
	            <div class="form-group">
	              	<label class="control-label col-sm-2" for="email"><span class="glyphicon glyphicon-user"></span> Email</label>	              
					<div class="col-sm-10">
	      				<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?PHP echo (isset($_POST['email']) ? $_POST['email'] : '') ?>" required>
	      				<small class="errorText"><?PHP echo array_key_exists('email', $errors) ? $errors['email'] : '' ?></small>
	    			</div>
	            </div>
	            
	            <div class="form-group">
	                <label class="control-label col-sm-2" for="psw1"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
					<div class="col-sm-10">
	      				<input type="password" class="form-control" name="password1" id="psw1" placeholder="Enter password"required>
	      				<small class="errorText"><?PHP echo array_key_exists('password1', $errors) ? $errors['password1'] : '' ?></small>
	    			</div>
	            </div>
	            
	            <div class="form-group">
	              <label class="control-label col-sm-2" for="psw2"><span class="glyphicon glyphicon-eye-open"></span> Repeat Password</label>
					<div class="col-sm-10">
	      				<input type="password" class="form-control" name="password2" id="psw2" placeholder="Re-enter password"required>
	      				<small class="errorText"><?PHP echo array_key_exists('password2', $errors) ? $errors['password2'] : '' ?></small>
	    			</div> 
	            </div>
	            	
				<div class="form-group">
					<label class="control-label col-sm-2"></label>
					<div class="checkbox col-sm-10">
	              		<label><input type="checkbox" value="" checked>Remember me</label>
	            	</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="create_account"></label>
					<div class="col-sm-10">
						<button type="submit" name="register" class="btn btn-success" id="create_account"><span class="glyphicon glyphicon-off"></span> Create Account</button>	
						<button type='submit' name="reg_reset" class=" pull-right btn btn-success" id="reg_reset" formnovalidate><span>Reset</span></button>
						<p><?PHP echo (!empty($loginMessage)) ? $loginMessage : '' ?></p>
					</div>
					
				</div>
	            <p class="errorText">
	                 <!-- <?PHP echo $connect_message ?> -->
	            </p>		
			</fieldset>
        </form>
		</div>
	</div>
</div>

<?PHP
}
include "footer.php";
?>