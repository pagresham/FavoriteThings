$(function(){
  // -- Start Habitat Map -- //
  
  var rioGrand = {
    lat: 37.765267, 
    lng: -107.373568,
    name: "Rio Grande River"
  };
  var greysRiver = {
    lat: 42.705816, 
    lng: -110.679710,
    name: "Grey's River"
  };
  var wilsonCreek = {
    lat: 36.052478, 
    lng: -81.777994,
    name: "Wilson's Creek"
  };
  var locations = [rioGrand, greysRiver, wilsonCreek];


  // Begin Google Map function //
  // Should add function to re-center map on resize
  function initMap(loc) {
    
    var mapProperties = {
        center:new google.maps.LatLng(loc),
        zoom:14,
        mapTypeId: google.maps.MapTypeId.SATELLITE 
    };
    var map = new google.maps.Map(document.getElementById("map"),mapProperties);
    var marker = new google.maps.Marker({
      position: loc,
      map: map,
      title: loc.name
    });
  }
  // Run init map on trout.html section load
  // document.getElementById('loadme').addEventListener('load', function() {
  //  alert('trout loaded');
  //  //initMap(locations[1]);
  // });
  

  // $('#loadme').on('load', function(){
  //  // Call initMap at load //
  //  alert('loaded')
  //  initMap(locations[1]);
  // });
  
  initMap(locations[1]);


  

  // Add listeners to the habitat selection buttons //
  
  $('#loc0').click(function() {
    initMap(locations[0]);
    });

  $('#loc1').click(function() {
    initMap(locations[1]);
    });

  $('#loc2').click(function() {
    initMap(locations[2]);
    });

});
  