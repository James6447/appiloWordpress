/*************************************/
// Blog Single Hide and Show control
/*************************************/
( function( $ ){
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ){
ZTACustomizerToggles ['bevro_single_post_content_width'] = [
		    {
				controls: [    
				'bevro_sngle_cnt_widht',
				],
				callback: function(layout){
					if((layout == 'defualt')){
					return false;
					}
					return true;
				}
			},
		];
ZTACustomizerToggles ['bevro_single_related_post'] = [
		    {
				controls: [    
				'bevro_single_related_post_option',
				],
				callback: function(layout){
					if((layout == 1)){
					return true;
					}
					return false;
				}
			},
		];
  });
})( jQuery );