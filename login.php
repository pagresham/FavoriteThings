<?PHP

include "header.php";
require("includes/config.php");
require("includes/connect.php");




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
		    	<li>
		      	<a href="register.php"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a>
		        </li>

		        <!-- This li activated a bootstrap modal -->
		        <!-- <li><a href="#" id="rmodal-btn"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a></li> -->
						<!-- Trigger the modal with a button -->

				<li class="active2"><a href="login.php" class="sans" id="login"><span class="glyphicon 	glyphicon-log-in glyph-space-right"></span><span class="sans">LogIn</span></a></li>
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
			<form class="form-horizontal" role="form" method="post" action="login.php" style="padding: 1em;">
			<fieldset>
				<legend>Login</legend>

				<div class="form-group">
	              <label class="control-label col-sm-2" for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
					<div class="col-sm-10">
	      				<input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username" value="<?PHP echo (isset($_POST['username']) ? $_POST['username'] : "") ?>"  required >
	      				<small class="errorText"><?PHP echo array_key_exists('username', $errors) ? $errors['username'] : '' ?></small>		
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
// }
include "footer.php";
?>