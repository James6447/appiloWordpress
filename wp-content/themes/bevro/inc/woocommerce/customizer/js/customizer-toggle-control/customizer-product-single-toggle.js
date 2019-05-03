/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ) {
ZTACustomizerToggles ['bevro_single_product_tab_display'] = [
		    {
				controls: [    
				'bevro_single_product_tab_layout',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['bevro_upsell_product_display'] = [
		    {
				controls: [    
				'bevro_upsale_num_col_shw',
				'bevro_upsale_num_product_shw',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['bevro_related_product_display'] = [
		    {
				controls: [    
				'bevro_related_num_col_shw',
				'bevro_related_num_product_shw',   
				],
				callback: function(layout){
					if(layout == true){
					return true;
					}
					return false;
				}
			},		
		];
ZTACustomizerToggles ['bevro_single_product_content_width'] = [
		    {
				controls: [    
				'bevro_product_cnt_widht',   
				],
				callback: function(layout){
					if(layout == 'defualt'){
					return false;
					}
					return true;
				}
			},		
		];		
  });
})( jQuery );