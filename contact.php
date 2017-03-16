<?PHP
include "header.php";
?>

<!-- Begin collapsable navbar -->
<!-- Add a brand image, or/and an image in the middle of the nav if wanted -->

<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
				<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="#">MyFavoriteThings</a>
		</div>
		<div class="collapse navbar-collapse" id="my-navbar">
			<ul class="nav navbar-nav hov-green">
				<li class="active2"><a href="index.php">Home</a></li>
				<li><a href="cnt1.php">Content 1</a></li>
				<li class="show"><a href="cnt2.php">Content</a></li>
				

        


			</ul>
			<ul class="nav navbar-nav navbar-right hov-green">

				<li><a href="#" id="rmodal-btn"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a></li>
				<!-- Trigger the modal with a button -->
        <li><a href="#" class="sans" id="lmodal-btn"><span class="glyphicon glyphicon-log-in glyph-space-right"></span><span class="sans">LogIn</span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Drop Content <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">drop page 1this</a></li>
            <li><a href="#">drop page 2</a></li>
            <li><a href="#">drop page 3</a></li>
          </ul>
        </li>
			</ul>
		</div>
	</div>
</nav>

<!-- End NavBar -->












<?PHP
include "footer.php";
?>