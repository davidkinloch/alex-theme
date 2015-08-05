$( document ).ready(function() {

//cancel enter hit on article keyword
$('.noEnterSubmit').keypress(function(e){
    //or...
    if ( e.which == 13 ) e.preventDefault();
});

//replace footnotes text 
$( ".simple-footnotes .notes" ).text( "We would like to acknowledge the following sources that helped us with our research:" );

// clickable toggled headers
$(".team-list-link").click(function() {
	 $(this).addClass("active").parent().siblings().children(".team-list-link").removeClass("active");
  /* grabs URL from HREF attribute then adds an  */
  /* ID from the DIV I want to grab data from    */
  var myUrl = $(this).attr("href");
  $(".beamme").load(myUrl);
   return false;
  $(document).scrollTop( $("#anchor").offset().top + (-100) );  

});


$(".team-list-link").click(function() { 
	//$(document).scrollTop( $("#anchor").offset().top + (-100) );
	$(this).addClass("active").parent().siblings().children(".team-list-link").removeClass("active");
});

// submenu on mobile and articles
var disableClick = $( ".parent-menu > a" ).click(function(e) {
	e.preventDefault();
	$(this).parent().children(".sub-menu").toggleClass("active");
	$(this).parent().toggleClass("active");
});


var jRes = jRespond([
    {
        label: 'small',
        enter: 0,
        exit: 767
    },{
        label: 'large',
        enter: 768,
        exit: 10000
    }
]);

jRes.addFunc({
    breakpoint: 'large',
    enter: function() {
        disableClick.off();
    },
    exit: function() {
        disableClick.on();
    }
});

// header fixer
$("#core-nav").headroom({

	 offset : 114,
	 tolerance : {
        up : 0,
        down : 0
    },
	 onUnpin : function() {
	 	$('.main-container').addClass('unpin');
	 	$('.main-container').removeClass('onpin');
	 },
	 onPin : function() {
	 	$('.main-container').addClass('onpin');
	 	$('.main-container').removeClass('unpin');
	 },
	 onTop : function() {
	 	$('.main-container').addClass('onTop').removeClass('onNotTop');
	 	$('.floaty-social-holder').addClass('out').removeClass('in');
	 },
	 onNotTop : function() {
	 	$('.main-container').addClass('onNotTop').removeClass('onTop');
	 	$('.floaty-social-holder').addClass('in').removeClass('out');
	 }
});

// header fixer
$("#article-template").headroom({
	onTop : function() {
	 	$('.floaty-social-holder').addClass('out').removeClass('in');
	 },
	 onNotTop : function() {
	 	$('.floaty-social-holder').addClass('in').removeClass('out');
	 }
});	

//nav toggle
$( ".nav-toggle" ).click(function(e) {
	e.preventDefault();
	$(this).toggleClass("active");
	$(".site-nav-menu").toggleClass("active");
});

// social toggle on mobile
$( ".social-nav-toggle" ).click(function(e) {
	e.preventDefault();
	$(this).toggleClass("active");
	$(".social-nav-menu").toggleClass("active");
});

// seatch toggle on article
$( ".search-toggle" ).click(function(e) {
	e.preventDefault();
	$(this).toggleClass("active");
	$(".search-options").toggleClass("active");
});

// isotopte container with image laod and filter metho
var $container = $('#container').imagesLoaded( function() {

	// quick search regex
  	var qsRegex;

	$container.isotope({
  	// options
  	itemSelector: '.item',
  	layoutMode: 'masonry',
	// options for masonry layout mode
	  masonry: {
	    columnWidth: '.grid-sizer'
	  },
	  filter: function() {
	      return qsRegex ? $(this).text().match( qsRegex ) : true;
	    }
	});

	 // use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $container.isotope();

  }, 200 ) );


	 // bind filter on select change

	  $('#filters').on( 'change', function() {
	    // get filter value from option value
	    var filterValue = this.value;
	    // use filterFn if matches value
	  
	    $container.isotope({ filter: filterValue });
		});    
});

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}

//explore jiggery
$(".article-cont").click(function(e) {
      var clickedId= $(this).attr("id");
      e.preventDefault();
      $('.article-template').addClass('article-continuation');
      $('.explore-wrapper.' + clickedId).addClass('active');
      $('.floaty-social-holder').addClass('force');
});

$(".article-prev").click(function(e) {
      e.preventDefault();
      $('.article-template').removeClass('article-continuation');
      $('.explore-wrapper').removeClass('active');
      $('.floaty-social-holder').removeClass('force');
});




//CAPTIONS
  $('.thumbnails li').hover(function(){
    $(".caption p", this).stop().fadeIn("slow");
  }, function() {
    $(".caption p", this).stop().fadeOut("fast");
  });

});
