
<?PHP
include "header.php";
?>

<!-- 
Guess the fish species game, using alerts when right or wrong
- bstrp image tags, 
img-responsive
img-thumbnail
img-rounded
img gallery with thumbnails and grids
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
class="table-responsive"
class="jumbotron"
<div class="well">

guess the species game, with button groups.
progress bars
<button data-toggle="collapse" data-target="#demo">Collapsible</button>

Do a Form
tooltip
popover


jquery 
slide
animate Uses Queue
add/remove elements
toggleClass()
load() include a file for the request to get!
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").load("demo_test.txt", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                alert("External content loaded successfully!");
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });
});





 -->





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
        <li class=""><a href="index.php">Home</a></li>
        <li class=""><a href="tunes.php">Tunes</a></li>
        <li class="show active2"><a href="fishing.php">Fish Fun</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right hov-green">
        <li><a href="#" id="rmodal-btn"><span class="glyphicon glyphicon-user glyph-space-right"></span><span class="sans">SignUp</span></a></li>
        <!-- Trigger the modal with a button -->
        <li><a href="#" class="sans" id="lmodal-btn"><span class="glyphicon glyphicon-log-in glyph-space-right"></span><span class="sans">LogIn</span></a></li>
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

<!-- End NavBar -->

<section class="content">
  <div class="container">  
    <div class="row content-top-row">
      <div class="col-md-5">
        
      </div>
      <div class="col-md-7">
        
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row content-bot-row">
      <div class="col-md-4">
        have drop downs, that animate, to a view with a bit of info and a map of a local.
      </div>
      <div class="col-md-4">
        Some other Bootstrap feature, or jquery feature to do with fish
      </div>
      <div class="col-md-4">
        
      </div>
    </div>
  </div>
</section>

<?PHP
include "footer.php";
?>