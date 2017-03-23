<?PHP
/**
 * This file is a tiny web page in itself.
 * It includes header and footer. 
 * It draws a new div, 
 * Checks if 'user_name' is set, if so, it runs function unset() on it. 
 * Prints a message telling user they are logged out, and gives link to log back in.  
 */
session_start();

include "lab7_header.php";


if(isset($_SESSION['username'])) {
	unset($_SESSION['username']);  // clear the session var for user-name
}
print "<p>You are currently logged out. Please use this link to <a href='login.php'>Login</a>.</p>";



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
<?PHP
include "footer.php"
?>