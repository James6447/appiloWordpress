// JavaScript Document
jQuery(document).ready(function() {
	
	var rockeroViewPortWidth = '',
		rockeroViewPortHeight = '';

	function rockeroViewport(){

		rockeroViewPortWidth = jQuery(window).width(),
		rockeroViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( rockeroViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var rockeroSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var rockeroSiteHeaderWidth = jQuery('.site-header').width();
			var rockeroSiteHeaderPadding = ( rockeroSiteHeaderWidth * 2 )/100;
			var rockeroMenuHeight = jQuery('.menu-container').height();
			
			var rockeroMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var rockeroMenuPadding = ( rockeroSiteHeaderHeight - ( (rockeroSiteHeaderPadding * 2) + rockeroMenuHeight ) )/2;
			var rockeroMenuButtonsPadding = ( rockeroSiteHeaderHeight - ( (rockeroSiteHeaderPadding * 2) + rockeroMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':rockeroMenuPadding});
			jQuery('.site-buttons').css({'padding-top':rockeroMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		rockeroViewport();
		
	});
	
	rockeroViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( rockeroViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

    var owl = jQuery("#rockero-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });			
	
});		