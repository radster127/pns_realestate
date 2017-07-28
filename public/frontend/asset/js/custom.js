
var customScripts = {
    profile: function () {
     	var portfolio = $('#portfolio');
        var items = $('.items', portfolio); 
	    var filters = $('.filters li a', portfolio); 
        var iso = $('#iso-container',portfolio);
        


       /* iso.isotope({
            
            
            layoutMode: 'masonry',
            
            masonry: {

                 columnWidth: 40,
            }
        });
    */


        /*   
		items.imagesLoaded(function() {
			items.isotope({
				itemSelector: '.item',
				layoutMode: 'fitRows',
				transitionDuration: '0.7s'
                masonry: {
                  columnWidth: 40,
                  isFitWidth: true
                }
			});
		});*/
		
		filters.click(function(){
			var el = $(this);
			filters.removeClass('active');
			el.addClass('active');
			var selector = el.attr('data-filter');
			items.isotope({ filter: selector });
			return false;
		}); 

      





    },
    fancybox: function () {
        // fancybox
        $(".fancybox").fancybox({
            helpers : {
                title: {
                    type: 'inside',
                    position: 'top'
                },
                overlay:{
                    closeClick: false,
                    locked :true,
                    opacity: 0.8,
                    cs: {'background-color': '#ff0000'}
                },
                thumbs : {
                        width  : 70,
                        height : 70
                }
            },
            arrows    : false,
            nextClick : true,
            nextEffect: 'none',
            prevEffect: 'none',
          
                

        });
        
        $("a#map").fancybox({
              'hideOnContentClick': false, // so you can handle the map
              'overlayColor'      : '#ccffee',
              'overlayOpacity'    : 0.8,
              'autoDimensions': true, // the selector #mapcontainer HAS css width and height
              'onComplete': function(){
                google.maps.event.trigger(map, "resize");
              },
              'onCleanup': function() {
               var myContent = this.href;
               $(myContent).unwrap();
              } // fixes inline bug
              
        });

    },
    onePageNav: function () {

        $('#mainNav').onePageNav({
            currentClass: 'active',
            changeHash: false,
            scrollSpeed: 950,
            scrollThreshold: 0.2,
            filter: '',
            easing: 'swing',
            begin: function () {
                //I get fired when the animation is starting
                
            },
            end: function () {
                   //I get fired when the animation is ending
                if(!$('#main-nav ul li:first-child').hasClass('active')){
					$('.header').addClass('addBg');
				}else{
						$('.header').removeClass('addBg');
				}
				
            },
            scrollChange: function ($currentListItem) {
                //I get fired when you enter a section and I pass the list item of the section
               	/*if(!$('#main-nav ul li:first-child').hasClass('active')){
					$('.header').addClass('addBg');
				}else{
						$('.header').removeClass('addBg');
				}*/
			}
        });
		
		$("a[href='#top']").click(function () {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
        });
		$("a[href='#basics']").click(function () {
            $("html, body").animate({ scrollTop: $('#services').offset().top - 75 }, "slow"); 
            return false;
        });
        $("a[href='#location']").click(function(){
            $("html, body").animate({ scrollTop: $('#location').offset().top - 75 }, "slow"); 
            return false;
        });
         $("a[href='#work']").click(function(){
            $("html, body").animate({ scrollTop: $('#work').offset().top - 75 }, "slow"); 
            return false;
        });

    }, 

   
    owlSlider: function () {
        var owl = $("#owl-demo");
        owl.owlCarousel();
        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
    },
    bannerHeight: function () {
        var bHeight = $(".banner-container").height();
        $('#da-slider').height(bHeight);
        $(window).resize(function () {
            var bHeight = $(".banner-container").height();
            $('#da-slider').height(bHeight);
        });
    },
	waySlide: function(){
		  	/* Waypoints Animations
		   ------------------------------------------------------ */		   			  
		 
			 						 
		},
	fitText: function(){			  
			setTimeout(function() {			
			$('h1.responsive-headline').fitText(1.2, { minFontSize: '16px', maxFontSize: '30px' });			
			}, 100);
	},
    init: function () {
        customScripts.onePageNav();
        customScripts.profile();
        customScripts.fancybox(); 
        customScripts.owlSlider();
	    customScripts.waySlide();
	    customScripts.fitText();
        customScripts.bannerHeight();
    }
}



function initialize(){
    var map;
   
    var mapAttribute = {
            credentials: ' yFt9kpzvtvkZAkWBS7tE~0gpeFXSHJo2sXGG7GnnsaQ~Ass-RxXZt843-7yVRC1psGL3oevpIjf9pUL2CAX270OJOhca9UhgF9Y2N7cfTYad',
            mapTypeId: Microsoft.Maps.MapTypeId.road,
            showScalebar:false,
            showDashboard:false, 
            zoom: 12, 
        };
    var view ={
           
            bounds: new Microsoft.Maps.LocationRect.fromLocations(
                    new Microsoft.Maps.Location(35.622703, 139.558078),
                    new Microsoft.Maps.Location(35.623029, 139.567189)) //Arena Doors

        };
   
       

    /*var boundingBox = Microsoft.Maps.LocationRect.fromLocations(new Microsoft.Maps.Location(35.622703, 139.558078), new Microsoft.Maps.Location(35.623029, 139.567189)); 
    var map = new Microsoft.Maps.Map(document.getElementById("map_canvas"),
        {credentials: ' yFt9kpzvtvkZAkWBS7tE~0gpeFXSHJo2sXGG7GnnsaQ~Ass-RxXZt843-7yVRC1psGL3oevpIjf9pUL2CAX270OJOhca9UhgF9Y2N7cfTYad', showDashboard:false, bounds: boundingBox, showScalebar:false, zoom:18, });
    var pushpin= new Microsoft.Maps.Pushpin(map.getCenter(), null); 
        map.entities.push(map);*/

    map = new Microsoft.Maps.Map(document.getElementById("map_canvas"),mapAttribute);
    var pushpin = new Microsoft.Maps.Pushpin(map.getCenter(), null); 
    map.entities.push(pushpin);
    pushpin.setLocation(new Microsoft.Maps.Location(35.622703, 139.558078), 
                        new Microsoft.Maps.Location(35.623029, 139.567189));
    map.setView(view);
   
}







/*jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyAVGJylEBS00Yvzt9WzjtZCzGk4digqYq4&libraries=places&callback=initialize";
    document.body.appendChild(script);
});
          

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
        ['1365 Noborito Tama-ku, Kawasaki-shi Kanagawa',35.622703, 139.558078],     //Arena Doors
        ['467 Noboritoshinmachi Tama-ku, Kawasaki-shi, Kanagawa', 35.623029, 139.567189]    //New Forest
    ];
                        
    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' + '<h3>Arena Doors</h3>' + '<h5>(For Rent)</h5>' +
        '<p>Within 11 minute walk from Mukogaokayuen Station (Odakyu Line) </p>' +
        '<p>Within 13 minute walk from Noborito Station (Odakyu Line)</p>' +
        '</div>'],
        ['<div class="info_content">' + '<h3>New Forest</h3>' + '<h5>(For Rent)</h5>' + 
        '<p>Within 5 minute walk from Noborito Station (Odakyu Line)</p>' +
        '<p>Within 15 minute walk from Mukogaokayuen Station (Odakyu Line) </p>' +
        '</div>']
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {

            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));






        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
   
    $("#feature-list tbody").append('<tr class="feature-row map-sidebar" data-index=0><td style="vertical-align: middle;">' +
        '<img  width="120" height="120"src="frontend/asset/images/arena_doors/1.jpg"></td>' +
        '<td class="feature-name"> <b>Arena Doors</b> </br>(For Rent)</td>' +
        '<td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td>' +
        '</tr><tr class="feature-row map-sidebar" data-index=1><td style="vertical-align: middle;">' +
        '<img  width="120" height="120"src="frontend/asset/images/new_forest/1.jpg">' +
        '</td><td class="feature-name"><b> New Forest </b></br> (For Rent)</td><td style="vertical-align: middle;">'+
        '<i class="fa fa-chevron-right pull-right"></i></td></tr> ');


    $('.map-sidebar').on('click', function(){

        var _position = new google.maps.LatLng(markers[$(this).data("index")][1], markers[$(this).data("index")][2]);
        bounds.extend(position);
        _marker = new google.maps.Marker({
            position: _position,
            map: map,
            title: markers[$(this).data("index")][0]
        });
     

        google.maps.event.trigger(map, "resize");
        var x = new google.maps.LatLng(markers[$(this).data("index")][1], markers[$(this).data("index")][2]);
       //map.panTo(x);
        map.setZoom(19);
        
        infoWindow.setContent(infoWindowContent[$(this).data("index")][0]);
        infoWindow.open(map, _marker);
        

    });


}*/
  




    $('#sidebar-hide-btn').live('click', function(event) {        
         jQuery('#sidebar').toggle('show');
         $("#tog-btn").removeClass("hidden");
    });

    $('#sidebar-toggle-btn').live('click', function(event) {        
         jQuery('#sidebar').toggle('show');
         $("#tog-btn").addClass("hidden");
    });


    $('document').ready(function () {
      customScripts.init(); 
      $('.carousel').carousel();
      initialize();
    });

    $(window).scroll(function(){

        if($(window).scrollTop() > 650){
            $(".header").css('background-color', "rgba(27,83,122,0.9)");
        }
        else{
            $(".header").css('background-color', "rgba(27,83,122,1)");
        }

    });



