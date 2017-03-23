<?PHP

$connect_message = '';

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno()) {
	die("Connection failed: ". mysqli_connect_error());
}
else {
	$connect_message =  "<h1 style='color:red;'>no con er</h1><br>";
}

?>