<?PHP
/**
 * Checks if the session var 'user-name' is set
 * @return boolean - Wherether the 'user-name' session var is set
 */
function isLoggedIn() {
	if(isset($_SESSION['username'])) {
		return TRUE;
	}
	else {
		return FALSE;
	}
}
// Make logout.php a page with a redirectf
function logOut(){
	if(isset($_SESSION['username'])) {
		unset($_SESSION['username']);  // clear the session var for user-name
		print "<p>You are currently logged out. Please use this link to <a href='login.php'>Login</a>.</p>";
	}
	
}
?>