

jQuery(window).load(function(){


	/*===========================================================*/
	/*	Isotope Posrtfolio
	/*===========================================================*/	
	if(jQuery.isFunction(jQuery.fn.isotope)){
		jQuery('.portfolio_list').isotope({
			itemSelector : '.list_item',
			layoutMode : 'fitRows',
			animationEngine : 'jquery'
		});

		/* ---- Filtering ----- */
		jQuery('#filter li').click(function(){
			var $this = jQuery(this);
			if ( $this.hasClass('selected') ) {
				return false;
			} else {
				jQuery('#filter .selected').removeClass('selected');
				var selector = $this.attr('data-filter');
				$this.parent().next().isotope({ filter: selector });
				$this.addClass('selected');
				return false;
			}
		});	
	}




	var hash = window.location.hash,
	hashParts = hash.split("&");
	if (hash.length > 1){
		$("a[href='" + hashParts[0] + "']").trigger("click");
		setTimeout(function(){
			$("a[href='#" + hashParts[1] + "']").trigger("click");
		},100);
	}

	/*********remove active class top menu**********/
	$(".navbar").each(function(){
		var self = $(this);
		self.find("a[href^='#']").on("click", function(){
			if (self.find("button[data-toggle='collapse']").is(":visible")) {
				self.find("button[data-toggle='collapse']").trigger("click");
			}
		});
	});



	/*===========================================================*/
	/*	Revolution Slider
	/*===========================================================*/	
	var tpj=jQuery;
	tpj.noConflict();

	tpj(document).ready(function() {

		if (tpj.fn.cssOriginal!=undefined)
			tpj.fn.css = tpj.fn.cssOriginal;

		tpj('.fullwidthbanner').revolution(
		{
			delay:9000,
			startwidth:1024,
			startheight:425,

				onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:200,
				navigationType:"none",				// bullet, thumb, none
				navigationArrows:"verticalcentered",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:"square",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


				navigationHAlign:"center",				// Vertical Align top,center,bottom
				navigationVAlign:"bottom",					// Horizontal Align left,center,right
				navigationHOffset:0,
				navigationVOffset:0,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:0,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:0,
				soloArrowRightVOffset:0,

				touchenabled:"on",						// Enable Swipe Function : on/off
				
				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				fullWidth:"on",

				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});
});

/*

// Create an array of styles.
var styles = [
{
	stylers: [
	{ saturation: -1000 }

	]
},{
	featureType: 'road',
	elementType: 'geometry',
	stylers: [
	{ hue: "#1abc9c" },
	{ visibility: 'simplified' }
	]
},{
	featureType: 'road',
	elementType: 'labels',
	stylers: [
	{ visibility: 'off' }
	]
}
],

					// Lagitute and longitude for your location goes here
					lat = -7.79722,
					lng = 110.36880,

				  // Create a new StyledMapType object, passing it the array of styles,
				  // as well as the name to be displayed on the map type control.
				  customMap = new google.maps.StyledMapType(styles,
				  	{name: 'Styled Map'}),

				// Create a map object, and include the MapTypeId to add
				// to the map type control.
				mapOptions = {
					zoom: 12,
					scrollwheel: false,
					center: new google.maps.LatLng( lat, lng ),
					mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP],
						
					}
				},
				map = new google.maps.Map(document.getElementById('map'), mapOptions),
				myLatlng = new google.maps.LatLng( lat, lng ),

				marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					icon: "images/marker.png"
				});

				  //Associate the styled map with the MapTypeId and set it to display.
				  map.mapTypes.set('map_style', customMap);
				  map.setMapTypeId('map_style');

	//---------------------------------- End google map location -----------------------------------------//


	*/
});

//end document ready



/*-----------------------------------------------------------------------------------*/
/*	TABS
/*-----------------------------------------------------------------------------------*/
$(document).ready( function() {
	$('#services-container').easytabs({
		animationSpeed: 300,
		updateHash: false
	});

	function scrollTo(target){
		$.scrollTo( $(target), 2000 );
	}

	$('[data-spy="scroll"]').each(function () {
		var $spy = $(this).scrollspy('refresh')
	});
	/*===========================================================*/
	/*	Sticky Nav
	/*===========================================================*/		
	//$(".menu").sticky({topSpacing:0});
	$(".navbar").sticky({topSpacing:0});
	$("#navbar").sticky({topSpacing:0});


	$('.nav').onePageNav({
		currentClass: 'active',
		changeHash: false,
		scrollSpeed: 1000,
		scrollOffset: 69,
		easing: 'swing',
		begin: function() {
		},
		end: function() {
		},
		scrollChange: function($currentListItem) {  
		}
	});

	/*----------------------------------------------------------*/
	/*FLEX SLIDER*/
	/*----------------------------------------------------------*/
	if ( $( '#about' ).length && jQuery() ) { 
		var target_flexslider = $('#about');
		target_flexslider.flexslider({
			animation:"fade",				 
			controlNav: true, 
			directionNav: true, 
			slideshowSpeed: 4000
		});

		$("#about").hover( function() {    
			$('.flex-direction-nav').fadeIn(200); },
			function () {$('.flex-direction-nav').fadeOut(200);}); 
	}

	$('#testi-slider').flexslider({
		animation:"fadeOut",				 
		controlNav: true, 
		directionNav: false, 
		controlsContainer: '.testi-container',				
		slideshowSpeed: 3000
	});



	/*===========================================================*/
	/*	FancyBox & toTop
	/*===========================================================*/	
	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	
	$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
	});

    /*==================================================
	/*	Tooltip
	/*================================================== */
	$( 'body' ).tooltip({
		selector: "a[data-toggle=tooltip]"
	});
    //hover for team-block

    jQuery('.team-block').hoverIntent({
    	over: function () {
    		var $t = jQuery(this).find('.teamDesc');
            //adjust proper padding
            $t.animate({top: -$t.height() + 60});
        },
        out: function () {
        	var $t = jQuery(this).find('.teamDesc').animate({top: -15});
        },
        interval: 70
    });

    jQuery(".accordion").on("show",function (e) {
    	jQuery(e.target).prev(".accordion-heading").find(".accordion-toggle").addClass("active");
    }).on("hide",function (e) {
    	jQuery(this).find(".accordion-toggle").not(jQuery(e.target)).removeClass("active");
    }).each(function () {
    	var $a = jQuery(this);
    	$a.find("a.accordion-toggle").attr("data-parent", "#" + $a.attr("id"));
    });






});

/*===========================================================*/
	/*	Parallax 
	/*===========================================================*/	
	$('.inSeparator').parallax("50%", 0.2);
	$('.inSeparator-2').parallax("100%", 0.2);
	$('.inSeparator-3').parallax("100%", 0.1);
	$('.inSeparator-4').parallax("50%", 0.5);
	$('.inSeparator-5').parallax("100%", 0.4);
	$('.inSeparator-6').parallax("90%", 0.1);
	$('#team').parallax("50%", 0.5);
	$('header').parallax("50%", 0.2);
	/*===========================================================*/
	/*	Parallax Text Separator
	/*===========================================================*/	
	var h4 = $('#scroll-h-1');
	var h6 = $('#scroll-h-2');
	var h62 = $('#scroll-h-3');
	$(window).on('scroll', function() {
		var st = $(this).scrollTop();
		h4.css({ 'left' : (-1550 + st/3.0) });
		h6.css({ 'left' : (-2380 + st/2.1) });
		h62.css({ 'left' : (-1300 + st/3.6) });

	});
	var b4 = $('#scroll-b-1');
	var b6 = $('#scroll-b-2');
	var b62 = $('#scroll-b-3');
	$(window).on('scroll', function() {
		var st = $(this).scrollTop();
		b4.css({ 'right' : (-5900+ st/1.9) });
		b6.css({ 'right' : (-13940 + st/0.8) });
		b62.css({ 'right' : (-6600 + st/1.7) });
	});


	//  ==========
    //  = Scroll event function =
    //  ==========
    var getScrollView = function(elem) {
    	var docViewTop = $(window).scrollTop();
    	var docViewBottom = docViewTop + $(window).height();

    	var elemTop = elem.offset().top;
    	var elemBottom = elemTop + elem.height();

    	return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    };
    
    //  ==========
    //  = Progress bars =
    //  ==========
    $('.progress .bar').data('width', $(this).width()).css({
    	width : 0
    });

    $(window).scroll(function() {
    	$('.progress .bar').each(function() {
    		if (getScrollView($(this))) {
    			$(this).css({
    				width : $(this).attr('value') + '%'
    			});
    		}
    	});
    })

    jQuery(document).ready(function() {

    	jQuery('#example6').showbizpro({
    		dragAndScroll:"off",
    		visibleElementsArray:[2,2,2,1],
    		carousel:"on",
    		entrySizeOffset:0,
    		allEntryAtOnce:"off",
    		rewindFromEnd:"off",
    		autoPlay:"off",
    		delay:2000,						
    		speed:250
    	});

		// THE FANCYBOX PLUGIN INITALISATION
		jQuery(".fancybox").fancybox();

	});

/*
jQuery(".twitter-feed").tweet({
	join_text: "auto",
	username: ["envato"],
	modpath: "inc/twitter/",
	count: 1,
	template: "{text}<br><small>{time}</small>",
	loading_text: "loading tweets..."
});

*/
/*===========================================================*/
/*	Preloader 
/*===========================================================*/	

//<![CDATA[
	$(window).load(function() { // makes sure the whole site is loaded
		$("#status").fadeOut(); // will first fade out the loading animation
		$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
	})
//]]>

