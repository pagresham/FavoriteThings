
$(function() {

	// 84581076bd0125f924d6fc410596cf3a   flkr key
	// 99fa044c9cf2d2ff   flkr secret
	var imgs_small = ['img/pinecreek-w960.jpg', 'img/sunset-w960.jpg', 'img/taylor-river-bike-w960.jpg', 'img/whetstone-w960.jpg', 'img/moab-rockhouse-w960.jpg', 'img/auger-kids-w960.jpg']
	var imgs_large = ['img/pinecreek960x600.jpg', 'img/sunset960x600.jpg', 'img/taylor-bike960x600.jpg', 'img/whetstone960x600.jpg', 'img/moabhouse960x600.jpg', 'img/lake-kids960x600.jpg'];

	// Adjust margin of glyphicon
	$("#sp").css("margin-left", "10px");
	
	$('.disabled-link').click(function(e){
		e.preventDefault();
	})

	// --- Start Image src swap on Page Size --- //

	// this could also be done in the CSS. with a media query and
	// This rule:  content:url("../img/boy-in-rock-w960.jpg");
	// If width is < 960 at page load, use taller images
	if($(window).width() < 960) {
		var count = 0;
			$(".carousel-inner img").each(function() {
				$(this).attr('src', imgs_large[count]);
				count++;
			});
	}
	
	// on Resize, check window size, and use appropriate set of images. 
	$(window).resize(function() { 
		if ($(window).width() < 960) { 
			var count = 0;
			$(".carousel-inner img").each(function() {
				$(this).attr('src', imgs_large[count]);
				count++;
			});
		} 
		else { 
			var count = 0;
			$(".carousel-inner img").each(function() {
				$(this).attr('src', imgs_small[count]);
				count++;
			});
		} 
	});

	// End Image src swap //
	
	// Start toggle images on index page //

	$('.ind-fid-vid').hide();

	$('#ind-fid-show').click(function() {
		$('.ind-fish-map').hide();
		$('.ind-fam-info').hide();
		$('.ind-fid-vid').slideToggle();
	});

	$('.ind-fish-map').hide();
	$('#ind-fish-show').click(function() {
		$('.ind-fid-vid').hide();
		$('.ind-fam-info').hide();
		$('.ind-fish-map').slideToggle();
	});

	$('.ind-fam-info').hide();
	$('#ind-fam-show').click(function() {
		$('.ind-fid-vid').hide();
		$('.ind-fish-map').hide();
		$('.ind-fam-info').slideToggle();
	});

	// End Toggle //
	
	// Popover functions for trout //

	$('[data-toggle="popover"]').popover(); 


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
	function initMap(loc, map) {
		
		var mapProperties = {
	    	center:new google.maps.LatLng(loc),
	    	zoom:14,
	    	mapTypeId: google.maps.MapTypeId.SATELLITE 
		};
		var map = new google.maps.Map(document.getElementById(map),mapProperties);
		var marker = new google.maps.Marker({
			position: loc,
			map: map,
			title: loc.name
		});
	}
	// Run init map on trout.html section load
	// document.getElementById('loadme').addEventListener('load', function() {
	// 	alert('trout loaded');
	// 	//initMap(locations[1]);
	// });
	

	// $('#loadme').on('load', function(){
	// 	// Call initMap at load //
	// 	alert('loaded')
	// 	initMap(locations[1]);
	// });
	
	initMap(locations[1], "map");


	

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
	

	// Probalby remove this to submit assignment
	// When ran from a server, this function returns results from a file
	// function ajaxTest() {
	// 	var file = "http:scripts/ajaxTest.txt";
	// 	$.get(file, function(data){
	// 		//data = JSON.stringify(data);
	// 		var lines = data.split('\\r\\n');
	// 		// data = JSON.parse(data);
	// 		for (var i = 0;i<lines.length;i++){
	// 			vals = lines[i].split(',');
	// 			for(var j = 0;j<vals.length;j++) {
	// 				console.log(vals[j]);
	// 			}
	// 		}
	// 	});
	// };
	// ajaxTest();
	
	// Listeners for insect description dropdowns
	$('#mayfly-btn').click(function(event){
		event.preventDefault();
		$('#mayfly-info').slideToggle();
	});
	$('#caddis-btn').click(function(event){
		event.preventDefault();
		$('#caddis-info').slideToggle();
	});
	$('#stone-btn').click(function(event){
		event.preventDefault();
		$('#stone-info').slideToggle();
	});

	// Listener for 'love trout' button 
	$('#trl-btn').click(function(){
		($('.trl-hid').css('display') == 'none') ? $('.trl-hid').fadeIn() : $('.trl-hid').fadeOut();
		
		$('#fish').toggleClass('fly');
	});

	

});

