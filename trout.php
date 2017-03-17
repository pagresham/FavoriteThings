<?PHP
include "header.php";
?>
<script type="text/javascript" src="scripts/app2.map.js"></script>
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
      <a href="#" id="nav-trout"><img height="45px" src="img/trout.png"></a>
      <!-- <a class="navbar-brand" href="#">MyFavoriteThings</a> -->
    </div>
    
    <div class="collapse navbar-collapse" id="my-navbar">
      
      <ul class="nav navbar-nav hov-green">
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="#" >Tunes</a></li>
        <li class="show active2"><a href="trout.php">Trout</a></li>
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

<!-- Jumbotron -->
<section class="container">
  <div class="jumbotron tr-jumbo">
    <h2>Trout of North America</h2>
    <h4></h4>
  </div>
</section>

<section class="container" id="tr-map">
  <div class="row">
    <!-- Greeting, species, and short gallery -->
    <div class="col-md-5 col-sm-6">
      <div class="center species">
        <h4>The Primary Species</h4>
        <p>There are four primary species of trout in North America. Brook, Brown, Rainbow, and Cutthroat. These four species represent the vast majority of the trout found in the fresh waters of North America.</p>
      </div>
      <div class="row center">
        <!-- 2 pics here -->
        <div class="thumbnail col-sm-6">
          <a href="img/rainbow1.jpg">
            <img src="img/rainbow1.jpg" width="200px" class="img-responsive img-rounded">
            <div class="caption">
              <a href="#"  class="pops" data-toggle="popover" title="" data-placement="bottom" data-content="Although these colorful have been heavily stocked in some areas. Anglers can still find strong native populations in isolated regions.">Rainbow Trout</a>
            </div>
          </a>
        </div>
        <div class="thumbnail col-sm-6">
          <a href="img/brown1.jpg">
            <img src="img/brown1.jpg" width="200px" class="img-responsive img-rounded" >
            <div class="caption">
              <a href="#" data-toggle="popover" data-placement="bottom" title="" data-content="Originally brought to the US as a gift from Germany, these fish will become the dominant species in their range. Brown trout can grow large, and will eat anything from bugs to small rodents.">Brown Trout</a>
            </div>
          </a>
        </div>
      </div>
      <div class="row center">
        <!-- 2 pics here -->
        <div class="thumbnail col-sm-6">
          <a href="img/brook1.jpg">
            <img src="img/brook1.jpg" width="200px" class="img-responsive img-rounded">
            <div class="caption">
              <a href="#" data-toggle="popover" data-placement="bottom" title="" data-content="Brook trout are at home in the small, high-elevation, tumbling streams. Closely related to salmon, the brookies will become colorful and spawn in the fall.">Brook Trout</a>
            </div>
          </a>
        </div>
        <div class="thumbnail col-sm-6">
          <a href="img/cutt1.jpg">
            <img src="img/cutt1.jpg" width="200px" class="img-responsive img-rounded">
            <div class="caption">
              <a href="#" data-toggle="popover" data-placement="bottom" title="" data-content="The elusive cutthroat loves to sip dry flies with a rolling motion. Increasingly rare, these are beautiful fish.">Cutthroat Trout</a>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!--  -->

    <div class="col-md-7 col-sm-6">

      <div class="row">
        
      <div class="row">
        <div class="col-sm-12">
          <div class="habitat center">
            <h4>Typical Habitat</h4>
            <p>Trout prefer cold clean water. Found often at higher elevations, trout seek natural cover such as undercut banks and overhanging branches. Trout are native to most of the US states. See several classic habitats below.</p>
          </div>
         
        </div>
        <div class="col-sm-12 center">
          
          <!-- Habitat Map -->        
          <div class="habitat center" id="map">
    
          </div>
          
          <!-- Habitat Buttons -->
          <div class=".btn-group-vertical habitat-btn">
            <button type="button" class="btn btn-info" id="loc0">Colorado Mountains</button>
            <button type="button" class="btn btn-info" id="loc1">Wyoming</button>
            <button type="button" class="btn btn-info" id="loc2">North Carolina</button>
          </div>
        </div> 
      </div>
    </div>
  </div>
  <div class="row sectionl">
    <div class="col-sm-4 space">
      <div class="center species">
        <!-- fish food header -->
        <h4>Fish Food</h4>
        <p>Three main types of aquatic insects provide most of a trout's diet. These insects spend most of their lives underwater. Only during the final stage of their lives do they migrate to the surface to breathe air and reproduce and die.</p>
      </div>
     


    </div>

    <div class="col-sm-8">
      <div class="row bottom">
        
        <div class="col-sm-4 col-xs-12 thumbnail-bug center">
          <a href="img/mayfly1.jpg">
            <div class="caption">
              Mayfly
            </div>
            <img src="img/mayfly1.jpg" alt="" width="200px" class="img-responsive img-rounded">
          </a>
          <div class="tab  center">
            <a href="#" id="mayfly-btn">
                <span class="glyphicon glyphicon-option-horizontal"></span> 
            </a>
          </div>
          <div class="insect-info col-sm-12 center" id="mayfly-info">
            <p>Mayflies are aquatic insects belonging to the order Ephemeroptera. This ancient also contains dragonflies and damselflies.</p>
          </div>
        </div>
      
        <div class="col-sm-4 col-xs-12 thumbnail-bug center">
          <a href="img/caddis1.jpg">
            <div class="caption">
              Caddis Fly
            </div>
            <img src="img/caddis1.jpg" alt="" width="200px" class="img-responsive img-rounded">
          </a>
          <div class="tab  center">
            <a href="#" id="caddis-btn">
                <span class="glyphicon glyphicon-option-horizontal"></span> 
            </a>
          </div>
          <div class="insect-info col-sm-12 center" id="caddis-info">
            <p>Caddisflies are insects with approximately 7,000 described species. They are small moth-like insects having two pairs of wings.</p>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12 thumbnail-bug center">
          <a href="img/stone1.jpg">
            <div class="caption">
              Stonefly
            </div>
            <img src="img/stone1.jpg" alt="" width="200px" class="img-responsive img-rounded">
          </a>
          <div class="tab  center">
            <a href="#" id="stone-btn">
                <span class="glyphicon glyphicon-option-horizontal"></span> 
            </a>
          </div>
          <div class="insect-info col-sm-12 center" id="stone-info">
            <p>With over 600 species, stoneflies come in a range of sizes and colors. These primitive aquatic insects are distant cousins to the cockroach.</p>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-sm-12">
       <div class="flying-fish" id="fish">
         <img height="100px" src="img/trout.png">
      </div>
      <div class="trl-top center">
        <h2 class="trl-hid">So Do We!!!</h2>
      </div>
      <div class="trl-bot center">
        <button class="btn btn-success" id="trl-btn" type="button">Do you love trout?</button>
      </div>
      </div>
    </div>
  
   
  </div>
</section>


<!-- Start Footer -->


<?PHP
include "footer.php";
include "register-modal.php";
include "login-modal.php";
?>