
//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Fit Vids
jQuery(function($) {
    $("body").fitVids();  
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;'
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Open social links in a new tab
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});

//Toggle sidebar
jQuery(function($) {
	$('.sidebar-toggle').click(function() {
		$('.widget-area').toggleClass('widget-area-visible');
	});
	$('.sidebar-toggle-inside').click(function() {
		$('.widget-area').toggleClass('widget-area-visible');
	});	
});

//Back to top
jQuery(function($) {
	$('.scrolltop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
});	