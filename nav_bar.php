<?PHP
if(isLoggedIn()) {
  $username = $_SESSION['username']; 
}
?>
<nav class="navbar navbar-default top-nav">
	<div class="container-fluid" >
		
    <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
				<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
			</button>

      <?PHP print (strpos($_SERVER['PHP_SELF'], '/index.php')) ? "<a class='navbar-brand'  href='#' id='brand'>myFavoriteThings</a>" : "" ?>
      <?PHP print (strpos($_SERVER['PHP_SELF'], '/trout.php')) ? "<a href='#'' id='nav-trout'><img height='45px' src='img/trout.png'></a>" : "" ?>
       <?PHP print (strpos($_SERVER['PHP_SELF'], '/tunes.php')) ? "<a class='navbar-brand'  href='#'' id='brand'>myFavoriteThings</a>" : "" ?>
        <?PHP print (strpos($_SERVER['PHP_SELF'], '/login.php')) ? "<a class='navbar-brand'  href='#'' id='brand'>myFavoriteThings</a>" : "" ?>
         <?PHP print (strpos($_SERVER['PHP_SELF'], '/register.php')) ? "<a class='navbar-brand'  href='#'' id='brand'>myFavoriteThings</a>" : "" ?>
		</div>

		<div class="collapse navbar-collapse" id="my-navbar">
			
      <ul class="nav navbar-nav hov-green">
				
        <li <?PHP print (strpos($_SERVER['PHP_SELF'], '/index.php')) ? "class='active2'" : "" ?>><a href="index.php">Home</a></li>
        
        <!-- <li <?PHP //print (strpos($_SERVER['PHP_SELF'], '/tunes.php')) ? "class='active2'" : "" ?> ><a href="#">Tunes</a></li> -->
				
        <li <?PHP print (strpos($_SERVER['PHP_SELF'], '/trout.php')) ? "class='active2'" : "" ?> ><a href="trout.php">Trout</a></li>
        			
      </ul>
			<ul class ="nav navbar-nav navbar-right hov-green">
				
      <?PHP
      if (isLoggedIn()) {
        ?>
        <li>
          <a href='logout.php' class='sans' id='logout'><span class='glyphicon glyphicon-log-out glyph-space-right'></span><span class="sans>">Logout</span></a>
        </li>";
      <?PHP
      }
      else {
         ?>
         <li><a href='login.php' class='sans' id='login'><span class='glyphicon glyphicon-log-in glyph-space-right'></span><span class='sans'>LogIn</span></a></li>
        <?PHP
        }
        ?>
        <li <?PHP print (strpos($_SERVER['PHP_SELF'], '/register.php')) ? "class='active2'" : "" ?> >
          <a href="register.php"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a>
        </li>
        <?PHP
        if(isLoggedIn()) {
          print "<li><a style='color:black'>Welcome: $username</a></li>";
        }
        ?>
			</ul>
		</div>
	</div>
</nav>
<!-- End Header div -->
</div>
<div id="body">
