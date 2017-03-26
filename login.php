<?PHP

// In a nutshell
// 1. start session to have access to session vars
// 2. include/require files
// 3. init vars
// 4. IF login is set, process array. 
// 5. if login is set, query database for row where username == username.
// 6. Test if passwords match

session_start();

$username = $password = $successMessage = $logOutMessage = "";
$errors = array();

include "authentication.php";
include "header.php";
include "nav_bar.php";

require("includes/config.php");
require("includes/connect.php");


if(isset($_POST['logOut'])){
	logOut();
}

if(isset($_POST['login'])) {
	
	if(!empty($_POST['username'])) {
		$username = $_POST['username'];
		if (strlen(trim($username)) === 0) {
			$errors['username'] = "Invalid Username";
		}
		else if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $username)) {
			$error['username'] = "Invalid Username";
		}
		else if (strlen($username) > 45) {
			$error['username'] = "Invalid Username";
		}
	} 
	else {
		$errors['username'] = "Invalid Username";	
	}
	

	if (!empty($_POST['password'])) {
		$password = $_POST['password'];
		if(!strlen(trim($password)) === 0 || (strlen($password) > 45)) {
			$errors['password'] = "Please enter a valid password";
		}
	}
	else {
		$errors['password'] = "Please enter a password";
	}

	// Build query to pull users info from DB if it exists there.
	$query = "SELECT USERNAME, PASSWORD
				FROM FAVORITE_USERS
				WHERE USERNAME = '$username'";

	$result = mysqli_query($db, $query);
	if(!$result) {
		$errors['username'] = "Problem with the SELECT statement.";
	}
	else {
		$row = mysqli_fetch_assoc($result);

		if ($row) {
			// error check statements
			//print_r($row);
			//print "row is true<br>";

			if (password_verify($password, $row['PASSWORD'])) {
				$_SESSION['username'] = $username;
				//print "set settion username and it is ".$_SESSION['username']." ".$username;
				//print "<p>password is correct</p><br>";
				$successMessage = "<p>Please visit our site at: <a href='index.php'>myFavoriteThings</a></p>";
				
			}
			else {
				// Change this once I am sure all works
				$errors['password'] = "Invalid Password";
			}
		}
		else {
			$errors['password'] = "Sorry, there was a problem with your login info.";
		}
	}  // End $resuls is true
}   // End of isset($_POST['login'])

if (isLoggedIn()) {
	$username = $_SESSION['username'];
	
	$logOutMessage = "<p>Use this link to <a href='logout.php'>Logout</a></p>";
	// Add link to the home page.
	// Also add link to log out.
}
//print $_SERVER['PHP_SELF'];


?>



<div class="container-fluid">
	<div class="row">
		<div class="jumbotron reg-jumbo col-sm-12">
			<!-- <h2>Create an account</h2> -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" role="form" method="post" action="login.php" style="padding: 1em;">
			<fieldset>
				<legend>Login</legend>

				<div class="form-group">
	              <label class="control-label col-sm-2" for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
					<div class="col-sm-10">
	      				<input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username" value="<?PHP echo (isset($_POST['username']) ? $_POST['username'] : "") ?>" maxlength="45" required >
	      				<small class="errorText"><?PHP echo array_key_exists('username', $errors) ? $errors['username'] : '' ?></small>		
	    			</div>					
            	</div>
	            
	            <div class="form-group">
	                <label class="control-label col-sm-2" for="psw1"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
					<div class="col-sm-10">
	      				<input type="password" class="form-control" name="password" id="psw1" placeholder="Enter password" maxlength="45" required>
	      				<small class="errorText"><?PHP echo array_key_exists('password', $errors) ? $errors['password'] : '' ?></small>
	    			</div>
	            </div>
	            	
				<div class="form-group">
					<label class="control-label col-sm-2" for="login"></label>
					<div class="col-sm-10">
						<button type="submit" name="login" class="btn btn-success" id="login"><span class="glyphicon glyphicon-off"></span> Login</button>	

						<p><?PHP echo (!empty($successMessage)) ? $successMessage : '' ?></p>
						<p><?PHP echo (!empty($logOutMessage)) ? $logOutMessage : '' ?></p>
						<?PHP
						if(!empty($logOutMessage)) {
							print "<button type='submit' name='logOut' class='btn btn-success' id='login' formnovalidate><span class='glyphicon glyphicon-off'></span> LogOut</button>	";
						}

						?>
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
// }
include "footer.php";
?>