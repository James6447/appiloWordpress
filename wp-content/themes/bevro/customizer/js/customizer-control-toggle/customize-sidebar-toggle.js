/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ){
ZTACustomizerToggles ['bevro_sidebar_default_layout'] = [
		    {
				controls: [    
				'bevro_sidebar_width'  
				],
				callback: function(layout){
					var pageset = api( 'bevro_sidebar_page_layout' ).get();
					var blogset = api( 'bevro_sidebar_blog_layout' ).get();
					var arcset = api( 'bevro_sidebar_archive_layout' ).get();
					if(layout=='no-sidebar'){
					return false;
					}
					return true;
				}
			},		
		];
  ZTACustomizerToggles ['bevro_sidebar_page_layout'] = [
		    {
				controls: [    
				'bevro_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'bevro_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['bevro_sidebar_blog_layout'] = [
		    {
				controls: [    
				'bevro_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'bevro_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['bevro_sidebar_archive_layout'] = [
		    {
				controls: [    
				'bevro_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'bevro_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	ZTACustomizerToggles ['bevro_sidebar_woo_layout'] = [
		    {
				controls: [    
				'bevro_sidebar_width'
				],
				callback: function(layout){
					var deftset = api( 'bevro_sidebar_default_layout' ).get();
					if((layout=='left'||layout=='right') || (deftset!=='no-sidebar')){
					return true;
					}
					return false;
				}
			},		
		];
	});
})( jQuery );